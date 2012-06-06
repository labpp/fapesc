<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fapesc\TutorialBundle\Entity\Bolsista
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Bolsista {

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
     * @var string $instituicao
     *
     * @ORM\Column(name="instituicao", type="string", length=255)
     */
    private $instituicao;

    /**
     * @var integer $tipo
     * 1: aluno; 2: professor; 3: sta; 4: outro;
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var string $matricula
     *
     * @ORM\Column(name="matricula", type="string", length=255)
     */
    private $matricula;

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
     * @var string $banco
     *
     * @ORM\Column(name="banco", type="string", length=255)
     */
    private $banco;

    /**
     * @var string $conta
     *
     * @ORM\Column(name="conta", type="string", length=255)
     */
    private $conta;

    /**
     * @var string $agencia
     *
     * @ORM\Column(name="agencia", type="string", length=255)
     */
    private $agencia;

    /**
     * @ORM\OneToMany(targetEntity="Bolsa", mappedBy="bolsista")
     */
    protected $bolsas;

    public function __construct() {
        $this->tipo = "a";
        $this->ativo = true;
        $this->bolsas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tipo
     *
     * @param integer $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo($puro = true) {
        $tipos = $this->getTipos();
        return $puro ? $this->tipo : $tipos[$this->tipo];
    }

    public function getTipos() {
        return array(
            "1" => "Aluno",
            "2" => "Professor",
            "3" => "STA",
            "4" => "Outro",
        );
    }

    public function getTipoSelect() {
        foreach ($this->getTipos() as $k => $v)
            $tipos[] = array("value" => $k, "text" => $v);
        return $tipos;
    }

    /**
     * Set matricula
     *
     * @param string $matricula
     */
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    /**
     * Get matricula
     *
     * @return string
     */
    public function getMatricula() {
        return $this->matricula;
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
     * Set banco
     *
     * @param string $banco
     */
    public function setBanco($banco) {
        $this->banco = $banco;
    }

    /**
     * Get banco
     *
     * @return string
     */
    public function getBanco() {
        return $this->banco;
    }

    /**
     * Set conta
     *
     * @param string $conta
     */
    public function setConta($conta) {
        $this->conta = $conta;
    }

    /**
     * Get conta
     *
     * @return string
     */
    public function getConta() {
        return $this->conta;
    }

    /**
     * Set agencia
     *
     * @param string $agencia
     */
    public function setAgencia($agencia) {
        $this->agencia = $agencia;
    }

    /**
     * Get agencia
     *
     * @return string
     */
    public function getAgencia() {
        return $this->agencia;
    }

    /**
     * Add bolsas
     *
     * @param Fapesc\TutorialBundle\Entity\Bolsa $bolsas
     */
    public function addBolsa(\Fapesc\TutorialBundle\Entity\Bolsa $bolsas) {
        $this->bolsas[] = $bolsas;
    }

    /**
     * Get bolsas
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getBolsas() {
        return $this->bolsas;
    }

    public function toArray() {
        return array(
            "idBolsista" => $this->getId(),
            "nome" => $this->getNome(),
            "cpf" => $this->getCpf(),
            "instituicao" => $this->getInstituicao(),
            "tipo" => $this->getTipo(),
            "tipos" => $this->getTipos(),
            "tipoSelect" => $this->getTipoSelect(),
            "matricula" => $this->getMatricula(),
            "endereco" => $this->getEndereco(),
            "cidade" => $this->getCidade(),
            "uf" => $this->getUf(),
            "cep" => $this->getCep(),
            "email" => $this->getEmail(),
            "telefone" => $this->getTelefone(),
            "celular" => $this->getCelular(),
            "banco" => $this->getBanco(),
            "conta" => $this->getConta(),
            "agencia" => $this->getAgencia(),
        );
    }

    public function populate($data) {
        $this->setNome($data["nome"]);
        $this->setCpf($data["cpf"]);
        $this->setInstituicao($data["instituicao"]);
        $this->setTipo($data["tipo"]);
        $this->setMatricula($data["matricula"]);
        $this->setEndereco($data["endereco"]);
        $this->setCidade($data["cidade"]);
        $this->setUf($data["uf"]);
        $this->setCep($data["cep"]);
        $this->setEmail($data["email"]);
        $this->setTelefone($data["telefone"]);
        $this->setCelular($data["celular"]);
        $this->setBanco($data["banco"]);
        $this->setConta($data["conta"]);
        $this->setAgencia($data["agencia"]);
    }

}