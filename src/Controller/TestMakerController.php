<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestMakerController extends AbstractController {
    /**
     * @Route("/test/maker", name="test_maker")
     */
    public function index(): Response {
        return $this->render('test_maker/index.html.twig', [
            'controller_name' => 'TestMakerController',
        ]);
    }
}
