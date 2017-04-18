<?php
namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="fakultet")
 */
class Fakultet{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     *@ORM\OneToMany(targetEntity="Ambion", mappedBy="fakultet")
     */
    protected $ambion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ambion = new \Doctrine\Common\Collections\ArrayCollection();
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
     *
     * @return Fakultet
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
     * Add ambion
     *
     * @param \AdminBundle\Entity\Ambion $ambion
     *
     * @return Fakultet
     */
    public function addAmbion(\AdminBundle\Entity\Ambion $ambion)
    {
        $this->ambion[] = $ambion;

        return $this;
    }

    /**
     * Remove ambion
     *
     * @param \AdminBundle\Entity\Ambion $ambion
     */
    public function removeAmbion(\AdminBundle\Entity\Ambion $ambion)
    {
        $this->ambion->removeElement($ambion);
    }

    /**
     * Get ambion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmbion()
    {
        return $this->ambion;
    }
}
