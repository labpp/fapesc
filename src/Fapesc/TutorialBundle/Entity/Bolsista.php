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
     * @var integer $banco
     *
     * @ORM\Column(name="banco", type="integer")
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
    
    public function getBancos($banco = false) {
        $bancos = array(
            "1" => "246 - Banco ABC Brasil S.A.",
            "2" => "025 - Banco Alfa S.A.",
            "3" => "641 - Banco Alvorada S.A.",
            "4" => "029 - Banco Banerj S.A.",
            "5" => "000 - Banco Bankpar S.A.",
            "6" => "740 - Banco Barclays S.A.",
            "7" => "107 - Banco BBM S.A.",
            "8" => "031 - Banco Beg S.A.",
            "9" => "739 - Banco BGN S.A.",
            "10" => "096 - Banco BM&F de Serviços de Liquidação e Custódia S.A",
            "11" => "318 - Banco BMG S.A.",
            "12" => "752 - Banco BNP Paribas Brasil S.A.",
            "13" => "248 - Banco Boavista Interatlântico S.A.",
            "14" => "218 - Banco Bonsucesso S.A.",
            "15" => "065 - Banco Bracce S.A.",
            "16" => "036 - Banco Bradesco BBI S.A.",
            "17" => "204 - Banco Bradesco Cartões S.A.",
            "18" => "394 - Banco Bradesco Financiamentos S.A.",
            "19" => "237 - Banco Bradesco S.A.",
            "20" => "225 - Banco Brascan S.A.",
            "21" => "208 - Banco BTG Pactual S.A.",
            "22" => "044 - Banco BVA S.A.",
            "23" => "263 - Banco Cacique S.A.",
            "24" => "473 - Banco Caixa Geral - Brasil S.A.",
            "25" => "040 - Banco Cargill S.A.",
            "26" => "233 - Banco Cifra S.A.",
            "27" => "745 - Banco Citibank S.A.",
            "28" => "M08 - Banco Citicard S.A.",
            "29" => "M19 - Banco CNH Capital S.A.",
            "30" => "215 - Banco Comercial e de Investimento Sudameris S.A.",
            "31" => "756 - Banco Cooperativo do Brasil S.A. - BANCOOB",
            "32" => "748 - Banco Cooperativo Sicredi S.A.",
            "33" => "222 - Banco Credit Agricole Brasil S.A.",
            "34" => "505 - Banco Credit Suisse (Brasil) S.A.",
            "35" => "229 - Banco Cruzeiro do Sul S.A.",
            "36" => "Banco CSF S.A.",
            "37" => "003 - Banco da Amazônia S.A.",
            "38" => "083-3 - Banco da China Brasil S.A.",
            "39" => "707 - Banco Daycoval S.A.",
            "40" => "M06 - Banco de Lage Landen Brasil S.A.",
            "41" => "024 - Banco de Pernambuco S.A. - BANDEPE",
            "42" => "456 - Banco de Tokyo-Mitsubishi UFJ Brasil S.A.",
            "43" => "214 - Banco Dibens S.A.",
            "44" => "001 - Banco do Brasil S.A.",
            "45" => "047 - Banco do Estado de Sergipe S.A.",
            "46" => "037 - Banco do Estado do Pará S.A.",
            "47" => "041 - Banco do Estado do Rio Grande do Sul S.A.",
            "48" => "004 - Banco do Nordeste do Brasil S.A.",
            "49" => "265 - Banco Fator S.A.",
            "50" => "M03 - Banco Fiat S.A.",
            "51" => "224 - Banco Fibra S.A.",
            "52" => "626 - Banco Ficsa S.A.",
            "53" => "Banco Fidis S.A.",
            "54" => "394 - Banco Finasa BMC S.A.",
            "55" => "M18 - Banco Ford S.A.",
            "56" => "M07 - Banco GMAC S.A.",
            "57" => "612 - Banco Guanabara S.A.",
            "58" => "M22 - Banco Honda S.A.",
            "59" => "063 - Banco Ibi S.A. Banco Múltiplo",
            "60" => "M11 - Banco IBM S.A.",
            "61" => "604 - Banco Industrial do Brasil S.A.",
            "62" => "320 - Banco Industrial e Comercial S.A.",
            "63" => "653 - Banco Indusval S.A.",
            "64" => "249 - Banco Investcred Unibanco S.A.",
            "65" => "184 - Banco Itaú BBA S.A.",
            "66" => "479 - Banco ItaúBank S.A",
            "67" => "Banco Itaucard S.A.",
            "68" => "M09 - Banco Itaucred Financiamentos S.A.",
            "69" => "376 - Banco J. P. Morgan S.A.",
            "70" => "074 - Banco J. Safra S.A.",
            "71" => "217 - Banco John Deere S.A.",
            "72" => "600 - Banco Luso Brasileiro S.A.",
            "73" => "389 - Banco Mercantil do Brasil S.A.",
            "74" => "746 - Banco Modal S.A.",
            "75" => "045 - Banco Opportunity S.A.",
            "76" => "079 - Banco Original do Agronegócio S.A.",
            "77" => "623 - Banco Panamericano S.A.",
            "78" => "611 - Banco Paulista S.A.",
            "79" => "643 - Banco Pine S.A.",
            "80" => "638 - Banco Prosper S.A.",
            "81" => "747 - Banco Rabobank International Brasil S.A.",
            "82" => "356 - Banco Real S.A.",
            "83" => "633 - Banco Rendimento S.A.",
            "84" => "M16 - Banco Rodobens S.A.",
            "85" => "072 - Banco Rural Mais S.A.",
            "86" => "453 - Banco Rural S.A.",
            "87" => "422 - Banco Safra S.A.",
            "88" => "033 - Banco Santander (Brasil) S.A.",
            "89" => "749 - Banco Simples S.A.",
            "90" => "366 - Banco Société Générale Brasil S.A.",
            "91" => "637 - Banco Sofisa S.A.",
            "92" => "012 - Banco Standard de Investimentos S.A.",
            "93" => "464 - Banco Sumitomo Mitsui Brasileiro S.A.",
            "94" => "082-5 - Banco Topázio S.A.",
            "95" => "M20 - Banco Toyota do Brasil S.A.",
            "96" => "634 - Banco Triângulo S.A.",
            "97" => "M14 - Banco Volkswagen S.A.",
            "98" => "M23 - Banco Volvo (Brasil) S.A.",
            "99" => "655 - Banco Votorantim S.A.",
            "100" => "610 - Banco VR S.A.",
            "101" => "119 - Banco Western Union do Brasil S.A.",
            "102" => "370 - Banco WestLB do Brasil S.A.",
            "103" => "Banco Yamaha Motor S.A.",
            "104" => "021 - BANESTES S.A. Banco do Estado do Espírito Santo",
            "105" => "719 - Banif-Banco Internacional do Funchal (Brasil)S.A.",
            "106" => "755 - Bank of America Merrill Lynch Banco Múltiplo S.A.",
            "107" => "073 - BB Banco Popular do Brasil S.A.",
            "108" => "250 - BCV - Banco de Crédito e Varejo S.A.",
            "109" => "078 - BES Investimento do Brasil S.A.-Banco de Investimento",
            "110" => "069 - BPN Brasil Banco Múltiplo S.A.",
            "111" => "070 - BRB - Banco de Brasília S.A.",
            "112" => "104 - Caixa Econômica Federal",
            "113" => "477 - Citibank S.A.",
            "114" => "081-7 - Concórdia Banco S.A.",
            "115" => "487 - Deutsche Bank S.A. - Banco Alemão",
            "116" => "064 - Goldman Sachs do Brasil Banco Múltiplo S.A.",
            "117" => "062 - Hipercard Banco Múltiplo S.A.",
            "118" => "399 - HSBC Bank Brasil S.A. - Banco Múltiplo",
            "119" => "492 - ING Bank N.V.",
            "120" => "652 - Itaú Unibanco Holding S.A.",
            "121" => "341 - Itaú Unibanco S.A.",
            "122" => "488 - JPMorgan Chase Bank",
            "123" => "751 - Scotiabank Brasil S.A. Banco Múltiplo",
            "124" => "Standard Chartered Bank (Brasil) S/A–Bco Invest.",
            "125" => "409 - UNIBANCO - União de Bancos Brasileiros S.A.",
            "126" => "230 - Unicard Banco Múltiplo S.A.",            
         );
        return $banco ? $bancos[$banco] : $bancos;
    }
    public function getBancoSelect() {
        foreach ($this->getBancos() as $key => $value)
            $bancos[] = array("value" => $key, "text" => $value);
        return $bancos;
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
            "bancos" => $this->getBancos(),
            "bancoSelect" => $this->getBancoSelect(),
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