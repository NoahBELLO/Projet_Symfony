<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\JobApplication;
use App\Form\FormJobApplicationForm;
use App\Repository\JobApplicationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JobApplicationController extends AbstractController
{
    #[Route('/job/application/{id}/form', name: 'app_job_application_form')]
    public function form(Job $job, Request $request, JobApplicationRepository $jobApplicationRepository,Security $security, EntityManagerInterface $em): Response
    {
        $user = $security->getUser();
        $jobApplication = $jobApplicationRepository->findOneBy(['job' => $job, 'user' => $user]);
        if (!$jobApplication) {
            $jobApplication = new JobApplication();
            $jobApplication->setJob($job);
            $jobApplication->setUser($user);
        }

        $form = $this->createForm(FormJobApplicationForm::class, $jobApplication);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($jobApplication);
            $em->flush();
        }

        return $this->render('job_application/_form.html.twig', [
            'form' => $form->createView(),
            'jobId' => $job->getId(),
            'jobApplication' => $jobApplication
        ]);
    }
}
