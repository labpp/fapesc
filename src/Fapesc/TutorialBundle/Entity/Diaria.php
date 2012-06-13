<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Diaria
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Diaria {

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
     * @var string $instituicao
     *
     * @ORM\Column(name="instituicao", type="string", length=255)
     */
    private $instituicao;

    /**
     * @var integer $tipo
     * 1: superior; 2: tecnico;
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var text $objetivos
     *
     * @ORM\Column(name="objetivos", type="text")
     */
    private $objetivos;

    /**
     * @var integer $destino
     * 1: sc; 2: outros; 3: exterior;
     * @ORM\Column(name="destino", type="integer")
     */
    private $destino;

    /**
     * @var text $roteiro
     *
     * @ORM\Column(name="roteiro", type="text")
     */
    private $roteiro;

    /**
     * @var text $resultados
     *
     * @ORM\Column(name="resultados", type="text")
     */
    private $resultados;

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
     * @var integer $quantidade
     *
     * @ORM\Column(name="quantidade", type="integer")
     */
    private $quantidade;

    /**
     * @var float $valor
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;

    /**
     * @var integer $documentos
     *
     * @ORM\Column(name="documentos", type="integer")
     */
    private $documentos;

    public function __construct() {
        $this->inicio = new \DateTime();
        $this->fim = new \DateTime();
        $this->quantidade = 1;
        $this->valor = 110;
        $this->documentos = 1;
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
     * Set inicio
     *
     * @param string $inicio
     */
    public function setInicio($inicio) {
        list($d, $m, $a) = explode("/", $inicio);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->inicio = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get inicio
     *
     * @return string
     */
    public function getInicio($format = "d/m/Y") {
        return $format ? $this->inicio->format($format) : $this->inicio;
    }

    /**
     * Set fim
     *
     * @param string $fim
     */
    public function setFim($fim) {
        list($d, $m, $a) = explode("/", $fim);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->fim = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get fim
     *
     * @return string
     */
    public function getFim($format = "d/m/Y") {
        return $format ? $this->fim->format($format) : $this->fim;
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
     * Set beneficiario
     *
     * @param string $beneficiario
     */
    public function setBeneficiario($beneficiario) {
        $this->beneficiario = $beneficiario;
    }

    /**
     * Get beneficiario
     *
     * @return string 
     */
    public function getBeneficiario() {
        return $this->beneficiario;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * Set instituicao
     *
     * @param string $instituicao
     */
    public function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }

    /**
     * Get instituicao
     *
     * @return string 
     */
    public function getInstituicao() {
        return $this->instituicao;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
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
            "1" => "Pessoal de Nível Superior",
            "2" => "Auxiliar Técnico",
        );
    }

    public function getTipoSelect() {
        foreach ($this->getTipos() as $k => $v)
            $tipos[] = array("value" => $k, "text" => $v);
        return $tipos;
    }

    /**
     * Set objetivos
     *
     * @param text $objetivos
     */
    public function setObjetivos($objetivos) {
        $this->objetivos = $objetivos;
    }

    /**
     * Get objetivos
     *
     * @return text 
     */
    public function getObjetivos() {
        return $this->objetivos;
    }

    /**
     * Set destino
     *
     * @param integer $destino
     */
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    /**
     * Get destino
     *
     * @return integer 
     */
    public function getDestino() {
        return $this->destino;
    }

    public function getDestinos() {
        return array(
            "1" => "No Estado",
            "2" => "Fora do Estado",
            "3" => "Exterior",
        );
    }

    public function getDestinoSelect() {
        foreach ($this->getDestinos() as $k => $v)
            $tipos[] = array("value" => $k, "text" => $v);
        return $tipos;
    }

    /**
     * Set roteiro
     *
     * @param text $roteiro
     */
    public function setRoteiro($roteiro) {
        $this->roteiro = $roteiro;
    }

    /**
     * Get roteiro
     *
     * @return text 
     */
    public function getRoteiro() {
        return $this->roteiro;
    }

    /**
     * Set resultados
     *
     * @param text $resultados
     */
    public function setResultados($resultados) {
        $this->resultados = $resultados;
    }

    /**
     * Get resultados
     *
     * @return text 
     */
    public function getResultados() {
        return $this->resultados;
    }

    /**
     * Set quantidade
     *
     * @param integer $quantidade
     */
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade() {
        return $this->quantidade;
    }

    /**
     * Set documentos
     *
     * @param integer $documentos
     */
    public function setDocumentos($documentos) {
        $this->documentos = $documentos;
    }

    /**
     * Get documentos
     *
     * @return integer 
     */
    public function getDocumentos() {
        return $this->documentos;
    }

    public function toArray() {
        return array(
            "id" => $this->getId(),
            "beneficiario" => $this->getBeneficiario(),
            "cpf" => $this->getCpf(),
            "instituicao" => $this->getInstituicao(),
            "tipo" => $this->getTipo(),
            "tipos" => $this->getTipos(),
            "tipoSelect" => $this->getTipoSelect(),
            "objetivos" => $this->getObjetivos(),
            "destino" => $this->getDestino(),
            "destinos" => $this->getDestinos(),
            "destinoSelect" => $this->getDestinoSelect(),
            "roteiro" => $this->getRoteiro(),
            "resultados" => $this->getResultados(),
            "inicio" => $this->getInicio("d/m/Y"),
            "fim" => $this->getFim("d/m/Y"),
            "quantidade" => $this->getQuantidade(),
            "valor" => $this->getValor(),
            "documentos" => $this->getDocumentos(),
        );
    }

    public function populate($data) {
        $this->setBeneficiario($data["beneficiario"]);
        $this->setCpf($data["cpf"]);
        $this->setInstituicao($data["instituicao"]);
        $this->setTipo($data["tipo"]);
        $this->setObjetivos($data["objetivos"]);
        $this->setDestino($data["destino"]);
        $this->setRoteiro($data["roteiro"]);
        $this->setResultados($data["resultados"]);
        $this->setInicio($data["inicio"]);
        $this->setFim($data["fim"]);
        $this->setQuantidade($data["quantidade"]);
        $this->setValor($data["valor"]);
        $this->setDocumentos($data["documentos"]);
    }

}