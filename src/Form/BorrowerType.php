<?php

namespace App\Form;

use App\Entity\Borrower;
use App\Entity\Loan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrowerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('borrowerName')
            ->add('borrowerContact')
            ->add('borrowerLogin')
            ->add('borrowerStatus')
            ->add('borrowerCard')
            ->add('borrowers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Borrower::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
