<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Fornecedor;

class FornecedorController extends FapescController {

    /**
     * @Route("/fornecedores")
     * @Template("FapescTutorialBundle:Fornecedor:fornecedores.html.twig")
     */
    public function fornecedoresAction() {
        $fornecedores = $this->getDoctrine()->getRepository("FapescTutorialBundle:Fornecedor")->findAll();
        if (empty($fornecedores)) {
            $dados["fornecedores"] = array();
        } else {
            foreach ($fornecedores as $fornecedor) {
                $dados["fornecedores"][] = $fornecedor->toArray();
            }
        }
        return array_merge($this->usuario(), $dados);
    }

    /**
     * @Route("/fornecedor/{idFornecedor}")
     * @Template("FapescTutorialBundle:Fornecedor:fornecedor.html.twig")
     */
    public function fornecedorAction($idFornecedor, $dados = array()) {
        $fornecedor = ($idFornecedor == 0) ? new Fornecedor() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Fornecedor")->find($idFornecedor);
        return array_merge($this->usuario(), $fornecedor->toArray(), $dados);
    }

    /**
     * @Route("/fornecedor/{idFornecedor}/post")
     * @Template()
     */
    public function fornecedorPostAction($idFornecedor) {
        $em = $this->getDoctrine()->getEntityManager();
        $fornecedor = $em->getRepository("FapescTutorialBundle:Fornecedor")->find($idFornecedor);
        $outro = $em->getRepository("FapescTutorialBundle:Fornecedor")->findOneBy(array("cadastro" => $_POST["cadastro"]));
        if (!is_object($fornecedor)) { //inclui novo
            if (!is_object($outro)) {
                $fornecedor = new Fornecedor();
                $fornecedor->populate($_POST);
                $em->persist($fornecedor);
                $acao = "incluído";
            } else {
                $this->get("session")->setFlash("erro", "CPF ou CNPJ já cadastrado!");
                return $this->forward("FapescTutorialBundle:Fornecedor:fornecedor", array("idFornecedor" => $idFornecedor, "dados" => $_POST));
            }
        } else { //edita existente
            if (!is_object($outro) || $idFornecedor == $outro->getId()) {
                $fornecedor->populate($_POST);
                $acao = "alterado";
            } else {
                $this->get("session")->setFlash("erro", "CPF ou CNPJ já cadastrado!");
                return $this->forward("FapescTutorialBundle:Fornecedor:fornecedor", array("idFornecedor" => $idFornecedor, "dados" => $_POST));
            }
        }
        $em->flush();
        $this->get("session")->setFlash("sucesso", "Fornecedor {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Fornecedor:fornecedores", array());
    }

}