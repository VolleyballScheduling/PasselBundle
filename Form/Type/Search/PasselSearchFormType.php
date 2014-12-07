<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class PasselSearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('type');
    }

    public function getName()
    {
        return 'passel_search';
    }
}
