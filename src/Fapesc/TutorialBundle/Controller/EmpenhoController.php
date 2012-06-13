<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Empenho;
use Fapesc\TutorialBundle\Entity\Dispendio;
use Fapesc\TutorialBundle\Entity\Fornecedor;
use Fapesc\TutorialBundle\Entity\Bolsa;
use Fapesc\TutorialBundle\Entity\Bolsista;
use Fapesc\TutorialBundle\Entity\Passagem;
use Fapesc\TutorialBundle\Entity\Diaria;

class EmpenhoController extends RelatorioController {

    protected function empenhoInsert($relatorio, $categoria, $item) {
        $em = $this->getDoctrine()->getEntityManager();
        $empenho = $em->getRepository("FapescTutorialBundle:Empenho")->findOneBy(array("relatorio" => $relatorio, "categoria" => $categoria, "item" => $item));
        if (!is_object($empenho)) { //inclui novo
            $empenho = new Empenho();
            $empenho->setRelatorio($em->getRepository("FapescTutorialBundle:Relatorio")->find($relatorio));
            $empenho->setCategoria($categoria);
            $empenho->setItem($item);
            $em->persist($empenho);
            $em->flush();
        }
        //return true;
    }

    protected function empenhoDelete($relatorio, $categoria, $item) {
        $e = new Empenho();
        $categorias = $e->getCategorias();
        foreach ($categorias as $k => $v)
            if ($categoria == $v)
                $categoria = $k;
        $em = $this->getDoctrine()->getEntityManager();
        $empenho = $em->getRepository("FapescTutorialBundle:Empenho")->findOneBy(array("relatorio" => $relatorio, "categoria" => $categoria, "item" => $item));
        if (is_object($empenho)) {
            $em->remove($empenho);
            $em->flush();
        }
        //return true;
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenhos")
     * @Template("FapescTutorialBundle:Empenho:empenhos.html.twig")
     */
    public function empenhosAction($idRelatorio) {
        $relatorio = $this->find($idRelatorio);
        $dados["idRelatorio"] = $idRelatorio;
        $dados["orcamento"] = $relatorio->getValor();
        $categorias = array(
            "Capital" => array(
                array("value" => "bibliografia", "text" => "Bibliografia"),
                array("value" => "equipamento", "text" => "Equipamento"),
                array("value" => "mobiliario", "text" => "Mobiliário"),
            ),
            "Custeio" => array(
                array("value" => "pessoaFisica", "text" => "Serviço Pessoa Física"),
                array("value" => "pessoaJuridica", "text" => "Serviço Pessoa Jurídica"),
                array("value" => "material", "text" => "Material de Consumo"),
                array("value" => "bolsa", "text" => "Bolsa"),
                array("value" => "passagem", "text" => "Passagem"),
                array("value" => "diaria", "text" => "Diária"),
            ),
        );
        $dados["opcoes"] = $categorias[$relatorio->getRubrica(true)];
        $dados["categorias"] = array();
        $dados["empenhado"] = 0;
        $empenhos = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Empenho")->findBy(array("relatorio" => $idRelatorio));
        if (!empty($empenhos)) {
            foreach ($empenhos as $empenho) {
                switch ($empenho->getCategoria()) {
                    case "1": //dispendio
                        $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($empenho->getItem());
                        if (is_object($dispendio)) {
                            switch ($dispendio->getCategoria()) {
                                case "1": //bibliografia
                                    $descricao = "Bibliografia";
                                    $categoria = "bibliografia";
                                    break;
                                case "2": //equipamento
                                    $descricao = "Equipamentos";
                                    $categoria = "equipamento";
                                    break;
                                case "3": //mobiliario
                                    $descricao = "Mobiliário";
                                    $categoria = "mobiliario";
                                    break;
                                case "4": //pessoaFisica
                                    $descricao = "Serviços Pessoa Física";
                                    $categoria = "pessoaFisica";
                                    break;
                                case "5": //pessoaJuridica
                                    $descricao = "Serviços Pessoa Jurídica";
                                    $categoria = "pessoaJuridica";
                                    break;
                                case "6": //aluguel
                                    $descricao = "Aluguéis";
                                    $categoria = "aluguel";
                                    break;
                                case "7": //material
                                    $descricao = "Materiais de Consumo";
                                    $categoria = "material";
                                    break;
                            }
                            if (($relatorio->getRubrica() == 1) && ($dispendio->getCategoria() < 4) || ($relatorio->getRubrica() == 2) && ($dispendio->getCategoria() > 3)) {
                                $dados["categorias"][$categoria]["descricao"] = $descricao;
                                $dados["categorias"][$categoria]["categoria"] = $categoria;
                                $dados["categorias"][$categoria]["itens"][] = $dispendio->toArray();
                                $dados["empenhado"] += $dispendio->getTotal(true);
                            }
                        }
                        break;
                    case "2": //bolsa
                        $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($empenho->getItem());
                        if (is_object($bolsa) && ($relatorio->getRubrica() == 2)) {
                            $dados["categorias"]["bolsa"]["descricao"] = "Bolsas";
                            $dados["categorias"]["bolsa"]["categoria"] = "bolsa";
                            $dados["categorias"]["bolsa"]["itens"][] = $bolsa->toArray();
                            $dados["empenhado"] += $bolsa->getValor(true);
                        }
                        break;
                    case "3": //passagem
                        $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($empenho->getItem());
                        if (is_object($passagem) && ($relatorio->getRubrica() == 2)) {
                            $dados["categorias"]["passagem"]["descricao"] = "Passagens";
                            $dados["categorias"]["passagem"]["categoria"] = "passagem";
                            $dados["categorias"]["passagem"]["itens"][] = $passagem->toArray();
                            $dados["empenhado"] += $passagem->getValor(true);
                        }
                        break;
                    case "4": //diaria
                        $diaria = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Diaria")->find($empenho->getItem());
                        if (is_object($diaria) && ($relatorio->getRubrica() == 2)) {
                            $dados["categorias"]["diaria"]["descricao"] = "Diárias";
                            $dados["categorias"]["diaria"]["categoria"] = "diaria";
                            $dados["categorias"]["diaria"]["itens"][] = $diaria->toArray();
                            $dados["empenhado"] += $diaria->getValor(true);
                        }
                        break;
                }
            }
        }
        $dados["disponivel"] = number_format($relatorio->getValor(true) - $dados["empenhado"], 2, ",", ".");
        $dados["empenhado"] = number_format($dados["empenhado"], 2, ",", ".");
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenhos/post")
     * @Template()
     */
    public function empenhosPostAction($idRelatorio) {
        return $this->forward("FapescTutorialBundle:Empenho:empenho", array("idRelatorio" => $idRelatorio, "idEmpenho" => 0, "categoria" => $_POST["categoria"]));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/categoria/{categoria}")
     * @Template()
     */
    public function empenhoAction($idRelatorio, $idEmpenho, $categoria) {
        return $this->forward("FapescTutorialBundle:Empenho:" . $categoria, array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
    }

    /* capital */

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/bibliografia")
     * @Template("FapescTutorialBundle:Empenho:bibliografia.html.twig")
     */
    public function bibliografiaAction($idRelatorio, $idEmpenho) {
        $bibliografia = ($idEmpenho == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 1));
        $dados = $bibliografia->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioEmpenhoBibliografiaPost", array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/bibliografia/post")
     * @Template()
     */
    public function bibliografiaPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $bibliografia = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 1));
        if (!is_object($bibliografia)) { //inclui novo
            $bibliografia = new Dispendio();
            $bibliografia->populate($_POST);
            $bibliografia->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $bibliografia->setCategoria(1);
            $em->persist($bibliografia);
            $acao = "incluída";
        } else { //edita existente
            $bibliografia->populate($_POST);
            $bibliografia->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterada";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 1, $bibliografia->getId());
        $this->get("session")->setFlash("sucesso", "Bibliografia {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/equipamento")
     * @Template("FapescTutorialBundle:Empenho:equipamento.html.twig")
     */
    public function equipamentoAction($idRelatorio, $idEmpenho) {
        $equipamento = ($idEmpenho == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 2));
        $dados = $equipamento->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioEmpenhoEquipamentoPost", array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/equipamento/post")
     * @Template()
     */
    public function equipamentoPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $equipamento = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 2));
        if (!is_object($equipamento)) { //inclui novo
            $equipamento = new Dispendio();
            $equipamento->populate($_POST);
            $equipamento->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $equipamento->setCategoria(2);
            $em->persist($equipamento);
            $acao = "incluído";
        } else { //edita existente
            $equipamento->populate($_POST);
            $equipamento->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 1, $equipamento->getId());
        $this->get("session")->setFlash("sucesso", "Equipamento {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/mobiliario")
     * @Template("FapescTutorialBundle:Empenho:mobiliario.html.twig")
     */
    public function mobiliarioAction($idRelatorio, $idEmpenho) {
        $mobiliario = ($idEmpenho == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 3));
        $dados = $mobiliario->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioEmpenhoMobiliarioPost", array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/mobiliario/post")
     * @Template()
     */
    public function mobiliarioPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $mobiliario = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 3));
        if (!is_object($mobiliario)) { //inclui novo
            $mobiliario = new Dispendio();
            $mobiliario->populate($_POST);
            $mobiliario->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $mobiliario->setCategoria(3);
            $em->persist($mobiliario);
            $acao = "incluído";
        } else { //edita existente
            $mobiliario->populate($_POST);
            $mobiliario->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 1, $mobiliario->getId());
        $this->get("session")->setFlash("sucesso", "Mobiliário {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /* custeio */

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/pessoaFisica")
     * @Template("FapescTutorialBundle:Empenho:pessoaFisica.html.twig")
     */
    public function pessoaFisicaAction($idRelatorio, $idEmpenho) {
        $pessoaFisica = ($idEmpenho == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 4));
        $dados = $pessoaFisica->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioEmpenhoPessoaFisicaPost", array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cpf"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/pessoaFisica/post")
     * @Template()
     */
    public function pessoaFisicaPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $pessoaFisica = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 4));
        if (!is_object($pessoaFisica)) { //inclui novo
            $pessoaFisica = new Dispendio();
            $pessoaFisica->populate($_POST);
            $pessoaFisica->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $pessoaFisica->setCategoria(4);
            $em->persist($pessoaFisica);
            $acao = "incluído";
        } else { //edita existente
            $pessoaFisica->populate($_POST);
            $pessoaFisica->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 1, $pessoaFisica->getId());
        $this->get("session")->setFlash("sucesso", "Serviço Pessoa Física {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/pessoaJuridica")
     * @Template("FapescTutorialBundle:Empenho:pessoaJuridica.html.twig")
     */
    public function pessoaJuridicaAction($idRelatorio, $idEmpenho) {
        $pessoaJuridica = ($idEmpenho == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 5));
        $dados = $pessoaJuridica->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioEmpenhoPessoaJuridicaPost", array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/pessoaJuridica/post")
     * @Template()
     */
    public function pessoaJuridicaPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $pessoaJuridica = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 5));
        if (!is_object($pessoaJuridica)) { //inclui novo
            $pessoaJuridica = new Dispendio();
            $pessoaJuridica->populate($_POST);
            $pessoaJuridica->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $pessoaJuridica->setCategoria(5);
            $em->persist($pessoaJuridica);
            $acao = "incluído";
        } else { //edita existente
            $pessoaJuridica->populate($_POST);
            $pessoaJuridica->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 1, $pessoaJuridica->getId());
        $this->get("session")->setFlash("sucesso", "Serviço Pessoa Jurídica {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/material")
     * @Template("FapescTutorialBundle:Empenho:material.html.twig")
     */
    public function materialAction($idRelatorio, $idEmpenho) {
        $material = ($idEmpenho == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 7));
        $dados = $material->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioEmpenhoMaterialPost", array("idRelatorio" => $idRelatorio, "idEmpenho" => $idEmpenho));
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/material/post")
     * @Template()
     */
    public function materialPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $material = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idEmpenho, "categoria" => 7));
        if (!is_object($material)) { //inclui novo
            $material = new Dispendio();
            $material->populate($_POST);
            $material->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $material->setCategoria(7);
            $em->persist($material);
            $acao = "incluído";
        } else { //edita existente
            $material->populate($_POST);
            $material->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 1, $material->getId());
        $this->get("session")->setFlash("sucesso", "Material de Consumo  {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/bolsa")
     * @Template("FapescTutorialBundle:Empenho:bolsa.html.twig")
     */
    public function bolsaAction($idRelatorio, $idEmpenho) {
        $bolsa = ($idEmpenho == 0) ? new Bolsa() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Bolsa")->find($idEmpenho);
        $dados = $bolsa->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["idEmpenho"] = $idEmpenho;
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->bolsistas(), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/bolsa/post")
     * @Template()
     */
    public function bolsaPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $bolsa = $em->getRepository("FapescTutorialBundle:Bolsa")->find($idEmpenho);
        if (!is_object($bolsa)) { //inclui novo
            $bolsa = new Bolsa();
            $bolsa->populate($_POST);
            $bolsa->setBolsista($em->getRepository("FapescTutorialBundle:Bolsista")->find($_POST["bolsista"]));
            $em->persist($bolsa);
            $acao = "incluída";
        } else { //edita existente
            $bolsa->populate($_POST);
            $bolsa->setBolsista($em->getRepository("FapescTutorialBundle:Bolsista")->find($_POST["bolsista"]));
            $acao = "alterada";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 2, $bolsa->getId());
        $this->get("session")->setFlash("sucesso", "Bolsa {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/passagem")
     * @Template("FapescTutorialBundle:Empenho:passagem.html.twig")
     */
    public function passagemAction($idRelatorio, $idEmpenho) {
        $passagem = ($idEmpenho == 0) ? new Passagem() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Passagem")->find($idEmpenho);
        $dados = $passagem->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["idEmpenho"] = $idEmpenho;
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/passagem/post")
     * @Template()
     */
    public function passagemPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $passagem = $em->getRepository("FapescTutorialBundle:Passagem")->find($idEmpenho);
        if (!is_object($passagem)) { //inclui novo
            $passagem = new Passagem();
            $passagem->populate($_POST);
            $passagem->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $em->persist($passagem);
            $acao = "incluída";
        } else { //edita existente
            $passagem->populate($_POST);
            $passagem->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterada";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 3, $passagem->getId());
        $this->get("session")->setFlash("sucesso", "Passagem {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/diaria")
     * @Template("FapescTutorialBundle:Empenho:diaria.html.twig")
     */
    public function diariaAction($idRelatorio, $idEmpenho) {
        $diaria = ($idEmpenho == 0) ? new Diaria() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Diaria")->find($idEmpenho);
        $dados = $diaria->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["idEmpenho"] = $idEmpenho;
        return array_merge($this->usuario(), $this->menu("relatorio", "empenhos", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->bolsistas(), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/diaria/post")
     * @Template()
     */
    public function diariaPostAction($idRelatorio, $idEmpenho) {
        $em = $this->getDoctrine()->getEntityManager();
        $diaria = $em->getRepository("FapescTutorialBundle:Diaria")->find($idEmpenho);
        if (!is_object($diaria)) { //inclui novo
            $diaria = new Diaria();
            $diaria->populate($_POST);
            $em->persist($diaria);
            $acao = "incluída";
        } else { //edita existente
            $diaria->populate($_POST);
            $acao = "alterada";
        }
        $em->flush();
        $this->empenhoInsert($idRelatorio, 4, $diaria->getId());
        $this->get("session")->setFlash("sucesso", "Diaria {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/empenho/{idEmpenho}/categoria/{categoria}/delete")
     * @Template()
     */
    public function empenhoDeleteAction($idRelatorio, $idEmpenho, $categoria) {
        $d = new Dispendio();
        if (in_array($categoria, $d->getCategorias()))
            $categoria = "dispendio";
        $em = $this->getDoctrine()->getEntityManager();
        $empenho = $em->getRepository("FapescTutorialBundle:" . ucfirst($categoria))->find($idEmpenho);
        $em->remove($empenho);
        $em->flush();
        $this->empenhoDelete($idRelatorio, $categoria, $idEmpenho);
        $this->get("session")->setFlash("sucesso", "Empenho deletado com sucesso!");
        return $this->forward("FapescTutorialBundle:Empenho:empenhos", array("idRelatorio" => $idRelatorio));
    }

}