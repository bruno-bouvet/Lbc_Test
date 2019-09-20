<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Repository\ContactsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @param ContactsRepository $repository
     * @return Response
     */
    public function index(ContactsRepository $repository) : Response
    {

        $properties = $this->getDoctrine()->getRepository(Contacts::class)->findAll();

        return $this->render('pages/home.html.twig', [
            'contacts' => $properties
        ]);
    }

}