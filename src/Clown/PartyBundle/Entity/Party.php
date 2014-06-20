<?php

namespace Clown\PartyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Party
 */
class Party
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var timestamp
     */
    private $time;

    /**
     * @var string
     */
    private $location;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $clowns;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $events;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clowns = new \Doctrine\Common\Collections\ArrayCollection();
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set time
     *
     * @param $time
     * @return Party
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return      */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Party
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add clowns
     *
     * @param \Clown\PartyBundle\Entity\Clowns $clowns
     * @return Party
     */
    public function addClown(\Clown\PartyBundle\Entity\Clowns $clowns)
    {
        $this->clowns[] = $clowns;

        return $this;
    }

    /**
     * Remove clowns
     *
     * @param \Clown\PartyBundle\Entity\Clowns $clowns
     */
    public function removeClown(\Clown\PartyBundle\Entity\Clowns $clowns)
    {
        $this->clowns->removeElement($clowns);
    }

    /**
     * Get clowns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClowns()
    {
        return $this->clowns;
    }

    /**
     * Add events
     *
     * @param \Clown\PartyBundle\Entity\Event $events
     * @return Party
     */
    public function addEvent(\Clown\PartyBundle\Entity\Event $events)
    {
        $this->events[] = $events;

        return $this;
    }

    /**
     * Remove events
     *
     * @param \Clown\PartyBundle\Entity\Event $events
     */
    public function removeEvent(\Clown\PartyBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
