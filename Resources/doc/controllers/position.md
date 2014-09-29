VolleyballPasselBundle
================
Position Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_attendee_position_index | /attendees/positions | | VolleyballResourceBundle:Position:index.html.twig
volleyball_attendee_position_show | /attendees/positions/{slug} | $slug | VolleyballResourceBundle:Position:show.html.twig
volleyball_attendee_position_new | /attendees/positions/add | | VolleyballResourceBundle:Position:new.html.twig
volleyball_attendee_position_search | /attendees/positions/search | | VolleyballResourceBundle:Position:search.html.twig
volleyball_attendee_position_search_q | /attendees/positions/search/{query} | $query | VolleyballResourceBundle:Position:search.html.twig
volleyball_attendee_position_edit | /attendees/positions/{slug}/edit | $slug | VolleyballResourceBundle:Position:new.html.twig
volleyball_attendee_position_remove | /attendees/positions/{slug}/remove | $slug | VolleyballResourceBundle:Position:remove.html.twig
volleyball_attendee_position_remove_confirm | /attendees/positions/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Position:remove.html.twig

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
        - ArrayCollection positions 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Position position

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