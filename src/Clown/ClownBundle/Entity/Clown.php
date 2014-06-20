<?php

namespace Clown\ClownBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clown
 */
class Clown
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $noseSqueakFrequency;

    /**
     * @var integer
     */
    private $laughsGenerated;

    /**
     * @var integer
     */
    private $childrenEaten;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ownedProp;

    /**
     * @var \Clown\ClownBundle\Entity\ClownType
     */
    private $clownType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ownedProp = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Clown
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
     * Set description
     *
     * @param string $description
     * @return Clown
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set noseSqueakFrequency
     *
     * @param integer $noseSqueakFrequency
     * @return Clown
     */
    public function setNoseSqueakFrequency($noseSqueakFrequency)
    {
        $this->noseSqueakFrequency = $noseSqueakFrequency;

        return $this;
    }

    /**
     * Get noseSqueakFrequency
     *
     * @return integer
     */
    public function getNoseSqueakFrequency()
    {
        return $this->noseSqueakFrequency;
    }

    /**
     * Set laughsGenerated
     *
     * @param integer $laughsGenerated
     * @return Clown
     */
    public function setLaughsGenerated($laughsGenerated)
    {
        $this->laughsGenerated = $laughsGenerated;

        return $this;
    }

    /**
     * Get laughsGenerated
     *
     * @return integer
     */
    public function getLaughsGenerated()
    {
        return $this->laughsGenerated;
    }

    /**
     * Set childrenEaten
     *
     * @param integer $childrenEaten
     * @return Clown
     */
    public function setChildrenEaten($childrenEaten)
    {
        $this->childrenEaten = $childrenEaten;

        return $this;
    }

    /**
     * Get childrenEaten
     *
     * @return integer
     */
    public function getChildrenEaten()
    {
        return $this->childrenEaten;
    }

    /**
     * Add ownedProp
     *
     * @param \Clown\ClownBundle\Entity\Prop $ownedProp
     * @return Clown
     */
    public function addOwnedProp(\Clown\ClownBundle\Entity\Prop $ownedProp)
    {
        $this->ownedProp[] = $ownedProp;

        return $this;
    }

    /**
     * Remove ownedProp
     *
     * @param \Clown\ClownBundle\Entity\Prop $ownedProp
     */
    public function removeOwnedProp(\Clown\ClownBundle\Entity\Prop $ownedProp)
    {
        $this->ownedProp->removeElement($ownedProp);
    }

    /**
     * Get ownedProp
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOwnedProp()
    {
        return $this->ownedProp;
    }

    /**
     * Set clownType
     *
     * @param \Clown\ClownBundle\Entity\ClownType $clownType
     * @return Clown
     */
    public function setClownType(\Clown\ClownBundle\Entity\ClownType $clownType = null)
    {
        $this->clownType = $clownType;

        return $this;
    }

    /**
     * Get clownType
     *
     * @return \Clown\ClownBundle\Entity\ClownType
     */
    public function getClownType()
    {
        return $this->clownType;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $prop;


    /**
     * Add prop
     *
     * @param \Clown\ClownBundle\Entity\Prop $prop
     * @return Clown
     */
    public function addProp(\Clown\ClownBundle\Entity\Prop $prop)
    {
        $this->prop[] = $prop;

        return $this;
    }

    /**
     * Remove prop
     *
     * @param \Clown\ClownBundle\Entity\Prop $prop
     */
    public function removeProp(\Clown\ClownBundle\Entity\Prop $prop)
    {
        $this->prop->removeElement($prop);
    }

    /**
     * Get prop
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProp()
    {
        return $this->prop;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parties;


    /**
     * Add parties
     *
     * @param \Clown\ClownBundle\Entity\Party $parties
     * @return Clown
     */
    public function addParty($parties)
    {
        $this->parties[] = $parties;

        return $this;
    }

    /**
     * Remove parties
     *
     * @param \Clown\ClownBundle\Entity\Party $parties
     */
    public function removeParty($parties)
    {
        $this->parties->removeElement($parties);
    }

    /**
     * Get parties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties()
    {
        return $this->parties;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $clownSchool;


    /**
     * Add clownSchool
     *
     * @param \Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchool
     * @return Clown
     */
    public function addClownSchool(\Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchool)
    {
        $this->clownSchool[] = $clownSchool;

        return $this;
    }

    /**
     * Remove clownSchool
     *
     * @param \Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchool
     */
    public function removeClownSchool(\Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchool)
    {
        $this->clownSchool->removeElement($clownSchool);
    }

    /**
     * Get clownSchool
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClownSchool()
    {
        return $this->clownSchool;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $clownSchoolAttendance;


    /**
     * Add clownSchoolAttendance
     *
     * @param \Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchoolAttendance
     * @return Clown
     */
    public function addClownSchoolAttendance(\Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchoolAttendance)
    {
        $this->clownSchoolAttendance[] = $clownSchoolAttendance;

        return $this;
    }

    /**
     * Remove clownSchoolAttendance
     *
     * @param \Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchoolAttendance
     */
    public function removeClownSchoolAttendance(\Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchoolAttendance)
    {
        $this->clownSchoolAttendance->removeElement($clownSchoolAttendance);
    }

    /**
     * Get clownSchoolAttendance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClownSchoolAttendance()
    {
        return $this->clownSchoolAttendance;
    }
}
