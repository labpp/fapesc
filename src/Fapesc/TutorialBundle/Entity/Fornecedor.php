<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Fornecedor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fornecedor {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $tipo
     * 1: pessoa física; 2: pessoa jurídica
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var string $nome
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string $cadastro
     * CPF ou CNPJ
     * @ORM\Column(name="cadastro", type="string", length=19)
     */
    private $cadastro;

    public function __construct() {
    }

    public function toArray() {
        return array(
            "idFornecedor" => $this->getId(),
            "tipo" => $this->getTipo(),
            "tipos" => $this->getTipos(),
            "tipoSelect" => $this->getTipoSelect(),
            "nome" => $this->getNome(),
            "cadastro" => $this->getCadastro(),
        );
    }

    public function populate($data) {
        $this->setTipo($data["tipo"]);
        $this->setNome($data["nome"]);
        $this->setCadastro($data["cadastro"]);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return (int)$this->id;
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
     * Get tipo
     *
     * @return string 
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Get tipos
     *
     * @return string 
     */
    public function getTipos() {
        return array(
            "1" => "Pessoa Física",
            "2" => "Pessoa Jurídica",
        );
    }

    /**
     * Get tipoSelect
     *
     * @return string 
     */
    public function getTipoSelect() {
        foreach ($this->getTipos() as $k => $v)
            $tipos[] = array("value" => $k, "text" => $v);
        return $tipos;
    }

    /**
     * Set nome
     *
     * @param string $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set cadastro
     *
     * @param string $cadastro
     */
    public function setCadastro($cadastro) {
        $this->cadastro = $cadastro;
    }

    /**
     * Get cadastro
     *
     * @return string 
     */
    public function getCadastro() {
        return $this->cadastro;
    }

}