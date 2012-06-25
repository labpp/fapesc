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
    public function dadosAction($idRelatorio) {
        $relatorio = ($idRelatorio == 0) ? new Relatorio() : $this->find($idRelatorio);
        $dados = $relatorio->toArray();
        $projetos = $this->getDoctrine()->getRepository("FapescTutorialBundle:Projeto")->findBy(array("usuario" => $this->get("security.context")->getToken()->getUser()->getId(), "ativo" => true));
        $dados["projetos"] = array();
        if (!empty($projetos))
            foreach ($projetos as $projeto)
                $dados["projetos"][] = $projeto->toArray();
        return array_merge(
            $this->usuario(), 
            $this->menu("relatorio", "dados", $idRelatorio),
            $this->info($relatorio->getProjeto()->getId(), $idRelatorio),
            $dados
        );
    }

    /**
     * @Route("/relatorio/{idRelatorio}/dados/post")
     * @Template()
     */
    public function dadosPostAction($idRelatorio) {
        $em = $this->getDoctrine()->getEntityManager();
        if ($idRelatorio == 0) { //inclui novo
            $relatorio = new Relatorio();
            $relatorio->populateDados($_POST);
            $relatorio->setProjeto($this->getDoctrine()->getRepository("FapescTutorialBundle:Projeto")->find($_POST["projeto"]));
            $em->persist($relatorio);
            $acao = "registrado";
        } else { //edita existente
            $relatorio = $this->find($idRelatorio);
            $relatorio->populateDados($_POST);
            $relatorio->setProjeto($this->getDoctrine()->getRepository("FapescTutorialBundle:Projeto")->find($_POST["projeto"]));
            $acao = "editado";
        }
        $em->flush();
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
        $metas = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Meta")
                ->findBy(array("projeto" => $this->find($idRelatorio)->getProjeto()->getId()));
        if (empty($metas)) {
            $dados["metas"] = array();
        } else {
            foreach ($metas as $meta) {
                $resultado = $this->getDoctrine()
                        ->getRepository("FapescTutorialBundle:Resultado")
                        ->findOneBy(array("relatorio" => $idRelatorio, "meta" => $meta->getId()));
                if (!is_object($resultado))
                    $resultado = new Resultado();
                $dados["metas"][$meta->getId()] = array(
                    "id" => $meta->getId(),
                    "meta" => (strlen($meta->getMeta()) > 50) ? trim(substr($meta->getMeta(), 0, 50)) . "..." : $meta->getMeta(),
                    "resultado" => $resultado->getResultado(),
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
        $meta = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Meta")
                ->findOneBy(array("id" => $idMeta));
        if (!is_object($meta))
            $meta = new Meta();
        $resultado = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Resultado")
                ->findOneBy(array("meta" => $idMeta, "relatorio" => $idRelatorio));
        if (!is_object($resultado))
            $resultado = new Resultado();
        $dados = array(
            "id" => $meta->getId(),
            "meta" => $meta->getMeta(),
            "resultados" => array(
                array(
                    "value" => "na",
                    "selected" => ($resultado->getResultado() == "NA") ? true : false,
                    "text" => "Não alcançado",
                ),
                array(
                    "value" => "pr",
                    "selected" => ($resultado->getResultado() == "PR") ? true : false,
                    "text" => "Parcialmente alcançado",
                ),
                array(
                    "value" => "pa",
                    "selected" => ($resultado->getResultado() == "PA") ? true : false,
                    "text" => "Plenamente alcançado",
                ),
            ),
            "justificativa" => $resultado->getJustificativa(),
        );
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
            return array_merge(
                    $this->usuario(), 
                    $this->menu("relatorio", "tc28", $idRelatorio), 
                    $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio)
            );
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

}