<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Resultado
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Resultado
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $resultado
     *
     * @ORM\Column(name="resultado", type="string", length=2)
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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * Get resultado
     *
     * @return string
     */
    public function getResultado($extenso = false)
    {
    	$resultado = empty($this->resultado) ? "NA" : strtoupper($this->resultado);
    	if ($extenso) {
    		switch ($this->resultado) {
    			case "PR": $resultado = "Parcialmente alcançado"; break;
    			case "PA": $resultado = "Plenamente alcançado"; break;
    			default: $resultado = "Não alcançado"; break;
    		}
    	}
        return $resultado;
    }

    /**
     * Set justificativa
     *
     * @param text $justificativa
     */
    public function setJustificativa($justificativa)
    {
        $this->justificativa = $justificativa;
    }

    /**
     * Get justificativa
     *
     * @return text
     */
    public function getJustificativa()
    {
        return empty($this->justificativa) ? "Não se aplica" : $this->justificativa;
    }

    /**
     * Set meta
     *
     * @param integer $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * Get meta
     *
     * @return integer
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Set relatorio
     *
     * @param Fapesc\TutorialBundle\Entity\Relatorio $relatorio
     */
    public function setRelatorio(\Fapesc\TutorialBundle\Entity\Relatorio $relatorio)
    {
        $this->relatorio = $relatorio;
    }

    /**
     * Get relatorio
     *
     * @return Fapesc\TutorialBundle\Entity\Relatorio
     */
    public function getRelatorio()
    {
        return $this->relatorio;
    }
}