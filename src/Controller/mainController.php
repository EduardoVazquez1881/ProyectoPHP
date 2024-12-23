<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class mainController extends AbstractController
{   
    #[Route(path:"/prueba", name:"Prueba")]
    public function prueba(): Response
    {
        return $this->render("base.html.twig", [
            "mensaje"=> "HolaMundo",
        ]);
    }


    #[Route("/")]
}
