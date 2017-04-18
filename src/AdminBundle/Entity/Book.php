<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AdminBundle\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use AdminBundle\Traits\File;
use AdminBundle\Traits\Image;

/**
 * @ORM\Entity(repositoryClass="AdminBundle\Entity\Repository\BookRepository")
 * @ORM\Table(name="book")
 */
class Book
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $bookTitle;

    /**
     * @ORM\Column(type="string")
     */
    protected $author;

    /**
     * @ORM\Column(type="string")
     */
    protected $ararka;

    /**
     * @ORM\Column(type="string")
     */
    protected $kisamyak;

    /**
     * @ORM\ManyToOne(targetEntity="Masnagitutyun", inversedBy="masnagitutyun")
     * @ORM\JoinColumn(name="masnagitutyun_id", referencedColumnName="id")
     */
    protected $masnagitutyun;



    use File;
    use Image;







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
     * Set bookTitle
     *
     * @param string $bookTitle
     *
     * @return Book
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;

        return $this;
    }

    /**
     * Get bookTitle
     *
     * @return string
     */
    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set ararka
     *
     * @param string $ararka
     *
     * @return Book
     */
    public function setArarka($ararka)
    {
        $this->ararka = $ararka;

        return $this;
    }

    /**
     * Get ararka
     *
     * @return string
     */
    public function getArarka()
    {
        return $this->ararka;
    }

    /**
     * Set kisamyak
     *
     * @param string $kisamyak
     *
     * @return Book
     */
    public function setKisamyak($kisamyak)
    {
        $this->kisamyak = $kisamyak;

        return $this;
    }

    /**
     * Get kisamyak
     *
     * @return string
     */
    public function getKisamyak()
    {
        return $this->kisamyak;
    }

    /**
     * Set masnagitutyun
     *
     * @param \AdminBundle\Entity\Masnagitutyun $masnagitutyun
     *
     * @return Book
     */
    public function setMasnagitutyun(\AdminBundle\Entity\Masnagitutyun $masnagitutyun = null)
    {
        $this->masnagitutyun = $masnagitutyun;

        return $this;
    }

    /**
     * Get masnagitutyun
     *
     * @return \AdminBundle\Entity\Masnagitutyun
     */
    public function getMasnagitutyun()
    {
        return $this->masnagitutyun;
    }
}
