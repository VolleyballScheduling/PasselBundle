VolleyballPasselBundle
================
Attendee Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_attendee_index | /attendees | | VolleyballResourceBundle:Attendee:index.html.twig
volleyball_attendee_show | /attendees/{slug} | $slug | VolleyballResourceBundle:Attendee:show.html.twig
volleyball_attendee_new | /attendees/add | | VolleyballResourceBundle:Attendee:new.html.twig
volleyball_attendee_search | /attendees/search | | VolleyballResourceBundle:Attendee:search.html.twig
volleyball_attendee_search_q | /attendees/search/{query} | $query | VolleyballResourceBundle:Attendee:search.html.twig
volleyball_attendee_edit | /attendees/{slug}/edit | $slug | VolleyballResourceBundle:Attendee:new.html.twig
volleyball_attendee_remove | /attendees/{slug}/remove | $slug | VolleyballResourceBundle:Attendee:remove.html.twig
volleyball_attendee_remove_confirm | /attendees/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Attendee:remove.html.twig

Methods
-----
- indexAction
- showAction
- newAction
- searchAction

##Methods

###indexAction
- Parameters
    - \Symfony\Component\HttpFoundation\Request $request
- Return:
    - array
        - ArrayCollection attendees 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Attendee attendee

###newAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array
        - form

###searchAction
Parameters
- Symfony\Component\HttpFoundation\Request $request
Return
- array
    - form