<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class LeaderRegistrationFormType extends \FOS\UserBundle\Form\Type\RegistrationFormType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
            parent::buildForm($builder, $options);

            $builder->add('passel');
    }
    
    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'leader_registration';
    }
    
    /**
     * Set default options
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array('data_class' => 'Volleyball\Bundle\PasselBundle\Entity\Leader')
        );
    }
}
