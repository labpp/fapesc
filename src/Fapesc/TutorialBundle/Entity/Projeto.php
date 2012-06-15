<?php

namespace Fapesc\TutorialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Fapesc\TutorialBundle\Entity\Projeto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Projeto {

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $contrato
     *
     * @ORM\Column(name="contrato", type="string", length=12, nullable="true")
     */
    private $contrato;

    /**
     * @var string $titulo
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string $chamada
     *
     * @ORM\Column(name="chamada", type="string", length=255, nullable="true")
     */
    private $chamada;

    /**
     * @var string $area
     *
     * @ORM\Column(name="area", type="string", length=255, nullable="true")
     */
    private $area;

    /**
     * @var integer $municipio
     *
     * @ORM\Column(name="municipio", type="integer")
     */
    private $municipio;

    /**
     * @var string $regiao
     *
     * @ORM\Column(name="regiao", type="string", length=255, nullable="true")
     */
    private $regiao;

    /**
     * @var integer $sdr
     *
     * @ORM\Column(name="sdr", type="integer")
     */
    private $sdr;

    /**
     * @var date $inicio
     *
     * @ORM\Column(name="inicio", type="date", nullable="true")
     */
    private $inicio;

    /**
     * @var date $termino
     *
     * @ORM\Column(name="termino", type="date", nullable="true")
     */
    private $termino;

    /**
     * @var float $orcamento
     *
     * @ORM\Column(name="orcamento", type="float", nullable="true")
     */
    private $orcamento;

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
     * @var text $resumo
     *
     * @ORM\Column(name="resumo", type="text", nullable="true")
     */
    private $resumo;

    /**
     * @var boolean $ativo
     *
     * @ORM\Column(name="ativo", type="boolean")
     */
    private $ativo;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="projetos")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    protected $usuario;

    /**
     * @ORM\OneToMany(targetEntity="Meta", mappedBy="projeto")
     */
    protected $metas;

    /**
     * @ORM\OneToMany(targetEntity="Relatorio", mappedBy="projeto")
     */
    protected $relatorios;

    public function __construct() {
        $this->inicio = new \DateTime();
        $this->termino = new \DateTime();
        $this->ativo = true;
        $this->metas = new ArrayCollection();
        $this->relatorios = new ArrayCollection();
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
     * Set contrato
     *
     * @param string $contrato
     */
    public function setContrato($contrato) {
        $this->contrato = $contrato;
    }

    /**
     * Get contrato
     *
     * @return string
     */
    public function getContrato() {
        return $this->contrato;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Set chamada
     *
     * @param string $chamada
     */
    public function setChamada($chamada) {
        $this->chamada = $chamada;
    }

    /**
     * Get chamada
     *
     * @return string
     */
    public function getChamada() {
        return $this->chamada;
    }

    /**
     * Set area
     *
     * @param string $area
     */
    public function setArea($area) {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea() {
        return $this->area;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     */
    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    /**
     * Get municipio
     *
     * @return string
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
     * Set regiao
     *
     * @param string $regiao
     */
    public function setRegiao($regiao) {
        $this->regiao = $regiao;
    }

    /**
     * Get regiao
     *
     * @return string
     */
    public function getRegiao() {
        return $this->regiao;
    }

    /**
     * Set sdr
     *
     * @param string $sdr
     */
    public function setSdr($sdr) {
        $this->sdr = $sdr;
    }

    /**
     * Get sdr
     *
     * @return string
     */
    public function getSdr() {
        return $this->sdr;
    }
    public function getSdrs($sdr = false) {
        $sdrs = array(
            "1" => "Araranguá",
            "2" => "Blumenau",
            "3" => "Braço do Norte",
            "4" => "Brusque",
            "5" => "Caçador",
            "6" => "Campos Novos",
            "7" => "Canoinhas",
            "8" => "Chapecó",
            "9" => "Criciúma",
            "10" => "Concórdia",
            "11" => "Curitibanos",
            "12" => "Dionísio Cerqueira",
            "13" => "Grande Florianópolis",
            "14" => "Ibirama",
            "15" => "Itajaí",
            "16" => "Itapiranga",
            "17" => "Ituporanga",
            "18" => "Jaraguá do Sul",
            "19" => "Joaçaba",
            "20" => "Joinville",
            "21" => "Lages",
            "22" => "Laguna",
            "23" => "Mafra",
            "24" => "Maravilha",
            "25" => "Palmitos",
            "26" => "Quilombo",
            "27" => "Rio do Sul",
            "28" => "São Joaquim",
            "29" => "São Lourenço do Oeste",
            "30" => "São Miguel do Oeste",
            "31" => "Seara",
            "32" => "Taió",
            "33" => "Timbó",
            "34" => "Tubarão",
            "35" => "Videira",
            "36" => "Xanxerê",
         );
        return $sdr ? $sdrs[$sdr] : $sdrs;
    }
    public function getSdrSelect() {
        foreach ($this->getSdrs() as $key => $value)
            $sdrs[] = array("value" => $key, "text" => $value);
        return $sdrs;
    }

    /**
     * Set orcamento
     *
     * @param float $orcamento
     */
    public function setOrcamento($orcamento) {
        $this->orcamento = str_replace(array(".", ","), array("", "."), $orcamento);
    }

    /**
     * Get orcamento
     *
     * @return float
     */
    public function getOrcamento() {
        return number_format($this->orcamento, 2, ",", ".");
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
     * Set resumo
     *
     * @param text $resumo
     */
    public function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    /**
     * Get resumo
     *
     * @return text
     */
    public function getResumo() {
        return $this->resumo;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    /**
     * Get ativo
     *
     * @return boolean
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * Set inicio
     *
     * @param date $inicio
     */
    public function setInicio($inicio) {
        list($d, $m, $a) = explode("/", $inicio);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->inicio = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get inicio
     *
     * @return date
     */
    public function getInicio($format = "d/m/Y") {
        return $format ? $this->inicio->format($format) : $this->inicio;
    }

    /**
     * Set termino
     *
     * @param date $termino
     */
    public function setTermino($termino) {
        list($d, $m, $a) = explode("/", $termino);
        $d = ((int) $d > 31) ? 31 : (int) $d;
        $m = ((int) $m > 12) ? 12 : (int) $m;
        $this->termino = new \DateTime("{$a}-{$m}-{$d}");
    }

    /**
     * Get termino
     *
     * @return date
     */
    public function getTermino($format = "d/m/Y") {
        return $format ? $this->termino->format($format) : $this->termino;
    }

    /**
     * Add relatorios
     *
     * @param Fapesc\TutorialBundle\Entity\Relatorio $relatorios
     */
    public function addRelatorio(\Fapesc\TutorialBundle\Entity\Relatorio $relatorios) {
        $this->relatorios[] = $relatorios;
    }

    /**
     * Get relatorios
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRelatorios() {
        return $this->relatorios;
    }

    /**
     * Add metas
     *
     * @param Fapesc\TutorialBundle\Entity\Meta $metas
     */
    public function addMeta(\Fapesc\TutorialBundle\Entity\Meta $metas) {
        $this->metas[] = $metas;
    }

    /**
     * Get metas
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getMetas() {
        return $this->metas;
    }

    /**
     * Set usuario
     *
     * @param Fapesc\TutorialBundle\Entity\Usuario $usuario
     */
    public function setUsuario(\Fapesc\TutorialBundle\Entity\Usuario $usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return Fapesc\TutorialBundle\Entity\Usuario
     */
    public function getUsuario() {
        return $this->usuario;
    }

    public function toArray() {
        return array(
            "idProjeto" => $this->getId(),
            "contrato" => $this->getContrato(),
            "titulo" => $this->getTitulo(),
            "chamada" => $this->getChamada(),
            "area" => $this->getArea(),
            "municipio" => $this->getMunicipio(),
            "municipios" => $this->getMunicipios(),
            "municipioSelect" => $this->getMunicipioSelect(),
            "regiao" => $this->getRegiao(),
            "sdr" => $this->getSdr(),
            "sdrs" => $this->getSdrs(),
            "sdrSelect" => $this->getSdrSelect(),
            "inicio" => $this->getInicio(),
            "termino" => $this->getTermino(),
            "orcamento" => $this->getOrcamento(),
            "banco" => $this->getBanco(),
            "conta" => $this->getConta(),
            "agencia" => $this->getAgencia(),
            "resumo" => $this->getResumo(),
        );
    }

    public function populate($data) {
        $this->setContrato($data["contrato"]);
        $this->setTitulo($data["titulo"]);
        $this->setChamada($data["chamada"]);
        $this->setArea($data["area"]);
        $this->setMunicipio($data["municipio"]);
        $this->setRegiao($data["regiao"]);
        $this->setSdr($data["sdr"]);
        $this->setInicio($data["inicio"]);
        $this->setTermino($data["termino"]);
        $this->setOrcamento($data["orcamento"]);
        $this->setBanco($data["banco"]);
        $this->setConta($data["conta"]);
        $this->setAgencia($data["agencia"]);
    }

}