<?php
namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fapesc\TutorialBundle\Entity\Conciliacao
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Conciliacao
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
     * @var date $data
     *
     * @ORM\Column(name="data", type="date")
     */
    private $data;

    /**
     * @var float $saldo
     *
     * @ORM\Column(name="saldo", type="float")
     */
    private $saldo;

    /**
     * @ORM\OneToMany(targetEntity="Cheque", mappedBy="conciliacao")
     */
    protected $cheques;

     /**
     * @ORM\OneToOne(targetEntity="Relatorio", inversedBy="conciliacao")
     * @ORM\JoinColumn(name="relatorio", referencedColumnName="id")
     */
    protected $relatorio;

    public function __construct() {
        $this->data = new \DateTime();
        $this->cheques = new ArrayCollection();
    }


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
     * Set data
     *
     * @param string $data
     */
    public function setData($data)
    {
        list($d, $m, $a) = explode("/", $data);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->data = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData($format = "d/m/Y") {
        return $format ? $this->data->format($format) : $this->data;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = str_replace(array(".", ","), array("", "."), $saldo);
    }

    /**
     * Get saldo
     *
     * @return float
     */
    public function getSaldo($puro = false)
    {
        return $puro ? $this->saldo : number_format($this->saldo, 2, ",", ".");
    }

    /**
     * Set relatorio
     *
     * @param integer $relatorio
     */
    public function setRelatorio($relatorio)
    {
        $this->relatorio = $relatorio;
    }

    /**
     * Get relatorio
     *
     * @return integer
     */
    public function getRelatorio()
    {
        return $this->relatorio;
    }

    /**
     * Add cheques
     *
     * @param Fapesc\TutorialBundle\Entity\Cheque $cheques
     */
    public function addCheque(\Fapesc\TutorialBundle\Entity\Cheque $cheques)
    {
        $this->cheques[] = $cheques;
    }

    /**
     * Get cheques
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getCheques()
    {
        return $this->cheques;
    }
}