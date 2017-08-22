<?php

namespace ProjetPHP\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('password', RepeatedType::class, array(
                'type'            => PasswordType::class,
                 'invalid_message' => 'Les deux mots de passe doivent correspondre.',
                 'options'         => array('required' => true),
                 'first_options'   => array('label' => 'Password'),
                 'second_options'  => array('label' => 'Repeat password'),
             ));
    }

    public function getName()
    {
        return 'user';
    }
}