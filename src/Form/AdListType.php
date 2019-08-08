<?php


namespace App\Form;


use App\Entity\AdList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdListType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('ads', CollectionType::class, [
            'entry_type' => AdType::class,
            'allow_add' => true,
            'by_reference' => false,
            'prototype' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => AdList::class
        ]);
    }

}