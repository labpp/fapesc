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
class Usuario implements UserInterface {

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
     * @var integer $municipio
     *
     * @ORM\Column(name="municipio", type="integer")
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

    public function __construct() {
        $this->projetos = new ArrayCollection();
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
     * @return nome
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
     * Set senha
     *
     * @param string $senha
     */
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha() {
        return $this->senha;
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
     * Set municipio
     *
     * @param integer $municipio
     */
    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    /**
     * Get municipio
     *
     * @return integer 
     */
    public function getMunicipio() {
        return $this->municipio;
    }
    
    public function getMunicipios($municipio = false) {
         $municipios = array(
             "1" => "Abdon Batista",
             "2" => "Abelardo Luz",
             "3" => "Agrolândia",
             "4" => "Agronômica",
             "5" => "Água Doce",
             "6" => "Águas Frias",
             "7" => "Águas Mornas",
             "8" => "Águas de Chapecó",
             "9" => "Alfredo Wagner",
             "10" => "Alto Bela Vista",
             "11" => "Anchieta",
             "12" => "Angelina",
             "13" => "Anita Garibaldi",
             "14" => "Anitápolis",
             "15" => "Antônio Carlos",
             "16" => "Apiúna",
             "17" => "Arabutã",
             "18" => "Araquari",
             "19" => "Araranguá",
             "20" => "Armazém",
             "21" => "Arroio Trinta",
             "22" => "Arvoredo",
             "23" => "Ascurra",
             "24" => "Atalanta",
             "25" => "Aurora",
             "26" => "Balneário Arroio do Silva",
             "27" => "Balneário Barra do Sul",
             "28" => "Balneário Camboriú",
             "29" => "Balneário Gaivota",
             "30" => "Balneário Piçarras",
             "31" => "Bandeirante",
             "32" => "Barra Bonita",
             "33" => "Barra Velha",
             "34" => "Bela Vista do Toldo",
             "35" => "Belmonte",
             "36" => "Benedito Novo",
             "37" => "Biguaçu",
             "38" => "Blumenau",
             "39" => "Bocaina do Sul",
             "40" => "Bom Jardim da Serra",
             "41" => "Bom Jesus",
             "42" => "Bom Jesus do Oeste",
             "43" => "Bom Retiro",
             "44" => "Bombinhas",
             "45" => "Botuverá",
             "46" => "Braço do Norte",
             "47" => "Braço do Trombudo",
             "48" => "Brunópolis",
             "49" => "Brusque",
             "50" => "Caçador",
             "51" => "Caibi",
             "52" => "Calmon",
             "53" => "Camboriú",
             "54" => "Campo Alegre",
             "55" => "Campo Belo do Sul",
             "56" => "Campo Erê",
             "57" => "Campos Novos",
             "58" => "Canelinha",
             "59" => "Canoinhas",
             "60" => "Capinzal",
             "61" => "Capivari de Baixo",
             "62" => "Capão Alto",
             "63" => "Catanduvas",
             "64" => "Caxambu do Sul",
             "65" => "Celso Ramos",
             "66" => "Cerro Negro",
             "67" => "Chapadão do Lageado",
             "68" => "Chapecó",
             "69" => "Cocal do Sul",
             "70" => "Concórdia",
             "71" => "Cordilheira Alta",
             "72" => "Coronel Freitas",
             "73" => "Coronel Martins",
             "74" => "Correia Pinto",
             "75" => "Corupá",
             "76" => "Criciúma",
             "77" => "Cunha Porã",
             "78" => "Cunhataí",
             "79" => "Curitibanos",
             "80" => "Descanso",
             "81" => "Dionísio Cerqueira",
             "82" => "Dona Emma",
             "83" => "Doutor Pedrinho",
             "84" => "Entre Rios",
             "85" => "Ermo",
             "86" => "Erval Velho",
             "87" => "Faxinal dos Guedes",
             "88" => "Flor do Sertão",
             "89" => "Florianópolis",
             "90" => "Formosa do Sul",
             "91" => "Forquilhinha",
             "92" => "Fraiburgo",
             "93" => "Frei Rogério",
             "94" => "Galvão",
             "95" => "Garopaba",
             "96" => "Garuva",
             "97" => "Gaspar",
             "98" => "Governador Celso Ramos",
             "99" => "Grão Pará",
             "100" => "Gravatal",
             "101" => "Guabiruba",
             "102" => "Guaraciaba",
             "103" => "Guaramirim",
             "104" => "Guarujá do Sul",
             "105" => "Guatambu",
             "106" => "Herval d'Oeste",
             "107" => "Ibiam",
             "108" => "Ibicaré",
             "109" => "Ibirama",
             "110" => "Içara",
             "111" => "Ilhota",
             "112" => "Imaruí",
             "113" => "Imbituba",
             "114" => "Imbuia",
             "115" => "Indaial",
             "116" => "Iomerê",
             "117" => "Ipira",
             "118" => "Iporã do Oeste",
             "119" => "Ipuaçu",
             "120" => "Ipumirim",
             "121" => "Iraceminha",
             "122" => "Irani",
             "123" => "Irati",
             "124" => "Irineópolis",
             "125" => "Itá",
             "126" => "Itaiópolis",
             "127" => "Itajaí",
             "128" => "Itapema",
             "129" => "Itapiranga",
             "130" => "Itapoá",
             "131" => "Ituporanga",
             "132" => "Jaborá",
             "133" => "Jacinto Machado",
             "134" => "Jaguaruna",
             "135" => "Jaraguá do Sul",
             "136" => "Jardinópolis",
             "137" => "Joaçaba",
             "138" => "Joinville",
             "139" => "José Boiteux",
             "140" => "Jupiá",
             "141" => "Lacerdópolis",
             "142" => "Lages",
             "143" => "Laguna",
             "144" => "Lajeado Grande",
             "145" => "Laurentino",
             "146" => "Lauro Müller",
             "147" => "Lebon Régis",
             "148" => "Leoberto Leal",
             "149" => "Lindóia do Sul",
             "150" => "Lontras",
             "151" => "Luiz Alves",
             "152" => "Luzerna",
             "153" => "Macieira",
             "154" => "Mafra",
             "155" => "Major Gercino",
             "156" => "Major Vieira",
             "157" => "Maracajá",
             "158" => "Maravilha",
             "159" => "Marema",
             "160" => "Massaranduba",
             "161" => "Matos Costa",
             "162" => "Meleiro",
             "163" => "Mirim Doce",
             "164" => "Modelo",
             "165" => "Mondaí",
             "166" => "Monte Carlo",
             "167" => "Monte Castelo",
             "168" => "Morro da Fumaça",
             "169" => "Morro Grande",
             "170" => "Navegantes",
             "171" => "Nova Erechim",
             "172" => "Nova Itaberaba",
             "173" => "Nova Trento",
             "174" => "Nova Veneza",
             "175" => "Novo Horizonte",
             "176" => "Orleans",
             "177" => "Otacílio Costa",
             "178" => "Ouro",
             "179" => "Ouro Verde",
             "180" => "Paial",
             "181" => "Painel",
             "182" => "Palhoça",
             "183" => "Palma Sola",
             "184" => "Palmeira",
             "185" => "Palmitos",
             "186" => "Papanduva",
             "187" => "Paraíso",
             "188" => "Passo de Torres",
             "189" => "Passos Maia",
             "190" => "Paulo Lopes",
             "191" => "Pedras Grandes",
             "192" => "Penha",
             "193" => "Peritiba",
             "194" => "Petrolândia",
             "195" => "Pinhalzinho",
             "196" => "Pinheiro Preto",
             "197" => "Piratuba",
             "198" => "Planalto Alegre",
             "199" => "Pomerode",
             "200" => "Ponte Alta do Norte",
             "201" => "Ponte Alta",
             "202" => "Ponte Serrada",
             "203" => "Porto Belo",
             "204" => "Porto União",
             "205" => "Pouso Redondo",
             "206" => "Praia Grande",
             "207" => "Presidente Castelo Branco",
             "208" => "Presidente Getúlio",
             "209" => "Presidente Nereu",
             "210" => "Princesa",
             "211" => "Quilombo",
             "212" => "Rancho Queimado",
             "213" => "Rio das Antas",
             "214" => "Rio do Campo",
             "215" => "Rio do Oeste",
             "216" => "Rio do Sul",
             "217" => "Rio dos Cedros",
             "218" => "Rio Fortuna",
             "219" => "Rio Negrinho",
             "220" => "Rio Rufino",
             "221" => "Riqueza",
             "222" => "Rodeio",
             "223" => "Romelândia",
             "224" => "Salete",
             "225" => "Saltinho",
             "226" => "Salto Veloso",
             "227" => "Sangão",
             "228" => "Santa Cecília",
             "229" => "Santa Helena",
             "230" => "Santa Rosa de Lima",
             "231" => "Santa Rosa do Sul",
             "232" => "Santa Terezinha",
             "233" => "Santa Terezinha do Progresso",
             "234" => "Santiago do Sul",
             "235" => "Santo Amaro da Imperatriz",
             "236" => "São Bento do Sul",
             "237" => "São Bernardino",
             "238" => "São Bonifácio",
             "239" => "São Carlos",
             "240" => "São Cristóvão do Sul",
             "241" => "São Domingos",
             "242" => "São Francisco do Sul",
             "243" => "São João Batista",
             "244" => "São João do Itaperiú",
             "245" => "São João do Oeste",
             "246" => "São João do Sul",
             "247" => "São Joaquim",
             "248" => "São José",
             "249" => "São José do Cedro",
             "250" => "São José do Cerrito",
             "251" => "São Lourenço do Oeste",
             "252" => "São Ludgero",
             "253" => "São Martinho",
             "254" => "São Miguel da Boa Vista",
             "255" => "São Miguel do Oeste",
             "256" => "São Pedro de Alcântara",
             "257" => "Saudades",
             "258" => "Schroeder",
             "259" => "Seara",
             "260" => "Serra Alta",
             "261" => "Siderópolis",
             "262" => "Sombrio",
             "263" => "Sul Brasil",
             "264" => "Taió",
             "265" => "Tangará",
             "266" => "Tigrinhos",
             "267" => "Tijucas",
             "268" => "Timbé do Sul",
             "269" => "Timbó",
             "270" => "Timbó Grande",
             "271" => "Três Barras",
             "272" => "Treviso",
             "273" => "Treze de Maio",
             "274" => "Treze Tílias",
             "275" => "Trombudo Central",
             "276" => "Tubarão",
             "277" => "Tunápolis",
             "278" => "Turvo",
             "279" => "União do Oeste",
             "280" => "Urubici",
             "281" => "Urupema",
             "282" => "Urussanga",
             "283" => "Vargeão",
             "284" => "Vargem",
             "285" => "Vargem Bonita",
             "286" => "Vidal Ramos",
             "287" => "Videira",
             "288" => "Vitor Meireles",
             "289" => "Witmarsum",
             "290" => "Xanxerê",
             "291" => "Xavantina",
             "292" => "Xaxim",
             "293" => "Zortéa",
         );
        return $municipio ? $municipios[$municipio] : $municipios;
    }

    public function getMunicipioSelect() {
        foreach ($this->getMunicipios() as $key => $value)
            $municipios[] = array("value" => $key, "text" => $value);
        return $municipios;
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
     * Set fone
     *
     * @param string $fone
     */
    public function setFone($fone) {
        $this->fone = $fone;
    }

    /**
     * Get fone
     *
     * @return string
     */
    public function getFone() {
        return $this->fone;
    }

    public function equals(UserInterface $user) {
        
    }

    public function eraseCredentials() {
        
    }

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
    public function addProjeto(\Fapesc\TutorialBundle\Entity\Projeto $projetos) {
        $this->projetos[] = $projetos;
    }

    /**
     * Get projetos
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getProjetos() {
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
            "municipios" => $this->getMunicipios(),
            "municipioSelect" => $this->getMunicipioSelect(),
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
        $this->setEmail($dados["email"]);
        $this->setFone($dados["fone"]);
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
}