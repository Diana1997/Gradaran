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
     *@ORM\OneToMany(targetEntity="Book", mappedBy="ambion")
     */
    protected $book;

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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->book = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add book
     *
     * @param \AdminBundle\Entity\Book $book
     *
     * @return Masnagitutyun
     */
    public function addBook(\AdminBundle\Entity\Book $book)
    {
        $this->book[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \AdminBundle\Entity\Book $book
     */
    public function removeBook(\AdminBundle\Entity\Book $book)
    {
        $this->book->removeElement($book);
    }

    /**
     * Get book
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBook()
    {
        return $this->book;
    }
}
