<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="events")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiresAt", type="date")
     */
    private $expiresAt;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Registration", mappedBy="event")
     */
    private $registations;


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
     * @return Event
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     * @return Event
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->startDate = $this->endDate = $this->expiresAt = new \Datetime();
        $this->registations = new ArrayCollection();
        $this->startDate = $this->endDate = new \Datetime();
    }

    /**
     * Add registations
     *
     * @param Registration $registations
     * @return Event
     */
    public function addRegistation(Registration $registations)
    {
        $this->registations[] = $registations;

        return $this;
    }

    /**
     * Remove registations
     *
     * @param Registration $registations
     */
    public function removeRegistation(Registration $registations)
    {
        $this->registations->removeElement($registations);
    }

    /**
     * Get registations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistations()
    {
        return $this->registations;
    }
}
