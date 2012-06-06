<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fapesc\TutorialBundle\Entity\Projeto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Projeto {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $contrato
     *
     * @ORM\Column(name="contrato", type="string", length=12, nullable="true")
     */
    private $contrato;

    /**
     * @var string $titulo
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string $chamada
     *
     * @ORM\Column(name="chamada", type="string", length=255, nullable="true")
     */
    private $chamada;

    /**
     * @var string $area
     *
     * @ORM\Column(name="area", type="string", length=255, nullable="true")
     */
    private $area;

    /**
     * @var string $municipio
     *
     * @ORM\Column(name="municipio", type="string", length=255, nullable="true")
     */
    private $municipio;

    /**
     * @var string $regiao
     *
     * @ORM\Column(name="regiao", type="string", length=255, nullable="true")
     */
    private $regiao;

    /**
     * @var string $sdr
     *
     * @ORM\Column(name="sdr", type="string", length=255, nullable="true")
     */
    private $sdr;

    /**
     * @var date $inicio
     *
     * @ORM\Column(name="inicio", type="date", nullable="true")
     */
    private $inicio;

    /**
     * @var date $termino
     *
     * @ORM\Column(name="termino", type="date", nullable="true")
     */
    private $termino;

    /**
     * @var float $orcamento
     *
     * @ORM\Column(name="orcamento", type="float", nullable="true")
     */
    private $orcamento;

    /**
     * @var string $banco
     *
     * @ORM\Column(name="banco", type="string", length=255)
     */
    private $banco;

    /**
     * @var string $conta
     *
     * @ORM\Column(name="conta", type="string", length=255)
     */
    private $conta;

    /**
     * @var string $agencia
     *
     * @ORM\Column(name="agencia", type="string", length=255)
     */
    private $agencia;

    /**
     * @var text $resumo
     *
     * @ORM\Column(name="resumo", type="text", nullable="true")
     */
    private $resumo;

    /**
     * @var boolean $ativo
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="projetos")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    protected $usuario;

    /**
     * @ORM\OneToMany(targetEntity="Meta", mappedBy="projeto")
     */
    protected $metas;

    /**
     * @ORM\OneToMany(targetEntity="Relatorio", mappedBy="projeto")
     */
    protected $relatorios;

    public function __construct() {
        $this->inicio = new \DateTime();
        $this->termino = new \DateTime();
        $this->ativo = true;
        $this->metas = new ArrayCollection();
        $this->relatorios = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return (int) $this->id;
    }

    /**
     * Set contrato
     *
     * @param string $contrato
     */
    public function setContrato($contrato) {
        $this->contrato = $contrato;
    }

    /**
     * Get contrato
     *
     * @return string
     */
    public function getContrato() {
        return $this->contrato;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Set chamada
     *
     * @param string $chamada
     */
    public function setChamada($chamada) {
        $this->chamada = $chamada;
    }

    /**
     * Get chamada
     *
     * @return string
     */
    public function getChamada() {
        return $this->chamada;
    }

    /**
     * Set area
     *
     * @param string $area
     */
    public function setArea($area) {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea() {
        return $this->area;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     */
    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    /**
     * Get municipio
     *
     * @return string
     */
    public function getMunicipio() {
        return $this->municipio;
    }

    /**
     * Set regiao
     *
     * @param string $regiao
     */
    public function setRegiao($regiao) {
        $this->regiao = $regiao;
    }

    /**
     * Get regiao
     *
     * @return string
     */
    public function getRegiao() {
        return $this->regiao;
    }

    /**
     * Set sdr
     *
     * @param string $sdr
     */
    public function setSdr($sdr) {
        $this->sdr = $sdr;
    }

    /**
     * Get sdr
     *
     * @return string
     */
    public function getSdr() {
        return $this->sdr;
    }

    /**
     * Set orcamento
     *
     * @param float $orcamento
     */
    public function setOrcamento($orcamento) {
        $this->orcamento = str_replace(array(".", ","), array("", "."), $orcamento);
    }

    /**
     * Get orcamento
     *
     * @return float
     */
    public function getOrcamento() {
        return number_format($this->orcamento, 2, ",", ".");
    }

    /**
     * Set banco
     *
     * @param string $banco
     */
    public function setBanco($banco) {
        $this->banco = $banco;
    }

    /**
     * Get banco
     *
     * @return string
     */
    public function getBanco() {
        return $this->banco;
    }

    /**
     * Set conta
     *
     * @param string $conta
     */
    public function setConta($conta) {
        $this->conta = $conta;
    }

    /**
     * Get conta
     *
     * @return string
     */
    public function getConta() {
        return $this->conta;
    }

    /**
     * Set agencia
     *
     * @param string $agencia
     */
    public function setAgencia($agencia) {
        $this->agencia = $agencia;
    }

    /**
     * Get agencia
     *
     * @return string
     */
    public function getAgencia() {
        return $this->agencia;
    }

    /**
     * Set resumo
     *
     * @param text $resumo
     */
    public function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    /**
     * Get resumo
     *
     * @return text
     */
    public function getResumo() {
        return $this->resumo;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    /**
     * Get ativo
     *
     * @return boolean
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * Set inicio
     *
     * @param date $inicio
     */
    public function setInicio($inicio) {
        list($d, $m, $a) = explode("/", $inicio);
        $this->inicio = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get inicio
     *
     * @return date
     */
    public function getInicio() {
        return $this->inicio;
    }

    /**
     * Set termino
     *
     * @param date $termino
     */
    public function setTermino($termino) {
        list($d, $m, $a) = explode("/", $termino);
        $this->termino = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get termino
     *
     * @return date
     */
    public function getTermino() {
        return $this->termino;
    }

    /**
     * Add relatorios
     *
     * @param Fapesc\TutorialBundle\Entity\Relatorio $relatorios
     */
    public function addRelatorio(\Fapesc\TutorialBundle\Entity\Relatorio $relatorios) {
        $this->relatorios[] = $relatorios;
    }

    /**
     * Get relatorios
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRelatorios() {
        return $this->relatorios;
    }

    /**
     * Add metas
     *
     * @param Fapesc\TutorialBundle\Entity\Meta $metas
     */
    public function addMeta(\Fapesc\TutorialBundle\Entity\Meta $metas) {
        $this->metas[] = $metas;
    }

    /**
     * Get metas
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getMetas() {
        return $this->metas;
    }

    /**
     * Set usuario
     *
     * @param Fapesc\TutorialBundle\Entity\Usuario $usuario
     */
    public function setUsuario(\Fapesc\TutorialBundle\Entity\Usuario $usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return Fapesc\TutorialBundle\Entity\Usuario
     */
    public function getUsuario() {
        return $this->usuario;
    }

    public function toArray() {
        return array(
            "idProjeto" => $this->getId(),
            "contrato" => $this->getContrato(),
            "titulo" => $this->getTitulo(),
            "chamada" => $this->getChamada(),
            "area" => $this->getArea(),
            "municipio" => $this->getMunicipio(),
            "regiao" => $this->getRegiao(),
            "sdr" => $this->getSdr(),
            "inicio" => $this->getInicio()->format("d/m/Y"),
            "termino" => $this->getTermino()->format("d/m/Y"),
            "orcamento" => $this->getOrcamento(),
            "banco" => $this->getBanco(),
            "conta" => $this->getConta(),
            "agencia" => $this->getAgencia(),
            "resumo" => $this->getResumo(),
        );
    }

    public function populate($data) {
        $this->setContrato($data["contrato"]);
        $this->setTitulo($data["titulo"]);
        $this->setChamada($data["chamada"]);
        $this->setArea($data["area"]);
        $this->setMunicipio($data["municipio"]);
        $this->setRegiao($data["regiao"]);
        $this->setSdr($data["sdr"]);
        $this->setInicio($data["inicio"]);
        $this->setTermino($data["termino"]);
        $this->setOrcamento($data["orcamento"]);
        $this->setBanco($data["banco"]);
        $this->setConta($data["conta"]);
        $this->setAgencia($data["agencia"]);
    }

}