<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Projeto;
use Fapesc\TutorialBundle\Entity\Meta;

class ProjetoController extends FapescController {

    protected function dados($menu, $idProjeto, $dados) {
        return array_merge(
                $this->usuario(), 
                $this->menu("projeto", $menu, $idProjeto), 
                $this->info($idProjeto), 
                $dados
        );
    }

    protected function find($idProjeto) {
        $projeto = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Projeto")
                ->findOneBy(array("id" => $idProjeto, "usuario" => $this->get("security.context")->getToken()->getUser()->getId()));
        if (!is_object($projeto))
            throw new Exception("Projeto inválido!");
        return $projeto;
    }

    /**
     * @Route("/projeto/{idProjeto}/dados")
     * @Template("FapescTutorialBundle:Projeto:dados.html.twig")
     */
    public function dadosAction($idProjeto) {
        $projeto = ($idProjeto == 0) ? new Projeto() : $this->find($idProjeto);
        return $this->dados("dados", $idProjeto, $projeto->toArray());
    }

    /**
     * @Route("/projeto/{idProjeto}/dados/post")
     * @Template()
     */
    public function dadosPostAction($idProjeto) {
        $em = $this->getDoctrine()->getEntityManager();
        if ($idProjeto == 0) { //inclui novo
            $projeto = new Projeto();
            $projeto->populate($_POST);
            $projeto->setUsuario($this->get("security.context")->getToken()->getUser());
            $em->persist($projeto);
            $acao = "registrado";
        } else { //edita existente
            $projeto = $em->getRepository("FapescTutorialBundle:Projeto")->find($idProjeto);
            $projeto->populate($_POST);
            $acao = "editado";
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Projeto {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Projeto:resumo", array("idProjeto" => $projeto->getId()));
    }

    /**
     * @Route("/projeto/{idProjeto}/resumo")
     * @Template("FapescTutorialBundle:Projeto:resumo.html.twig")
     */
    public function resumoAction($idProjeto) {
        return $this->dados("resumo", $idProjeto, $this->find($idProjeto)->toArray());
    }

    /**
     * @Route("/projeto/{idProjeto}/resumo/post")
     * @Template()
     */
    public function resumoPostAction($idProjeto) {
        $em = $this->getDoctrine()->getEntityManager();
        $projeto = $em->getRepository("FapescTutorialBundle:Projeto")->find($idProjeto);
        $projeto->setResumo($_POST["resumo"]);
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Projeto editado com sucesso!");
        return $this->forward("FapescTutorialBundle:Projeto:metas", array("idProjeto" => $projeto->getId()));
    }

    /**
     * @Route("/projeto/{idProjeto}/metas")
     * @Template("FapescTutorialBundle:Projeto:metas.html.twig")
     */
    public function metasAction($idProjeto) {
        $metas = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Meta")
                ->findBy(array("projeto" => $idProjeto));
        if (empty($metas)) {
            $dados["metas"] = array();
        } else {
            foreach ($metas as $meta) {
                $dados["metas"][$meta->getId()] = array(
                    "id" => $meta->getId(),
                    "meta" => $meta->getMeta(50),
                    "indicador" => $meta->getIndicador(50),
                );
            }
        }
        $dados["idProjeto"] = $idProjeto;
        return $this->dados("metas", $idProjeto, $dados);
    }

    /**
     * @Route("/projeto/{idProjeto}/meta/{idMeta}")
     * @Template("FapescTutorialBundle:Projeto:meta.html.twig")
     */
    public function metaAction($idProjeto, $idMeta) {
        $meta = ($idMeta == 0) ? new Meta() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Meta")->findOneBy(array("id" => $idMeta, "projeto" => $idProjeto));
        if (!is_object($meta)) {
            $this->get("session")->setFlash("erro", "Meta inválida!");
            return $this->forward("FapescTutorialBundle:Projeto:metas", array("idProjeto" => $idProjeto));
        }
        $dados = $meta->toArray();
        $dados["idProjeto"] = $idProjeto;
        return $this->dados("metas", $idProjeto, $dados);
    }

    /**
     * @Route("/projeto/{idProjeto}/meta/{idMeta}/post")
     * @Template()
     */
    public function metaPostAction($idProjeto, $idMeta) {
        $em = $this->getDoctrine()->getEntityManager();
        if ($idMeta == 0) { //inclui novo
            $meta = new Meta();
            $meta->populate($_POST);
            $meta->setProjeto($this->find($idProjeto));
            $em->persist($meta);
            $acao = "adicionada";
        } else { //edita existente
            $meta = $em->getRepository("FapescTutorialBundle:Meta")->find($idMeta);
            $meta->populate($_POST);
            $acao = "editada";
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Meta {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Projeto:metas", array("idProjeto" => $idProjeto));
    }

    /**
     * @Route("/projeto/{idProjeto}/meta/{idMeta}/delete")
     * @Template()
     */
    public function metaDeleteAction($idProjeto, $idMeta) {
        $em = $this->getDoctrine()->getEntityManager();
        $meta = $em->getRepository("FapescTutorialBundle:Meta")->find($idMeta);
        $em->remove($meta);
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Meta deletada com sucesso!");
        return $this->forward("FapescTutorialBundle:Projeto:metas", array("idProjeto" => $idProjeto));
    }

    /**
     * @Route("/projeto/{idProjeto}/relatorios")
     * @Template("FapescTutorialBundle:Projeto:relatorios.html.twig")
     */
    public function relatoriosAction($idProjeto) {
        $relatorios = $this->getDoctrine()
                ->getRepository("FapescTutorialBundle:Relatorio")
                ->findBy(
                array("projeto" => $idProjeto, "ativo" => true), array("liberacao" => "DESC"));
        if (empty($relatorios)) {
            $dados["relatorios"] = array();
        } else {
            foreach ($relatorios as $relatorio) {
                $dados["relatorios"][] = $relatorio->toArray();
            }
        }
        $dados["idProjeto"] = $idProjeto;
        return $this->dados("relatorios", $idProjeto, $dados);
    }

    /**
     * @Route("/projeto/{idProjeto}/delete")
     * @Template()
     */
    public function deleteAction($idProjeto) {
        $em = $this->getDoctrine()->getEntityManager();
        $projeto = $em->getRepository("FapescTutorialBundle:Projeto")->find($idProjeto);
        $projeto->setAtivo(false);
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Projeto excluído com sucesso!");
        return $this->forward("FapescTutorialBundle:Usuario:inicio", array());
    }

}
