<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\Type\AnimalType;
use App\Repository\AnimalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class AnimalController extends AbstractController {
    /**
     * @Route("/animaux", name="animaux")
     */
    public function kamoulox(AnimalRepository $repository): Response {
        $animaux = $repository->findAll();

        // dd($animaux);

        return $this->render('animal/index.html.twig', [
            'pets' => $animaux
        ]);
    }

    /**
     * @Route("/animaux/{id}/delete", name="delete_animal")
     */
    public function delete($id, AnimalRepository $repo, EntityManagerInterface $em) {
        $animal = $repo->find($id);
        if (empty($animal)) throw new NotFoundHttpException;

        $em->remove($animal);
        $em->flush();

        return $this->redirectToRoute('animaux');
    }

    /**
     * @Route("/animaux/{id}/update", name="update_animal")
     */
    public function update(Animal $animal, Request $request, EntityManagerInterface $em) {
        $formulaire = $this->createForm(AnimalType::class, $animal);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animaux');
        } else {
            return $this->render('animal/formulaire.html.twig', [
                'type' => 'Modifier',
                'formulaireView' => $formulaire->createView()
            ]);
        }
    }

    /**
     * @Route("/animaux/create", name="create_animal")
     */
    public function create(Request $request, EntityManagerInterface $em) {
        $animal = new Animal;

        $formulaire = $this->createForm(AnimalType::class, $animal);

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $photo = $formulaire->get('photo')->getData();

            if (!empty($photo)) {
                $nouveau_nom  = 'photo-' . uniqid() . '.' . $photo->guessExtension();

                $photo->move(
                    /**
                     * Le getParameter récupère le paramètre
                     * depuis config/services.yaml
                     */
                    $this->getParameter('assets_directory') . '/animaux',
                    $nouveau_nom
                );

                $nouveau_chemin = $this->getParameter('assets_directory') . '/animaux/' . $nouveau_nom;
                $animal->setPhoto($nouveau_chemin);

            } else {
                $animal->setPhoto('');
            }


            $em->persist($animal);
            $em->flush();

            return $this->redirectToRoute('animaux');
        } else {
            return $this->render('animal/formulaire.html.twig', [
                'type' => 'Ajouter',
                'formulaireView' => $formulaire->createView()
            ]);
        }
    }
}
