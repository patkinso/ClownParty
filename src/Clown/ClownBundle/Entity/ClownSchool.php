<?php

namespace Clown\ClownBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClownSchool
 */
class ClownSchool
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $clownSchoolAttendance;

    /**
     * Constructor
     */

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->clownSchoolAttendance = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return ClownSchool
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
     * @return ClownSchool
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
     * Add clownSchoolAttendance
     *
     * @param \Clown\ClownBundle\Entity\ClownSchoolAttendance $clownSchoolAttendance
     * @return ClownSchool
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
