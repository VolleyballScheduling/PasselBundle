<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;
use \Pagerfanta\Pagerfanta;
use \Pagerfanta\Adapter\DoctrineORMAdapter;
use \Pagerfanta\Exception\NotValidCurrentPageException;
use \Pagerfanta\View\TwitterBootstrapView;

class PositionController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    /**
     * @Route("/", name="volleyball_attendee_position_index")
     * @Template("VolleyballPasselBundle:Position:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:Position')
            ->findAll();

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'positions' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/new", name="volleyball_attendee_position_new")
     * @Template("VolleyballPasselbundle:Position:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $position = new \Volleyball\Bundle\PasselBundle\Entity\Position();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\PositionFormType(),
            $position
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($position);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'attendee position created.'
                );

                return $this->render(
                    'VolleyballPasselbundle:Position:show.html.twig',
                    array('position' => $position)
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/search", name="volleyball_attendee_position_search")
     * @Template("VolleyballPasselBundle:Position:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\PositionSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                /** @TODO finish position search, also restrict access */
                $positions = array();

                return $this->render(
                    'VolleyballPasselbundle:Position:index.html.twig',
                    array('positions' => $positions )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/{slug}", name="volleyball_attendee_position_show")
     * @Template("VolleyballPasselBundle:Position:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $position = $this->getDoctrine()
            ->getRepository('VolleyballPasselbundle:Position')
            ->findOneBySlug($slug);

        if (!$position) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching position found.'
            );
            $this->redirect($this->generateUrl('volleyball_attendee_position_index'));
        }

        return array('position' => $position);
    }
}
