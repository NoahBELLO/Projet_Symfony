<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\JobApplication;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormJobApplicationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('coverLetter', TextareaType::class, [
                'label' => 'Votre lettre de motivation',
                'required' => false,
                'attr' => [
                'rows' => 5,
                'class' => 'bg-slate-700 w-full px-4 py-2 border border-teal-500 rounded-md text-teal-100 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-teal-400 transition',
                'focus' => 'ring-2 focus:ring-indigo-500 focus:border-transparent',
                'placeholder' => 'Écrire votre lettre de motivation ici...',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobApplication::class,
        ]);
    }
}
