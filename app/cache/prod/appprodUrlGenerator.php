<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appprodUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       'fapesc_tutorial_usuario_cadastrar' => true,
       'fapesc_tutorial_usuario_cadastrarpost' => true,
       'fapesc_tutorial_usuario_recuperar' => true,
       'fapesc_tutorial_usuario_recuperarpost' => true,
       'fapesc_tutorial_usuario_recuperarsenha' => true,
       'fapesc_tutorial_usuario_recuperarsenhapost' => true,
       'fapesc_tutorial_usuario_login' => true,
       'fapesc_tutorial_usuario_loginpost' => true,
       'fapesc_tutorial_usuario_perfil' => true,
       'fapesc_tutorial_usuario_perfilpost' => true,
       'fapesc_tutorial_usuario_senha' => true,
       'fapesc_tutorial_usuario_senhapost' => true,
       'fapesc_tutorial_usuario_logout' => true,
       'fapesc_tutorial_usuario_index' => true,
       'fapesc_tutorial_usuario_inicio' => true,
       'fapesc_tutorial_fornecedor_fornecedores' => true,
       'fapesc_tutorial_fornecedor_fornecedor' => true,
       'fapesc_tutorial_fornecedor_fornecedorpost' => true,
       'fapesc_tutorial_fornecedor_index' => true,
       'fapesc_tutorial_fornecedor_inicio' => true,
       'fapesc_tutorial_fapesc_index' => true,
       'fapesc_tutorial_fapesc_inicio' => true,
       'fapesc_tutorial_empenho_empenhos' => true,
       'fapesc_tutorial_empenho_empenhospost' => true,
       'fapesc_tutorial_empenho_empenho' => true,
       'fapesc_tutorial_empenho_bibliografia' => true,
       'fapesc_tutorial_empenho_bibliografiapost' => true,
       'fapesc_tutorial_empenho_equipamento' => true,
       'fapesc_tutorial_empenho_equipamentopost' => true,
       'fapesc_tutorial_empenho_mobiliario' => true,
       'fapesc_tutorial_empenho_mobiliariopost' => true,
       'fapesc_tutorial_empenho_pessoafisica' => true,
       'fapesc_tutorial_empenho_pessoafisicapost' => true,
       'fapesc_tutorial_empenho_pessoajuridica' => true,
       'fapesc_tutorial_empenho_pessoajuridicapost' => true,
       'fapesc_tutorial_empenho_aluguel' => true,
       'fapesc_tutorial_empenho_aluguelpost' => true,
       'fapesc_tutorial_empenho_material' => true,
       'fapesc_tutorial_empenho_materialpost' => true,
       'fapesc_tutorial_empenho_passagem' => true,
       'fapesc_tutorial_empenho_passagempost' => true,
       'fapesc_tutorial_empenho_bolsa' => true,
       'fapesc_tutorial_empenho_bolsapost' => true,
       'fapesc_tutorial_empenho_empenhodelete' => true,
       'fapesc_tutorial_empenho_dados' => true,
       'fapesc_tutorial_empenho_dadospost' => true,
       'fapesc_tutorial_empenho_relatorio' => true,
       'fapesc_tutorial_empenho_relatoriopost' => true,
       'fapesc_tutorial_empenho_metas' => true,
       'fapesc_tutorial_empenho_meta' => true,
       'fapesc_tutorial_empenho_metapost' => true,
       'fapesc_tutorial_empenho_conciliacao' => true,
       'fapesc_tutorial_empenho_extrato' => true,
       'fapesc_tutorial_empenho_extratopost' => true,
       'fapesc_tutorial_empenho_cheque' => true,
       'fapesc_tutorial_empenho_chequepost' => true,
       'fapesc_tutorial_empenho_chequedelete' => true,
       'fapesc_tutorial_empenho_delete' => true,
       'fapesc_tutorial_empenho_index' => true,
       'fapesc_tutorial_empenho_inicio' => true,
       'fapesc_tutorial_projeto_dados' => true,
       'fapesc_tutorial_projeto_dadospost' => true,
       'fapesc_tutorial_projeto_resumo' => true,
       'fapesc_tutorial_projeto_resumopost' => true,
       'fapesc_tutorial_projeto_metas' => true,
       'fapesc_tutorial_projeto_meta' => true,
       'fapesc_tutorial_projeto_metapost' => true,
       'fapesc_tutorial_projeto_metadelete' => true,
       'fapesc_tutorial_projeto_delete' => true,
       'fapesc_tutorial_projeto_index' => true,
       'fapesc_tutorial_projeto_inicio' => true,
       'fapesc_tutorial_contrapartida_contrapartidas' => true,
       'fapesc_tutorial_contrapartida_contrapartidaspost' => true,
       'fapesc_tutorial_contrapartida_contrapartida' => true,
       'fapesc_tutorial_contrapartida_bibliografia' => true,
       'fapesc_tutorial_contrapartida_bibliografiapost' => true,
       'fapesc_tutorial_contrapartida_equipamento' => true,
       'fapesc_tutorial_contrapartida_equipamentopost' => true,
       'fapesc_tutorial_contrapartida_mobiliario' => true,
       'fapesc_tutorial_contrapartida_mobiliariopost' => true,
       'fapesc_tutorial_contrapartida_pessoafisica' => true,
       'fapesc_tutorial_contrapartida_pessoafisicapost' => true,
       'fapesc_tutorial_contrapartida_pessoajuridica' => true,
       'fapesc_tutorial_contrapartida_pessoajuridicapost' => true,
       'fapesc_tutorial_contrapartida_aluguel' => true,
       'fapesc_tutorial_contrapartida_aluguelpost' => true,
       'fapesc_tutorial_contrapartida_material' => true,
       'fapesc_tutorial_contrapartida_materialpost' => true,
       'fapesc_tutorial_contrapartida_passagem' => true,
       'fapesc_tutorial_contrapartida_passagempost' => true,
       'fapesc_tutorial_contrapartida_bolsa' => true,
       'fapesc_tutorial_contrapartida_bolsapost' => true,
       'fapesc_tutorial_contrapartida_contrapartidadelete' => true,
       'fapesc_tutorial_contrapartida_dados' => true,
       'fapesc_tutorial_contrapartida_dadospost' => true,
       'fapesc_tutorial_contrapartida_relatorio' => true,
       'fapesc_tutorial_contrapartida_relatoriopost' => true,
       'fapesc_tutorial_contrapartida_metas' => true,
       'fapesc_tutorial_contrapartida_meta' => true,
       'fapesc_tutorial_contrapartida_metapost' => true,
       'fapesc_tutorial_contrapartida_conciliacao' => true,
       'fapesc_tutorial_contrapartida_extrato' => true,
       'fapesc_tutorial_contrapartida_extratopost' => true,
       'fapesc_tutorial_contrapartida_cheque' => true,
       'fapesc_tutorial_contrapartida_chequepost' => true,
       'fapesc_tutorial_contrapartida_chequedelete' => true,
       'fapesc_tutorial_contrapartida_delete' => true,
       'fapesc_tutorial_contrapartida_index' => true,
       'fapesc_tutorial_contrapartida_inicio' => true,
       'fapesc_tutorial_bolsista_bolsistas' => true,
       'fapesc_tutorial_bolsista_bolsista' => true,
       'fapesc_tutorial_bolsista_bolsistapost' => true,
       'fapesc_tutorial_bolsista_index' => true,
       'fapesc_tutorial_bolsista_inicio' => true,
       'fapesc_tutorial_impressao_impressao' => true,
       'fapesc_tutorial_impressao_imprimir' => true,
       'fapesc_tutorial_impressao_index' => true,
       'fapesc_tutorial_impressao_inicio' => true,
       'fapesc_tutorial_relatorio_dados' => true,
       'fapesc_tutorial_relatorio_dadospost' => true,
       'fapesc_tutorial_relatorio_relatorio' => true,
       'fapesc_tutorial_relatorio_relatoriopost' => true,
       'fapesc_tutorial_relatorio_metas' => true,
       'fapesc_tutorial_relatorio_meta' => true,
       'fapesc_tutorial_relatorio_metapost' => true,
       'fapesc_tutorial_relatorio_conciliacao' => true,
       'fapesc_tutorial_relatorio_extrato' => true,
       'fapesc_tutorial_relatorio_extratopost' => true,
       'fapesc_tutorial_relatorio_cheque' => true,
       'fapesc_tutorial_relatorio_chequepost' => true,
       'fapesc_tutorial_relatorio_chequedelete' => true,
       'fapesc_tutorial_relatorio_delete' => true,
       'fapesc_tutorial_relatorio_index' => true,
       'fapesc_tutorial_relatorio_inicio' => true,
       'index' => true,
       'cadastrar' => true,
       'cadastrarPost' => true,
       'recuperar' => true,
       'recuperarPost' => true,
       'recuperarSenha' => true,
       'recuperarSenhaPost' => true,
       'login' => true,
       'loginPost' => true,
       'inicio' => true,
       'perfil' => true,
       'perfilPost' => true,
       'senha' => true,
       'senhaPost' => true,
       'logout' => true,
       'bolsistas' => true,
       'bolsista' => true,
       'bolsistaPost' => true,
       'fornecedores' => true,
       'fornecedor' => true,
       'fornecedorPost' => true,
       'projetoDados' => true,
       'projetoDadosPost' => true,
       'projetoResumo' => true,
       'projetoResumoPost' => true,
       'projetoMetas' => true,
       'projetoMeta' => true,
       'projetoMetaPost' => true,
       'projetoMetaDelete' => true,
       'projetoDelete' => true,
       'relatorioDados' => true,
       'relatorioDadosPost' => true,
       'relatorioRelatorio' => true,
       'relatorioRelatorioPost' => true,
       'relatorioMetas' => true,
       'relatorioMeta' => true,
       'relatorioMetaPost' => true,
       'relatorioEmpenhos' => true,
       'relatorioEmpenhosPost' => true,
       'relatorioEmpenho' => true,
       'relatorioEmpenhoBibliografiaPost' => true,
       'relatorioEmpenhoEquipamentoPost' => true,
       'relatorioEmpenhoMobiliarioPost' => true,
       'relatorioEmpenhoPessoaFisicaPost' => true,
       'relatorioEmpenhoPessoaJuridicaPost' => true,
       'relatorioEmpenhoAluguelPost' => true,
       'relatorioEmpenhoBolsaPost' => true,
       'relatorioEmpenhoMaterialPost' => true,
       'relatorioEmpenhoPassagemPost' => true,
       'relatorioEmpenhoDelete' => true,
       'relatorioContrapartidas' => true,
       'relatorioContrapartidasPost' => true,
       'relatorioContrapartida' => true,
       'relatorioContrapartidaBibliografiaPost' => true,
       'relatorioContrapartidaEquipamentoPost' => true,
       'relatorioContrapartidaMobiliarioPost' => true,
       'relatorioContrapartidaPessoaFisicaPost' => true,
       'relatorioContrapartidaPessoaJuridicaPost' => true,
       'relatorioContrapartidaAluguelPost' => true,
       'relatorioContrapartidaBolsaPost' => true,
       'relatorioContrapartidaMaterialPost' => true,
       'relatorioContrapartidaPassagemPost' => true,
       'relatorioContrapartidaDelete' => true,
       'relatorioConciliacao' => true,
       'relatorioExtrato' => true,
       'relatorioExtratoPost' => true,
       'relatorioCheque' => true,
       'relatorioChequePost' => true,
       'relatorioChequeDelete' => true,
       'relatorioImpressao' => true,
       'relatorioImprimir' => true,
       'relatorioDelete' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function getfapesc_tutorial_usuario_cadastrarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/cadastrar',  ),));
    }

    private function getfapesc_tutorial_usuario_cadastrarpostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/cadastrar/post',  ),));
    }

    private function getfapesc_tutorial_usuario_recuperarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/recuperar',  ),));
    }

    private function getfapesc_tutorial_usuario_recuperarpostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/recuperar/post',  ),));
    }

    private function getfapesc_tutorial_usuario_recuperarsenhaRouteInfo()
    {
        return array(array (  0 => 'cpf',  1 => 'email',  2 => 'hash',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'hash',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'email',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'cpf',  ),  3 =>   array (    0 => 'text',    1 => '/recuperar/senha',  ),));
    }

    private function getfapesc_tutorial_usuario_recuperarsenhapostRouteInfo()
    {
        return array(array (  0 => 'cpf',  1 => 'email',  2 => 'hash',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'hash',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'email',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'cpf',  ),  4 =>   array (    0 => 'text',    1 => '/recuperar/senha',  ),));
    }

    private function getfapesc_tutorial_usuario_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getfapesc_tutorial_usuario_loginpostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/loginPost',  ),));
    }

    private function getfapesc_tutorial_usuario_perfilRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/perfil',  ),));
    }

    private function getfapesc_tutorial_usuario_perfilpostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/perfil/post',  ),));
    }

    private function getfapesc_tutorial_usuario_senhaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/senha',  ),));
    }

    private function getfapesc_tutorial_usuario_senhapostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/senha/post',  ),));
    }

    private function getfapesc_tutorial_usuario_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getfapesc_tutorial_usuario_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_usuario_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_fornecedor_fornecedoresRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedoresAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/fornecedores',  ),));
    }

    private function getfapesc_tutorial_fornecedor_fornecedorRouteInfo()
    {
        return array(array (  0 => 'idFornecedor',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idFornecedor',  ),  1 =>   array (    0 => 'text',    1 => '/fornecedor',  ),));
    }

    private function getfapesc_tutorial_fornecedor_fornecedorpostRouteInfo()
    {
        return array(array (  0 => 'idFornecedor',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idFornecedor',  ),  2 =>   array (    0 => 'text',    1 => '/fornecedor',  ),));
    }

    private function getfapesc_tutorial_fornecedor_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_fornecedor_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_fapesc_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FapescController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_fapesc_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FapescController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_empenho_empenhosRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/empenhos',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_empenhospostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/empenhos/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_empenhoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'categoria',  ),  1 =>   array (    0 => 'text',    1 => '/categoria',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  3 =>   array (    0 => 'text',    1 => '/empenho',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  5 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_bibliografiaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bibliografiaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bibliografia',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_bibliografiapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bibliografiaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bibliografia/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_equipamentoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::equipamentoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/equipamento',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_equipamentopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::equipamentoPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/equipamento/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_mobiliarioRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::mobiliarioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobiliario',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_mobiliariopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::mobiliarioPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobiliario/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_pessoafisicaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaFisicaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaFisica',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_pessoafisicapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaFisicaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaFisica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_pessoajuridicaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaJuridicaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaJuridica',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_pessoajuridicapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaJuridicaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaJuridica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_aluguelRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::aluguelAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/aluguel',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_aluguelpostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::aluguelPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/aluguel/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_materialRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::materialAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/material',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_materialpostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::materialPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/material/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_passagemRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::passagemAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/passagem',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_passagempostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::passagemPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/passagem/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_bolsaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bolsaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bolsa',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_bolsapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bolsaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bolsa/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_empenhodeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'categoria',  ),  2 =>   array (    0 => 'text',    1 => '/categoria',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idEmpenho',  ),  4 =>   array (    0 => 'text',    1 => '/empenho',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  6 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_dadosRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::dadosAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_dadospostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::dadosPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_relatorioRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::relatorioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/relatorio',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_relatoriopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::relatorioPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/relatorio/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_metasRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::metasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/metas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_metaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::metaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  1 =>   array (    0 => 'text',    1 => '/meta',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_metapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::metaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_conciliacaoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::conciliacaoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/conciliacao',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_extratoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::extratoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/extrato',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_extratopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::extratoPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/extrato/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_chequeRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::chequeAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  1 =>   array (    0 => 'text',    1 => '/cheque',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_chequepostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::chequePostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_chequedeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::chequeDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_deleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::deleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_empenho_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_empenho_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_projeto_dadosRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_dadospostRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_resumoRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/resumo',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_resumopostRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/resumo/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_metasRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/metas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_metaRouteInfo()
    {
        return array(array (  0 => 'idProjeto',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  1 =>   array (    0 => 'text',    1 => '/meta',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  3 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_metapostRouteInfo()
    {
        return array(array (  0 => 'idProjeto',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  4 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_metadeleteRouteInfo()
    {
        return array(array (  0 => 'idProjeto',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  4 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_deleteRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::deleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getfapesc_tutorial_projeto_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_projeto_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_contrapartidasRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contrapartidas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_contrapartidaspostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contrapartidas/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_contrapartidaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'categoria',  ),  1 =>   array (    0 => 'text',    1 => '/categoria',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  3 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  5 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_bibliografiaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bibliografiaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bibliografia',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_bibliografiapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bibliografiaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bibliografia/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_equipamentoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::equipamentoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/equipamento',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_equipamentopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::equipamentoPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/equipamento/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_mobiliarioRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::mobiliarioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobiliario',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_mobiliariopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::mobiliarioPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/mobiliario/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_pessoafisicaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaFisicaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaFisica',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_pessoafisicapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaFisicaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaFisica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_pessoajuridicaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaJuridicaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaJuridica',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_pessoajuridicapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaJuridicaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/pessoaJuridica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_aluguelRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::aluguelAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/aluguel',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_aluguelpostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::aluguelPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/aluguel/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_materialRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::materialAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/material',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_materialpostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::materialPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/material/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_passagemRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::passagemAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/passagem',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_passagempostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::passagemPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/passagem/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_bolsaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bolsaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bolsa',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_bolsapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bolsaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bolsa/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_contrapartidadeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'categoria',  ),  2 =>   array (    0 => 'text',    1 => '/categoria',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContrapartida',  ),  4 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  6 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_dadosRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::dadosAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_dadospostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::dadosPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_relatorioRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::relatorioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/relatorio',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_relatoriopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::relatorioPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/relatorio/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_metasRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::metasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/metas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_metaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::metaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  1 =>   array (    0 => 'text',    1 => '/meta',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_metapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::metaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_conciliacaoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::conciliacaoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/conciliacao',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_extratoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::extratoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/extrato',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_extratopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::extratoPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/extrato/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_chequeRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::chequeAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  1 =>   array (    0 => 'text',    1 => '/cheque',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_chequepostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::chequePostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_chequedeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::chequeDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_deleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::deleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_contrapartida_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_contrapartida_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_bolsista_bolsistasRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bolsistas',  ),));
    }

    private function getfapesc_tutorial_bolsista_bolsistaRouteInfo()
    {
        return array(array (  0 => 'idBolsista',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idBolsista',  ),  1 =>   array (    0 => 'text',    1 => '/bolsista',  ),));
    }

    private function getfapesc_tutorial_bolsista_bolsistapostRouteInfo()
    {
        return array(array (  0 => 'idBolsista',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idBolsista',  ),  2 =>   array (    0 => 'text',    1 => '/bolsista',  ),));
    }

    private function getfapesc_tutorial_bolsista_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_bolsista_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_impressao_impressaoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::impressaoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/impressao',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_impressao_imprimirRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::imprimirAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/imprimir',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_impressao_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_impressao_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getfapesc_tutorial_relatorio_dadosRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_dadospostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dados/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_relatorioRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/relatorio',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_relatoriopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/relatorio/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_metasRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/metas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_metaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  1 =>   array (    0 => 'text',    1 => '/meta',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_metapostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_conciliacaoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::conciliacaoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/conciliacao',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_extratoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/extrato',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_extratopostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoPostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/extrato/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_chequeRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  1 =>   array (    0 => 'text',    1 => '/cheque',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_chequepostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequePostAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_chequedeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeDeleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_deleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::deleteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getfapesc_tutorial_relatorio_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getfapesc_tutorial_relatorio_inicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getindexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getcadastrarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/cadastrar',  ),));
    }

    private function getcadastrarPostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarPostAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/cadastrar/post',  ),));
    }

    private function getrecuperarRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/recuperar',  ),));
    }

    private function getrecuperarPostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarPostAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/recuperar/post',  ),));
    }

    private function getrecuperarSenhaRouteInfo()
    {
        return array(array (  0 => 'cpf',  1 => 'email',  2 => 'hash',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaAction',), array (  '_method' => 'GET',  'cpf' => '.+',  'email' => '.+',  'hash' => '\\w+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\w+',    3 => 'hash',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'email',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'cpf',  ),  3 =>   array (    0 => 'text',    1 => '/recuperar/senha',  ),));
    }

    private function getrecuperarSenhaPostRouteInfo()
    {
        return array(array (  0 => 'cpf',  1 => 'email',  2 => 'hash',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaPostAction',), array (  '_method' => 'POST',  'cpf' => '.+',  'email' => '.+',  'hash' => '\\w+',), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\w+',    3 => 'hash',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'email',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'cpf',  ),  4 =>   array (    0 => 'text',    1 => '/recuperar/senha',  ),));
    }

    private function getloginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getloginPostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginPostAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/loginPost',  ),));
    }

    private function getinicioRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::inicioAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/inicio',  ),));
    }

    private function getperfilRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/perfil',  ),));
    }

    private function getperfilPostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilPostAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/perfil/post',  ),));
    }

    private function getsenhaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/senha',  ),));
    }

    private function getsenhaPostRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaPostAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/senha/post',  ),));
    }

    private function getlogoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getbolsistasRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistasAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/bolsistas',  ),));
    }

    private function getbolsistaRouteInfo()
    {
        return array(array (  0 => 'idBolsista',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaAction',), array (  '_method' => 'GET',  'idBolsista' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idBolsista',  ),  1 =>   array (    0 => 'text',    1 => '/bolsista',  ),));
    }

    private function getbolsistaPostRouteInfo()
    {
        return array(array (  0 => 'idBolsista',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaPostAction',), array (  '_method' => 'POST',  'idBolsista' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idBolsista',  ),  2 =>   array (    0 => 'text',    1 => '/bolsista',  ),));
    }

    private function getfornecedoresRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedoresAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/fornecedores',  ),));
    }

    private function getfornecedorRouteInfo()
    {
        return array(array (  0 => 'idFornecedor',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorAction',), array (  '_method' => 'GET',  'idFornecedor' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idFornecedor',  ),  1 =>   array (    0 => 'text',    1 => '/fornecedor',  ),));
    }

    private function getfornecedorPostRouteInfo()
    {
        return array(array (  0 => 'idFornecedor',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorPostAction',), array (  '_method' => 'POST',  'idFornecedor' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idFornecedor',  ),  2 =>   array (    0 => 'text',    1 => '/fornecedor',  ),));
    }

    private function getprojetoDadosRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosAction',), array (  '_method' => 'GET',  'idProjeto' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/dados',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoDadosPostRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosPostAction',), array (  '_method' => 'POST',  'idProjeto' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/dados/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoResumoRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoAction',), array (  '_method' => 'GET',  'idProjeto' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/resumo',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoResumoPostRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoPostAction',), array (  '_method' => 'POST',  'idProjeto' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/resumo/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoMetasRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metasAction',), array (  'idProjeto' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/metas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoMetaRouteInfo()
    {
        return array(array (  0 => 'idProjeto',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaAction',), array (  '_method' => 'GET',  'idProjeto' => '\\d+',  'idMeta' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idMeta',  ),  1 =>   array (    0 => 'text',    1 => '/meta',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  3 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoMetaPostRouteInfo()
    {
        return array(array (  0 => 'idProjeto',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaPostAction',), array (  '_method' => 'POST',  'idProjeto' => '\\d+',  'idMeta' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  4 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoMetaDeleteRouteInfo()
    {
        return array(array (  0 => 'idProjeto',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaDeleteAction',), array (  '_method' => 'GET',  'idProjeto' => '\\d+',  'idMeta' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  4 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getprojetoDeleteRouteInfo()
    {
        return array(array (  0 => 'idProjeto',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::deleteAction',), array (  '_method' => 'GET',  'idProjeto' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idProjeto',  ),  2 =>   array (    0 => 'text',    1 => '/projeto',  ),));
    }

    private function getrelatorioDadosRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/dados',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioDadosPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/dados/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioRelatorioRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/relatorio',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioRelatorioPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/relatorio/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioMetasRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metasAction',), array (  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/metas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioMetaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',  'idMeta' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idMeta',  ),  1 =>   array (    0 => 'text',    1 => '/meta',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioMetaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idMeta',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idMeta' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idMeta',  ),  2 =>   array (    0 => 'text',    1 => '/meta',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhosRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/empenhos',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhosPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/empenhos/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',  'categoria' => '\\w+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\w+',    3 => 'categoria',  ),  1 =>   array (    0 => 'text',    1 => '/categoria',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  3 =>   array (    0 => 'text',    1 => '/empenho',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  5 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoBibliografiaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bibliografiaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/bibliografia/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoEquipamentoPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::equipamentoPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/equipamento/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoMobiliarioPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::mobiliarioPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/mobiliario/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoPessoaFisicaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaFisicaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/pessoaFisica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoPessoaJuridicaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaJuridicaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/pessoaJuridica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoAluguelPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::aluguelPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/aluguel/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoBolsaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bolsaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/bolsa/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoMaterialPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::materialPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/material/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoPassagemPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::passagemPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/passagem/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  2 =>   array (    0 => 'text',    1 => '/empenho',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioEmpenhoDeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idEmpenho',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoDeleteAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',  'idEmpenho' => '\\d+',  'categoria' => '\\w+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\w+',    3 => 'categoria',  ),  2 =>   array (    0 => 'text',    1 => '/categoria',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idEmpenho',  ),  4 =>   array (    0 => 'text',    1 => '/empenho',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  6 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidasRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/contrapartidas',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidasPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/contrapartidas/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',  'categoria' => '\\w+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\w+',    3 => 'categoria',  ),  1 =>   array (    0 => 'text',    1 => '/categoria',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  3 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  5 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaBibliografiaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bibliografiaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/bibliografia/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaEquipamentoPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::equipamentoPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/equipamento/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaMobiliarioPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::mobiliarioPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/mobiliario/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaPessoaFisicaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaFisicaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/pessoaFisica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaPessoaJuridicaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaJuridicaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/pessoaJuridica/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaAluguelPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::aluguelPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/aluguel/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaBolsaPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bolsaPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/bolsa/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaMaterialPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::materialPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/material/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaPassagemPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::passagemPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/passagem/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  2 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioContrapartidaDeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idContrapartida',  2 => 'categoria',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaDeleteAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',  'idContrapartida' => '\\d+',  'categoria' => '\\w+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\w+',    3 => 'categoria',  ),  2 =>   array (    0 => 'text',    1 => '/categoria',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idContrapartida',  ),  4 =>   array (    0 => 'text',    1 => '/contrapartida',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  6 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioConciliacaoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::conciliacaoAction',), array (  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/conciliacao',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioExtratoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/extrato',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioExtratoPostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoPostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/extrato/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioChequeRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',  'idCheque' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idCheque',  ),  1 =>   array (    0 => 'text',    1 => '/cheque',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  3 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioChequePostRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequePostAction',), array (  '_method' => 'POST',  'idRelatorio' => '\\d+',  'idCheque' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/post',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioChequeDeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',  1 => 'idCheque',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeDeleteAction',), array (  'idRelatorio' => '\\d+',  'idCheque' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idCheque',  ),  2 =>   array (    0 => 'text',    1 => '/cheque',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  4 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioImpressaoRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::impressaoAction',), array (  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/impressao',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioImprimirRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::imprimirAction',), array (  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/imprimir',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }

    private function getrelatorioDeleteRouteInfo()
    {
        return array(array (  0 => 'idRelatorio',), array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::deleteAction',), array (  '_method' => 'GET',  'idRelatorio' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'idRelatorio',  ),  2 =>   array (    0 => 'text',    1 => '/relatorio',  ),));
    }
}
