<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Etageres
 *
 * @ORM\Table(name="etageres", indexes={@ORM\Index(name="id_armoire", columns={"id_armoire"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtageresRepository")
 */
class Etageres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Armoires
     *
     * @ORM\ManyToOne(targetEntity="Armoires")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_armoire", referencedColumnName="id")
     * })
     */
    private $idArmoire;

    public function __construct()
    {
//        $this->idArmoire = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Etageres
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set idArmoire
     *
     * @param \AppBundle\Entity\Armoires $idArmoire
     *
     * @return Etageres
     */
    public function setIdArmoire(\AppBundle\Entity\Armoires $idArmoire = null)
    {
        $this->idArmoire = $idArmoire;

        return $this;
    }

    /**
     * Get idArmoire
     *
     * @return \AppBundle\Entity\Armoires
     */
    public function getIdArmoire()
    {
        return $this->idArmoire;
    }
}
