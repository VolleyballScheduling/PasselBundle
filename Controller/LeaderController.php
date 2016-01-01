<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

class LeaderController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $leaders)
    {
        return ['leaders' => $this->getLeaders()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $leader = new \Volleyball\Bundle\PasselBundle\Entity\Leader();
        $form = $this->createBoundObjectForm($leader, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($leader, true);
            $this->addFlash('leader created');

            return $this->redirectToRoute('volleyball_leaders_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $leaders)
    {
        $leader = new \Volleyball\Bundle\PasselBundle\Entity\Leader();
        $form = $this->createBoundObjectForm($leader, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish leader search, also restrict access */
            $leaders = array();

            return ['leaders' => $leaders];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\PasselBundle\Entity\Leader $leader)
    {
        return ['leader' => $leader];
    }


}
