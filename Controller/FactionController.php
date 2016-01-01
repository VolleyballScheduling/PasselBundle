<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

class FactionController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $factions)
    {
        return ['factions' => $this->getFactions()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $faction = new \Volleyball\Bundle\PasselBundle\Entity\Faction();
        $form = $this->createBoundObjectForm($faction, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($faction, true);
            $this->addFlash('faction created');

            return $this->redirectToRoute('volleyball_factions_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $factions)
    {
        $faction = new \Volleyball\Bundle\PasselBundle\Entity\Faction();
        $form = $this->createBoundObjectForm($faction, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish faction search, also restrict access */
            $factions = array();

            return ['factions' => $factions];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\PasselBundle\Entity\Faction $faction)
    {
        return ['faction' => $faction];
    }


}
