<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Loan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loanDate')
            ->add('loanBackDate')
            ->add('numberOfBooksAllowed')
            ->add('lateFees')
            ->add('book')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Loan::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
