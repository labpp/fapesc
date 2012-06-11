<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Salario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Salario {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $carga
     *
     * @ORM\Column(name="carga", type="string", length=255)
     */
    private $carga;

    /**
     * @var date $data
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;

    /**
     * @var float $bruto
     *
     * @ORM\Column(name="bruto", type="float")
     */
    private $bruto;

    /**
     * @var float $proporcional
     *
     * @ORM\Column(name="proporcional", type="float")
     */
    private $proporcional;

    /**
     * @ORM\ManyToOne(targetEntity="Pesquisador", inversedBy="salarios")
     * @ORM\JoinColumn(name="pesquisador", referencedColumnName="id")
     */
    protected $pesquisador;

    public function __construct() {
        $this->data = new \DateTime();
        $this->pesquisador = new Pesquisador();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set carga
     *
     * @param string $carga
     */
    public function setCarga($carga)
    {
        $this->carga = $carga;
    }

    /**
     * Get carga
     *
     * @return string 
     */
    public function getCarga()
    {
        return $this->carga;
    }

    /**
     * Set data
     *
     * @param string $data
     */
    public function setData($data) {
        list($m, $a) = explode("/", $data);
        $this->data = new \DateTime("{$a}-{$m}-01");
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData($format = "m/Y") {
        return $format ? $this->data->format($format) : $this->data;
    }

    /**
     * Set bruto
     *
     * @param float $bruto
     *
     */
    public function setBruto($bruto) {
        $this->bruto = str_replace(array(".", ","), array("", "."), $bruto);
    }

    /**
     * Get bruto
     *
     * @return float
     */
    public function getBruto($puro = false) {
        return $puro ? $this->bruto : number_format($this->bruto, 2, ",", ".");
    }

    /**
     * Set proporcional
     *
     * @param float $proporcional
     *
     */
    public function setProporcional($proporcional) {
        $this->proporcional = str_replace(array(".", ","), array("", "."), $proporcional);
    }

    /**
     * Get proporcional
     *
     * @return float
     */
    public function getProporcional($puro = false) {
        return $puro ? $this->proporcional : number_format($this->proporcional, 2, ",", ".");
    }

    /**
     * Set pesquisador
     *
     * @param Fapesc\TutorialBundle\Entity\Pesquisador $pesquisador
     */
    public function setPesquisador(\Fapesc\TutorialBundle\Entity\Pesquisador $pesquisador)
    {
        $this->pesquisador = $pesquisador;
    }

    /**
     * Get pesquisador
     *
     * @return Fapesc\TutorialBundle\Entity\Pesquisador 
     */
    public function getPesquisador()
    {
        return $this->pesquisador;
    }

    public function toArray() {
        return array(
            "id" => $this->getId(),
            "carga" => $this->getCarga(),
            "data" => $this->getData(),
            "bruto" => $this->getBruto(),
            "proporcional" => $this->getProporcional(),
            "pesquisador" => $this->getPesquisador()->toArray(),
        );
    }

    public function populate($data) {
        $this->setCarga($data["carga"]);
        $this->setData($data["data"]);
        $this->setBruto($data["bruto"]);
        $this->setProporcional($data["proporcional"]);
    }
}