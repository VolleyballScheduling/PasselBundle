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
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\PasselBundle\Repository\LevelRepository")
 * @ORM\Table(name="attendee_level")
 */
class Level
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
     * @var  string name
     * @ORM\Column(name="name", type="string")
     */
    protected $name;
    
    /**
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $special;
    
    /**
     * @ORM\OneToMany(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", mappedBy="level")
     */
    protected $organizations;
    
    /**
     * Get id
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @{inheritdocs}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }
    
    /**
     * @{inheritdocs}
     */
    public function setOrganizations(array $organizations)
    {
        if (!$organizations instanceof ArrayCollection) {
            $organizations = new ArrayCollection($organizations);
        }
        
        $this->organizations = $organizations;
        
        return $this;
    }
    
    /**
     * @{inheritdocs}
     */
    public function getOrganization($organization)
    {
        return $this->organzations->get($organization);
    }

    /**
     * @{inheritdocs}
     */
    public function addOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function isSpecial($special = null)
    {
        if (null != $special) {
            $this->special = $special;

            return $this;
        }

        return $this->special;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attendees = new ArrayCollection();
        $this->special = false;
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
