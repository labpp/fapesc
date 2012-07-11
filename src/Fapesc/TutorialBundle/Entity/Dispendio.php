<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Dispendio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dispendio {

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
     * @var string $descricao
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @var string $unidade
     *
     * @ORM\Column(name="unidade", type="string", length=20)
     */
    private $unidade;

    /**
     * @var float $quantidade
     *
     * @ORM\Column(name="quantidade", type="float")
     */
    private $quantidade;

    /**
     * @var float $unitario
     *
     * @ORM\Column(name="unitario", type="float")
     */
    private $unitario;

    /**
     * @var float $total
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @var string $documento
     *
     * @ORM\Column(name="documento", type="string", length=255)
     */
    private $documento;

    /**
     * @var string $serie
     *
     * @ORM\Column(name="serie", type="string", length=255, nullable=true)
     */
    private $serie;

    /**
     * @var string $subserie
     *
     * @ORM\Column(name="subserie", type="string", length=255, nullable=true)
     */
    private $subserie;

    /**
     * @var date $data
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;

    /**
     * @var string $comprovante
     *
     * @ORM\Column(name="comprovante", type="string", length=255)
     */
    private $comprovante;

    /**
     * @ORM\ManyToOne(targetEntity="Fornecedor", inversedBy="dispendio")
     * @ORM\JoinColumn(name="fornecedor", referencedColumnName="id")
     */
    protected $fornecedor;

    public function __construct() {
        $this->data = new \DateTime();
        $this->fornecedor = new Fornecedor();
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
     * Set categoria
     *
     * @param integer $categoria
     */
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    /**
     * Get categoria
     *
     * @return integer 
     */
    public function getCategoria() {
        return $this->categoria;
    }

    /**
     * Get categorias
     *
     * @return array 
     */
    public function getCategorias() {
        return array(
            "bibliografia",
            "equipamento",
            "mobiliario",
            "pessoaFisica",
            "pessoaJuridica",
            "material",
        );
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Set unidade
     *
     * @param string $unidade
     */
    public function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    /**
     * Get unidade
     *
     * @return string
     */
    public function getUnidade() {
        return $this->unidade;
    }

    /**
     * Set quantidade
     *
     * @param float $quantidade
     */
    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    /**
     * Get quantidade
     *
     * @return float
     */
    public function getQuantidade() {
        return $this->quantidade;
    }

    /**
     * Set unitario
     *
     * @param float $unitario
     */
    public function setUnitario($unitario) {
        $this->unitario = str_replace(array(".", ","), array("", "."), $unitario);
    }

    /**
     * Get unitario
     *
     * @return float
     */
    public function getUnitario($puro = false) {
        return $puro ? $this->unitario : number_format($this->unitario, 2, ",", ".");
    }

    /**
     * Set total
     *
     * @param float $total
     */
    public function setTotal($total) {
        $this->total = str_replace(array(".", ","), array("", "."), $total);
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal($puro = false) {
        return $puro ? $this->total : number_format($this->total, 2, ",", ".");
    }

    /**
     * Set documento
     *
     * @param string $documento
     */
    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento() {
        return $this->documento;
    }

    /**
     * Set data
     *
     * @param date $data
     */
    public function setData($data) {
        list($d, $m, $a) = explode("/", $data);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->data = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get data
     *
     * @return date 
     */
    public function getData($format = "d/m/Y") {
        return $format ? $this->data->format($format) : $this->data;
    }

    /**
     * Set comprovante
     *
     * @param string $comprovante
     */
    public function setComprovante($comprovante) {
        $this->comprovante = $comprovante;
    }

    /**
     * Get comprovante
     *
     * @return string
     */
    public function getComprovante() {
        return $this->comprovante;
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
            "fornecedor" => $this->getFornecedor()->toArray(),
            "descricao" => $this->getDescricao(),
            "unidade" => $this->getUnidade(),
            "quantidade" => $this->getQuantidade(),
            "unitario" => $this->getUnitario(),
            "total" => $this->getTotal(),
            "documento" => $this->getDocumento(),
            "serie" => $this->getSerie(),
            "subserie" => $this->getSubserie(),
            "data" => $this->getData(),
            "comprovante" => $this->getComprovante(),
        );
    }

    public function populate($data) {
        $this->setDescricao($data["descricao"]);
        $this->setUnidade($data["unidade"]);
        $this->setQuantidade($data["quantidade"]);
        $this->setUnitario($data["unitario"]);
        $this->setTotal($data["total"]);
        $this->setDocumento($data["documento"]);
        $this->setSerie($data["serie"]);
        $this->setSubserie($data["subserie"]);
        $this->setData($data["data"]);
        $this->setComprovante($data["comprovante"]);
    }


    /**
     * Set serie
     *
     * @param string $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * Get serie
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set subserie
     *
     * @param string $subserie
     */
    public function setSubserie($subserie)
    {
        $this->subserie = $subserie;
    }

    /**
     * Get subserie
     *
     * @return string 
     */
    public function getSubserie()
    {
        return $this->subserie;
    }
}