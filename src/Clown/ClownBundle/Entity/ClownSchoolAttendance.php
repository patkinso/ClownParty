<?php

namespace Clown\ClownBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClownSchoolAttendance
 */
class ClownSchoolAttendance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $years;

    /**
     * @var \Clown\ClownBundle\Entity\ClownSchool
     */
    private $school;

    /**
     * @var \Clown\ClownBundle\Entity\Clown
     */
    private $clown;


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
     * Set years
     *
     * @param integer $years
     * @return ClownSchoolAttendance
     */
    public function setYears($years)
    {
        $this->years = $years;

        return $this;
    }

    /**
     * Get years
     *
     * @return integer 
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * Set school
     *
     * @param \Clown\ClownBundle\Entity\ClownSchool $school
     * @return ClownSchoolAttendance
     */
    public function setSchool(\Clown\ClownBundle\Entity\ClownSchool $school = null)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return \Clown\ClownBundle\Entity\ClownSchool 
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set clown
     *
     * @param \Clown\ClownBundle\Entity\Clown $clown
     * @return ClownSchoolAttendance
     */
    public function setClown(\Clown\ClownBundle\Entity\Clown $clown = null)
    {
        $this->clown = $clown;

        return $this;
    }

    /**
     * Get clown
     *
     * @return \Clown\ClownBundle\Entity\Clown 
     */
    public function getClown()
    {
        return $this->clown;
    }
}
