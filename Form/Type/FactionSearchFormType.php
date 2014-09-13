<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class FactionSearchFormType extends \Volleyball\Bundle\UtilityBundle\Form\Type\SearchFormType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Volleyball\Bundle\PasselBundle\Entity\Faction'
        ));
    }

    public function getName()
    {
        return 'faction_search';
    }
}
