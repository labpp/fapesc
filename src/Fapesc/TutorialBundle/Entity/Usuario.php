<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Fapesc\TutorialBundle\Entity\Usuario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Usuario implements UserInterface
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
     * @var string $cpf
     *
     * @ORM\Column(name="cpf", type="string", length=14)
     */
    protected $cpf;

    /**
     * @var string $nome
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    protected $nome;

    /**
     * @var string $instituicao
     *
     * @ORM\Column(name="instituicao", type="string", length=255)
     */
    protected $instituicao;

    /**
     * @var string $endereco
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     */
    protected $endereco;

    /**
     * @var string $municipio
     *
     * @ORM\Column(name="municipio", type="string", length=255)
     */
    protected $municipio;

    /**
     * @var string $uf
     *
     * @ORM\Column(name="uf", type="string", length=2)
     */
    protected $uf;

    /**
     * @var string $cep
     *
     * @ORM\Column(name="cep", type="string", length=9)
     */
    protected $cep;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;

    /**
     * @var string $fone
     *
     * @ORM\Column(name="fone", type="string", length=14)
     */
    protected $fone;

    /**
     * @var string $senha
     *
     * @ORM\Column(name="senha", type="string", length=255)
     */
    protected $senha;

    /**
     * @ORM\OneToMany(targetEntity="Projeto", mappedBy="usuario")
     */
    protected $projetos;

    public function __construct()
    {
        $this->projetos = new ArrayCollection();
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
     * Set nome
     *
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * Get nome
     *
     * @return nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set senha
     *
     * @param string $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set instituicao
     *
     * @param string $instituicao
     */
    public function setInstituicao($instituicao)
    {
        $this->instituicao = $instituicao;
    }

    /**
     * Get instituicao
     *
     * @return string
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    /**
     * Get municipio
     *
     * @return string
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set uf
     *
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set cep
     *
     * @param string $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set fone
     *
     * @param string $fone
     */
    public function setFone($fone)
    {
        $this->fone = $fone;
    }

    /**
     * Get fone
     *
     * @return string
     */
    public function getFone()
    {
        return $this->fone;
    }

    public function equals(UserInterface $user) {}

    public function eraseCredentials() {}

    public function getPassword() {
    	return $this->getSenha();
    }

    public function getRoles() {
    	return array("ROLE_USER");
    }

    public function getSalt() {
    	return null;
    }

    public function getUsername() {
    	return $this->getCpf();
    }

    /**
     * Add projetos
     *
     * @param Fapesc\TutorialBundle\Entity\Projeto $projetos
     */
    public function addProjeto(\Fapesc\TutorialBundle\Entity\Projeto $projetos)
    {
        $this->projetos[] = $projetos;
    }

    /**
     * Get projetos
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getProjetos()
    {
        return $this->projetos;
    }

    public function toArray() {
    	return array(
    		"id" => $this->getId(),
    		"cpf" => $this->getCpf(),
    		"nome" => $this->getNome(),
    		"instituicao" => $this->getInstituicao(),
    		"endereco" => $this->getEndereco(),
    		"municipio" => $this->getMunicipio(),
    		"uf" => $this->getUf(),
    		"cep" => $this->getCep(),
    		"email" => $this->getEmail(),
    		"fone" => $this->getFone(),
    	);
    }

    public function populate($dados) {
    	$this->setCpf($dados["cpf"]);
    	$this->setNome($dados["nome"]);
    	$this->setInstituicao($dados["instituicao"]);
    	$this->setEndereco($dados["endereco"]);
    	$this->setMunicipio($dados["municipio"]);
    	$this->setUf($dados["uf"]);
    	$this->setCep($dados["cep"]);
    	$this->setEmail($dados["email"]);
    	$this->setFone($dados["fone"]);
    }
}