<?php

namespace Clown\ClownBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prop
 */
class Prop
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $quality;

    /**
     * @var \Clown\ClownBundle\Entity\PropType
     */
    private $propType;

    /**
     * @var \Clown\ClownBundle\Entity\Clown
     */
    private $owner;


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
     * Set quality
     *
     * @param integer $quality
     * @return Prop
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

private $MIN_EVIL_PROP_QUALITY = -10;

public function getMIN_EVIL_PROP_QUALITY() {
     return $this->MIN_EVIL_PROP_QUALITY;
}

public function setMIN_EVIL_PROP_QUALITY( $MIN_EVIL_PROP_QUALITY ) {
    $this->MIN_EVIL_PROP_QUALITY = $MIN_EVIL_PROP_QUALITY;
    return $this;
}

private $MIN_EXCEPTIONAL_PROP_QUALITY = 5;

public function getMIN_EXCEPTIONAL_PROP_QUALITY () {
     return $this->MIN_EXCEPTIONAL_PROP_QUALITY;
}

public function setMIN_EXCEPTIONAL_PROP_QUALITY ( $MIN_EXCEPTIONAL_PROP_QUALITY ) {
    $this->MIN_EXCEPTIONAL_PROP_QUALITY = $MIN_EXCEPTIONAL_PROP_QUALITY;
    return $this;
}

    /**
     * Get quality
     *
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     *
     *
     * @return integer
     */
    public function isExceptional()
    {
        return $this->quality>5;
    }

    /**
     *
     *
     * @return integer
     */
    public function isEvil()
    {
        return $this->quality<-10;
    }

    /**
     * Set propType
     *
     * @param \Clown\ClownBundle\Entity\PropType $propType
     * @return Prop
     */
    public function setPropType(\Clown\ClownBundle\Entity\PropType $propType = null)
    {
        $this->propType = $propType;

        return $this;
    }

    /**
     * Get propType
     *
     * @return \Clown\ClownBundle\Entity\PropType
     */
    public function getPropType()
    {
        return $this->propType;
    }

    /**
     * Set owner
     *
     * @param \Clown\ClownBundle\Entity\Clown $owner
     * @return Prop
     */
    public function setOwner(\Clown\ClownBundle\Entity\Clown $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Clown\ClownBundle\Entity\Clown
     */
    public function getOwner()
    {
        return $this->owner;
    }
    /**
     * @var \Clown\ClownBundle\Entity\Clown
     */
    private $clown;


    /**
     * Set clown
     *
     * @param \Clown\ClownBundle\Entity\Clown $clown
     * @return Prop
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
