<?php

namespace Bedrijven\FicheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @ORM\Entity(repositoryClass="Bedrijven\FicheBundle\Entity\Repository\ContactpersoonRepository")
 * @ORM\Table(name="contactpersonen")
 * @ORM\HasLifecycleCallbacks
 */
class Contactpersoon
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $user;

    /**
     * @ORM\Column(type="string")
     */
    protected $telnumber;

    /**
     * @ORM\ManyToOne(targetEntity="Bedrijf", inversedBy="contactpersonen")
     * @ORM\JoinColumn(name="bedrijf_id", referencedColumnName="id")
     */
    protected $bedrijf;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());

    }

    /**
     * @ORM\preUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(new \DateTime());
    }

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
     * Set user
     *
     * @param string $user
     * @return Contactpersoon
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set telnumber
     *
     * @param string $telnumber
     * @return Contactpersoon
     */
    public function setTelnumber($telnumber)
    {
        $this->telnumber = $telnumber;

        return $this;
    }

    /**
     * Get telnumber
     *
     * @return string 
     */
    public function getTelnumber()
    {
        return $this->telnumber;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Contactpersoon
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Contactpersoon
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set bedrijf
     *
     * @param \Bedrijven\FicheBundle\Entity\Bedrijf $bedrijf
     * @return Contactpersoon
     */
    public function setBedrijf(\Bedrijven\FicheBundle\Entity\Bedrijf $bedrijf = null)
    {
        $this->bedrijf = $bedrijf;

        return $this;
    }

    /**
     * Get bedrijf
     *
     * @return \Bedrijven\FicheBundle\Entity\Bedrijf 
     */
    public function getBedrijf()
    {
        return $this->bedrijf;
    }
    
    //validators
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('user', new NotBlank(array(
            'message' => 'You must enter your name'
        )));
        $metadata->addPropertyConstraint('telnumber', new NotBlank(array(
            'message' => 'You must enter a phone number'
        )));
    }
}
