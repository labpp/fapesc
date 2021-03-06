<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Projeto;
use Fapesc\TutorialBundle\Entity\Relatorio;
use Fapesc\TutorialBundle\Entity\Resultado;
use Fapesc\TutorialBundle\Entity\Empenho;
use Fapesc\TutorialBundle\Entity\Contrapartida;
use Fapesc\TutorialBundle\Entity\Dispendio;
use Fapesc\TutorialBundle\Entity\Fornecedor;
use Fapesc\TutorialBundle\Entity\Bolsa;
use Fapesc\TutorialBundle\Entity\Bolsista;
use Fapesc\TutorialBundle\Entity\Passagem;
use Fapesc\TutorialBundle\Entity\Conciliacao;
use Fapesc\TutorialBundle\Entity\Cheque;

class RelatorioController extends FapescController {

    protected function find($idRelatorio) {
        $relatorio = $this->getDoctrine()->getRepository("FapescTutorialBundle:Relatorio")->find($idRelatorio);
        if (!is_object($relatorio)) //@TODO assegurar somente relatorio->projeto->usuario
            throw new Exception("Relatório inválido!");
        return $relatorio;
    }

    /**
     * @Route("/relatorio/{idRelatorio}/dados")
     * @Template("FapescTutorialBundle:Relatorio:dados.html.twig")
     */
    public function dadosAction($idRelatorio, $idProjeto = null) {
        $relatorio = ($idRelatorio == 0) ? new Relatorio() : $this->find($idRelatorio);
        $dados = $relatorio->toArray();
        $projetos = $this->getDoctrine()->getRepository("FapescTutorialBundle:Projeto")->findBy(
                array(
            "usuario" => $this->get("security.context")->getToken()->getUser()->getId(),
            "ativo" => true), array(
            "inicio" => "DESC",
            "termino" => "DESC",
            "titulo" => "ASC"));
        $dados["projetos"] = array();
        if (!empty($projetos))
            foreach ($projetos as $projeto)
                $dados["projetos"][] = $projeto->toArray();
        $dados["projeto"] = empty($idProjeto) ? 0 : $idProjeto;
        return array_merge(
                        $this->usuario(), $this->menu("relatorio", "dados", $idRelatorio), $this->info($relatorio->getProjeto()->getId(), $idRelatorio), $dados
        );
    }

    /**
     * @Route("/relatorio/{idRelatorio}/dados/post")
     * @Template()
     */
    public function dadosPostAction($idRelatorio) {
        $em = $this->getDoctrine()->getEntityManager();
        $projeto = $this->getDoctrine()->getRepository("FapescTutorialBundle:Projeto")->find($_POST["projeto"]);
        if ($idRelatorio == 0) { //inclui novo
            $relatorio = new Relatorio();
            $relatorio->populateDados($_POST);
            $relatorio->setProjeto($projeto);
            $em->persist($relatorio);
            $em->flush();
            $acao = "registrado";

            //para cada meta do projeto, clonar resultado do relatorio anterior (se houver)
            $relatorios = $this->getDoctrine()->getRepository("FapescTutorialBundle:Relatorio")->findBy(array("projeto" => $projeto->getId(), "ativo" => true), array("liberacao" => "DESC"));
            $anterior = false;
            foreach ($relatorios as $r) {
                if ($r->getId() != $relatorio->getId()) {
                    $anterior = $r;
                    break;
                }
            }
            $metas = $this->getDoctrine()->getRepository("FapescTutorialBundle:Meta")->findBy(array("projeto" => $projeto->getId()));
            foreach ($metas as $meta) {
                $resultado = new Resultado();
                if (is_object($anterior)) {
                    $a = $this->getDoctrine()->getRepository("FapescTutorialBundle:Resultado")->findOneBy(array("meta" => $meta->getId(), "relatorio" => $anterior->getId()));
                    $resultado->populate($a->toArray());
                }
                $resultado->setMeta($meta);
                $resultado->setRelatorio($relatorio);
                $em->persist($resultado);
                $em->flush();
            }
        } else { //edita existente
            $relatorio = $this->find($idRelatorio);
            $relatorio->populateDados($_POST);
            $relatorio->setProjeto($projeto);
            $em->flush();
            $acao = "editado";
        }

        $this->get("session")->setFlash("sucesso", "Relatório {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Relatorio:relatorio", array("idRelatorio" => $relatorio->getId()));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/relatorio")
     * @Template("FapescTutorialBundle:Relatorio:relatorio.html.twig")
     */
    public function relatorioAction($idRelatorio) {
        return array_merge($this->usuario(), $this->menu("relatorio", "relatorio", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->find($idRelatorio)->toArray());
    }

    /**
     * @Route("/relatorio/{idRelatorio}/relatorio/post")
     * @Template()
     */
    public function relatorioPostAction($idRelatorio) {
        $em = $this->getDoctrine()->getEntityManager();
        $relatorio = $this->find($idRelatorio);
        $relatorio->populateRelatorio($_POST);
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Relatório editado com sucesso!");
        return $this->forward("FapescTutorialBundle:Relatorio:metas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/metas")
     * @Template("FapescTutorialBundle:Relatorio:metas.html.twig")
     */
    public function metasAction($idRelatorio) {
        $metas = $this->getDoctrine()->getRepository("FapescTutorialBundle:Meta")->findBy(array("projeto" => $this->find($idRelatorio)->getProjeto()->getId()));
        if (empty($metas)) {
            $dados["metas"] = array();
        } else {
            foreach ($metas as $meta) {
                $resultado = $this->getDoctrine()->getRepository("FapescTutorialBundle:Resultado")->findOneBy(array("relatorio" => $idRelatorio, "meta" => $meta->getId()));
                if (!is_object($resultado))
                    $resultado = new Resultado();
                $dados["metas"][$meta->getId()] = array(
                    "id" => $meta->getId(),
                    "meta" => (strlen($meta->getMeta()) > 50) ? trim(substr($meta->getMeta(), 0, 50)) . "..." : $meta->getMeta(),
                    "resultado" => $resultado->getResultados($resultado->getResultado()),
                    "justificativa" => (strlen($resultado->getJustificativa()) > 50) ? trim(substr($resultado->getJustificativa(), 0, 50)) . "..." : $resultado->getJustificativa(),
                );
            }
        }
        $dados["idRelatorio"] = $idRelatorio;
        return array_merge($this->usuario(), $this->menu("relatorio", "metas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/meta/{idMeta}")
     * @Template("FapescTutorialBundle:Relatorio:meta.html.twig")
     */
    public function metaAction($idRelatorio, $idMeta) {
        $meta = $this->getDoctrine()->getRepository("FapescTutorialBundle:Meta")->findOneBy(array("id" => $idMeta));
        if (!is_object($meta))
            $meta = new Meta();
        $resultado = $this->getDoctrine()->getRepository("FapescTutorialBundle:Resultado")->findOneBy(array("meta" => $idMeta, "relatorio" => $idRelatorio));
        if (!is_object($resultado))
            $resultado = new Resultado();
        $dados = array_merge($resultado->toArray(), $meta->toArray());
        $dados["idRelatorio"] = $idRelatorio;
        return array_merge($this->usuario(), $this->menu("relatorio", "metas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/meta/{idMeta}/post")
     * @Template()
     */
    public function metaPostAction($idRelatorio, $idMeta) {
        $em = $this->getDoctrine()->getEntityManager();
        $resultado = $em->getRepository("FapescTutorialBundle:Resultado")->findOneBy(array("meta" => $idMeta, "relatorio" => $idRelatorio));
        if (!is_object($resultado)) { //inclui novo
            $resultado = new Resultado();
            $resultado->setResultado($_POST["resultado"]);
            $resultado->setJustificativa($_POST["justificativa"]);
            $resultado->setMeta($em->getRepository("FapescTutorialBundle:Meta")->find($idMeta));
            $resultado->setRelatorio($this->find($idRelatorio));
            $em->persist($resultado);
        } else { //edita existente
            $resultado->setResultado($_POST["resultado"]);
            $resultado->setJustificativa($_POST["justificativa"]);
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Meta alterada com sucesso!");
        return $this->forward("FapescTutorialBundle:Relatorio:metas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/conciliacao")
     * @Template("FapescTutorialBundle:Relatorio:conciliacao.html.twig")
     */
    public function conciliacaoAction($idRelatorio) {
        $conciliacao = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Conciliacao")
                ->findOneBy(array("relatorio" => $idRelatorio));
        if (!is_object($conciliacao)) { //exibe formulário
            return $this->forward("FapescTutorialBundle:Relatorio:extrato", array("idRelatorio" => $idRelatorio));
        } else { //exibe listagem de cheques
            $dados["idRelatorio"] = $idRelatorio;
            $dados["data"] = $conciliacao->getData();
            $dados["saldo"] = $conciliacao->getSaldo();
            $cheques = $this->getDoctrine()
                    ->getRepository("FapescTutorialBundle:Cheque")
                    ->findBy(array("conciliacao" => $conciliacao->getId()));
            $total = 0;
            if (empty($cheques)) {
                $dados["cheques"] = array();
            } else {
                foreach ($cheques as $cheque) {
                    $dados["cheques"][] = $cheque->toArray();
                    $total += $cheque->getValor(true);
                }
            }
            $dados["total"] = number_format($total, 2, ",", ".");
            $dados["real"] = number_format($conciliacao->getSaldo(true) - $total, 2, ",", ".");
            return array_merge($this->usuario(), $this->menu("relatorio", "conciliacao", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
        }
    }

    /**
     * @Route("/relatorio/{idRelatorio}/extrato")
     * @Template("FapescTutorialBundle:Relatorio:extrato.html.twig")
     */
    public function extratoAction($idRelatorio) {
        $conciliacao = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Conciliacao")
                ->findOneBy(array("relatorio" => $idRelatorio));
        if (!is_object($conciliacao))
            $conciliacao = new Conciliacao();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["data"] = $conciliacao->getData();
        $dados["saldo"] = $conciliacao->getSaldo();
        return array_merge($this->usuario(), $this->menu("relatorio", "conciliacao", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/extrato/post")
     * @Template()
     */
    public function extratoPostAction($idRelatorio) {
        $em = $this->getDoctrine()->getEntityManager();
        $conciliacao = $em->getRepository("FapescTutorialBundle:Conciliacao")->findOneBy(array("relatorio" => $idRelatorio));
        if (!is_object($conciliacao)) { //inclui novo
            $conciliacao = new Conciliacao();
            $conciliacao->setData($_POST["data"]);
            $conciliacao->setSaldo($_POST["saldo"]);
            $conciliacao->setRelatorio($this->find($idRelatorio));
            $this->find($idRelatorio)->setConciliacao($conciliacao);
            $em->persist($conciliacao);
            $acao = "incluído";
        } else { //edita existente
            $conciliacao->setData($_POST["data"]);
            $conciliacao->setSaldo($_POST["saldo"]);
            $acao = "alterado";
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Extrato {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Relatorio:conciliacao", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/cheque/{idCheque}")
     * @Template("FapescTutorialBundle:Relatorio:cheque.html.twig")
     */
    public function chequeAction($idRelatorio, $idCheque) {
        $cheque = ($idCheque == 0) ? new Cheque() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Cheque")->find($idCheque);
        $dados = $cheque->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        return array_merge($this->usuario(), $this->menu("relatorio", "conciliacao", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/cheque/{idCheque}/post")
     * @Template()
     */
    public function chequePostAction($idRelatorio, $idCheque) {
        $em = $this->getDoctrine()->getEntityManager();
        $cheque = $em->getRepository("FapescTutorialBundle:Cheque")->find($idCheque);
        $conciliacao = $em->getRepository("FapescTutorialBundle:Conciliacao")->findOneBy(array("relatorio" => $idRelatorio));
        if (!is_object($cheque)) { //inclui novo
            $cheque = new Cheque();
            $cheque->populate($_POST);
            $cheque->setConciliacao($conciliacao);
            $em->persist($cheque);
            $acao = "incluído";
        } else { //edita existente
            $cheque->populate($_POST);
            $acao = "alterado";
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Cheque {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Relatorio:conciliacao", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/cheque/{idCheque}/delete")
     * @Template()
     */
    public function chequeDeleteAction($idRelatorio, $idCheque) {
        $em = $this->getDoctrine()->getEntityManager();
        $cheque = $em->getRepository("FapescTutorialBundle:Cheque")->find($idCheque);
        $em->remove($cheque);
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Cheque deletado com sucesso!");
        return $this->forward("FapescTutorialBundle:Relatorio:conciliacao", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/tc28")
     * @Template("FapescTutorialBundle:Relatorio:tc28.html.twig")
     */
    public function tc28Action($idRelatorio) {
        $dados[] = array();
        $dados["tc28"] = array();
        $relatorio = $this->getDoctrine()->getRepository("FapescTutorialBundle:Relatorio")->find($idRelatorio);
        $projeto = $relatorio->getProjeto();
	$municipios = $projeto->getMunicipios();

	$dados["coordenador"] = $projeto->getUsuario()->getNome();
	$dados["cpf"] = $projeto->getUsuario()->getCpf();
	$dados["valorNL"] = "R$ " . $relatorio->getValor();
	$dados["data1aCP"] = "------";
	$dados["local"] = $municipios[$projeto->getMunicipio()] . " - " . $dados["coordenador"] ;
        $dados["nota"] = $relatorio->getNota();
        $contador = 0;
        $paginas = array("Contrapartida" => "CP", "Empenho" => "FAP");
        $totalCP = 0.0;
        $totalFAP = 0.0;
        foreach ($paginas as $key => $value) {
            $itens = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:" . $key)->findBy(array("relatorio" => $idRelatorio));
            if (!empty($itens))
                foreach ($itens as $item) {
                    unset($dado);
                    switch ($item->getCategoria()) {
                        case "1": //dispendio
                            $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($item->getItem());
                            if (is_object($dispendio)) {
                                if ($value == "CP")
                                    $totalCP += $dispendio->getTotal(true);
                                else
                                    $totalFAP += $dispendio->getTotal(true);
                                $dado["num"] = $dispendio->getDocumento();
				$dado["serie"] = $dispendio->getSerie();
				$dado["subSerie"] = $dispendio->getSubserie();
                                $dado["data"] = $dispendio->getData();
				$dado["cpf"] = $dispendio->getFornecedor()->getCadastro();
                                $dado["historico"] = mb_substr($dispendio->getFornecedor()->getNome(), 0, 39) . " - " . mb_substr($dispendio->getDescricao(), 0, 19) . " - " . $value;//historico contem no maximo 67 caracteres
                                $dado["pagamento"] = $dispendio->getTotal();
				$dado["tipo"] = $value;
                            }
                            break;
                        case "2": //bolsa
                            $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($item->getItem());
                            if (is_object($bolsa)) {
                                if ($value == "CP")
                                    $totalCP += $bolsa->getValor(true);
                                else
                                    $totalFAP += $bolsa->getValor(true);
                                $dado["num"] = "";
				$dado["serie"] = "";
				$dado["subSerie"] = "";
                                $dado["data"] = $bolsa->getData(false);
				$dado["cpf"] = $bolsa->getBolsista()->getCpf();
                                $dado["historico"] = "Bolsa - " . mb_substr($bolsa->getBolsista()->getNome(), 0, 53) . " - " . $value;//historico contem no maximo 67 caracteres
                                $dado["pagamento"] = $bolsa->getValor();
				$dado["tipo"] = $value;
                            }
                            break;
                        case "3": //passagem
                            $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($item->getItem());
                            if (is_object($passagem)) {
                                if ($value == "CP")
                                    $totalCP += $passagem->getValor(true);
                                else
                                    $totalFAP += $passagem->getValor(true);
                                $passagem = $passagem->toArray();
                                $dado["num"] = $passagem["tiquete"];
				$dado["serie"] = "";
				$dado["subSerie"] = "";
                                $dado["data"] = $passagem["compra"];
				$dado["cpf"] = $passagem["cpf"];
                                $dado["historico"] = mb_substr($passagem["descricao"], 0, 61) . " - " . $value;//historico contem no maximo 67 caracteres
                                $dado["pagamento"] = $passagem["valor"];
				$dado["tipo"] = $value;
                            }
                            break;
                        case "4": //diaria
                            $diaria = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Diaria")->find($item->getItem());
                            if (is_object($diaria)) {
                                if ($value == "CP")
                                    $totalCP += $diaria->getValor(true);
                                else
                                    $totalFAP += $diaria->getValor(true);
                                $dado["num"] = "";
				$dado["serie"] = "";
				$dado["subSerie"] = "";
                                $dado["data"] = $diaria->getInicio();
				$dado["cpf"] = $diaria->getCpf();
                                $dado["historico"] = "Diária - " . mb_substr($diaria->getBeneficiario(), 0, 52) . " - " . $value;//historico contem no maximo 67 caracteres
                                $dado["pagamento"] = $diaria->getValor();
				$dado["tipo"] = $value;
                            }
                            break;
                        case "5": //salario
                            $salario = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Salario")->find($item->getItem());
                            if (is_object($salario)) {
                                if ($value == "CP")
                                    $totalCP += $salario->getProporcional(true);
                                else
                                    $totalFAP += $salario->getProporcional(true);
				$pesquisador = $salario->getPesquisador();
                                $dado["num"] = "";
				$dado["serie"] = "";
				$dado["subSerie"] = "";
                                $dado["data"] = $salario->getData(); 
				$dado["cpf"] = $pesquisador->getCpf();
                                $dado["historico"] = "Salários e Encargos - " . mb_substr($pesquisador->getNome(), 0, 39) . " - " . $value;//historico contem no maximo 67 caracteres
                                $dado["pagamento"] = $salario->getProporcional();
				$dado["tipo"] = $value;
                            }
                            break;
                    }//fim switch
                    if (isset($dado)) {
                        $my_array[] = array($dado["data"], $dado);
                        $contador++;
                    }
                }//fim foreach
        }
        $resto = $relatorio->getValor(true) - $totalFAP;
        $my_array = $this->bubbleSort(isset($my_array) ? $my_array : array());
	$achouCP  = false;
        foreach ($my_array as $dado){
            $dados["tc28"][] = $dado[1];
	    if($achouCP == false && $dado[1]["tipo"] == "CP"){
		$achouCP = true;
		$dados["data1aCP"] = $dado[0];
	    }
	}
	$totalCP = $resto <= 0 ? $totalCP - $resto : $totalCP;
        $dados["totalCP"] = "R$ " . number_format($totalCP, 2, ",", ".");
        $dados["calculo"] = $contador + 1;
        return array_merge($this->usuario(), $this->menu("relatorio", "tc28", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/devolucao")
     * @Template("FapescTutorialBundle:Relatorio:devolucao.html.twig")
     */
    public function devolucaoAction($idRelatorio) {
        $dados = array();
        $relatorio = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Relatorio")
                ->find($idRelatorio);
        $total = 0.0;
        $itens = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Empenho")->findBy(array("relatorio" => $idRelatorio));
        if (!empty($itens))
            foreach ($itens as $item)
                switch ($item->getCategoria()) {
                    case "1": //dispendio
                        $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($item->getItem());
                        if (is_object($dispendio))
                            $total += $dispendio->getTotal(true);
                        break;
                    case "2": //bolsa
                        $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($item->getItem());
                        if (is_object($bolsa))
                            $total += $bolsa->getValor(true);
                        break;
                    case "3": //passagem
                        $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($item->getItem());
                        if (is_object($passagem))
                            $total += $passagem->getValor(true);
                        break;
                    case "4": //diaria
                        $diaria = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Diaria")->find($item->getItem());
                        if (is_object($diaria))
                            $total += $diaria->getValor(true);
                        break;
                    case "5": //salario
                        $salario = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Salario")->find($item->getItem());
                        if (is_object($salario))
                            $total += $salario->getProporcional(true);
                        break;
                }//fim switch
                $dados["NL"] = $relatorio->getNota();
        $dados["TO"] = $relatorio->getProjeto()->getContrato();
	$resto = $relatorio->getValor(true) - $total;
	$dados["positivo"] = $resto > 0 ? true : false;
        $dados["saldo"] = $resto > 0 ? number_format($resto, 2, ",", ".") : "0,00";
        return array_merge($this->usuario(), $this->menu("relatorio", "devolucao", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/delete")
     * @Template()
     */
    public function deleteAction($idRelatorio) {
        $em = $this->getDoctrine()->getEntityManager();
        $relatorio = $this->find($idRelatorio);
        $relatorio->setAtivo(false);
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Relatório excluído com sucesso!");
        return $this->forward("FapescTutorialBundle:Fapesc:inicio", array());
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

}
