<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;
use \Pagerfanta\Pagerfanta;
use \Pagerfanta\Adapter\DoctrineORMAdapter;

class AttendeeController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    /**
     * @Route("/", name="volleyball_attendee_index")
     * @Template("VolleyballPasselBundle:Attendee:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:Attendee')
            ->findAll();

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'attendees' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/new", name="volleyball_attendee_new")
     * @Template("VolleyballPasselbundle:Attendee:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $attendee = new \Volleyball\Bundle\PasselBundle\Entity\Attendee();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\AttendeeFormType(),
            $attendee
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($attendee);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'attendee created.'
                );

                return $this->render(
                    'VolleyballPasselbundle:Attendee:show.html.twig',
                    array('attendee' => $attendee )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/search", name="volleyball_attendee_search")
     * @Template("VolleyballPasselBundle:Attendee:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\AttendeeSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $attendees = $this->repository()->search($request->getParameter('query'));

                return $this->render(
                    'VolleyballPasselbundle:Attendee:index.html.twig',
                    array('attendees' => $attendees )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/{slug}", name="volleyball_attendee_show")
     * @Template("VolleyballPasselBundle:Attendee:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $attendee = $this->getDoctrine()
            ->getRepository('VolleyballPasselbundle:Attendee')
            ->findOneBySlug($slug);

        if (!$attendee) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching attendee found.'
            );
            $this->redirect($this->generateUrl('volleyball_attendee_index'));
        }

        return array('attendee' => $attendee);
    }
    
    /**
     * @Route("/signup/attendee", name="volleyball_attendee_register")
     * @Template("VolleyballResourceBundle:Register:attendee.html.twig")
     */
    public function registerAction()
    {
        return $this
                ->container
                ->get('pugx_multi_user.registation_manager')
                ->register('\Volleyball\Bundle\PasselBundle\Entity\Attendee');
    }
}
