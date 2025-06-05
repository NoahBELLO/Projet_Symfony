<?php

namespace App\Controller;

use App\Entity\JobCategorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategorieController extends AbstractController
{
    #[Route('/categorie/{id}', name: 'app_categorie_show')]
    public function show(JobCategorie $categorie): Response
    {
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie
        ]);
    }
}
