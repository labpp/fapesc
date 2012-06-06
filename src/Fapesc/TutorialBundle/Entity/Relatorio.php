<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fapesc\TutorialBundle\Entity\Relatorio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Relatorio {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nota
     *
     * @ORM\Column(name="nota", type="string", length=255)
     */
    private $nota;

    /**
     * @var date $liberacao
     *
     * @ORM\Column(name="liberacao", type="date")
     */
    private $liberacao;

    /**
     * @var date $vigencia
     *
     * @ORM\Column(name="vigencia", type="date")
     */
    private $vigencia;

    /**
     * @var integer $rubrica
     * 1: capital; 2: custeio
     * @ORM\Column(name="rubrica", type="integer")
     */
    private $rubrica;

    /**
     * @var float $valor
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;

    /**
     * @var integer $tipo
     * 1: parcial; 2: final
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var text $resultado
     *
     * @ORM\Column(name="resultado", type="text", nullable="true")
     */
    private $resultado;

    /**
     * @var text $justificativa
     *
     * @ORM\Column(name="justificativa", type="text", nullable="true")
     */
    private $justificativa;

    /**
     * @var text $dificuldade
     *
     * @ORM\Column(name="dificuldade", type="text", nullable="true")
     */
    private $dificuldade;

    /**
     * @var text $alteracao
     *
     * @ORM\Column(name="alteracao", type="text", nullable="true")
     */
    private $alteracao;

    /**
     * @var boolean $ativo
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;

    /**
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="relatorios")
     * @ORM\JoinColumn(name="projeto", referencedColumnName="id")
     */
    private $projeto;

    /**
     * @ORM\OneToMany(targetEntity="Resultado", mappedBy="relatorio")
     */
    protected $resultados;

    /**
     * @ORM\OneToMany(targetEntity="Empenho", mappedBy="relatorio")
     */
    protected $empenhos;

    /**
     * @ORM\OneToMany(targetEntity="Contrapartida", mappedBy="relatorio")
     */
    protected $contrapartidas;

    /**
     * @ORM\OneToOne(targetEntity="Conciliacao", inversedBy="relatorio")
     * @ORM\JoinColumn(name="conciliacao", referencedColumnName="id")
     */
    protected $conciliacao;

    public function __construct() {
        $this->projeto = new Projeto();
        $this->liberacao = new \DateTime();
        $this->vigencia = new \DateTime();
        $this->ativo = true;
        $this->resultados = new ArrayCollection();
        $this->empenhos = new ArrayCollection();
        $this->contrapartidas = new ArrayCollection();
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
     * Get rubrica
     *
     * @return string
     */
    public function getRubrica($extenso = false) {
        return ($extenso) ? (($this->rubrica == 1) ? "Capital" : "Custeio") : $this->rubrica;
    }

    public function getRubricas() {
        return array(
            "1" => "Capital",
            "2" => "Custeio",
        );
    }

    public function getRubricaSelect() {
        foreach ($this->getRubricas() as $key => $value)
            $rubricas[] = array("value" => $key, "text" => $value);
        return $rubricas;
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
     * Get tipo
     *
     * @return string
     */
    public function getTipo($extenso = false) {
        return ($extenso) ? (($this->tipo == 1) ? "Parcial" : "Final") : $this->tipo;
    }

    public function getTipos() {
        return array(
            "1" => "Parcial",
            "2" => "Final",
        );
    }

    public function getTipoSelect() {
        foreach ($this->getTipos() as $key => $value)
            $tipos[] = array("value" => $key, "text" => $value);
        return $tipos;
    }

    /**
     * Set nota
     *
     * @param string $nota
     */
    public function setNota($nota) {
        $this->nota = $nota;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota() {
        return $this->nota;
    }

    /**
     * Set liberacao
     *
     * @param string $liberacao
     */
    public function setLiberacao($liberacao) {
        list($d, $m, $a) = explode("/", $liberacao);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->liberacao = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get liberacao
     *
     * @return date
     */
    public function getLiberacao($format = "d/m/Y") {
        return $format ? $this->liberacao->format($format) : $this->liberacao;
    }

    /**
     * Set vigencia
     *
     * @param date $vigencia
     */
    public function setVigencia($vigencia) {
        list($d, $m, $a) = explode("/", $vigencia);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->vigencia = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get vigencia
     *
     * @return date 
     */
    public function getVigencia($format = "d/m/Y") {
        return $format ? $this->vigencia->format($format) : $this->vigencia;
    }

    /**
     * Set rubrica
     *
     * @param string $rubrica
     */
    public function setRubrica($rubrica) {
        $this->rubrica = $rubrica;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    /**
     * Set resultado
     *
     * @param text $resultado
     */
    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }

    /**
     * Get resultado
     *
     * @return text
     */
    public function getResultado() {
        return $this->resultado;
    }

    /**
     * Set justificativa
     *
     * @param text $justificativa
     */
    public function setJustificativa($justificativa) {
        $this->justificativa = $justificativa;
    }

    /**
     * Get justificativa
     *
     * @return text
     */
    public function getJustificativa() {
        return $this->justificativa;
    }

    /**
     * Set dificuldade
     *
     * @param text $dificuldade
     */
    public function setDificuldade($dificuldade) {
        $this->dificuldade = $dificuldade;
    }

    /**
     * Get dificuldade
     *
     * @return text
     */
    public function getDificuldade() {
        return $this->dificuldade;
    }

    /**
     * Set alteracao
     *
     * @param text $alteracao
     */
    public function setAlteracao($alteracao) {
        $this->alteracao = $alteracao;
    }

    /**
     * Get alteracao
     *
     * @return text
     */
    public function getAlteracao() {
        return $this->alteracao;
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
     * Set projeto
     *
     * @param Fapesc\TutorialBundle\Entity\Projeto $projeto
     */
    public function setProjeto(\Fapesc\TutorialBundle\Entity\Projeto $projeto) {
        $this->projeto = $projeto;
    }

    /**
     * Get projeto
     *
     * @return Fapesc\TutorialBundle\Entity\Projeto 
     */
    public function getProjeto() {
        return $this->projeto;
    }

    /**
     * Add resultados
     *
     * @param Fapesc\TutorialBundle\Entity\Resultado $resultados
     */
    public function addResultado(\Fapesc\TutorialBundle\Entity\Resultado $resultados) {
        $this->resultados[] = $resultados;
    }

    /**
     * Get resultados
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getResultados() {
        return $this->resultados;
    }

    /**
     * Set conciliacao
     *
     * @param Fapesc\TutorialBundle\Entity\Conciliacao $conciliacao
     */
    public function setConciliacao(\Fapesc\TutorialBundle\Entity\Conciliacao $conciliacao) {
        $this->conciliacao = $conciliacao;
    }

    /**
     * Get conciliacao
     *
     * @return Fapesc\TutorialBundle\Entity\Conciliacao 
     */
    public function getConciliacao() {
        return $this->conciliacao;
    }

    /**
     * Add empenhos
     *
     * @param Fapesc\TutorialBundle\Entity\Empenho $empenhos
     */
    public function addEmpenho(\Fapesc\TutorialBundle\Entity\Empenho $empenhos) {
        $this->empenhos[] = $empenhos;
    }

    /**
     * Get empenhos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEmpenhos() {
        return $this->empenhos;
    }

    /**
     * Add contrapartidas
     *
     * @param Fapesc\TutorialBundle\Entity\Contrapartida $contrapartidas
     */
    public function addContrapartida(\Fapesc\TutorialBundle\Entity\Contrapartida $contrapartidas) {
        $this->contrapartidas[] = $contrapartidas;
    }

    /**
     * Get contrapartidas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContrapartidas() {
        return $this->contrapartidas;
    }

    public function toArray() {
        return array(
            "idRelatorio" => $this->getId(),
            "nota" => $this->getNota(),
            "liberacao" => $this->getLiberacao(),
            "vigencia" => $this->getVigencia(),
            "rubrica" => $this->getRubrica(true),
            "rubricas" => $this->getRubricas(),
            "rubricaSelect" => $this->getRubricaSelect(),
            "valor" => $this->getValor(),
            "tipo" => $this->getTipo(true),
            "tipos" => $this->getTipos(),
            "tipoSelect" => $this->getTipoSelect(),
            "resultado" => $this->getResultado(),
            "justificativa" => $this->getJustificativa(),
            "dificuldade" => $this->getDificuldade(),
            "alteracao" => $this->getAlteracao(),
            "projeto" => $this->getProjeto()->getId(),
        );
    }
    
    public function populateDados($dados) {
        $this->setNota($dados["nota"]);
        $this->setLiberacao($dados["liberacao"]);
        $this->setVigencia($dados["vigencia"]);
        $this->setRubrica($dados["rubrica"]);
        $this->setValor($dados["valor"]);
        $this->setTipo($dados["tipo"]);
    }
    
    public function populateRelatorio($dados) {
        $this->setResultado($dados["resultado"]);
        $this->setJustificativa($dados["justificativa"]);
        $this->setDificuldade($dados["dificuldade"]);
        $this->setAlteracao($dados["alteracao"]);
    }

}