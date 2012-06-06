<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Meta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Meta
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
     * @ORM\ManyToOne(targetEntity="Projeto", inversedBy="metas")
     * @ORM\JoinColumn(name="projeto", referencedColumnName="id")
     */
    private $projeto;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return (int)$this->id;
    }

    /**
     * Set meta
     *
     * @param text $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * Get meta
     *
     * @return text
     */
    public function getMeta($resumo = false)
    {
        return $resumo ? ((strlen($this->getMeta()) > (int)$resumo) ? trim(substr($this->getMeta(), 0, (int)$resumo)) . "..." : $this->getMeta()) : $this->meta;
    }

    /**
     * Set indicador
     *
     * @param text $indicador
     */
    public function setIndicador($indicador)
    {
        $this->indicador = $indicador;
    }

    /**
     * Get indicador
     *
     * @return text
     */
    public function getIndicador($resumo = false)
    {
        return $resumo ? ((strlen($this->getIndicador()) > (int)$resumo) ? trim(substr($this->getIndicador(), 0, (int)$resumo)) . "..." : $this->getIndicador()) : $this->indicador;
    }

    /**
     * Set projeto
     *
     * @param Fapesc\TutorialBundle\Entity\Projeto $projeto
     */
    public function setProjeto(\Fapesc\TutorialBundle\Entity\Projeto $projeto)
    {
        $this->projeto = $projeto;
    }

    /**
     * Get projeto
     *
     * @return Fapesc\TutorialBundle\Entity\Projeto
     */
    public function getProjeto()
    {
        return $this->projeto;
    }

	public function toArray()
	{
		return array(
			"id" => $this->getId(),
			"meta" => $this->getMeta(),
			"indicador" => $this->getIndicador(),
		);
	}

	public function populate($data)
	{
		$this->setMeta($data["meta"]);
		$this->setIndicador($data["indicador"]);
	}
}