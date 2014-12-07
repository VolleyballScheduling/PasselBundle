<?php
namespace Volleyball\Bundle\PasselBundle\Form\EventListener;

class AddFactionFieldSubscriber
{
    /**
     * Form factory
     * @var \Symfony\Component\Form\FormFactoryInterface
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
     * Add faction form
     * @param mixed $form
     * @param mixed $passel
     */
    private function addFactionForm($form, $passel)
    {
        $form->add(
            $this->factory->createNamed(
                'faction',
                'entity',
                null,
                array(
                    'class' => 'Volleyball\Bundle\PasselBundle\Entity\Faction',
                    'empty_value' => '',
                    'query_builder' => function (\Doctrine\ORM\EntityRepository $repository) use ($passel) {
                        $qb = $repository
                                ->createQueryBuilder('faction')
                                ->innerJoin('faction.passel', 'passel');
                        if ($passel instanceof \Volleyball\Bundle\PasselBundle\Entity\Passel) {
                            $qb
                                ->where('faction.passel = :passel')
                                ->setParameter('passel', $passel);
                        } elseif (is_numeric($passel)) {
                            $qb
                                ->where('passel.id = :passel')
                                ->setParameter('passel', $passel);
                        } else {
                            $qb
                                ->where('passel.name = :passel')
                                -setParameter('passel', null);
                        }
                        
                        return $qb;
                    }
                )
            )
        );
    }
    
    /**
     * @inheritdocs
     */
    public function preSetData(\Symfony\Component\Form\FormEvent $event)
    {
        $data = $event->getData();
 
        if (null === $data) {
            return;
        }
 
        $this->addFactionForm(
            $event->getForm(),
            (($data->faction) ? $data->faction->getPassel() : null)
        );
    }
 
    /**
     * @inheritdocs
     */
    public function preBind(\Symfony\Component\Form\FormEvent $event)
    {
        $data = $event->getData();
 
        if (null === $data) {
            return;
        }
 
        $this->addFactionForm(
            $event->getForm(),
            (array_key_exists('passel', $data) ? $data['passel'] : null)
        );
    }
}
