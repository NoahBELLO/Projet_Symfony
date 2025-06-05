<?php

namespace App\Controller;

use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CountryController extends AbstractController
{
    #[Route('/country/{country}', name: 'app_country_show')]
    public function show(string $country, JobRepository $jobRepository): Response
    {
        $jobs = $jobRepository->findAll();
        return $this->render('country/show.html.twig', [
            'country' => $country,
            'jobs' => $jobs
        ]);
    }
}
