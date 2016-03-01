<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type\Step;

class PasselInfoFormType extends \FOS\UserBundle\Form\Type\RegistrationFormType
{
    public function buildForm(\Symfony\Component\Form\Test\FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'organization',
                'entity',
                array(
                    'class' => 'VolleyballOrganizationBundle:Organization',
                    'empty_value' => ''
                )
            )
            ->add(
                'council',
                'entity',
                array(
                    'class' => 'VolleyballOrganizationBundle:Council',
                    'empty_value' => ''
                )
            )
            ->add(
                'region',
                'entity',
                array(
                    'class' => 'VolleyballOrganizationBundle:Region',
                    'empty_value' => ''
                )
            )
            ->add(
                'passel',
                'entity',
                array(
                    'class' => 'VolleyballPasselBundle:Passel',
                    'empty_value' => ''
                )
            );
        
        $builder
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();
                    $organization = $event->getOrganization();
                    $councils = null === $organization ? array() : $organization->getCouncils();

                    $form->add(
                        'council',
                        'entity',
                        array(
                            'class' => 'VolleyballOrgnaizationBundle:Council',
                            'empty_value' => '',
                            'choices' => $councils
                        )
                    );
                }
            )
            ->addEvenListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();
                    $council = $event->getCouncil();
                    $regions = null === $council ? array() : $council->getRegions();

                    $form->add(
                        'reigon',
                        'entity',
                        array(
                            'class' => 'VolleyballOrganizationBundle:Region',
                            'empty_value' => '',
                            'choices' => $regions
                        )
                    );
                }
            )
            ->addListener(
                FormEvents::PRES_SET_DATA,
                function (FormEvent $event) {
                    $form = $event->getForm();
                    $region = $event->getPassels();
                    $passels = null === $region ? array() : $region->getPassels();
                    
                    $form->add(
                        'passel',
                        'entity',
                        array(
                            'class' => 'VolleyballPasselBundle:Passel',
                            'empty_value' => '',
                            'choices' => $passels
                        )
                    );
                }
            );
    }
    
    public function getName()
    {
        return 'passel_info';
    }
}
