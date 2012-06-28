<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Passagem
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Passagem {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $beneficiario
     *
     * @ORM\Column(name="beneficiario", type="string", length=255)
     */
    private $beneficiario;

    /**
     * @var string $cpf
     *
     * @ORM\Column(name="cpf", type="string", length=14)
     */
    private $cpf;

    /**
     * @var integer $tipo
     * 1: aerea; 2: rodoviaria;
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity="Fornecedor", inversedBy="dispendio")
     * @ORM\JoinColumn(name="fornecedor", referencedColumnName="id")
     */
    protected $fornecedor;

    /**
     * @var string $origem
     *
     * @ORM\Column(name="origem", type="string", length=255)
     */
    private $origem;

    /**
     * @var datetime $saida
     *
     * @ORM\Column(name="saida", type="datetime")
     */
    private $saida;

    /**
     * @var string $destino
     *
     * @ORM\Column(name="destino", type="string", length=255)
     */
    private $destino;

    /**
     * @var datetime $chegada
     *
     * @ORM\Column(name="chegada", type="datetime")
     */
    private $chegada;

    /**
     * @var string $tiquete
     *
     * @ORM\Column(name="tiquete", type="string", length=255)
     */
    private $tiquete;

    /**
     * @var date $compra
     *
     * @ORM\Column(name="compra", type="date")
     */
    private $compra;

    /**
     * @var float $valor
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;

    /**
     * @var string $objetivo
     *
     * @ORM\Column(name="objetivo", type="string", length=255)
     */
    private $objetivo;

    /**
     * @var string $resultado
     *
     * @ORM\Column(name="resultado", type="string", length=255)
     */
    private $resultado;

    public function __construct() {
        $this->fornecedor = new Fornecedor();
        $this->saida = new \DateTime;
        $this->chegada = new \DateTime;
        $this->compra = new \DateTime;
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
     * Set tipo
     *
     * @param string $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = (int) $tipo;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo() {
        return $this->tipo;
    }

    public function getTipos() {
        return array(
            "1" => "Aérea",
            "2" => "Rodoviária",
        );
    }

    public function getTipoSelect() {
        foreach ($this->getTipos() as $key => $value)
            $tipos[] = array("value" => $key, "text" => $value);
        return $tipos;
    }

    /**
     * Set origem
     *
     * @param string $origem
     */
    public function setOrigem($origem) {
        $this->origem = $origem;
    }

    /**
     * Get origem
     *
     * @return string
     */
    public function getOrigem() {
        return $this->origem;
    }

    /**
     * Set saida
     *
     * @param datetime $saida
     */
    public function setSaida($saida) {
        list($d, $h) = explode(" ", $saida);
        list($d, $m, $a) = explode("/", $d);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        list($h, $n) = explode(":", $h);
        $h = ((int) $h > 24) ? 24 : (int) $h;
        $n = ((int) $n > 59) ? 59 : (int) $n;
        $this->saida = new \DateTime("{$a}-{$m}-{$d} {$h}:{$n}:00");
    }

    /**
     * Get saida
     *
     * @return datetime
     */
    public function getSaida($format = "d/m/Y H:i") {
        return $format ? $this->saida->format($format) : $this->saida;
    }

    /**
     * Set destino
     *
     * @param string $destino
     */
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    /**
     * Get destino
     *
     * @return string
     */
    public function getDestino() {
        return $this->destino;
    }

    /**
     * Set chegada
     *
     * @param datetime $chegada
     */
    public function setChegada($chegada) {
        list($d, $h) = explode(" ", $chegada);
        list($d, $m, $a) = explode("/", $d);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        list($h, $n) = explode(":", $h);
        $h = ((int) $h > 24) ? 24 : (int) $h;
        $n = ((int) $n > 59) ? 59 : (int) $n;
        $this->chegada = new \DateTime("{$a}-{$m}-{$d} {$h}:{$n}:00");
    }

    /**
     * Get chegada
     *
     * @return datetime
     */
    public function getChegada($format = "d/m/Y H:i") {
        return $format ? $this->chegada->format($format) : $this->chegada;
    }

    /**
     * Set tiquete
     *
     * @param string $tiquete
     */
    public function setTiquete($tiquete) {
        $this->tiquete = $tiquete;
    }

    /**
     * Get tiquete
     *
     * @return string
     */
    public function getTiquete() {
        return $this->tiquete;
    }

    /**
     * Set compra
     *
     * @param date $compra
     */
    public function setCompra($compra) {
        list($d, $m, $a) = explode("/", $compra);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->compra = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get compra
     *
     * @return date 
     */
    public function getCompra($format = "d/m/Y") {
        return $format ? $this->compra->format($format) : $this->compra;
    }

    /**
     * Set valor
     *
     * @param float $valor
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
     * Set objetivo
     *
     * @param string $objetivo
     */
    public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo() {
        return $this->objetivo;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     */
    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    /**
     * Get resultado
     *
     * @return string
     */
    public function getResultado() {
        return $this->resultado;
    }

    /**
     * Set fornecedor
     *
     * @param Fapesc\TutorialBundle\Entity\Fornecedor $fornecedor
     */
    public function setFornecedor(\Fapesc\TutorialBundle\Entity\Fornecedor $fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    /**
     * Get fornecedor
     *
     * @return Fapesc\TutorialBundle\Entity\Fornecedor 
     */
    public function getFornecedor() {
        return $this->fornecedor;
    }

    public function toArray() {
        return array(
            "id" => $this->getId(),
            "beneficiario" => $this->getBeneficiario(),
            "cpf" => $this->getCpf(),
            "tipo" => $this->getTipo(),
            "tipos" => $this->getTipos(),
            "tipoSelect" => $this->getTipoSelect(),
            "fornecedor" => $this->getFornecedor()->toArray(),
            "origem" => $this->getOrigem(),
            "saida" => $this->getSaida(),
            "destino" => $this->getDestino(),
            "chegada" => $this->getChegada(),
            "tiquete" => $this->getTiquete(),
            "compra" => $this->getCompra(),
            "valor" => $this->getValor(),
            "objetivo" => $this->getObjetivo(),
            "resultado" => $this->getResultado(),
            "descricao" => $this->origem . " - " . $this->destino,
            "quantidade" => 1,
            "unitario" => $this->getValor(),
            "total" => $this->getValor(),
        );
    }

    public function populate($data) {
        $this->setBeneficiario($data["beneficiario"]);
        $this->setCpf($data["cpf"]);
        $this->setTipo($data["tipo"]);
        $this->setOrigem($data["origem"]);
        $this->setSaida($data["saida"]);
        $this->setDestino($data["destino"]);
        $this->setChegada($data["chegada"]);
        $this->setTiquete($data["tiquete"]);
        $this->setCompra($data["compra"]);
        $this->setValor($data["valor"]);
        $this->setObjetivo($data["objetivo"]);
        $this->setResultado($data["resultado"]);
    }


    /**
     * Set beneficiario
     *
     * @param string $beneficiario
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;
    }

    /**
     * Get beneficiario
     *
     * @return string 
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }
}