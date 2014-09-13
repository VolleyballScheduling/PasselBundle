<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;
use \Pagerfanta\Pagerfanta;
use \Pagerfanta\Adapter\DoctrineORMAdapter;
use \Pagerfanta\Exception\NotValidCurrentPageException;
use \Pagerfanta\View\TwitterBootstrapView;

class LevelController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    /**
     * @Route("/", name="volleyball_attendee_level_index")
     * @Template("VolleyballPasselBundle:Level:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:Level')
            ->findAll();

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'levels' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/new", name="volleyball_attendee_level_new")
     * @Template("VolleyballPasselbundle:Level:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $level = new \Volleyball\Bundle\PasselBundle\Entity\Level();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\LevelFormType(),
            $level
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($level);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'attendee level created.'
                );

                return $this->render(
                    'VolleyballPasselbundle:Level:show.html.twig',
                    array('level' => $level)
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/search", name="volleyball_attendee_level_search")
     * @Template("VolleyballPasselBundle:Level:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\LevelSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                /** @TODO finish level search, also restrict access */
                $levels = array();

                return $this->render(
                    'VolleyballPasselbundle:Level:index.html.twig',
                    array('levels' => $levels )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/{slug}", name="volleyball_attendee_level_show")
     * @Template("VolleyballPasselBundle:Level:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $level = $this->getDoctrine()
            ->getRepository('VolleyballPasselbundle:Level')
            ->findOneBySlug($slug);

        if (!$level) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching level found.'
            );
            $this->redirect($this->generateUrl('volleyball_attendee_level_index'));
        }

        return array('level' => $level);
    }
}
