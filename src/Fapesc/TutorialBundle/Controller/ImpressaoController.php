<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Usuario;
use mpdf\mPDF;
use HTML;

class ImpressaoController extends FapescController {

    /**
     * @Route("/relatorio/{idRelatorio}/impressao")
     * @Template("FapescTutorialBundle:Impressao:impressao.html.twig")
     */
    public function impressaoAction($idRelatorio) {
        $dados["idRelatorio"] = $idRelatorio;
        return array_merge($this->usuario(), $this->menu("relatorio", "impressao", $idRelatorio), $this->info($this->findRelatorio($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    private function findRelatorio($idRelatorio) {
        $relatorio = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Relatorio")
                ->find($idRelatorio);
        if (!is_object($relatorio))
            throw new Exception("Relatório inválido!");
        //@TODO assegurar somente [relatórios > projetos > usuário]

        return $relatorio;
    }

    /**
     * @Route("/relatorio/{idRelatorio}/imprimir")
     */
    public function imprimirAction($idRelatorio) {
        $mpdf = $this->imprimeRelatorio($idRelatorio);
        $relatorio = $this->getDoctrine()->getRepository("FapescTutorialBundle:Relatorio")->find($idRelatorio);
        $projeto = $relatorio->getProjeto();
        $arquivo = $projeto->getTitulo() . "-" . $relatorio->getNota() . "-" . $relatorio->getLiberacao() . "-" . $relatorio->getRubrica(true);
        return new Response($mpdf->Output($arquivo, 'D'));
    }

    private function imprimeRelatorio($idRelatorio) {
        $relatorio = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Relatorio")
                ->find($idRelatorio);
        $projeto = $relatorio->getProjeto();
        define('_IMPRESSAO', '../src/Fapesc/TutorialBundle/Resources/views/Impressao/');

        require_once("../vendor/mpdf/mPDF.php");

        $mpdf = new \mPDF('pt', 'A4', 12, '', 8, 8, 53, 20, 9, 9);
        $mpdf->SetDisplayMode('fullpage');
        $titulosPaginas = array("00-cabecalho",
            "00-rodape",
            "00-geral",
            "00-capa",
            "01-checklist",
            "02-relatorio1",
            "02-relatorio2",
            "02-relatorio3",
            "03-conciliacao",
            "88-dispendio",
            "88-dispendioDiarias",
            "88-declaracaoDiarias",
            "88-dispendioPassagem",
            "88-dispendioSalario",);
        foreach ($titulosPaginas as $value) {
            $stylesheet = file_get_contents(_IMPRESSAO . 'CSS/' . $value . '.css');
            $mpdf->WriteHTML($stylesheet, 1);
        }
        $cabecalho = array(
            "projeto" => substr($projeto->getTitulo(), 0, 35),
            "coordenador" => $projeto->getUsuario()->getNome(),
            "contrato" => $projeto->getContrato(),
            "empenho" => $relatorio->getNota(),
            "chamada" => mb_substr($projeto->getChamada(), 0, 65),
        );

        $cabecalho = $this->escreve("00-cabecalho", $cabecalho);
        $mpdf->SetHTMLHeader($cabecalho);
        $rodape = $this->escreve("00-rodape", array());
        $mpdf->SetHTMLFooter($rodape);
        $paginas = $this->criaPaginas($idRelatorio);
        foreach ($paginas as $value) {
            if ($value[1]) {
                $mpdf->SetHTMLHeader(null);
                $mpdf->WriteHTML($value[0], 2);
                $mpdf->SetHTMLHeader($cabecalho);
            } else {
                $mpdf->AddPage();
                $mpdf->WriteHTML($value[0], 2);
            }
        }
        return $mpdf;
    }

    private function escreve($pagina, $dados) {
        define('_IMPRESSAO', '../src/Fapesc/TutorialBundle/Resources/views/Impressao/');
        $content = file_get_contents(_IMPRESSAO . $pagina . ".html");
        ob_start(); // Inicia o fluxo
        //Escreve a página
        echo "<body>";
        $content = file_get_contents(_IMPRESSAO . $pagina . ".html");
        //Substituição das váriaveis
        foreach ($dados as $key => $value)
            $content = str_replace("{{ " . $key . " }}", $value, $content);
        //Fim da substituição
        echo $content;
        echo "</body>";
        //Termina escrita
        $html = ob_get_contents(); // Pega o conteúdo escrito
        ob_end_clean(); // Finaliza o fluxo e limpa o buffer
        return $html;
    }

    private function criaPaginas($idRelatorio) {
        $relatorio = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Relatorio")
                ->find($idRelatorio);
        $projeto = $relatorio->getProjeto();
        $contrapartida = $this->geraTabelaEmpenhosContrapartida($idRelatorio, "Contrapartida");
        $empenho = $this->geraTabelaEmpenhosContrapartida($idRelatorio, "Empenho");
        $paginas = array();
        $tipos = $relatorio->getTipos();
	$tipo = $tipos[$relatorio->getTipo()];
        $municipios = $projeto->getMunicipios();
        $regioes = $projeto->getRegioes();
        $sdrs = $projeto->getSdrs();
        $cidade = $cidade[$numero];
        $dados = array(//capa
            "tipo" => strtoupper($tipo),
            "chamada" => $projeto->getChamada,
            "contrato" => $projeto->getContrato(),
            "empenho" => $relatorio->getNota(),
            "projeto" => $projeto->getTitulo(),
            "coordenador" => $projeto->getUsuario()->getNome(),
            "instituicao" => $projeto->getUsuario()->getInstituicao(),
            "data" => date("d/m/Y"),
        );
        $paginas[] = array(0 => $this->escreve("00-capa", $dados), false);
        $dados = array(//checklist
	    "tipoMinusculo" => strtolower($tipo),
            "nome" => $projeto->getUsuario()->getNome(),
            "data" => date("d/m/Y"),
            "projeto" => $projeto->getTitulo(),
            "contrato" => $projeto->getContrato(),
            "empenho" => $relatorio->getNota(),
            "chamada" => $projeto->getChamada(),
            "coordenador" => $projeto->getUsuario()->getNome(),
            "cpf" => $projeto->getUsuario()->getCpf(),
            "conta" => $projeto->getConta(),
            "agencia" => $projeto->getAgencia(),
            "tipo" => $tipos[$relatorio->getTipo()],
        );
        $paginas[] = array(0 => $this->escreve("01-checklist", $dados), false);
        $dados = array(//relatorio1
	    "tipo" => strtoupper($tipo),
            "projeto" => substr($projeto->getTitulo(), 0, 40),
            "coordenador" => $projeto->getUsuario()->getNome(),
            "area" => $projeto->getArea(),
            "local" => $municipios[$projeto->getMunicipio()] . "/" . $regioes[$projeto->getRegiao()] . "/" . $sdrs[$projeto->getSdr()],
            "instituicao" => $projeto->getUsuario()->getInstituicao(),
            "valorTotal" => "R$ " . $projeto->getOrcamento(),
            "inicio" => $projeto->getInicio(),
            "dataRelatorio" => date("d/m/Y"),
            "dataNL" => $relatorio->getLiberacao(),
            "valorNL" => "R$ " . $relatorio->getValor(),
            "resumo" => $projeto->getResumo(),
        );
        $paginas[] = array(0 => $this->escreve("02-relatorio1", $dados), false);
        $dados = array(//relatorio2
            "tabela" => $this->geraRelatorio($relatorio),
        );
        $paginas[] = array(0 => $this->escreve("02-relatorio2", $dados), false);
        $dados = array(//relatorio3
            "dataExtenso" => $municipios[$projeto->getMunicipio()] . $this->dataExtensa(),
            "coordenador" => $projeto->getUsuario()->getNome(),
            "cpf" => $projeto->getUsuario()->getCpf(),
            "resultado" => $relatorio->getResultado(),
            "justificativa" => $relatorio->getJustificativa(),
            "dificuldade" => $relatorio->getDificuldade(),
            "alteracao" => $relatorio->getAlteracao(),
        );
        $paginas[] = array(0 => $this->escreve("02-relatorio3", $dados), false);
        $conciliacao = $this->geraConciliacao($relatorio);
        $msgs = array(
            0 => "Caro Coordenador, substitua esta folha pela cópia impressa do balancete TC28 referente à nota de liberação " . $relatorio->getNota(),
            "Caro Coordenador, substitua esta folha pela cópia impressa do termo de Outorga de número " . $projeto->getContrato() . ".",
            "Caro Coordenador, substitua esta folha pela cópia impressa do plano de trabalho aprovado do projeto " . $projeto->getTitulo() . ".",
            "Caro Coordenador, substitua esta folha pelo(s) originai(s) do(s) memorando(s) de alteração orçamentária, ordenados por ordem cronológica de encaminhamento. Importante: tais documentos devem conter o deferimento da Gerência de Projetos da FAPESC.<br/> Caso não existam alterações no plano de aplicação dos recursos, apenas descarte esta folha.",
            "Caro Coordenador, cole aqui o extrato da conta bancária nº " . $projeto->getConta() . " / agência " . $projeto->getAgencia() . " - Banco " . $projeto->getBanco() . ". <br/>Caso a cópia impressa do extrato já esteja no formato A4, apenas substitua esta folha pelo referido documento.",
            "Caro Coordenador, substitua esta folha pelo demonstrativo de rendimentos relativo à conta bancária nº " . $projeto->getConta() . " / agência " . $projeto->getAgencia() . " - Banco " . $projeto->getBanco() . ".<br/> Caso a cópia impressa do extrato já esteja no formato A4, apenas substitua esta folha pelo referido documento.<br/> Caso não existam rendimentos a serem declarados, apenas descarte esta folha.",
            6 => array(//conciliacao
                "conta" => $projeto->getConta(),
                "agencia" => $projeto->getAgencia(),
                "banco" => $projeto->getBanco(),
                "data" => $conciliacao["data"],
                "coordenador" => $projeto->getUsuario()->getNome(),
                "cpf" => $projeto->getUsuario()->getCpf(),
                "tabela" => $conciliacao["tabela"],
                "saldo" => $conciliacao["saldo"],
                "total" => $conciliacao["total"],
                "diferenca" => $conciliacao["diferenca"],
            ),
            "Caro Coordenador, cole aqui o comprovante de transferência / depósito de recursos remanescentes da nota de liberação " . $relatorio->getNota() . ". <br/>Caso a cópia impressa do comprovante já esteja no formato A4, apenas substitua esta folha pelo referido documento.",
        );
        for ($i = 0; $i <= 7; $i++) {
            if ($i != 6)
                $paginas[] = array(0 => $this->escreve("88-paginaBranca", array("textoPaginaBranca" => $msgs[$i])), true);
            else
            if ($conciliacao["existe"])
                $paginas[] = array(0 => $this->escreve("03-conciliacao", $msgs[$i]), false); //conciliacao bancaria
        }
        if ($empenho[0] != 0) {
            $dados = array(//planoAplicao
                "titulo" => "LISTAGEM DE EMPENHOS",
                "tabela" => $empenho[1],
            );
            $paginas[] = array(0 => $this->escreve("04-listagem", $dados), false);
            $folhasCabecalho = $this->paginasDispendio($idRelatorio, "Empenho"); //$dados contem todas as paginas preenchidas para colar os documentos

            foreach ($folhasCabecalho as $folha)
                $paginas[] = array(0 => $folha[0], $folha[1]);
        }
        if ($contrapartida[0] != 0) {
            $dados = array(//contrapartida
                "titulo" => "LISTAGEM DE CONTRAPARTIDAS",
                "tabela" => $contrapartida[1],
            );
            $paginas[] = array(0 => $this->escreve("04-listagem", $dados), false);

            $folhasCabecalho = $this->paginasDispendio($idRelatorio, "Contrapartida"); //$dados contem todas as paginas preenchidas para colar os documentos
            foreach ($folhasCabecalho as $folha)
                $paginas[] = array(0 => $folha[0], $folha[1]);
        }
        $msg = "Caro Coordenador, substitua essa folha pela cópia impressa do pedido de registro de patrimônio dos bens adquiridos pela execução da nota de liberação " . $relatorio->getNota() . ".";
        if ($relatorio->getRubrica() == 1)//se for do tipo capital,imprime essa pagina
            $paginas[] = array(0 => $this->escreve("88-paginaBranca", array("textoPaginaBranca" => $msg)), true);

        return $paginas;
    }

    function geraTabela($header, $dados, $footer, $class) {
        //preenche linhas
        $qtdDados = sizeof($dados);
        if ($qtdDados != 0) {
            $qtdCol = sizeof($dados[0]);
            $linhas = $header;
            for ($i = 0; $i < $qtdDados; ++$i) {
                $linhas .= "<tr>";
                for ($j = 0; $j < $qtdCol; ++$j) {
                    //mostra conteudo da coluna
                    $k = $class[$j];
                    $classEscolhida = sizeof($k) == 0 ? '' : 'class=' . "'" . "$k" . "'";
                    $linhas .= "  <td $classEscolhida>" . $dados[$i][$j] . "</td>";
                }
                $linhas .= "</tr>";
            }
            $linhas .= $footer;
        }
        return $linhas;
    }

    function geraRelatorio($relatorio) {
        foreach ($relatorio->getProjeto()->getMetas() as $meta) {
            unset($resultadoR);
            unset($resultadoJ);
            foreach ($relatorio->getResultados() as $resultado) {
                if ($resultado->getMeta()->getId() == $meta->getId()) {
		     switch ($resultado->getResultado(false)) {
                                case "1": 
				    $resultadoR = "NA";
                                    break;
                                case "2":
				    $resultadoR = "PR";
                                    break;
                                case "3":
				    $resultadoR = "PA";
                                    break;
		    }
                    $resultadoJ = $resultado->getJustificativa();
                    break;
                }
            }
            $my_array[] = array($meta->getMeta(), $meta->getIndicador(), isset($resultadoR) ? $resultadoR : "NA", isset($resultadoJ) ? $resultadoJ : "Não se aplica");
        }
        $pagina = array(0 => "Relatorio");
        return $this->geraTabela($this->geraHeader($pagina), $my_array, $this->geraFooter($pagina), $this->geraClass($pagina));
    }

    function geraConciliacao($relatorio) {
        $my_array = array();
        $resposta = array();
        $conciliacao = $relatorio->getConciliacao();
        $resposta["existe"] = false;
        if (is_object($conciliacao)) {
            $resposta["existe"] = true;
            $resposta["data"] = $conciliacao->getData();
            $total = 0.0;
            $diferenca = 0.0;
            foreach ($conciliacao->getCheques() as $cheque) {
                $my_array[] = array($cheque->getNumero(), $cheque->getEmissao(), $cheque->getCompensacao(), "R$ " . $cheque->getValor());
                $total += $cheque->getValor(true);
            }
            $diferenca = $conciliacao->getSaldo(true) - $total;
            $resposta["saldo"] = "R$ " . $conciliacao->getSaldo();
            $resposta["total"] = "R$ " . number_format($total, 2, ",", ".");
            $resposta["diferenca"] = "R$ " . number_format($diferenca, 2, ",", ".");
        }

        $pagina = array(0 => "Conciliacao");

        $resposta["tabela"] = $this->geraTabela($this->geraHeader($pagina), $my_array, $this->geraFooter($pagina), $this->geraClass($pagina));


        return $resposta;
    }

    /**
      $pagina pode valer "Empenho" ou "Contrapartida"
     */
    function geraTabelaEmpenhosContrapartida($idRelatorio, $pagina) {
        $dados = $this->dadosTabelas($idRelatorio, $pagina);
        $total = $dados[0];
        $my_array = $dados[1];

        $titulos = array(
            1 => array(1 => "Equipamentos", 5, 1),
            2 => array(1 => "Mobiliário", 5, 1),
            3 => array(1 => "Bibliografia", 5, 1),
            4 => array(1 => "Serviços – Pessoa Física", 3),
            5 => array(1 => "Serviços – Pessoa Jurídica", 3),
            6 => array(1 => "Passagens", 4, 1),
            7 => array(1 => "Diárias", 5, 2),
            8 => array(1 => "Bolsas", 4, 2),
            9 => array(1 => "Material de Consumo", 5, 1),
            10 => array(1 => "Salários e Encargos", 6),
        );
        $tabelas = "";
        if ($pagina == "Empenho") {
            $header = array(0 => "planoAplicacao");
            $footer = array(0 => "planoAplicacao");
        } else {
            $header = array(0 => "contrapartida");
            $footer = array(0 => "contrapartida");
        }
        $tam = sizeof($my_array);
        $contaSub = 1;
        for ($j = 1; $j <= 10; $j++) {
            $contDados = sizeof($my_array[$j]);
            if ($contDados != 0) {
                $colunas = $titulos[$j];
                $subTitulo = "<h4>" . $contaSub . "." . "$colunas[1]" . "</h4>";
                $contaSub++;
                $tabelas .= $subTitulo;
                $footer[1] = $colunas[2] - 1;
                $header[1] = $colunas[2];
                $header[2] = $colunas[3];
                $vtotal = $total[$j];
                $tabelas .= $this->geraTabela($this->geraHeader($header), $my_array[$j], $this->geraFooter($footer, $vtotal), $this->geraClass($header));
            }
        }
        return array(0 => number_format($total[0], 2, ",", "."), $tabelas);
    }

    function dadosTabelas($idRelatorio, $pagina) {//$pagina = "Contrapartida" ou "Empenho"
        $my_array = array();
        $total = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $itens = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:" . $pagina)->findBy(array("relatorio" => $idRelatorio));
        if (!empty($itens)) {
            foreach ($itens as $item) {
                $k = 0;
                $valor = 0;
                unset($dados);
                switch ($item->getCategoria()) {
                    case "1": //dispendio
                        $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($item->getItem());
                        if (is_object($dispendio)) {
                            $valor = $dispendio->getTotal(true);
                            switch ($dispendio->getCategoria()) {
                                case "1": //bibliografia
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), $dispendio->getQuantidade(), "R$ " . $dispendio->getUnitario(), "R$ " . $dispendio->getTotal());
                                    $k = 3;
                                    break;
                                case "2": //equipamento
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), $dispendio->getQuantidade(), "R$ " . $dispendio->getUnitario(), "R$ " . $dispendio->getTotal());
                                    $k = 1;
                                    break;
                                case "3": //mobiliario
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), $dispendio->getQuantidade(), "R$ " . $dispendio->getUnitario(), "R$ " . $dispendio->getTotal());
                                    $k = 2;
                                    break;
                                case "4": //pessoaFisica
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), "R$ " . $dispendio->getTotal());
                                    $k = 4;
                                    break;
                                case "5": //pessoaJuridica
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), "R$ " . $dispendio->getTotal());
                                    $k = 5;
                                    break;
                                case "6": //aluguel
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), "R$ " . $dispendio->getTotal());
                                    $k = 1;
                                    break;
                                case "7": //material
                                    $dados = array($dispendio->getData(), $dispendio->getDescricao(), $dispendio->getQuantidade(), "R$ " . $dispendio->getUnitario(), "R$ " . $dispendio->getTotal());
                                    $k = 9;
                                    break;
                            }
                        }
                        break;
                    case "2": //bolsa
                        $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($item->getItem());
                        if (is_object($bolsa)) {
                            $valor = $bolsa->getValor(true);
                            $bolsa = $bolsa->toArray();
                            $periodo = $bolsa["inicio"] . " - " . $bolsa["fim"];
                            $dados = array($bolsa["data"], $bolsa["bolsista"]["nome"], $periodo, "R$ " . $bolsa["valor"]);
                            $k = 8;
                        }
                        break;
                    case "3": //passagem
                        $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($item->getItem());
                        if (is_object($passagem)) {
                            $valor = $passagem->getValor(true);
                            $passagem = $passagem->toArray();
                            list($saida, $h) = explode(" ", $passagem["saida"]);
                            list($chegada, $h) = explode(" ", $passagem["chegada"]);
                            $periodo = $saida . " - " . $chegada;
                            $dados = array($passagem["compra"], $passagem["descricao"], $periodo, "R$ " . $passagem["total"]);
                            $k = 6;
                        }
                        break;
                    case "4": //diaria
                        $diaria = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Diaria")->find($item->getItem());
                        if (is_object($diaria)) {
                            $valor = $diaria->getValor(true);
                            $precoUnid = $diaria->getValor(true) / $diaria->getQuantidade(true);
                            $precoUnid = "R$ " . number_format($precoUnid, 2, ",", ".");
                            $diaria = $diaria->toArray();
                            $dados = array($diaria["inicio"], $diaria["fim"], $precoUnid, $diaria["quantidade"], "R$ " . $diaria["valor"]);
                            $k = 7;
                        }
                        break;
                    case "5": //salario
                        $salario = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Salario")->find($item->getItem());
                        if (is_object($salario)) {
                            $valor = $salario->getProporcional(true);
                            $salario = $salario->toArray();
                            $pesquisador = $salario["pesquisador"];
                            $dados = array($salario["data"], $pesquisador["nome"], $salario["carga"], $salario["data"], "R$ " . $salario["bruto"], "R$ " . $salario["proporcional"]);
                            $k = 10;
                        }
                        break;
                }
                if (isset($dados)) {
                    $total[$k] += $valor;
                    $total[0] += $valor;
                    $my_array[$k][] = $dados;
                }
            }
        }
        for ($i = 1; $i <= 10; $i++)
            $my_array[$i] = $this->bubbleSort($my_array[$i]);
        return array(0 => $total, $my_array);
    }

    function paginasDispendio($idRelatorio, $pagina) {//$pagina = "Contrapartida" ou "Empenho"
        $relatorio = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Relatorio")
                ->find($idRelatorio);
        $projeto = $relatorio->getProjeto();
        $my_array = array();
        $itens = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:" . $pagina)->findBy(array("relatorio" => $idRelatorio));
        if (!empty($itens))
            foreach ($itens as $item) {
                unset($dados);
                switch ($item->getCategoria()) {
                    case "1": //dispendio
                        $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($item->getItem());
                        if (is_object($dispendio))
                            $dados = array($dispendio->getData(), $dispendio, 1);
                        break;
                    case "2": //bolsa
                        $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($item->getItem());
                        if (is_object($bolsa))
                            $dados = array($bolsa->getData(false), $bolsa, 2);
                        break;
                    case "3": //passagem
                        $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($item->getItem());
                        if (is_object($passagem))
                            $dados = array($passagem->getCompra(), $passagem, 3);
                        break;
                    case "4": //diaria
                        $diaria = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Diaria")->find($item->getItem());
                        if (is_object($diaria))
                            $dados = array($diaria->getInicio(), $diaria, 4);
                        break;
                    case "5": //salario
                        $salario = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Salario")->find($item->getItem());
                        if (is_object($salario))
                            $dados = array($salario->getData(), $salario, 5);
                        break;
                }//fim switch
                if (isset($dados))
                    $my_array[] = $dados;
            }//fim foreach
        $paginas = array();
        $my_array = $this->bubbleSort($my_array);
        foreach ($my_array as $item) {
            if ($item[2] == 1) {//nao precisa de anexos extras
                $dispendio = $item[1]->toArray();
                $fornecedor = $dispendio["fornecedor"];
                $dados = array(
                    "titulo" => $pagina == "Empenho" ? "LISTAGEM DE EMPENHOS" : "LISTAGEM DE CONTRAPARTIDAS",
                    "descricaoTit" => $pagina == "Empenho" ? "do Empenho" : "da Contrapartida",
                    "fornecedor" => $fornecedor["nome"],
                    "cnpj" => $fornecedor["cadastro"],
                    "descricao" => $dispendio["descricao"],
                    "documentoFiscal" => $dispendio["documento"],
                    "dataEmissao" => $dispendio["data"],
                    "valor" => $dispendio["total"],
                    "noChequeRecibo" => $dispendio["comprovante"],
                    "dataPagamento" => $dispendio["data"],
                );
                $paginas[] = array($this->escreve("88-dispendioFiscal", $dados), false);
            } else {
                switch ($item[2]) {
                    case "2"://bolsa
                        $nome = $item[1]->getBolsista()->getNome();
                        $periodo = $bolsa->getInicio(false) . " a " . $bolsa->getFim(false);
                        $msg = "Caro Coordenador, substitua esta folha pelos recibos de pagamento de bolsas(e respectivos comprovantes de depósito) em benefício de $nome, referente ao período $periodo.";
                        $paginas[] = array(0 => $this->escreve("88-paginaBranca", array("textoPaginaBranca" => $msg)), true);
                        break;

                    case "3"://passagem
                        $saidaChegada = $item[1]->getSaida("d/m/Y") . " - " . $item[1]->getChegada("d/m/Y");
                        $passagem = $item[1]->toArray();
                        $dados = array(
                            "data" => $passagem["compra"],
                            "trecho" => $passagem["descricao"],
                            "saidaChegada" => $saidaChegada,
                            "vTotal" => "R$ " . $passagem["total"],
                            "mensagem" => "Caro Coordenados,</br> fixe aqui o bilhete de passagem / cartão de embarque referente ao trecho" . $passagem["descrição"] . ", emitido pela companhia " . $passagem["fornecedor"]["nome"] . " em " . $passagem["compra"] . ", no valor de R$ " . $passagem["total"] . " e seu respectivo comprovante de pagamento.",
                        );
                        $paginas[] = array($this->escreve("88-dispendioPassagem", $dados), false);
                        break;
                    case "4"://diaria
                        $precoDiaria = $item[1]->getValor(true) / $item[1]->getQuantidade(true);
                        $precoDiaria = "R$ " . number_format($precoDiaria, 2, ",", ".");
                        $diaria = $item[1]->toArray();
                        $municipios = $projeto->getMunicipios();
                        $dados = array(
                            "beneficiario" => $diaria["beneficiario"],
                            "cpf" => $diaria["cpf"],
                            "numero" => $projeto->getContrato(),
                            "valor" => $diaria["valor"],
                            "diarias" => $diaria["quantidade"],
                            "objetivos" => $diaria["objetivos"],
                            "resultados" => $diaria["resultados"],
                            "dataExtenso" => $municipios[$projeto->getMunicipio()] . $this->dataExtensa(),
                        );
                        $paginas[] = array($this->escreve("88-declaracaoDiarias", $dados), false);
                        $dados = array(
                            "mensagem" => "Caro Coordenador, substitua esta folha pelos recibos de pagamento de bolsas(e respectivos comprovantes de depósito) em benefício de $nome, referente ao período $periodo.",
                            "data" => $diaria["inicio"],
                            "objetivo" => $diaria["objetivos"],
                            "diaria" => $precoDiaria,
                            "quantidade" => $diaria["quantidade"],
                            "vTotal" => "R$ " . $diaria["valor"],
                        );
                        $qtdPaginas = $diaria["documentos"];
                        for ($i = 0; $i < $qtdPaginas; $i++) {
                            $dados["numRom"] = $i + 1;
                            $paginas[] = array($this->escreve("88-dispendioDiarias", $dados), false);
                        }
                        break;
                    case "5"://salario
                        $salario = $item[1]->toArray();
                        $nome = $salario["pesquisador"]["nome"];
                        $periodo = $salario["data"];
                        $valor = "R$ " . $salario["bruto"];
                        $dados = array(
                            "mensagem" => "Caro Coordenador, fixe aqui a cópia do contracheque / holerite referente ao pesquisador $nome, período $periodo, no valor bruto de $valor",
                            "data" => $periodo,
                            "nome" => $nome,
                            "periodo" => $periodo,
                            "valor" => $valor,
                        );
                        $paginas[] = array($this->escreve("88-dispendioSalario", $dados), false);
                }
            }
        }
        return $paginas;
    }

    function geraHeader($pagina) {
        $header = "";
        if ($pagina[0] == "Relatorio") {
            $header = "<table border=1 width=100% cellspacing=0 bordercolor='#000'  style=border-collapse:'collapse'>
					<tr>
					<td class='centro'>	Meta		</td>
					<td class='centro'>	Indicador	</td>
					<td class='centro'>	Resultados	</td>
					<td class='centro'>	Observações	</td>
					</tr>";
        }
        if ($pagina[0] == "Conciliacao") {
            $header = "<table border=1 width=100% cellspacing=0 bordercolor='#000'  style=border-collapse:'collapse'>
					<tr>
					<td class='numero'>		Número do cheque		</td>
					<td class='data'>		Data de emissão			</td>
					<td class='data'>		A compensar em		</td>
					<td class='valorTitulo'>	Valor(R$)			</td>
					</tr>";
        }
        if ($pagina[0] == "planoAplicacao" || $pagina[0] == "contrapartida") {
            $header = "<table class='tabela1'> 
				   <tr>	  ";
            switch ($pagina[1]) {

                case 3://pessoa juridica ou pessoa fisica
                    $header .= "<td class='data'>	        Data de Contratação	</td>
						    <td class='descricao3'>	Descrição 		</td>
						    <td class='vTotal'>		Valor Total     	</td>";
                    break;
                case 4:
                    if ($pagina[2] == 1) {//passagens
                        $header .= "<td class='data'>	        Data de Aquisição	</td>
							    <td class='trecho'>		Trecho	 		</td>
						            <td class='data2'>		Saída - Chegada 	</td>
							    <td class='vTotal'>		Valor Total     	</td>";
                    } else {//bolsa
                        $header .= "<td class='data'>	        Data de Pag.	</td>
							    <td class='nome'>           Bolsista 	</td>
						            <td class='data2'>		Período 	</td>
							    <td class='vTotal'>		Valor Total     </td>";
                    }
                    break;
                case 5:
                    if ($pagina[2] == 1) {//equipamento ou mobiliario ou bibliografia ou material de consumo
                        $header .= "<td class='data'>	        Data de Aquisição	</td>
							    <td class='descricao5'>	Descrição		</td>
						            <td class='qtd'>		Quantidade 		</td>
						            <td class='vUnit'>		Valor Unitário	 	</td>
							    <td class='vTotal'>		Valor Total     	</td>";
                    } else {//diaria
                        $header .= "<td class='data'>	        Data de Saída	</td>
							    <td class='objetivo'>	Data de Retorno		</td>
						            <td class='vUnit'>		Valor Diária 		</td>
						            <td class='qtd'>		Quantidade 		</td>
							    <td class='vTotal'>		Valor Total	        </td>";
                    }
                    break;
                case 6://salarios
                    $header .= "<td class='data'>	Data Pag.             </td>
						    <td class='nome'>	Pesquisador           </td>
					    	    <td class='carga'>	Carga Mensal          </td>
					    	    <td class='data2'>	Periodo de Referência </td>
					    	    <td class='vTotal'>	Valor Bruto	      </td>
					    	    <td class='vTotal'>	Valor Proporcional    </td>";
                    break;
            }
        }
        return $header;
    }

    function geraFooter($pagina, $vTotal = 0) {
        $footer = "";
        if ($pagina[0] == "Relatorio") {
            $footer = "</table>";
        }
        if ($pagina[0] == "Conciliacao") {
            $footer = "</table>";
        }
        if ($pagina[0] == "planoAplicacao" || $pagina[0] == "contrapartida") {
            $j = $pagina[1];
            $vTotal = "R$ " . number_format($vTotal, 2, ",", ".");
            $footer = "	  <tr>
						<td class='total' colspan ='$j'>		Total: 		    </td>
						<td class='vTotalFooter'>			$vTotal 	    </td>
					  </tr>
				   </table>";
        }
        return $footer;
    }

    function geraClass($pagina) {
        $class = "";
        if ($pagina[0] == "Relatorio") {
            $class = array(0 => "esquerda", "esquerda", "centro", "esquerda");
        }
        if ($pagina[0] == "Conciliacao") {
            $class = array(0 => "numero", "data", "data", "valor");
        }
        if ($pagina[0] == "planoAplicacao" || $pagina[0] == "contrapartida") {
            $class = array();
            $class[] = "data";
            for ($i = 0; $i < $pagina[1] - 2; $i++)
                $class[] = "itens";
            $class[] = "vTotal";
        }
        return $class;
    }

    function bubbleSort($items) {
        $temp = "";
        $size = sizeof($items);
        for ($i = 1; $i < $size; $i++)
            for ($j = 0; $j < $size - $i; $j++) {
                $data1 = explode("/", $items[$j + 1][0]);
                $data1 = $data1[0] + 100 * ($data1[1] + 100 * $data1[2]); //invertendo a data e transformando em numero
                $data2 = explode("/", $items[$j][0]);
                $data2 = $data2[0] + 100 * ($data2[1] + 100 * $data2[2]); //(dd/mm/aaaa) => aaaammdd
                if ($data1 < $data2) {
                    $temp = $items[$j];
                    $items[$j] = $items[$j + 1];
                    $items[$j + 1] = $temp;
                }
            }
        return $items;
    }

    function dataExtensa() {
        $data = explode("/", date("d/m/Y"));
        switch ($data[1]) {
            case "1": $data[1] = "janeiro";
                break;
            case "2": $data[1] = "fevereiro";
                break;
            case "3": $data[1] = "março";
                break;
            case "4": $data[1] = "abril";
                break;
            case "5": $data[1] = "maio";
                break;
            case "6": $data[1] = "junho";
                break;
            case "7": $data[1] = "julho";
                break;
            case "8": $data[1] = "agosto";
                break;
            case "9": $data[1] = "setembro";
                break;
            case "10": $data[1] = "outubro";
                break;
            case "11": $data[1] = "novembro";
                break;
            case "12": $data[1] = "dezembro";
                break;
        }
        return ", " . $data[0] . " de " . $data[1] . " de " . $data[2] . ".";
    }

}

