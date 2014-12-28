<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;

use \Pagerfanta\Pagerfanta;
use \Pagerfanta\Adapter\DoctrineORMAdapter;
use \Pagerfanta\Exception\NotValidCurrentPageException;
use \Pagerfanta\View\TwitterBootstrapView;

class FactionController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    /**
     * @Route("/", name="volleyball_faction_index")
     * @Template("VolleyballPasselBundle:Faction:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        // get route name/params to decypher data to delimit by
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:Faction')
            ->findAll();

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'factions' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/new", name="volleyball_faction_new")
     * @Template("VolleyballPasselbundle:Faction:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $faction = new \Volleyball\Bundle\PasselBundle\Entity\Faction();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\FactionFormType(),
            $faction
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($faction);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'faction created.'
                );

                return $this->render(
                    'VolleyballPasselbundle:Faction:show.html.twig',
                    array('faction' => $faction)
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/search", name="volleyball_faction_search")
     * @Template("VolleyballPasselBundle:Faction:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\FactionSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                /** @TODO finish faction search, also restrict access */
                $factions = array();

                return $this->render(
                    'VolleyballPasselbundle:Faction:index.html.twig',
                    array('factions' => $factions )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/{slug}", name="volleyball_faction_show")
     * @Template("VolleyballPasselBundle:Faction:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $faction = $this->getDoctrine()
            ->getRepository('VolleyballPasselbundle:Faction')
            ->findOneBySlug($slug);

        if (!$faction) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching faction found.'
            );
            $this->redirect($this->generateUrl('volleyball_faction_index'));
        }

        return array('faction' => $faction);
    }
    
    /**
     * @Route("/widget", name="volleyball_faction_widget")
     */
    public function widgetAction(Request $request)
    {
        $factions = $this->getDoctrine()
                ->getRepository('VolleyballPasselBundle:Faction')
                ->findAllByPassel($this->securityContext->getToken()->getUser()->getActiveEnrollment()->getPassel());
        
        return $factions;
    }
}
