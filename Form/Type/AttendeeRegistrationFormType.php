<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

use \Symfony\Component\Form\FormEvents;
use \Symfony\Component\Form\FormEvent;

use \Volleyball\Bundle\OrganizationBundle\Form\EventListener\AddCouncilFieldSubscriber;
use \Volleyball\Bundle\OrganizationBundle\Form\EventListener\AddRegionFieldSubscriber;
use \Volleyball\Bundle\PasselBundle\Form\EventListener\AddPasselFieldSubscriber;

class AttendeeRegistrationFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $c_modifier = function(FormInterface $form, Volleyball\Bundle\OrganizationBundle\Entity\Council $council = null) {
            $regions = null === $council ? array() : $council->getRegions();
            $form->add(
                'council',
                'entity',
                array(
                    'class' => 'Volleyball\Bundle\OrganizationBundle\Entity\Council',
                    'placeholder' => '',
                    'mapped' => false,
                    'choices' => $regions
                )
            );
        };
        $r_modifier = function(FormInterface $form, Volleyball\Bundle\OrganizationBundle\Entity\Region $region = null) {
            $passels = null === $region ? array() : $region->getPassels();
            $form->add(
                'passel',
                'entity',
                array(
                    'class' => 'Volleyball\Bundle\PasselBundle\Entity\Passel',
                    'placeholder' => '',
                    'mapped' => false,
                    'choices' => $passels
                )
            );
        };
        
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('birthdate')
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add(
                'plainPassword',
                'repeated',
                array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch',
                )
            );
        
        $builder
            ->add(
                'organization',
                'entity',
                array(
                    'class' => 'Volleyball\Bundle\OrganizationBundle\Entity\Organization',
                    'placeholder' => '',
                    'mapped' => false
                )
            );
        
        $modifier = function(FormInterface $form, Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization = null) {
            $councils = null === $organization ? array() : $organization->getCouncils();
            
            $form->add(
                'council',
                'entity',
                array(
                    'class' => 'Volleyball\Bundle\OrganizationBundle\Entity\Council',
                    'placeholder' => '',
                    'mapped' => false,
                    'choices' => $councils
                )
            );
        };
        
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($modifier) {
                $data = $event->getData();
                $modifier($event->getForm(), $data->getOrganization());
            })
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($modifier) {
                $organization = $event->getForm()->getData();
                $modifier($event->getForm()-getParent(), $organization);
            });
                
        $builder
            ->add(
                'level',
                'entity',
                array(
                    'class' => 'Volleyball\Bundle\PasselBundle\Entity\Level',
                    'placeholder' => ''
                )
            )
            ->add(
                'position',
                'entity',
                array(
                    'class' => 'Volleyball\Bundle\PasselBundle\Entity\Position',
                    'placeholder' => ''
                )
            )
            
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($c_modifier) {
                $data = $event->getData();
                $c_modifier($event->getForm(), $data->getCouncil());
            })
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($r_modifier) {
                $data = $event->getData();
                $r_modifier($event->getForm(), $data->getRegion());
            })
            ;
    }

    /**
     * Set default options
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array('data_class' => 'Volleyball\Bundle\PasselBundle\Entity\Attendee')
        );
    }
    
    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return 'attendee_registration';
    }
}
