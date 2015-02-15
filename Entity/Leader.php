<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

class Leader extends \Volleyball\Bundle\UserBundle\Entity\User
{
    /**
     * Passel
     * @var \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    protected $passel;

    /**
     * PrimaryAdmin
     * @var boolean 
     */
    protected $primaryAdmin;
    
    /**
     * FirstName
     * @var string 
     */
    protected $firstName;

    /**
     * LastName
     * @var string 
     */
    protected $lastName;

    /**
     * Gender
     * @var string
     */
    protected $gender;
   
    /**
     * Birthdate
     * @var \DateTime 
     */
    protected $birthdate;

    /**
     * ActiveEnrollment
     * @var \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    protected $activeEnrollment;

    /**
     * FacebookId
     * @var string
     */
    protected $facebookId;

    /**
     * GoogleId
     * @var string 
     */
    protected $googleId;

    /**
     * LinkedinId
     * @var string
     */
    protected $linkedinId;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterId", type="string", length=255, nullable=true)
     */
    protected $twitterId;

    /**
     * FoursquareId
     * @var string
     */
    protected $foursquareId;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->primaryAdmin = false;
    }
    
    /**
     * Avatar
     * @var string
     */
    protected $avatar = '/bundles/volleyballuser/img/avatars/default.png';

    /**
     * Slug
     * @var string
     */
    protected $slug;

    /**
     * Get slug
     * @return type
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
     * @param string $slug
     * @return \Volleyball\Bundle\PasselBundle\Entity\Leader
     */
    public function setSlug($slug = null)
    {
        if (null == $slug) {
            $this->slug = str_replace(
                ' ',
                '-',
                $this->getName()
            );
        }

        return $this;
    }

    /**
     * GetName
     * @return string
     */
    public function getName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Get full name
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastname();
    }

    /**
     * Set active enrollments
     * @param \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment $activeEnrollment
     * @return \Volleyball\Bundle\PasselBundle\Entity\Leader
     */
    public function setActiveEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment $activeEnrollment = null)
    {
        $this->activeEnrollment = $activeEnrollment;

        return $this;
    }

    /**
     * Get active enrollment
     * @return \Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment
     */
    public function getActiveEnrollment()
    {
        return $this->activeEnrollment;
    }
    
    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get passel
     * @return \Volleyball\Bundle\PassleBundle\Entity\Passel
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * Set passel
     * @param \Volleyball\Bundle\PasselBundle\Entity\Passel $passel
     * @return \Volleyball\Bundle\PasselBundle\Entity\Leader
     */
    public function setPassel(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel)
    {
        $this->passel = $passel;

        return $this;
    }

    /**
     * Is primary admin
     * @param boolean|null $primary
     * @return boolean|\Volleyball\Bundle\PasselBundle\Entity\Leader
     */
    public function isPrimary($primary = null)
    {
        if (null != $primary) {
            $this->primary = $primary;

            return $this;
        }

        return $this->primary;
    }
    
    /**
     * To string
     * @return string
     */
    public function __toString()
    {
        return $this->firstName.' '.$this->lastName;
    }
}
