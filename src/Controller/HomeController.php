<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
	/**
	 * @Route("/", name="accueil")
	 */
	public function afficherHome(): Response {
		$reponse = $this->render('home.html.twig', [
			'titre' => 'Accueil'
		]);

		return $reponse;
	}

	/**
	 * @Route("/conditions-generales-utilisation", name="cgu")
	 */
	public function cgu(): Response {
		return $this->render('cgu.html.twig', [
			'titre' => 'CGU'
		]);
	}
}
