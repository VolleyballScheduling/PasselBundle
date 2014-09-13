<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class AttendeeRegistrationFormType extends \FOS\UserBundle\Form\Type\RegistrationFormType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
            parent::buildForm($builder, $options);

            $builder->add('passel');
            $builder->add('faction');
    }

    public function getName()
    {
        return 'attendee_registration';
    }
}
