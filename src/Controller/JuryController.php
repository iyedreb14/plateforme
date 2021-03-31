<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JuryController extends AbstractController
{
    /**
     * @Route("/jury", name="jury")
     */
    public function index(): Response
    {
        return $this->render('jury/index.html.twig', [
            'controller_name' => 'JuryController',
        ]);
    }
}
