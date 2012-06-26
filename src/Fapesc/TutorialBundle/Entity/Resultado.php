<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Resultado
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Resultado {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $resultado
     *
     * @ORM\Column(name="resultado", type="integer")
     */
    private $resultado;

    /**
     * @var text $justificativa
     *
     * @ORM\Column(name="justificativa", type="text")
     */
    private $justificativa;

    /**
     * @ORM\ManyToOne(targetEntity="Meta", inversedBy="resultados")
     * @ORM\JoinColumn(name="meta", referencedColumnName="id")
     */
    private $meta;

    /**
     * @ORM\ManyToOne(targetEntity="Relatorio", inversedBy="resultados")
     * @ORM\JoinColumn(name="relatorio", referencedColumnName="id")
     */
    private $relatorio;

    public function __construct() {
        $this->resultado = 1;
        $this->justificativa = "Não se aplica";
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
     * @return integer
     */
    public function getResultado() {
        return $this->resultado;
    }

    public function getResultados($resultado = false) {
        $resultados = array(
            "1" => "Não alcançado",
            "2" => "Parcialmente alcançado",
            "3" => "Plenamente alcançado",
        );
        return $resultado ? $resultados[$resultado] : $resultados;
    }

    public function getResultadoSelect() {
        foreach ($this->getResultados() as $key => $value)
            $resultados[] = array("value" => $key, "text" => $value);
        return $resultados;
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
        return empty($this->justificativa) ? "Não se aplica" : $this->justificativa;
    }

    /**
     * Set meta
     *
     * @param integer $meta
     */
    public function setMeta($meta) {
        $this->meta = $meta;
    }

    /**
     * Get meta
     *
     * @return integer
     */
    public function getMeta() {
        return $this->meta;
    }

    /**
     * Set relatorio
     *
     * @param Fapesc\TutorialBundle\Entity\Relatorio $relatorio
     */
    public function setRelatorio(\Fapesc\TutorialBundle\Entity\Relatorio $relatorio) {
        $this->relatorio = $relatorio;
    }

    /**
     * Get relatorio
     *
     * @return Fapesc\TutorialBundle\Entity\Relatorio
     */
    public function getRelatorio() {
        return $this->relatorio;
    }

    public function populate($dados) {
        $this->setResultado($dados["resultado"]);
        $this->setJustificativa($dados["justificativa"]);
    }

    public function toArray() {
        return array(
            "idResultado" => $this->getId(),
            "resultado" => $this->getResultado(),
            "resultados" => $this->getResultados(),
            "resultadoSelect" => $this->getResultadoSelect(),
            "justificativa" => $this->getJustificativa(),
            "meta" => $this->getMeta()->getId(),
            "relatorio" => $this->getRelatorio()->getId(),
        );
    }

}