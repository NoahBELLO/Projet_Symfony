<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobCategorieRepository;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Intl\Countries;

final class JobController extends AbstractController
{
    private function getCountryNamesOnly(): array
    {
        $countryNames = Countries::getNames();
        asort($countryNames); 
        return array_combine(array_values($countryNames), array_values($countryNames));
    }

    #[Route('/job/list', name: 'app_job_list')]
    public function list(Request $request, JobRepository $jobRepository, JobCategorieRepository $categorieRepository): Response
    {
        $country = $request->query->get('country');
        $categoryId = $request->query->get('category');
        $categoryId = $categoryId !== null && $categoryId !== '' ? (int) $categoryId : null;

        $jobs = $jobRepository->findByFilters($country, $categoryId);
        $categories = $categorieRepository->findAll();
        $countries = $this->getCountryNamesOnly();

        return $this->render('job/list.html.twig', [
            'jobs' => $jobs,
            'selectedCountry' => $country,
            'selectedCategory' => $categoryId,
            'categories' => $categories,
            'countries' => $countries,
        ]);
    }

    #[Route('/job/{id}', name: 'app_job_show')]
    public function show(Job $job): Response
    {
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }
}
