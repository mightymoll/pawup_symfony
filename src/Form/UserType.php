<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                "label" => "Nom : ",
                "required" => true
            ])
            ->add('firstName', TextType::class, [
                "label" => "Prénom : ",
                "required" => true
            ])

            ->add('email', EmailType::class, [
                "label" => "Email : ",
                "required" => true,
            ])

            // show two fields for password (second to verify)
            ->add('password', RepeatedType::class, [
                "type" => PasswordType::class,
                "first_options" => [
                    "label" => "Mot de passe : ",
                ],
                "second_options" => [
                    "label" => "Resaisir mot de passe : ",
                ],
            ])

            // select role
            ->add('roles', ChoiceType::class, [
                "label" => 'Role : ',
                "required" => true,
                "multiple" => true,
                "choices" =>
                [
                    'Administrateur' => 'ROLE_SUPER_ADMIN',
                    'Benevole' => 'ROLE_ADMIN',
                    'Public' => 'ROLE_USER'
                ],
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('telephone', TextType::class, [
                "label" => "Téléphone : ",
                "required" => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
