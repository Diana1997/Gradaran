<?php
namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ambion")
 */

class Ambion{

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
     * @ORM\ManyToOne(targetEntity="Fakultet", inversedBy="ambion")
     * @ORM\JoinColumn(name="fakultet_id", referencedColumnName="id")
     */
    protected $fakultet;

    /**
     *@ORM\OneToMany(targetEntity="Masnagitutyun", mappedBy="ambion")
     */
    protected $masnagitutyun;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->masnagitutyun = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Ambion
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
     * Set fakultet
     *
     * @param \AdminBundle\Entity\Fakultet $fakultet
     *
     * @return Ambion
     */
    public function setFakultet(\AdminBundle\Entity\Fakultet $fakultet = null)
    {
        $this->fakultet = $fakultet;

        return $this;
    }

    /**
     * Get fakultet
     *
     * @return \AdminBundle\Entity\Fakultet
     */
    public function getFakultet()
    {
        return $this->fakultet;
    }

    /**
     * Add masnagitutyun
     *
     * @param \AdminBundle\Entity\Masnagitutyun $masnagitutyun
     *
     * @return Ambion
     */
    public function addMasnagitutyun(\AdminBundle\Entity\Masnagitutyun $masnagitutyun)
    {
        $this->masnagitutyun[] = $masnagitutyun;

        return $this;
    }

    /**
     * Remove masnagitutyun
     *
     * @param \AdminBundle\Entity\Masnagitutyun $masnagitutyun
     */
    public function removeMasnagitutyun(\AdminBundle\Entity\Masnagitutyun $masnagitutyun)
    {
        $this->masnagitutyun->removeElement($masnagitutyun);
    }

    /**
     * Get masnagitutyun
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMasnagitutyun()
    {
        return $this->masnagitutyun;
    }
}
