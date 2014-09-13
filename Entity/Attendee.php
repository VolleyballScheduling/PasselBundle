<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="attendee")
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\PasselBundle\Repository\AttendeeRepository")
 */
class Attendee extends \Volleyball\Bundle\UserBundle\Entity\User implements \Volleyball\Component\Passel\Interfaces\AttendeeInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Passel", inversedBy="attendee")
     * @ORM\JoinColumn(name="passel_id", referencedColumnName="id")
     */
    protected $passel = '';

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Faction", inversedBy="attendee")
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id")
     */
    protected $faction = '';

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Position", inversedBy="attendee")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    protected $position = '';

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Level", inversedBy="attendee")
     * @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     */
    protected $level = '';
    
    /**
     * @ORM\OneToMany(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\AttendeeEnrollmentCollection", mappedBy="passel")
     */
    protected $enrollments;
    
    /**
     * @{inheritdocs}
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * @{inheritdocs}
     */
    public function setPassel(\Volleyball\Component\Passel\Model\Passel $passel)
    {
        $this->passel = $passel;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * @{inheritdocs}
     */
    public function setFaction(\Volleyball\Component\Passel\Model\Faction $faction)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @{inheritdocs}
     */
    public function setPosition(\Volleyball\Component\Passel\Model\Position $position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @{inheritdocs}
     */
    public function setLevel(\Volleyball\Component\Passel\Model\Level $level)
    {
        $this->level = $level;

        return $this;
    }
    
    /**
     * Get attendee enrollments
     * @return array
     */
    public function getEnrollments()
    {
        return $this->enrollments;
    }

    /**
     * Set attendee enrollments
     * @param array $enrollments
     * @return \Volleyball\Bundle\PasselBundle\Entity\Attendee
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
     * Add attendee enrollment
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\Attendee $enrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Attendee
     */
    public function addEnrollment(\Volleyball\Component\Enrollment\Model\Attendee $enrollment)
    {
        $this->enrollments->add($enrollment);

        return $this;
    }

    /**
     * Remove attendee enrollment
     * @param string|\Volleyball\Bundle\EnrollmentBundle\Entity\Attendee $enrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Attendee
     */
    public function removeEnrollment($enrollment)
    {
        $this->enrollments->remove($enrollment);

        return $this;
    }

    /**
     * Get a attendee enrollment
     *
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\Attendee|String $enrollment enrollment
     *
     * @return Enrollment
     */
    public function getEnrollment($enrollment)
    {
        return $this->enrollments->get($enrollment);
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enrollments = new ArrayCollection();
    }
}
