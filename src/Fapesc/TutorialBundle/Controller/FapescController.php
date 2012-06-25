<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FapescController extends Controller {

    protected function usuario() {
        $usuario = $this->get("security.context")->isGranted("ROLE_USER") ? $this->get("security.context")->getToken()->getUser()->toArray() : array();
        return array("usuario" => $usuario);
    }

    protected function menu($tipo, $opcao, $id) {
        $menu = array(
            "projeto" => array(
                "dados" => "Dados Iniciais",
                "resumo" => "Resumo",
                "metas" => "Plano de Metas",
            ),
            "relatorio" => array(
                "dados" => "Dados Iniciais",
                "relatorio" => "Relatório Técnico",
                "metas" => "Plano de Metas",
                "empenhos" => "Empenho de Recursos",
                "contrapartidas" => "Contrapartidas",
                "conciliacao" => "Conciliação Bancária",
                "tc28" => "TC28",
                "devolucao" => "Devolução",
                "impressao" => "Impressão",
            ),
        );
        foreach ($menu[$tipo] as $k => $v) {
            $opcoes[] = "<a" . (($opcao == $k) ? " id='active'" : null) . " href='" . $this->get("router")->generate($tipo . ucwords($k), array("id" . ucwords($tipo) => $id)) . "'>" . $v . "</a>";
            if ($id == 0)
                break;
        }
        return array("menu" => array("opcoes" => $opcoes));
    }

    protected function info($idProjeto = null, $idRelatorio = null) {
        if ($idProjeto == null) {
            $info["projeto"] = "";
        } elseif ($idProjeto == 0) {
            $info["projeto"] = "Novo Projeto";
        } else {
            $projeto = $this->getDoctrine()
                    ->getRepository("FapescTutorialBundle:Projeto")
                    ->findOneBy(array("id" => $idProjeto, "usuario" => $this->get("security.context")->getToken()->getUser()->getId()));
            if (!is_object($projeto)) {
                throw new Exception("Projeto inválido!");
            }
            $info["projeto"] = $projeto->getTitulo();
        }

        if ($idRelatorio == null) {
            $info["relatorio"] = "";
        } elseif ($idRelatorio == 0) {
            $info["relatorio"] = "Novo Relatório";
        } else {
            $relatorio = $this->getDoctrine()
                    ->getRepository("FapescTutorialBundle:Relatorio")
                    ->findOneBy(array("id" => $idRelatorio, "projeto" => $idProjeto));
            if (!is_object($relatorio)) {
                throw new \Exception("Relatório inválido!");
            }
            $info["relatorio"] = "NL " . $relatorio->getNota() . " - " . $relatorio->getLiberacao() . " - " . $relatorio->getRubricas($relatorio->getRubrica());
        }
        return array("info" => $info);
    }

    protected function fornecedores($sel = false) {
        switch ($sel) {
            case "cpf": $tipo = array("tipo" => 1);
                break;
            case "cnpj": $tipo = array("tipo" => 2);
                break;
            default: $tipo = array();
                break;
        }
        $fornecedores = $this->getDoctrine()->getRepository("FapescTutorialBundle:Fornecedor")->findBy($tipo, array("nome" => "ASC"));
        if (empty($fornecedores)) {
            //$this->get("session")->setFlash("aviso", "Nenhum fornecedor cadastrado!");
            //return $this->forward("FapescTutorialBundle:Fornecedor:fornecedor", array("idFornecedor" => 0));
            throw new \Exception("Nenhum fornecedor cadastrado!");
        } else {
            foreach ($fornecedores as $fornecedor) {
                $dados[] = $fornecedor->toArray();
            }
        }
        return array("fornecedores" => $dados);
    }

    protected function bolsistas() {
        $bolsistas = $this->getDoctrine()->getRepository("FapescTutorialBundle:Bolsista")->findAll();
        if (empty($bolsistas)) {
            //$this->get("session")->setFlash("aviso", "Nenhum bolsista cadastrado!");
            //return $this->forward("FapescTutorialBundle:Bolsista:bolsista", array("idBolsista" => 0));
            throw new \Exception("Nenhum bolsista cadastrado!");
        } else {
            foreach ($bolsistas as $bolsista) {
                $dados[] = $bolsista->toArray();
            }
        }
        return array("bolsistas" => $dados);
    }

    protected function pesquisadores() {
        $pesquisadores = $this->getDoctrine()->getRepository("FapescTutorialBundle:Pesquisador")->findAll();
        if (empty($pesquisadores)) {
            //$this->get("session")->setFlash("aviso", "Nenhum pesquisador cadastrado!");
            //return $this->forward("FapescTutorialBundle:Pesquisador:pesquisador", array("idPesquisador" => 0));
            throw new \Exception("Nenhum pesquisador cadastrado!");
        } else {
            foreach ($pesquisadores as $pesquisador) {
                $dados[] = $pesquisador->toArray();
            }
        }
        return array("pesquisadores" => $dados);
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction() {
        return $this->forward("FapescTutorialBundle:" . ($this->get("security.context")->isGranted("ROLE_USER") ? "Fapesc:inicio" : "Visitante:login"), array());
    }

    /**
     * @Route("/inicio")
     * @Template("FapescTutorialBundle:Fapesc:inicio.html.twig")
     */
    public function inicioAction() {
        $projetos = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Projeto")
                ->findBy(
                        array("usuario" => $this->get("security.context")->getToken()->getUser()->getId(), "ativo" => true),
                        array("inicio" => "DESC"));
        if (empty($projetos)) {
            $dados["projetos"] = array();
        } else {
            foreach ($projetos as $projeto) {
                $dados["projetos"][$projeto->getId()] = $projeto->toArray();
                $relatorios = $this->getDoctrine()
                        ->getRepository("FapescTutorialBundle:Relatorio")
                        ->findBy(
                                array("projeto" => $projeto->getId(), "ativo" => true),
                                array("liberacao" => "DESC"));
                if (empty($relatorios)) {
                    $dados["projetos"][$projeto->getId()]["relatorios"] = array();
                } else {
                    foreach ($relatorios as $relatorio) {
                        $dados["projetos"][$projeto->getId()]["relatorios"][$relatorio->getId()] = $relatorio->toArray();
                    }
                }
            }
        }
        return array_merge($this->usuario(), $dados);
    }

}