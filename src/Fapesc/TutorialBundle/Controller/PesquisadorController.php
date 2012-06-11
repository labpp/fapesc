<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Pesquisador;

class PesquisadorController extends FapescController {

    /**
     * @Route("/pesquisadores")
     * @Template("FapescTutorialBundle:Pesquisador:pesquisadores.html.twig")
     */
    public function pesquisadoresAction() {
        $pesquisadores = $this->getDoctrine()->getRepository("FapescTutorialBundle:Pesquisador")->findAll();
        if (empty($pesquisadores)) {
            $dados["pesquisadores"] = array();
        } else {
            foreach ($pesquisadores as $pesquisador) {
                $dados["pesquisadores"][] = $pesquisador->toArray();
            }
        }
        return array_merge($this->usuario(), $dados);
    }

    /**
     * @Route("/pesquisador/{idPesquisador}")
     * @Template("FapescTutorialBundle:Pesquisador:pesquisador.html.twig")
     */
    public function pesquisadorAction($idPesquisador, $dados = array()) {
        $pesquisador = ($idPesquisador == 0) ? new Pesquisador() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Pesquisador")->find($idPesquisador);
        return array_merge($this->usuario(), $pesquisador->toArray(), $dados);
    }

    /**
     * @Route("/pesquisador/{idPesquisador}/post")
     * @Template()
     */
    public function pesquisadorPostAction($idPesquisador) {
        $em = $this->getDoctrine()->getEntityManager();
        $pesquisador = $em->getRepository("FapescTutorialBundle:Pesquisador")->find($idPesquisador);
        $outro = $em->getRepository("FapescTutorialBundle:Pesquisador")->findOneBy(array("cpf" => $_POST["cpf"]));
        if (!is_object($pesquisador)) { //inclui novo
            if (!is_object($outro)) {
                $pesquisador = new Pesquisador();
                $pesquisador->populate($_POST);
                $em->persist($pesquisador);
                $acao = "incluído";
            } else {
                $this->get("session")->setFlash("erro", "CPF já cadastrado!");
                return $this->forward("FapescTutorialBundle:Pesquisador:pesquisador", array("idPesquisador" => $idPesquisador, "dados" => $_POST));
            }
        } else { //edita existente
            if (!is_object($outro) || $idPesquisador == $outro->getId()) {
                $pesquisador->populate($_POST);
                $acao = "alterado";
            } else {
                $this->get("session")->setFlash("erro", "CPF já cadastrado!");
                return $this->forward("FapescTutorialBundle:Pesquisador:pesquisador", array("idPesquisador" => $idPesquisador, "dados" => $_POST));
            }
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Pesquisador {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Pesquisador:pesquisadores", array());
    }

}