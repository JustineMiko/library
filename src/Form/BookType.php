<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Loan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bookTitle')
            ->add('bookCategory')
            ->add('author')
            ->add('editionYear')
            ->add('pages')
            ->add('editor')
            ->add('bookIsbn')
            ->add('bookCondition')
            ->add('books')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
