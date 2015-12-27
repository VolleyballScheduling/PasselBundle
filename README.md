#Volleyball
##Summer Camp Scheduling System
###Passel Bundle

This is a bundle utilizing the passel component of the Volleyball Scheduling system.

##Documentation
- [Passel](Resources/doc/passel.md)
- [Passel Type](Resources/doc/type.md)
- [Faction](Resources/doc/faction.md)
- [Leader](Resources/doc/leader.md)
- [Attendee Level](Resources/doc/level.md)
- [Attendee Position](Resources/doc/position.md)
- [Attendee](Resources/doc/attendee.md)

##Overview
###Controllers
- PasselController
- TypeController
- FactionController
- LeaderController
- LevelController
- PositionController
- AttendeeController

###Entities
- Passel
- Type
- Faction
- Leader
- Level
- Position
- Attendee

###Form Types
- PasselFormType
- PasselSearchFormType
- TypeFormType
- TypeSearchFormType
- FactionFormType
- FactionSearchFormType
- LeaderFormType
- LeaderSearchFormType
- LevelFormType
- LevelSearchFormType
- PositionFormType
- PositionSearchFormType
- AttendeeFormType
- AttendeeSearchFormType

###Repositories
- PasselRepository
- TypeRepository
- FactionRepository
- LeaderRepository
- LevelRepository
- PositionRepository
- AttendeeRepository

###Routes
Route Name | Route Path
---|---
volleyball_passel_index | /passels
volleyball_passel_show | /passels/{slug}
volleyball_passel_new | /passels/new
volleyball_passel_type_index | /passels/types
volleyball_passel_type_show | /passels/types/{slug}
volleyball_passel_type_new | /passels/types/new
volleyball_faction_index | /factions
volleyball_faction_show | /factions/{slug}
volleyball_faction_new | /factions/new
volleyball_leader_index | /leaders
volleyball_leader_show | /leaders/{slug}
volleyball_leader_new | /leaders/new
volleyball_attendee_level_index | /attendees/levels
volleyball_attendee_level_show | /attendees/levels/{slug}
volleyball_attendee_level_new | /attendees/levels/new
volleyball_attendee_position_index | /attendees/positions
volleyball_attendee_position_show | /attendees/positions/{slug}
volleyball_attendee_position_new | /attendees/positions/new
volleyball_attendee_index | /attendees
volleyball_attendee_show | /attendees/{slug}
volleyball_attendee_new | /attendees/new
