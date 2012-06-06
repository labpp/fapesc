<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Cheque
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cheque {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $numero
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var date $emissao
     *
     * @ORM\Column(name="emissao", type="date")
     */
    private $emissao;

    /**
     * @var date $compensacao
     *
     * @ORM\Column(name="compensacao", type="date")
     */
    private $compensacao;

    /**
     * @var float $valor
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;

    /**
     * @ORM\ManyToOne(targetEntity="Conciliacao", inversedBy="cheques")
     * @ORM\JoinColumn(name="conciliacao", referencedColumnName="id")
     */
    protected $conciliacao;

    public function __construct() {
        $this->emissao = new \DateTime();
        $this->compensacao = new \DateTime();
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
     * Set numero
     *
     * @param integer $numero
     */
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * Set emissao
     *
     * @param string $emissao
     */
    public function setEmissao($emissao) {
        list($d, $m, $a) = explode("/", $emissao);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->emissao = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get emissao
     *
     * @return string
     */
    public function getEmissao($format = "d/m/Y") {
        return $format ? $this->emissao->format($format) : $this->emissao;
    }

    /**
     * Set compensacao
     *
     * @param string $compensacao
     */
    public function setCompensacao($compensacao) {
        list($d, $m, $a) = explode("/", $compensacao);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->compensacao = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get compensacao
     *
     * @return string
     */
    public function getCompensacao($format = "d/m/Y") {
        return $format ? $this->compensacao->format($format) : $this->compensacao;
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
     * Set conciliacao
     *
     * @param integer $conciliacao
     */
    public function setConciliacao($conciliacao) {
        $this->conciliacao = $conciliacao;
    }

    /**
     * Get conciliacao
     *
     * @return integer
     */
    public function getConciliacao() {
        return $this->conciliacao;
    }

    public function toArray() {
        return array(
            "idCheque" => $this->getId(),
            "numero" => $this->getNumero(),
            "emissao" => $this->getEmissao(),
            "compensacao" => $this->getCompensacao(),
            "valor" => $this->getValor(),
        );
    }

    public function populate($data) {
        $this->setNumero($data["numero"]);
        $this->setEmissao($data["emissao"]);
        $this->setCompensacao($data["compensacao"]);
        $this->setValor($data["valor"]);
    }

}