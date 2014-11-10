VolleyballPasselBundle
======================
Entities
--------


- Attendee
- Faction
- Leader
- Level
- Passel
- Position
- Type




Attendee
--------

##Elements:
Name                | Type
--------------------|-----
firstName           | string
lastName            | string
gender              | string
birthdate           | DateTime
avatar              | string
active_enrollment   | ActiveEnrollment
passel              | Passel
faction             | Faction
position            | Position
level               | Level
enrollments         | ArrayCollection
slug                | string

##Methods:
Name                | Parameters | Return
--------------------|------------|-------
getFirstName        |            | string
setFirstName        | string     | 
getLastName         |            | string
setLastName         | string     |
getGender           |            | string
setGender           | string     |
getBirthdate        |            | DateTime
setBirthdate        | DateTime   |
getAvatar           |            | string
setAvatar           | string     |
getActiveEnrollment |            | ActiveEnrollment
setActiveEnrollment | ActiveEnrollment |
getPassel           |            | Passel
setPassel           | Passel     |
getFaction          |            | Faction
setFaction          | Faction    |
getPosition         |            | Position
setPosition         | Position   |
getLevel            |            | Level
setLevel            | Level      |
getEnrollments      |            | AttendeeEnrollmentCollection
setEnrollments      | AttendeeEnrollmentCollection |
hasEnrollments      |            | boolean
hasEnrollment       | string     | boolean
getEnrollment       | string     | AttendeeEnrollment
addEnrollment       | AttendeeEnrollment
getSlug             |            | string
setSlug             | string     |


Faction
--------

##Elements:
Name                | Type
--------------------|-----
name                | string
description         | string
avatar              | string
passel              | Passel
slug                | string

##Methods:
Name                | Parameters | Return
--------------------|------------|-------
getName             |            | string
setName             | string     | 
getAvatar           |            | string
setAvatar           | string     |
getPassel           |            | Passel
setPassel           | Passel     |
getSlug             |            | string
setSlug             | string     |


Leader
--------

##Elements:
Name                | Type
--------------------|-----
firstName           | string
lastName            | string
gender              | string
birthdate           | DateTime
avatar              | string
passel              | Passel
admin               | boolean
primary             | boolean
slug                | string

##Methods:
Name                | Parameters | Return
--------------------|------------|-------
getFirstName        |            | string
setFirstName        | string     | 
getLastName         |            | string
setLastName         | string     |
getGender           |            | string
setGender           | string     |
getBirthdate        |            | DateTime
setBirthdate        | DateTime   |
getAvatar           |            | string
setAvatar           | string     |
getPassel           |            | Passel
setPassel           | Passel     |
isAdmin             | mixed      | boolean
isPrimary           | mixed      | boolean
getSlug             |            | string
setSlug             | string     |

Level
--------

##Elements:
Name                | Type
--------------------|-----
name                | string
description         | string
types               | ArrayCollection
special             | boolean
slug                | string

##Methods:
Name                | Parameters | Return
--------------------|------------|-------
getName             |            | string
setName             | string     | 
getDescription      |            | string
setDescription      | string     |
isSpecial           | mixed      | boolean
getTypes            |            | ArrayCollection
setTypes            | ArrayCollection |
hasTypes            |            | boolean
hasType             | Type       | boolean
getType             | string     | Type
addType             | Type       |
getSlug             |            | string
setSlug             | string     |

Passel
--------

##Elements:
Name                | Type
--------------------|-----
name                | string
type                | Type
organization        | Organization
council             | Council
region              | Region
factions            | ArrayCollection
leaders             | ArrayCollection
attendees           | ArrayCollection
enrollments         | ArrayCollection
slug                | string
createdAt           | DateTime
updatedAt           | DateTime

##Methods:
Name                | Parameters | Return
--------------------|------------|-------
getName             |            | string
setName             | string     | 
getType             |            | string
setType             | Type       |
getOrganization     |            | Organization
setOrganization     | Organization |
getCouncil          |            | Council
setCouncil          | Council    |
getRegion           |            | Region
setRegion           | Region     |
getFactions         |            | ArrayCollection
setFactions         | ArrayCollection |
hasFactions         |            | boolean
hasFaction          | string     | boolean
getFaction          | string     | Faction
addFaction          | Faction    |
getLeaders          |            | ArrayCollection
setLeaders          | ArrayCollection |
hasLeaders          |            | boolean
hasLeader           | string     | boolean
getLeader           | string     | Leader
addLeader           | Leader     |
getPrimaryLeader    |            | Leader
setPrimaryLeader    | Leader     |
getEnrollments      |            | AttendeeEnrollmentCollection
setEnrollments      | AttendeeEnrollmentCollection |
hasEnrollments      |            | boolean
hasEnrollment       | string     | boolean
getEnrollment       | string     | AttendeeEnrollment
addEnrollment       | AttendeeEnrollment
getSlug             |            | string
setSlug             | string     |