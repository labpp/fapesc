<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Bolsa
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Bolsa {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text $descricao
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var date $inicio
     *
     * @ORM\Column(name="inicio", type="date")
     */
    private $inicio;

    /**
     * @var date $fim
     *
     * @ORM\Column(name="fim", type="date")
     */
    private $fim;

    /**
     * @var date $data
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;

    /**
     * @var float $valor
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;

    /**
     * @ORM\ManyToOne(targetEntity="Bolsista", inversedBy="bolsas")
     * @ORM\JoinColumn(name="bolsista", referencedColumnName="id")
     */
    protected $bolsista;

    public function __construct() {
        $this->inicio = new \DateTime();
        $this->fim = new \DateTime();
        $this->data = new \DateTime();
        $this->bolsista = new Bolsista();
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
     * Set descricao
     *
     * @param text $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * Get descricao
     *
     * @return text
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Set inicio
     *
     * @param string $inicio
     */
    public function setInicio($inicio) {
        list($d, $m, $a) = explode("/", $inicio);
        $this->inicio = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get inicio
     *
     * @return string
     */
    public function getInicio($puro = true) {
        return $puro ? $this->inicio : $this->inicio->format("d/m/Y");
    }

    /**
     * Set fim
     *
     * @param string $fim
     */
    public function setFim($fim) {
        list($d, $m, $a) = explode("/", $fim);
        $this->fim = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get fim
     *
     * @return string
     */
    public function getFim($puro = true) {
        return $puro ? $this->fim : $this->fim->format("d/m/Y");
    }

    /**
     * Set data
     *
     * @param string $data
     */
    public function setData($data) {
        list($d, $m, $a) = explode("/", $data);
        $this->data = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData($puro = true) {
        return $puro ? $this->data : $this->data->format("d/m/Y");
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     */
    public function setValor($valor) {
        $this->valor = str_replace(array(".", ","), array("", "."), $valor);
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor($puro = false) {
        return $puro ? $this->valor : number_format($this->valor, 2, ",", ".");
    }

    /**
     * Set bolsista
     *
     * @param Fapesc\TutorialBundle\Entity\Bolsista $bolsista
     */
    public function setBolsista(\Fapesc\TutorialBundle\Entity\Bolsista $bolsista) {
        $this->bolsista = $bolsista;
    }

    /**
     * Get bolsista
     *
     * @return Fapesc\TutorialBundle\Entity\Bolsista
     */
    public function getBolsista() {
        return $this->bolsista;
    }

    public function toArray() {
        return array(
            "id" => $this->getId(),
            "descricao" => $this->getDescricao(),
            "inicio" => $this->getInicio(false),
            "fim" => $this->getFim(false),
            "data" => $this->getData(false),
            "valor" => $this->getValor(),
            "bolsista" => $this->getBolsista()->toArray(),
        );
    }

    public function populate($data) {
        $this->setDescricao(empty($data["descricao"]) ? "Sem descrição" : $data["descricao"]);
        $this->setInicio($data["inicio"]);
        $this->setFim($data["fim"]);
        $this->setData($data["data"]);
        $this->setValor($data["valor"]);
    }

}