<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Contrapartida
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contrapartida
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $categoria
     * 
     * @ORM\Column(name="categoria", type="integer")
     */
    private $categoria;

    /**
     * @var integer $item
     *
     * @ORM\Column(name="item", type="integer")
     */
    private $item;

    /**
     * @ORM\ManyToOne(targetEntity="Relatorio", inversedBy="empenhos")
     * @ORM\JoinColumn(name="relatorio", referencedColumnName="id")
     */
    protected $relatorio;

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
     * Set dispendio
     *
     * @param integer $dispendio
     */
    public function setDispendio($dispendio)
    {
        $this->dispendio = $dispendio;
    }

    /**
     * Get dispendio
     *
     * @return integer 
     */
    public function getDispendio()
    {
        return $this->dispendio;
    }

    /**
     * Set relatorio
     *
     * @param Fapesc\TutorialBundle\Entity\Relatorio $relatorio
     */
    public function setRelatorio(\Fapesc\TutorialBundle\Entity\Relatorio $relatorio)
    {
        $this->relatorio = $relatorio;
    }

    /**
     * Get relatorio
     *
     * @return Fapesc\TutorialBundle\Entity\Relatorio 
     */
    public function getRelatorio()
    {
        return $this->relatorio;
    }

    /**
     * Set categoria
     *
     * @param integer $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * Get categoria
     *
     * @return integer 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Get categorias
     *
     * @return array 
     */
    public function getCategorias() {
        return array(
            "1" => "dispendio",
            "2" => "bolsa",
            "3" => "passagem",
            "4" => "diaria",
            "5" => "salario",
        );
    }

    /**
     * Set item
     *
     * @param integer $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * Get item
     *
     * @return integer 
     */
    public function getItem()
    {
        return $this->item;
    }
}