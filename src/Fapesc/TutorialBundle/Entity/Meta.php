<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Meta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Meta {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text $meta
     *
     * @ORM\Column(name="meta", type="text")
     */
    private $meta;

    /**
     * @var text $indicador
     *
     * @ORM\Column(name="indicador", type="text")
     */
    private $indicador;

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
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="metas")
     * @ORM\JoinColumn(name="projeto", referencedColumnName="id")
     */
    private $projeto;

    public function __construct() {
        $this->inicio = new \DateTime();
        $this->termino = new \DateTime();
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
     * Set meta
     *
     * @param text $meta
     */
    public function setMeta($meta) {
        $this->meta = $meta;
    }

    /**
     * Get meta
     *
     * @return text
     */
    public function getMeta($resumo = false) {
        return $resumo ? ((strlen($this->getMeta()) > (int) $resumo) ? trim(substr($this->getMeta(), 0, (int) $resumo)) . "..." : $this->getMeta()) : $this->meta;
    }

    /**
     * Set indicador
     *
     * @param text $indicador
     */
    public function setIndicador($indicador) {
        $this->indicador = $indicador;
    }

    /**
     * Get indicador
     *
     * @return text
     */
    public function getIndicador($resumo = false) {
        return $resumo ? ((strlen($this->getIndicador()) > (int) $resumo) ? trim(substr($this->getIndicador(), 0, (int) $resumo)) . "..." : $this->getIndicador()) : $this->indicador;
    }

    /**
     * Set inicio
     *
     * @param date $inicio
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
     * @return date
     */
    public function getInicio($format = "d/m/Y") {
        return $format ? $this->inicio->format($format) : $this->inicio;
    }

    /**
     * Set termino
     *
     * @param date $termino
     */
    public function setTermino($termino) {
        list($d, $m, $a) = explode("/", $termino);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->termino = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get termino
     *
     * @return date
     */
    public function getTermino($format = "d/m/Y") {
        return $format ? $this->termino->format($format) : $this->termino;
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

    public function toArray() {
        return array(
            "id" => $this->getId(),
            "meta" => $this->getMeta(),
            "indicador" => $this->getIndicador(),
            "inicio" => $this->getInicio(),
            "termino" => $this->getTermino(),
        );
    }

    public function populate($data) {
        $this->setMeta($data["meta"]);
        $this->setIndicador($data["indicador"]);
        $this->setInicio($data["inicio"]);
        $this->setTermino($data["termino"]);
    }

}