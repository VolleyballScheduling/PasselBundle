<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class TypeSearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('organization');
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Volleyball\Bundle\PasselBundle\Entity\Type'
        ));
    }

    public function getName()
    {
        return 'type_search';
    }
}
