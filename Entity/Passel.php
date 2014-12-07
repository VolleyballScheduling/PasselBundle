<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\PasselBundle\Traits\HasAttendeesTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Table(name="passel")
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\PasselBundle\Repository\PasselRepository")
 */
class Passel implements \Volleyball\Component\Passel\Interfaces\PasselInterface
{
    use HasAttendeesTrait;
    use SluggableTrait;
    use TimestampableTrait;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = "1",
     *      max = "250",
     *      minMessage = "Name must be at least {{ limit }} characters length",
     *      maxMessage = "Name cannot be longer than {{ limit }} characters length"
     * )
     * @var string
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Type", inversedBy="passel")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", inversedBy="passel")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     */
    protected $organization;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Council", inversedBy="passel")
     * @ORM\JoinColumn(name="council_id", referencedColumnName="id")
     */
    protected $council;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Region", inversedBy="passel")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    protected $region;
        
    /**
     * @ORM\OneToMany(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Faction", mappedBy="passel")
     */
    protected $factions;
    
    /**
     * @ORM\OneToMany(targetEntity="Leader", mappedBy="passel")
     */
    protected $leaders;
    
    /**
     * @ORM\OneToMany(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment", mappedBy="passel")
     */
    protected $enrollments;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @{inheritdocs}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getFactions()
    {
        return $this->factions;
    }

    /**
     * @{inheritdocs}
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
     * @{inheritdocs}
     */
    public function getFaction($faction)
    {
        return $this->factions->get($faction);
    }

    /**
     * @{inheritdocs}
     */
    public function addFaction(\Volleyball\Bundle\PasselBundle\Entity\Faction $faction)
    {
        $this->factions->add($faction);

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function removeFaction($faction)
    {
        $this->factions->remove($faction);

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getOrganization()
    {
        return $this->organization;
    }
    
    /**
     * @{inheritdocs}
     */
    public function setOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;
        
        return $this;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getCouncil()
    {
        return $this->council;
    }

    /**
     * @{inheritdocs}
     */
    public function setCouncil(\Volleyball\Bundle\OrganizationBundle\Entity\Council $council)
    {
        $this->council = $council;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @{inheritdocs}
     */
    public function setRegion(\Volleyball\Bundle\OrganizationBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getLeaders()
    {
        return $this->leaders;
    }

    /**
     * @{inheritdocs}
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
     * @{inheritdocs}
     */
    public function hasLeaders()
    {
        return !$this->leaders->isEmpty();
    }

    /**
     * @{inheritdocs}
     */
    public function addLeader(Leader $leader)
    {
        $this->leaders->add($leader);

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function removeLeader($leader)
    {
        $this->leaders->remove($leader);

        return $this;
    }

    /**
     * Get a leader
     *
     * @param Leader|String $leader leader
     *
     * @return Leader
     */
    public function getLeader($leader)
    {
        return $this->leaders->get($leader);
    }

    /**
     * Get passel enrollments
     * @return array
     */
    public function getEnrollments()
    {
        return $this->enrollments;
    }

    /**
     * Set passel enrollments
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
     * Add passel enrollment
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $enrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function addEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $enrollment)
    {
        $this->enrollments->add($enrollment);

        return $this;
    }

    /**
     * Remove passel enrollment
     * @param string|\Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $enrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    public function removeEnrollment($enrollment)
    {
        $this->enrollments->remove($enrollment);

        return $this;
    }

    /**
     * Get a passel enrollment
     *
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment|String $enrollment enrollment
     *
     * @return Enrollment
     */
    public function getEnrollment($enrollment)
    {
        return $this->enrollments->get($enrollment);
    }

    /**
     * @{inheritdocs}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @{inheritdocs}
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
