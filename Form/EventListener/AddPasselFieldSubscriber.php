<?php
namespace Volleyball\Bundle\PasselBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvents;
 
class AddPasselFieldSubscriber implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
{
    /**
     * Form factory
     * @var type 
     */
    private $factory;
 
    /**
     * Construct
     * @param \Symfony\Component\Form\FormFactoryInterface $factory
     */
    public function __construct(\Symfony\Component\Form\FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }
 
    /**
     * Get subscribed events
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND => 'preBind'
        );
    }
 
    /**
     * Add passel form
     * @param mixed $form
     * @param mixed $passel
     * @param mixed $region
     */
    private function addPasselForm($form, $passel, $region)
    {
        $form->add(
            $this->factory->createNamed(
                'passel',
                'entity',
                $passel,
                array(
                    'class'         => 'Volleyball\Bundle\PasselBundle\Entity\Passel',
                    'empty_value'   => '',
                    'auto_initialize'        => false,
                    'query_builder' => function (\Doctrine\ORM\EntityRepository $repository) use ($region) {
                        $qb = $repository
                                ->createQueryBuilder('passel')
                                ->innerJoin('passel.region', 'region');
                        
                        if ($region instanceof \Volleyball\Bundle\OrganizationBundle\Entity\Region) {
                            $qb->where('passel.region = :region')
                            ->setParameter('region', $region);
                        } elseif (is_numeric($region)) {
                            $qb->where('region.id = :region')
                            ->setParameter('region', $region);
                        } else {
                            $qb->where('region.name = :region')
                            ->setParameter('region', null);
                        }

                        return $qb;
                    }
                )
            )
        );
    }
 
    public function preSetData(\Symfony\Component\Form\FormEvent $event)
    {
        $data = $event->getData();
 
        if (null === $data) {
            return;
        }
 
        $passel = array_key_exists('region', $data) ? $data['region']->getPassel() : null ;
        $this->addPasselForm(
            $event->getForm(),
            $passel,
            ($passel) ? $passel->getRegion() : null
        );
    }
 
    public function preBind(\Symfony\Component\Form\FormEvent $event)
    {
        $data = $event->getData();
 
        if (null === $data) {
            return;
        }
 
        $this->addPasselForm(
            $event->getForm(),
            array_key_exists('passel', $data) ? $data['passel'] : null,
            array_key_exists('region', $data) ? $data['region'] : null
        );
    }
}
