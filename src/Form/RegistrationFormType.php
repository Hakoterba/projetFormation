<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom :',
                'label_attr' => [
                    'class' => 'form_label',
                    'id' => 'form3Example1'
                ],
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control form-control-lg',
                    'id' => 'form3Example1'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom :',
                'label_attr' => [
                    'class' => 'form_label',
                    'id' => 'form3Example2'
                ],
                'attr' => [
                    'type' => 'text',
                    'class' => 'form-control form-control-lg',
                    'id' => 'form3Example2'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :',
                'label_attr' => [
                    'class' => 'form_label',
                    'id' => 'form3Example3'
                ],
                'attr' => [
                    'type' => 'password',
                    'class' => 'form-control form-control-lg',
                    'id' => 'form3Example3'
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label' => 'Mot de passe :',
                'label_attr' => [
                    'class' => 'form_label',
                    'id' => 'form3Example4'
                ],
                'attr' => [
                    'autocomplete' => 'new-password',
                    'type' => 'password',
                    'class' => 'form-control form-control-lg',
                    'id' => 'form3Example4'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('phone', NumberType::class, [
                'label' => 'Numéro de téléphone :',
                'label_attr' => [
                    'class' => 'form_label',
                    'id' => 'form3Example5'
                ],
                'attr' => [
                    'type' => 'password',
                    'class' => 'form-control form-control-lg',
                    'id' => 'form3Example5'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
