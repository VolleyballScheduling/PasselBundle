<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Volleyball\Bundle\UserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="passel_leader")
 * @UniqueEntity(fields = "username", targetClass = "Volleyball\Bundle\UserBundle\Entity\User", message="fos_user.username_already")
 * @UniqueEntity(fields = "email", targetClass = "Volleyball\Bundle\UserBundle\Entity\User", message="fos_user.email_already")
 */
class Leader extends \Volleyball\Bundle\UserBundle\Entity\User
{
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Passel", inversedBy="passel_leader")
     * @ORM\JoinColumn(name="passel_id", referencedColumnName="id")
     */
    protected $passel;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $admin;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $primary_admin;
    
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please enter your first name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min="3",
     *     minMessage="The name is too short.",
     *     groups={"Registration", "Profile"},
     *     max="255",
     *     maxMessage="The name is too long."
     *)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please enter your last name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min="3",
     *     minMessage="The name is too short.",
     *     groups={"Registration", "Profile"},
     *     max="255",
     *     maxMessage="The name is too long."
     *)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = "1",
     *      max = "1",
     *      minMessage = "Must be at least {{ limit }} characters length",
     *      maxMessage = "Cannot be longer than {{ limit }} characters length"
     * )
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"M", "F"})
     */
    protected $gender;
   
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    protected $birthdate;

    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment", inversedBy="passel_leader")
     * @ORM\JoinColumn(name="activeEnrollment_id", referencedColumnName="id", nullable=true)
     */
    protected $activeEnrollment;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=255, nullable=true)
     */
    protected $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="googleId", type="string", length=255, nullable=true)
     */
    protected $googleId;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinId", type="string", length=255, nullable=true)
     */
    protected $linkedinId;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterId", type="string", length=255, nullable=true)
     */
    protected $twitterId;

    /**
     * @var string
     *
     * @ORM\Column(name="foursquareId", type="string", length=255, nullable=true)
     */
    protected $foursquareId;

    public function __construct()
    {
        $this->admin = false;
        $this->primary_admin = false;
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    protected $avatar = '/bundles/volleyballresource/images/avatars/default.png';

    /**
    * @Gedmo\Slug(fields={"lastName", "firstName"})
    * @ORM\Column(length=128, unique=true)
    */
    protected $slug;

    /**
     * Get slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set slug
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

    public function getName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Get the full name of the user (first + last name)
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastname();
    }

    /**
     * Set activeEnrollment
     *
     * @param  Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment $activeEnrollment
     * @return User
     */
    public function setActiveEnrollment(\Volleyball\Bundle\EnrollmentBundle\Entity\ActiveEnrollment $activeEnrollment = null)
    {
        $this->activeEnrollment = $activeEnrollment;

        return $this;
    }

    /**
     * Get activeEnrollment
     *
     * @return Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment
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
     * @{inheritdocs}
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * @{inheritdocs}
     */
    public function setPassel(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel)
    {
        $this->passel = $passel;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function isAdmin($admin = null)
    {
        if (null != $admin && is_bool($admin)) {
            $this->admin = $admin;

            return $this;
        }

        return $this->admin;
    }

    /**
     * @{inheritdocs}
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
