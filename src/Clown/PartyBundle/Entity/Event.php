<?php

namespace Clown\PartyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 */
class Event
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $longName;

    public function __toString()
    {
        return $this->longName;
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
     * Set shortName
     *
     * @param string $shortName
     * @return Event
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set longName
     *
     * @param string $longName
     * @return Event
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;

        return $this;
    }

    /**
     * Get longName
     *
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }
}
