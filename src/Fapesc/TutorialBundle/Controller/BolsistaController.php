<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Bolsista;

class BolsistaController extends FapescController {

    /**
     * @Route("/bolsistas")
     * @Template("FapescTutorialBundle:Bolsista:bolsistas.html.twig")
     */
    public function bolsistasAction() {
        $bolsistas = $this->getDoctrine()->getRepository("FapescTutorialBundle:Bolsista")->findAll();
        if (empty($bolsistas)) {
            $dados["bolsistas"] = array();
        } else {
            foreach ($bolsistas as $bolsista) {
                $dados["bolsistas"][] = $bolsista->toArray();
            }
        }
        return array_merge($this->usuario(), $dados);
    }

    /**
     * @Route("/bolsista/{idBolsista}")
     * @Template("FapescTutorialBundle:Bolsista:bolsista.html.twig")
     */
    public function bolsistaAction($idBolsista, $dados = array()) {
        $bolsista = ($idBolsista == 0) ? new Bolsista() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Bolsista")->find($idBolsista);
        return array_merge($this->usuario(), $bolsista->toArray(), $dados);
    }

    /**
     * @Route("/bolsista/{idBolsista}/post")
     * @Template()
     */
    public function bolsistaPostAction($idBolsista) {
        $em = $this->getDoctrine()->getEntityManager();
        $bolsista = $em->getRepository("FapescTutorialBundle:Bolsista")->find($idBolsista);
        $outro = $em->getRepository("FapescTutorialBundle:Bolsista")->findOneBy(array("cpf" => $_POST["cpf"]));
        if (!is_object($bolsista)) { //inclui novo
            if (!is_object($outro)) {
                $bolsista = new Bolsista();
                $bolsista->populate($_POST);
                $em->persist($bolsista);
                $acao = "incluído";
            } else {
                $this->get("session")->setFlash("erro", "CPF já cadastrado!");
                return $this->forward("FapescTutorialBundle:Bolsista:bolsista", array("idBolsista" => $idBolsista, "dados" => $_POST));
            }
        } else { //edita existente
            if (!is_object($outro) || $idBolsista == $outro->getId()) {
                $bolsista->populate($_POST);
                $acao = "alterado";
            } else {
                $this->get("session")->setFlash("erro", "CPF já cadastrado!");
                return $this->forward("FapescTutorialBundle:Bolsista:bolsista", array("idBolsista" => $idBolsista, "dados" => $_POST));
            }
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Bolsista {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Bolsista:bolsistas", array());
    }
}