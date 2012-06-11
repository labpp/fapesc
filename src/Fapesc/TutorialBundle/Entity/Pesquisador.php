<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Pesquisador
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pesquisador {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nome
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string $cpf
     *
     * @ORM\Column(name="cpf", type="string", length=14)
     */
    private $cpf;

    /**
     * @var string $pis
     *
     * @ORM\Column(name="pis", type="string", length=255)
     */
    private $pis;

    /**
     * @var string $instituicao
     *
     * @ORM\Column(name="instituicao", type="string", length=255)
     */
    private $instituicao;

    /**
     * @var string $cnpj
     *
     * @ORM\Column(name="cnpj", type="string", length=18)
     */
    private $cnpj;

    /**
     * @var string $endereco
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     */
    private $endereco;

    /**
     * @var string $cidade
     *
     * @ORM\Column(name="cidade", type="string", length=255)
     */
    private $cidade;

    /**
     * @var string $uf
     *
     * @ORM\Column(name="uf", type="string", length=2)
     */
    private $uf;

    /**
     * @var string $cep
     *
     * @ORM\Column(name="cep", type="string", length=9)
     */
    private $cep;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string $telefone
     *
     * @ORM\Column(name="telefone", type="string", length=14)
     */
    private $telefone;

    /**
     * @var string $celular
     *
     * @ORM\Column(name="celular", type="string", length=14)
     */
    private $celular;

    /**
     * @ORM\OneToMany(targetEntity="Salario", mappedBy="pesquisador")
     */
    protected $salarios;

    public function __construct() {
        $this->salarios = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set endereco
     *
     * @param string $endereco
     */
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco() {
        return $this->endereco;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     */
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade() {
        return $this->cidade;
    }

    /**
     * Set uf
     *
     * @param string $uf
     */
    public function setUf($uf) {
        $this->uf = $uf;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf() {
        return $this->uf;
    }

    /**
     * Set cep
     *
     * @param string $cep
     */
    public function setCep($cep) {
        $this->cep = $cep;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep() {
        return $this->cep;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     */
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone() {
        return $this->telefone;
    }

    /**
     * Set celular
     *
     * @param string $celular
     */
    public function setCelular($celular) {
        $this->celular = $celular;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular() {
        return $this->celular;
    }

    /**
     * Set pis
     *
     * @param string $pis
     */
    public function setPis($pis) {
        $this->pis = $pis;
    }

    /**
     * Get pis
     *
     * @return string 
     */
    public function getPis() {
        return $this->pis;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     */
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj() {
        return $this->cnpj;
    }

    /**
     * Add salarios
     *
     * @param Fapesc\TutorialBundle\Entity\Salario $salarios
     */
    public function addSalario(\Fapesc\TutorialBundle\Entity\Salario $salarios) {
        $this->salarios[] = $salarios;
    }

    /**
     * Get salarios
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSalarios() {
        return $this->salarios;
    }

    public function toArray() {
        return array(
            "idPesquisador" => $this->getId(),
            "nome" => $this->getNome(),
            "cpf" => $this->getCpf(),
            "pis" => $this->getPis(),
            "instituicao" => $this->getInstituicao(),
            "cnpj" => $this->getCnpj(),
            "endereco" => $this->getEndereco(),
            "cidade" => $this->getCidade(),
            "uf" => $this->getUf(),
            "cep" => $this->getCep(),
            "email" => $this->getEmail(),
            "telefone" => $this->getTelefone(),
            "celular" => $this->getCelular(),
        );
    }

    public function populate($data) {
        $this->setNome($data["nome"]);
        $this->setCpf($data["cpf"]);
        $this->setPis($data["pis"]);
        $this->setInstituicao($data["instituicao"]);
        $this->setCnpj($data["cnpj"]);
        $this->setEndereco($data["endereco"]);
        $this->setCidade($data["cidade"]);
        $this->setUf($data["uf"]);
        $this->setCep($data["cep"]);
        $this->setEmail($data["email"]);
        $this->setTelefone($data["telefone"]);
        $this->setCelular($data["celular"]);
    }

}