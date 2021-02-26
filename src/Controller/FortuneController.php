<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FortuneController extends AbstractController
{
    /**
     * @Route("/", name="fortune_index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('fortune/index.html.twig');
    }
}
