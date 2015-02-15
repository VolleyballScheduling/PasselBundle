<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\AttendeeBundle\Traits\HasAttendeesTrait;
use \Volleyball\Bundle\CoreBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\TimestampableTrait;

class Passel
{
    use HasAttendeesTrait;
    use SluggableTrait;
    use TimestampableTrait;
    
    /**
     * Id
     * @var integer
     */
    protected $id;

    /**
     * Name
     * @var string
     */
    protected $name;
    
    /**
     * Passel type
     * @var \Volleyball\Bundle\PasselBundle\Entity\Type 
     */
    protected $type;
    
    /**
     * Organization
     * @var \Volleyball\Bundle\OrganizatinoBundle\Entity\Organization
     */
    protected $organization;
    
    /**
     * Council
     * @var \Volleyball\Bundle\OrganizationBundle\Entity\Council
     */
    protected $council;
    
    /**
     * Region
     * @var \Volleyball\Bundle\OrganizationBundle\Entity\Region
     */
    protected $region;
        
    /**
     * Factions
     * @var \Doctrine\Common\Collections\ArrayCollection 
     */
    protected $factions;
    
    /**
     * Leaders
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $leaders;
    
    /**
     * Enrollments
     * @var \Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment
     */
    protected $enrollments;
    
    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @param string $name
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get factions
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getFactions()
    {
        return $this->factions;
    }

    /**
     * Set factions
     * @param array $factions
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setFactions(array $factions)
    {
        if (! $factions instanceof ArrayCollection) {
            $factions = new ArrayCollection($factions);
        }

        $this->factions = $factions;

        return $this;
    }

    /**
     * Has factions
     * @return boolean
     */
    public function hasFactions()
    {
        return !$this->factions->isEmpty();
    }

    /**
     * Get faction
     * @param string $faction
     * @return \Volleyball\Bundle\PasselBundle\Entity\Faction
     */
    public function getFaction($faction)
    {
        return $this->factions->get($faction);
    }

    /**
     * Add faction
     * @param \Volleyball\Bundle\PasselBundle\Entity\Faction $faction
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function addFaction(\Volleyball\Bundle\PasselBundle\Entity\Faction $faction)
    {
        $this->factions->add($faction);

        return $this;
    }

    /**
     * Remove faction
     * @param string $faction
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function removeFaction($faction)
    {
        $this->factions->remove($faction);

        return $this;
    }

    /**
     * Get organization
     * @return \Volleyball\Bundle\OrganizationBundle\Entity\Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }
    
    /**
     * Set organization
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;
        
        return $this;
    }
    
    /**
     * Get council
     * @return \Volleyball\Bundle\OrganizationBundle\Entity\Council
     */
    public function getCouncil()
    {
        return $this->council;
    }

    /**
     * Set council
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Council $council
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setCouncil(\Volleyball\Bundle\OrganizationBundle\Entity\Council $council)
    {
        $this->council = $council;

        return $this;
    }

    /**
     * Get regionorganizationBundle\Entity\Region
     * @return \Volleyball\Bundle\
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set region
     * @param \Volleyball\Bundle\OrganizationBundle\Entity\Region $region
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setRegion(\Volleyball\Bundle\OrganizationBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get leaders
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getLeaders()
    {
        return $this->leaders;
    }

    /**
     * Set leaders
     * @param array $leaders
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setLeaders(array $leaders)
    {
        if (! $leaders instanceof ArrayCollection) {
            $leaders = new ArrayCollection($leaders);
        }

        $this->leaders = $leaders;

        return $this;
    }

    /**
     * Has leaders
     * @return boolean
     */
    public function hasLeaders()
    {
        return !$this->leaders->isEmpty();
    }

    /**
     * Add leader
     * @param \Volleyball\Bundle\PasselBundle\Entity\Leader $leader
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function addLeader(Leader $leader)
    {
        $this->leaders->add($leader);

        return $this;
    }

    /**
     * Remove leader
     * @param string $leader
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function removeLeader($leader)
    {
        $this->leaders->remove($leader);

        return $this;
    }

    /**
     * Get leader
     * @param string $leader
     * @return \Volleyball\Bundle\PasselBundle\Entity\Leader
     */
    public function getLeader($leader)
    {
        return $this->leaders->get($leader);
    }

    /**
     * Get enrollments
     * @return \Doctirne\Common\Collections\ArrayCollection
     */
    public function getEnrollments()
    {
        return $this->enrollments;
    }

    /**
     * Set enrollments
     * @param array $enrollments
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setEnrollments(array $enrollments)
    {
        if (! $enrollments instanceof ArrayCollection) {
            $enrollments = new ArrayCollection($enrollments);
        }

        $this->enrollments = $enrollments;

        return $this;
    }

    /**
     * Has enrollments
     * @return boolean
     */
    public function hasEnrollments()
    {
        return !$this->enrollments->isEmpty();
    }

    /**
     * Add enrollment
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $enrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function addEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $enrollment)
    {
        $this->enrollments->add($enrollment);

        return $this;
    }

    /**
     * Remove enrollment
     * @param string $enrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function removeEnrollment($enrollment)
    {
        $this->enrollments->remove($enrollment);

        return $this;
    }

    /**
     * Get enrollment
     * @param string $enrollment
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment
     */
    public function getEnrollment($enrollment)
    {
        return $this->enrollments->get($enrollment);
    }

    /**
     * Get type
     * @return \Volleyball\Bundle\PasselBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     * @param \Volleyball\Bundle\PasselBundle\Entity\Type $type
     * @return boolean|\Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function setType(\Volleyball\Bundle\PasselBundle\Entity\Type $type)
    {
        if ($type->hasOrganization($this->organization)) {
            $this->type = $type;

            return $this;
        }

        return false;
    }

    /**
     * constructor
     */
    public function __construct()
    {
        $this->leaders   = new ArrayCollection();
        $this->factions  = new ArrayCollection();
        $this->attendees = new ArrayCollection();
        $this->enrollments = new ArrayCollection();
    }
    
    /**
     * To string
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
