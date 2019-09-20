<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Repository\ContactsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @param ContactsRepository $repository
     * @return Response
     */
    public function index(ContactsRepository $repository): Response
    {

        $userId = $this->getUser();

        if ($userId === null) {
            $this->redirectToRoute('home');
        } elseif (!is_object($userId) || !$userId instanceof UserInterface) {
            $userId->getId();
        }
        $properties = $this->getDoctrine()->getManager()->getRepository(Contacts::class)->findBy(['userid' => $userId]);

        return $this->render('pages/home.html.twig', [
            'contacts' => $properties
        ]);
    }

}

