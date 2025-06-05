<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JobController extends AbstractController
{
    #[Route('/job/list', name: 'app_job_list')]
    public function list(JobRepository $jobRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $jobRepository->findAll();

        $jobs = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), // Page actuelle, défaut 1
            2 // Jobs par page
        );

        return $this->render('job/list.html.twig', [
            'jobs' => $jobs,
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
