<?php
namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AdminBundle\Entity\Repository\MasnagitutyunRepository")
 * @ORM\Table(name="masnagitutyun")
 */
class Masnagitutyun{
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
     * @ORM\ManyToOne(targetEntity="Ambion", inversedBy="masnagitutyun")
     * @ORM\JoinColumn(name="ambion_id", referencedColumnName="id")
     */
    protected $ambion;



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
     * @return Masnagitutyun
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
     * Set ambion
     *
     * @param \AdminBundle\Entity\Ambion $ambion
     *
     * @return Masnagitutyun
     */
    public function setAmbion(\AdminBundle\Entity\Ambion $ambion = null)
    {
        $this->ambion = $ambion;

        return $this;
    }

    /**
     * Get ambion
     *
     * @return \AdminBundle\Entity\Ambion
     */
    public function getAmbion()
    {
        return $this->ambion;
    }
}
