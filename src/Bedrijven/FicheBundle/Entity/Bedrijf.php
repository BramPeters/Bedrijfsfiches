<?php

namespace Bedrijven\FicheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Bedrijven\FicheBundle\Entity\Repository\BedrijfRepository")
 * @ORM\Table(name="bedrijf")
 * @ORM\HasLifecycleCallbacks
 */
class Bedrijf
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
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $adress;

    /**
     * @ORM\Column(type="text")
     */
    protected $tags;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;
    
    /**
     * @ORM\OneToMany(targetEntity="Contactpersoon", mappedBy="bedrijf")
     */
    protected $contactpersonen;
    
    
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
     * Set name
     *
     * @param string $name
     * @return Bedrijf
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return Bedrijf
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Bedrijf
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Bedrijf
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
     * @return Bedrijf
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
    
    public function __construct()
    {
        $this->contactpersonen = new ArrayCollection();

        
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(new \DateTime());
    }

    /**
     * Add contactpersonen
     *
     * @param \Bedrijven\FicheBundle\Entity\Contactpersoon $contactpersonen
     * @return Bedrijf
     */
    public function addContactpersonen(\Bedrijven\FicheBundle\Entity\Contactpersoon $contactpersonen)
    {
        $this->contactpersonen[] = $contactpersonen;

        return $this;
    }

    /**
     * Remove contactpersonen
     *
     * @param \Bedrijven\FicheBundle\Entity\Contactpersoon $contactpersonen
     */
    public function removeContactpersonen(\Bedrijven\FicheBundle\Entity\Contactpersoon $contactpersonen)
    {
        $this->contactpersonen->removeElement($contactpersonen);
    }

    /**
     * Get contactpersonen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactpersonen()
    {
        return $this->contactpersonen;
    }
    
    public function __toString()
{
    return $this->getName();
}
}
