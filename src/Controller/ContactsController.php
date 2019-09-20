<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/contacts")
 */
class ContactsController extends AbstractController
{
    /**
     * @Route("/", name="contacts_index", methods={"GET"})
     */
    public function index(): Response
    {
        $contacts = $this->getDoctrine()
            ->getRepository(Contacts::class)
            ->findAll();

        return $this->render('pages/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @Route("/new", name="contacts_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $userId = $this->getUser();

        if ($userId === null) {
            $this->redirectToRoute('home');
        } elseif (!is_object($userId) || !$userId instanceof UserInterface) {
            $userId->getId();
        }

        $contact = new Contacts($userId);
        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('contacts/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacts_show", methods={"GET"})
     * @param Contacts $contact
     * @return Response
     */
    public function show(Contacts $contact): Response
    {
        return $this->render('contacts/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contacts_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Contacts $contact
     * @return Response
     */
    public function edit(Request $request, Contacts $contact): Response
    {
        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacts_index');
        }

        return $this->render('contacts/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contacts_delete", methods={"DELETE"})
     * @param Request $request
     * @param Contacts $contact
     * @return Response
     */
    public function delete(Request $request, Contacts $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }
}
