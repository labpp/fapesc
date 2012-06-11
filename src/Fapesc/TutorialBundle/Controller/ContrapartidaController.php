<?php

namespace Fapesc\TutorialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fapesc\TutorialBundle\Entity\Contrapartida;
use Fapesc\TutorialBundle\Entity\Dispendio;
use Fapesc\TutorialBundle\Entity\Fornecedor;
use Fapesc\TutorialBundle\Entity\Bolsa;
use Fapesc\TutorialBundle\Entity\Bolsista;
use Fapesc\TutorialBundle\Entity\Passagem;
use Fapesc\TutorialBundle\Entity\Salario;
use Fapesc\TutorialBundle\Entity\Pesquisador;

class ContrapartidaController extends RelatorioController {

    protected function contrapartidaInsert($relatorio, $categoria, $item) {
        $em = $this->getDoctrine()->getEntityManager();
        $contrapartida = $em->getRepository("FapescTutorialBundle:Contrapartida")->findOneBy(array("relatorio" => $relatorio, "categoria" => $categoria, "item" => $item));
        if (!is_object($contrapartida)) { //inclui novo
            $contrapartida = new Contrapartida();
            $contrapartida->setRelatorio($em->getRepository("FapescTutorialBundle:Relatorio")->find($relatorio));
            $contrapartida->setCategoria($categoria);
            $contrapartida->setItem($item);
            $em->persist($contrapartida);
            $em->flush();
        }
        //return true;
    }

    protected function contrapartidaDelete($relatorio, $categoria, $item) {
        $e = new Contrapartida();
        $categorias = $e->getCategorias();
        foreach ($categorias as $k => $v)
            if ($categoria == $v)
                $categoria = $k;
        $em = $this->getDoctrine()->getEntityManager();
        $contrapartida = $em->getRepository("FapescTutorialBundle:Contrapartida")->findOneBy(array("relatorio" => $relatorio, "categoria" => $categoria, "item" => $item));
        if (is_object($contrapartida)) {
            $em->remove($contrapartida);
            $em->flush();
        }
        //return true;
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartidas")
     * @Template("FapescTutorialBundle:Contrapartida:contrapartidas.html.twig")
     */
    public function contrapartidasAction($idRelatorio) {
        $relatorio = $this->find($idRelatorio);
        $dados["idRelatorio"] = $idRelatorio;
        $dados["orcamento"] = $relatorio->getValor();
        $categorias = array(
                array("value" => "bibliografia", "text" => "Bibliografia"),
                array("value" => "equipamento", "text" => "Equipamento"),
                array("value" => "mobiliario", "text" => "Mobiliário"),
                array("value" => "pessoaFisica", "text" => "Serviço Pessoa Física"),
                array("value" => "pessoaJuridica", "text" => "Serviço Pessoa Jurídica"),
                array("value" => "aluguel", "text" => "Aluguel"),
                array("value" => "material", "text" => "Material de Consumo"),
                array("value" => "passagem", "text" => "Passagem"),
                array("value" => "bolsa", "text" => "Bolsa"),
                array("value" => "salario", "text" => "Salários e Encargos"),
        );
        $dados["opcoes"] = $categorias;
        $dados["categorias"] = array();
        $dados["empenhado"] = 0;
        $contrapartidas = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Contrapartida")->findBy(array("relatorio" => $idRelatorio));
        if (!empty($contrapartidas)) {
            foreach ($contrapartidas as $contrapartida) {
                switch ($contrapartida->getCategoria()) {
                    case "1": //dispendio
                        $dispendio = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Dispendio")->find($contrapartida->getItem());
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
                            $dados["categorias"][$categoria]["descricao"] = $descricao;
                            $dados["categorias"][$categoria]["categoria"] = $categoria;
                            $dados["categorias"][$categoria]["itens"][] = $dispendio->toArray();
                            $dados["empenhado"] += $dispendio->getTotal(true);
                        }
                        break;
                    case "2": //passagem
                        $passagem = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Passagem")->find($contrapartida->getItem());
                        if (is_object($passagem)) {
                            $dados["categorias"]["passagem"]["descricao"] = "Passagens";
                            $dados["categorias"]["passagem"]["categoria"] = "passagem";
                            $dados["categorias"]["passagem"]["itens"][] = $passagem->toArray();
                            $dados["empenhado"] += $passagem->getValor(true);
                        }
                        break;
                    case "3": //bolsa
                        $bolsa = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Bolsa")->find($contrapartida->getItem());
                        if (is_object($bolsa)) {
                            $dados["categorias"]["bolsa"]["descricao"] = "Bolsas";
                            $dados["categorias"]["bolsa"]["categoria"] = "bolsa";
                            $dados["categorias"]["bolsa"]["itens"][] = $bolsa->toArray();
                            $dados["empenhado"] += $bolsa->getValor(true);
                        }
                        break;
                    case "4": //salario
                        $salario = $this->getDoctrine()->getEntityManager()->getRepository("FapescTutorialBundle:Salario")->find($contrapartida->getItem());
                        if (is_object($salario)) {
                            $dados["categorias"]["salario"]["descricao"] = "Salários e Encargos";
                            $dados["categorias"]["salario"]["categoria"] = "salario";
                            $dados["categorias"]["salario"]["itens"][] = $salario->toArray();
                            $dados["empenhado"] += $salario->getProporcional(true);
                        }
                        break;
                }
            }
        }
        $dados["disponivel"] = number_format($relatorio->getValor(true) - $dados["empenhado"], 2, ",", ".");
        $dados["empenhado"] = number_format($dados["empenhado"], 2, ",", ".");
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartidas/post")
     * @Template()
     */
    public function contrapartidasPostAction($idRelatorio) {
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartida", array("idRelatorio" => $idRelatorio, "idContrapartida" => 0, "categoria" => $_POST["categoria"]));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/categoria/{categoria}")
     * @Template()
     */
    public function contrapartidaAction($idRelatorio, $idContrapartida, $categoria) {
        return $this->forward("FapescTutorialBundle:Contrapartida:" . $categoria, array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
    }

    /* capital */

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/bibliografia")
     * @Template("FapescTutorialBundle:Contrapartida:bibliografia.html.twig")
     */
    public function bibliografiaAction($idRelatorio, $idContrapartida) {
        $bibliografia = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 1));
        $dados = $bibliografia->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaBibliografiaPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/bibliografia/post")
     * @Template()
     */
    public function bibliografiaPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $bibliografia = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 1));
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
        $this->contrapartidaInsert($idRelatorio, 1, $bibliografia->getId());
        $this->get("session")->setFlash("sucesso", "Bibliografia {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/equipamento")
     * @Template("FapescTutorialBundle:Contrapartida:equipamento.html.twig")
     */
    public function equipamentoAction($idRelatorio, $idContrapartida) {
        $equipamento = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 2));
        $dados = $equipamento->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaEquipamentoPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/equipamento/post")
     * @Template()
     */
    public function equipamentoPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $equipamento = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 2));
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
        $this->contrapartidaInsert($idRelatorio, 1, $equipamento->getId());
        $this->get("session")->setFlash("sucesso", "Equipamento {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/mobiliario")
     * @Template("FapescTutorialBundle:Contrapartida:mobiliario.html.twig")
     */
    public function mobiliarioAction($idRelatorio, $idContrapartida) {
        $mobiliario = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 3));
        $dados = $mobiliario->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaMobiliarioPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/mobiliario/post")
     * @Template()
     */
    public function mobiliarioPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $mobiliario = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 3));
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
        $this->contrapartidaInsert($idRelatorio, 1, $mobiliario->getId());
        $this->get("session")->setFlash("sucesso", "Mobiliário {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /* custeio */

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/pessoaFisica")
     * @Template("FapescTutorialBundle:Contrapartida:pessoaFisica.html.twig")
     */
    public function pessoaFisicaAction($idRelatorio, $idContrapartida) {
        $pessoaFisica = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 4));
        $dados = $pessoaFisica->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaPessoaFisicaPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cpf"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/pessoaFisica/post")
     * @Template()
     */
    public function pessoaFisicaPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $pessoaFisica = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 4));
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
        $this->contrapartidaInsert($idRelatorio, 1, $pessoaFisica->getId());
        $this->get("session")->setFlash("sucesso", "Serviço Pessoa Física {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/pessoaJuridica")
     * @Template("FapescTutorialBundle:Contrapartida:pessoaJuridica.html.twig")
     */
    public function pessoaJuridicaAction($idRelatorio, $idContrapartida) {
        $pessoaJuridica = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 5));
        $dados = $pessoaJuridica->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaPessoaJuridicaPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/pessoaJuridica/post")
     * @Template()
     */
    public function pessoaJuridicaPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $pessoaJuridica = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 5));
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
        $this->contrapartidaInsert($idRelatorio, 1, $pessoaJuridica->getId());
        $this->get("session")->setFlash("sucesso", "Serviço Pessoa Jurídica {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/aluguel")
     * @Template("FapescTutorialBundle:Contrapartida:aluguel.html.twig")
     */
    public function aluguelAction($idRelatorio, $idContrapartida) {
        $aluguel = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 6));
        $dados = $aluguel->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaAluguelPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/aluguel/post")
     * @Template()
     */
    public function aluguelPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $aluguel = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 6));
        if (!is_object($aluguel)) { //inclui novo
            $aluguel = new Dispendio();
            $aluguel->populate($_POST);
            $aluguel->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $aluguel->setCategoria(6);
            $em->persist($aluguel);
            $acao = "incluído";
        } else { //edita existente
            $aluguel->populate($_POST);
            $aluguel->setFornecedor($em->getRepository("FapescTutorialBundle:Fornecedor")->find($_POST["fornecedor"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->contrapartidaInsert($idRelatorio, 1, $aluguel->getId());
        $this->get("session")->setFlash("sucesso", "Aluguel {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/material")
     * @Template("FapescTutorialBundle:Contrapartida:material.html.twig")
     */
    public function materialAction($idRelatorio, $idContrapartida) {
        $material = ($idContrapartida == 0) ? new Dispendio() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 7));
        $dados = $material->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["action"] = $this->get("router")->generate("relatorioContrapartidaMaterialPost", array("idRelatorio" => $idRelatorio, "idContrapartida" => $idContrapartida));
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/material/post")
     * @Template()
     */
    public function materialPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $material = $em->getRepository("FapescTutorialBundle:Dispendio")->findOneBy(array("id" => $idContrapartida, "categoria" => 7));
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
        $this->contrapartidaInsert($idRelatorio, 1, $material->getId());
        $this->get("session")->setFlash("sucesso", "Material de Consumo  {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/passagem")
     * @Template("FapescTutorialBundle:Contrapartida:passagem.html.twig")
     */
    public function passagemAction($idRelatorio, $idContrapartida) {
        $passagem = ($idContrapartida == 0) ? new Passagem() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Passagem")->find($idContrapartida);
        $dados = $passagem->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["idContrapartida"] = $idContrapartida;
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->fornecedores("cnpj"), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/passagem/post")
     * @Template()
     */
    public function passagemPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $passagem = $em->getRepository("FapescTutorialBundle:Passagem")->find($idContrapartida);
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
        $this->contrapartidaInsert($idRelatorio, 2, $passagem->getId());
        $this->get("session")->setFlash("sucesso", "Passagem {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/bolsa")
     * @Template("FapescTutorialBundle:Contrapartida:bolsa.html.twig")
     */
    public function bolsaAction($idRelatorio, $idContrapartida) {
        $bolsa = ($idContrapartida == 0) ? new Bolsa() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Bolsa")->find($idContrapartida);
        $dados = $bolsa->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["idContrapartida"] = $idContrapartida;
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->bolsistas(), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/bolsa/post")
     * @Template()
     */
    public function bolsaPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $bolsa = $em->getRepository("FapescTutorialBundle:Bolsa")->find($idContrapartida);
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
        $this->contrapartidaInsert($idRelatorio, 3, $bolsa->getId());
        $this->get("session")->setFlash("sucesso", "Bolsa {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/salario")
     * @Template("FapescTutorialBundle:Contrapartida:salario.html.twig")
     */
    public function salarioAction($idRelatorio, $idContrapartida) {
        $salario = ($idContrapartida == 0) ? new Salario() : $this->getDoctrine()->getRepository("FapescTutorialBundle:Salario")->find($idContrapartida);
        $dados = $salario->toArray();
        $dados["idRelatorio"] = $idRelatorio;
        $dados["idContrapartida"] = $idContrapartida;
        return array_merge($this->usuario(), $this->menu("relatorio", "contrapartidas", $idRelatorio), $this->info($this->find($idRelatorio)->getProjeto()->getId(), $idRelatorio), $this->pesquisadores(), $dados);
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/salario/post")
     * @Template()
     */
    public function salarioPostAction($idRelatorio, $idContrapartida) {
        $em = $this->getDoctrine()->getEntityManager();
        $salario = $em->getRepository("FapescTutorialBundle:Salario")->find($idContrapartida);
        if (!is_object($salario)) { //inclui novo
            $salario = new Salario();
            $salario->populate($_POST);
            $salario->setPesquisador($em->getRepository("FapescTutorialBundle:Pesquisador")->find($_POST["pesquisador"]));
            $em->persist($salario);
            $acao = "incluído";
        } else { //edita existente
            $salario->populate($_POST);
            $salario->setPesquisador($em->getRepository("FapescTutorialBundle:Pesquisador")->find($_POST["pesquisador"]));
            $acao = "alterado";
        }
        $em->flush();
        $this->contrapartidaInsert($idRelatorio, 4, $salario->getId());
        $this->get("session")->setFlash("sucesso", "Salário {$acao} com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

    /**
     * @Route("/relatorio/{idRelatorio}/contrapartida/{idContrapartida}/categoria/{categoria}/delete")
     * @Template()
     */
    public function contrapartidaDeleteAction($idRelatorio, $idContrapartida, $categoria) {
        $d = new Dispendio();
        if (in_array($categoria, $d->getCategorias()))
            $categoria = "dispendio";
        $em = $this->getDoctrine()->getEntityManager();
        $contrapartida = $em->getRepository("FapescTutorialBundle:" . ucfirst($categoria))->find($idContrapartida);
        $em->remove($contrapartida);
        $em->flush();
        $this->contrapartidaDelete($idRelatorio, $categoria, $idContrapartida);
        $this->get("session")->setFlash("sucesso", "Contrapartida deletado com sucesso!");
        return $this->forward("FapescTutorialBundle:Contrapartida:contrapartidas", array("idRelatorio" => $idRelatorio));
    }

}