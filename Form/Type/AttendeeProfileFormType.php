<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class AttendeeProfileFormType extends \FOS\UserBundle\Form\Type\ProfileFormType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        parent::buildForm($builder, $options);
    }
    
    public function getName()
    {
        return 'attendee_profile';
    }
}
