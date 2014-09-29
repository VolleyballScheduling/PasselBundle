VolleyballPasselBundle
================
Level Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_attendee_level_index | /attendees/levels | | VolleyballResourceBundle:Level:index.html.twig
volleyball_attendee_level_show | /attendees/levels/{slug} | $slug | VolleyballResourceBundle:Level:show.html.twig
volleyball_attendee_level_new | /attendees/levels/add | | VolleyballResourceBundle:Level:new.html.twig
volleyball_attendee_level_search | /attendees/levels/search | | VolleyballResourceBundle:Level:search.html.twig
volleyball_attendee_level_search_q | /attendees/levels/search/{query} | $query | VolleyballResourceBundle:Level:search.html.twig
volleyball_attendee_level_edit | /attendees/levels/{slug}/edit | $slug | VolleyballResourceBundle:Level:new.html.twig
volleyball_attendee_level_remove | /attendees/levels/{slug}/remove | $slug | VolleyballResourceBundle:Level:remove.html.twig
volleyball_attendee_level_remove_confirm | /attendees/levels/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Level:remove.html.twig

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
        - ArrayCollection levels 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Level level

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