<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#xs', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // fapesc_tutorial_usuario_cadastrar
        if ($pathinfo === '/cadastrar') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarAction',  '_route' => 'fapesc_tutorial_usuario_cadastrar',);
        }

        // fapesc_tutorial_usuario_cadastrarpost
        if ($pathinfo === '/cadastrar/post') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarPostAction',  '_route' => 'fapesc_tutorial_usuario_cadastrarpost',);
        }

        // fapesc_tutorial_usuario_recuperar
        if ($pathinfo === '/recuperar') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarAction',  '_route' => 'fapesc_tutorial_usuario_recuperar',);
        }

        // fapesc_tutorial_usuario_recuperarpost
        if ($pathinfo === '/recuperar/post') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarPostAction',  '_route' => 'fapesc_tutorial_usuario_recuperarpost',);
        }

        // fapesc_tutorial_usuario_recuperarsenha
        if (0 === strpos($pathinfo, '/recuperar/senha') && preg_match('#^/recuperar/senha/(?P<cpf>[^/]+?)/(?P<email>[^/]+?)/(?P<hash>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaAction',)), array('_route' => 'fapesc_tutorial_usuario_recuperarsenha'));
        }

        // fapesc_tutorial_usuario_recuperarsenhapost
        if (0 === strpos($pathinfo, '/recuperar/senha') && preg_match('#^/recuperar/senha/(?P<cpf>[^/]+?)/(?P<email>[^/]+?)/(?P<hash>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaPostAction',)), array('_route' => 'fapesc_tutorial_usuario_recuperarsenhapost'));
        }

        // fapesc_tutorial_usuario_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginAction',  '_route' => 'fapesc_tutorial_usuario_login',);
        }

        // fapesc_tutorial_usuario_loginpost
        if ($pathinfo === '/loginPost') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginPostAction',  '_route' => 'fapesc_tutorial_usuario_loginpost',);
        }

        // fapesc_tutorial_usuario_perfil
        if ($pathinfo === '/perfil') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilAction',  '_route' => 'fapesc_tutorial_usuario_perfil',);
        }

        // fapesc_tutorial_usuario_perfilpost
        if ($pathinfo === '/perfil/post') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilPostAction',  '_route' => 'fapesc_tutorial_usuario_perfilpost',);
        }

        // fapesc_tutorial_usuario_senha
        if ($pathinfo === '/senha') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaAction',  '_route' => 'fapesc_tutorial_usuario_senha',);
        }

        // fapesc_tutorial_usuario_senhapost
        if ($pathinfo === '/senha/post') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaPostAction',  '_route' => 'fapesc_tutorial_usuario_senhapost',);
        }

        // fapesc_tutorial_usuario_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::logoutAction',  '_route' => 'fapesc_tutorial_usuario_logout',);
        }

        // fapesc_tutorial_usuario_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_usuario_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'fapesc_tutorial_usuario_index',);
        }

        // fapesc_tutorial_usuario_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::inicioAction',  '_route' => 'fapesc_tutorial_usuario_inicio',);
        }

        // fapesc_tutorial_fornecedor_fornecedores
        if ($pathinfo === '/fornecedores') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedoresAction',  '_route' => 'fapesc_tutorial_fornecedor_fornecedores',);
        }

        // fapesc_tutorial_fornecedor_fornecedor
        if (0 === strpos($pathinfo, '/fornecedor') && preg_match('#^/fornecedor/(?P<idFornecedor>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorAction',)), array('_route' => 'fapesc_tutorial_fornecedor_fornecedor'));
        }

        // fapesc_tutorial_fornecedor_fornecedorpost
        if (0 === strpos($pathinfo, '/fornecedor') && preg_match('#^/fornecedor/(?P<idFornecedor>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorPostAction',)), array('_route' => 'fapesc_tutorial_fornecedor_fornecedorpost'));
        }

        // fapesc_tutorial_fornecedor_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_fornecedor_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::indexAction',  '_route' => 'fapesc_tutorial_fornecedor_index',);
        }

        // fapesc_tutorial_fornecedor_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::inicioAction',  '_route' => 'fapesc_tutorial_fornecedor_inicio',);
        }

        // fapesc_tutorial_pesquisador_pesquisadores
        if ($pathinfo === '/pesquisadores') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::pesquisadoresAction',  '_route' => 'fapesc_tutorial_pesquisador_pesquisadores',);
        }

        // fapesc_tutorial_pesquisador_pesquisador
        if (0 === strpos($pathinfo, '/pesquisador') && preg_match('#^/pesquisador/(?P<idPesquisador>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::pesquisadorAction',)), array('_route' => 'fapesc_tutorial_pesquisador_pesquisador'));
        }

        // fapesc_tutorial_pesquisador_pesquisadorpost
        if (0 === strpos($pathinfo, '/pesquisador') && preg_match('#^/pesquisador/(?P<idPesquisador>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::pesquisadorPostAction',)), array('_route' => 'fapesc_tutorial_pesquisador_pesquisadorpost'));
        }

        // fapesc_tutorial_pesquisador_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_pesquisador_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::indexAction',  '_route' => 'fapesc_tutorial_pesquisador_index',);
        }

        // fapesc_tutorial_pesquisador_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::inicioAction',  '_route' => 'fapesc_tutorial_pesquisador_inicio',);
        }

        // fapesc_tutorial_fapesc_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_fapesc_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FapescController::indexAction',  '_route' => 'fapesc_tutorial_fapesc_index',);
        }

        // fapesc_tutorial_fapesc_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FapescController::inicioAction',  '_route' => 'fapesc_tutorial_fapesc_inicio',);
        }

        // fapesc_tutorial_empenho_empenhos
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenhos$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosAction',)), array('_route' => 'fapesc_tutorial_empenho_empenhos'));
        }

        // fapesc_tutorial_empenho_empenhospost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenhos/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosPostAction',)), array('_route' => 'fapesc_tutorial_empenho_empenhospost'));
        }

        // fapesc_tutorial_empenho_empenho
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/categoria/(?P<categoria>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoAction',)), array('_route' => 'fapesc_tutorial_empenho_empenho'));
        }

        // fapesc_tutorial_empenho_bibliografia
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/bibliografia$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bibliografiaAction',)), array('_route' => 'fapesc_tutorial_empenho_bibliografia'));
        }

        // fapesc_tutorial_empenho_bibliografiapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/bibliografia/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bibliografiaPostAction',)), array('_route' => 'fapesc_tutorial_empenho_bibliografiapost'));
        }

        // fapesc_tutorial_empenho_equipamento
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/equipamento$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::equipamentoAction',)), array('_route' => 'fapesc_tutorial_empenho_equipamento'));
        }

        // fapesc_tutorial_empenho_equipamentopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/equipamento/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::equipamentoPostAction',)), array('_route' => 'fapesc_tutorial_empenho_equipamentopost'));
        }

        // fapesc_tutorial_empenho_mobiliario
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/mobiliario$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::mobiliarioAction',)), array('_route' => 'fapesc_tutorial_empenho_mobiliario'));
        }

        // fapesc_tutorial_empenho_mobiliariopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/mobiliario/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::mobiliarioPostAction',)), array('_route' => 'fapesc_tutorial_empenho_mobiliariopost'));
        }

        // fapesc_tutorial_empenho_pessoafisica
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/pessoaFisica$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaFisicaAction',)), array('_route' => 'fapesc_tutorial_empenho_pessoafisica'));
        }

        // fapesc_tutorial_empenho_pessoafisicapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/pessoaFisica/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaFisicaPostAction',)), array('_route' => 'fapesc_tutorial_empenho_pessoafisicapost'));
        }

        // fapesc_tutorial_empenho_pessoajuridica
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/pessoaJuridica$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaJuridicaAction',)), array('_route' => 'fapesc_tutorial_empenho_pessoajuridica'));
        }

        // fapesc_tutorial_empenho_pessoajuridicapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/pessoaJuridica/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaJuridicaPostAction',)), array('_route' => 'fapesc_tutorial_empenho_pessoajuridicapost'));
        }

        // fapesc_tutorial_empenho_material
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/material$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::materialAction',)), array('_route' => 'fapesc_tutorial_empenho_material'));
        }

        // fapesc_tutorial_empenho_materialpost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/material/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::materialPostAction',)), array('_route' => 'fapesc_tutorial_empenho_materialpost'));
        }

        // fapesc_tutorial_empenho_bolsa
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/bolsa$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bolsaAction',)), array('_route' => 'fapesc_tutorial_empenho_bolsa'));
        }

        // fapesc_tutorial_empenho_bolsapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/bolsa/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bolsaPostAction',)), array('_route' => 'fapesc_tutorial_empenho_bolsapost'));
        }

        // fapesc_tutorial_empenho_passagem
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/passagem$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::passagemAction',)), array('_route' => 'fapesc_tutorial_empenho_passagem'));
        }

        // fapesc_tutorial_empenho_passagempost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/passagem/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::passagemPostAction',)), array('_route' => 'fapesc_tutorial_empenho_passagempost'));
        }

        // fapesc_tutorial_empenho_diaria
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/diaria$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::diariaAction',)), array('_route' => 'fapesc_tutorial_empenho_diaria'));
        }

        // fapesc_tutorial_empenho_diariapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/diaria/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::diariaPostAction',)), array('_route' => 'fapesc_tutorial_empenho_diariapost'));
        }

        // fapesc_tutorial_empenho_empenhodelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/empenho/(?P<idEmpenho>[^/]+?)/categoria/(?P<categoria>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoDeleteAction',)), array('_route' => 'fapesc_tutorial_empenho_empenhodelete'));
        }

        // fapesc_tutorial_empenho_dados
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/dados$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::dadosAction',)), array('_route' => 'fapesc_tutorial_empenho_dados'));
        }

        // fapesc_tutorial_empenho_dadospost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/dados/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::dadosPostAction',)), array('_route' => 'fapesc_tutorial_empenho_dadospost'));
        }

        // fapesc_tutorial_empenho_relatorio
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/relatorio$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::relatorioAction',)), array('_route' => 'fapesc_tutorial_empenho_relatorio'));
        }

        // fapesc_tutorial_empenho_relatoriopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/relatorio/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::relatorioPostAction',)), array('_route' => 'fapesc_tutorial_empenho_relatoriopost'));
        }

        // fapesc_tutorial_empenho_metas
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/metas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::metasAction',)), array('_route' => 'fapesc_tutorial_empenho_metas'));
        }

        // fapesc_tutorial_empenho_meta
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/meta/(?P<idMeta>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::metaAction',)), array('_route' => 'fapesc_tutorial_empenho_meta'));
        }

        // fapesc_tutorial_empenho_metapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/meta/(?P<idMeta>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::metaPostAction',)), array('_route' => 'fapesc_tutorial_empenho_metapost'));
        }

        // fapesc_tutorial_empenho_conciliacao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/conciliacao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::conciliacaoAction',)), array('_route' => 'fapesc_tutorial_empenho_conciliacao'));
        }

        // fapesc_tutorial_empenho_extrato
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/extrato$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::extratoAction',)), array('_route' => 'fapesc_tutorial_empenho_extrato'));
        }

        // fapesc_tutorial_empenho_extratopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/extrato/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::extratoPostAction',)), array('_route' => 'fapesc_tutorial_empenho_extratopost'));
        }

        // fapesc_tutorial_empenho_cheque
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::chequeAction',)), array('_route' => 'fapesc_tutorial_empenho_cheque'));
        }

        // fapesc_tutorial_empenho_chequepost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::chequePostAction',)), array('_route' => 'fapesc_tutorial_empenho_chequepost'));
        }

        // fapesc_tutorial_empenho_chequedelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::chequeDeleteAction',)), array('_route' => 'fapesc_tutorial_empenho_chequedelete'));
        }

        // fapesc_tutorial_empenho_tc28
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/tc28$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::tc28Action',)), array('_route' => 'fapesc_tutorial_empenho_tc28'));
        }

        // fapesc_tutorial_empenho_devolucao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/devolucao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::devolucaoAction',)), array('_route' => 'fapesc_tutorial_empenho_devolucao'));
        }

        // fapesc_tutorial_empenho_delete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::deleteAction',)), array('_route' => 'fapesc_tutorial_empenho_delete'));
        }

        // fapesc_tutorial_empenho_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_empenho_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::indexAction',  '_route' => 'fapesc_tutorial_empenho_index',);
        }

        // fapesc_tutorial_empenho_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::inicioAction',  '_route' => 'fapesc_tutorial_empenho_inicio',);
        }

        // fapesc_tutorial_projeto_dados
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/dados$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosAction',)), array('_route' => 'fapesc_tutorial_projeto_dados'));
        }

        // fapesc_tutorial_projeto_dadospost
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/dados/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosPostAction',)), array('_route' => 'fapesc_tutorial_projeto_dadospost'));
        }

        // fapesc_tutorial_projeto_resumo
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/resumo$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoAction',)), array('_route' => 'fapesc_tutorial_projeto_resumo'));
        }

        // fapesc_tutorial_projeto_resumopost
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/resumo/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoPostAction',)), array('_route' => 'fapesc_tutorial_projeto_resumopost'));
        }

        // fapesc_tutorial_projeto_metas
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/metas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metasAction',)), array('_route' => 'fapesc_tutorial_projeto_metas'));
        }

        // fapesc_tutorial_projeto_meta
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/meta/(?P<idMeta>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaAction',)), array('_route' => 'fapesc_tutorial_projeto_meta'));
        }

        // fapesc_tutorial_projeto_metapost
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/meta/(?P<idMeta>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaPostAction',)), array('_route' => 'fapesc_tutorial_projeto_metapost'));
        }

        // fapesc_tutorial_projeto_metadelete
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/meta/(?P<idMeta>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaDeleteAction',)), array('_route' => 'fapesc_tutorial_projeto_metadelete'));
        }

        // fapesc_tutorial_projeto_relatorios
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/relatorios$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::relatoriosAction',)), array('_route' => 'fapesc_tutorial_projeto_relatorios'));
        }

        // fapesc_tutorial_projeto_delete
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::deleteAction',)), array('_route' => 'fapesc_tutorial_projeto_delete'));
        }

        // fapesc_tutorial_projeto_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_projeto_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::indexAction',  '_route' => 'fapesc_tutorial_projeto_index',);
        }

        // fapesc_tutorial_projeto_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::inicioAction',  '_route' => 'fapesc_tutorial_projeto_inicio',);
        }

        // fapesc_tutorial_contrapartida_contrapartidas
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartidas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasAction',)), array('_route' => 'fapesc_tutorial_contrapartida_contrapartidas'));
        }

        // fapesc_tutorial_contrapartida_contrapartidaspost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartidas/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_contrapartidaspost'));
        }

        // fapesc_tutorial_contrapartida_contrapartida
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/categoria/(?P<categoria>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_contrapartida'));
        }

        // fapesc_tutorial_contrapartida_bibliografia
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/bibliografia$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bibliografiaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_bibliografia'));
        }

        // fapesc_tutorial_contrapartida_bibliografiapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/bibliografia/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bibliografiaPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_bibliografiapost'));
        }

        // fapesc_tutorial_contrapartida_equipamento
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/equipamento$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::equipamentoAction',)), array('_route' => 'fapesc_tutorial_contrapartida_equipamento'));
        }

        // fapesc_tutorial_contrapartida_equipamentopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/equipamento/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::equipamentoPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_equipamentopost'));
        }

        // fapesc_tutorial_contrapartida_mobiliario
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/mobiliario$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::mobiliarioAction',)), array('_route' => 'fapesc_tutorial_contrapartida_mobiliario'));
        }

        // fapesc_tutorial_contrapartida_mobiliariopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/mobiliario/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::mobiliarioPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_mobiliariopost'));
        }

        // fapesc_tutorial_contrapartida_pessoafisica
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/pessoaFisica$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaFisicaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_pessoafisica'));
        }

        // fapesc_tutorial_contrapartida_pessoafisicapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/pessoaFisica/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaFisicaPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_pessoafisicapost'));
        }

        // fapesc_tutorial_contrapartida_pessoajuridica
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/pessoaJuridica$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaJuridicaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_pessoajuridica'));
        }

        // fapesc_tutorial_contrapartida_pessoajuridicapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/pessoaJuridica/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaJuridicaPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_pessoajuridicapost'));
        }

        // fapesc_tutorial_contrapartida_material
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/material$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::materialAction',)), array('_route' => 'fapesc_tutorial_contrapartida_material'));
        }

        // fapesc_tutorial_contrapartida_materialpost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/material/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::materialPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_materialpost'));
        }

        // fapesc_tutorial_contrapartida_bolsa
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/bolsa$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bolsaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_bolsa'));
        }

        // fapesc_tutorial_contrapartida_bolsapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/bolsa/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bolsaPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_bolsapost'));
        }

        // fapesc_tutorial_contrapartida_passagem
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/passagem$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::passagemAction',)), array('_route' => 'fapesc_tutorial_contrapartida_passagem'));
        }

        // fapesc_tutorial_contrapartida_passagempost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/passagem/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::passagemPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_passagempost'));
        }

        // fapesc_tutorial_contrapartida_diaria
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/diaria$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::diariaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_diaria'));
        }

        // fapesc_tutorial_contrapartida_diariapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/diaria/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::diariaPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_diariapost'));
        }

        // fapesc_tutorial_contrapartida_salario
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/salario$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::salarioAction',)), array('_route' => 'fapesc_tutorial_contrapartida_salario'));
        }

        // fapesc_tutorial_contrapartida_salariopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/salario/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::salarioPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_salariopost'));
        }

        // fapesc_tutorial_contrapartida_contrapartidadelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/contrapartida/(?P<idContrapartida>[^/]+?)/categoria/(?P<categoria>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaDeleteAction',)), array('_route' => 'fapesc_tutorial_contrapartida_contrapartidadelete'));
        }

        // fapesc_tutorial_contrapartida_dados
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/dados$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::dadosAction',)), array('_route' => 'fapesc_tutorial_contrapartida_dados'));
        }

        // fapesc_tutorial_contrapartida_dadospost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/dados/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::dadosPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_dadospost'));
        }

        // fapesc_tutorial_contrapartida_relatorio
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/relatorio$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::relatorioAction',)), array('_route' => 'fapesc_tutorial_contrapartida_relatorio'));
        }

        // fapesc_tutorial_contrapartida_relatoriopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/relatorio/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::relatorioPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_relatoriopost'));
        }

        // fapesc_tutorial_contrapartida_metas
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/metas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::metasAction',)), array('_route' => 'fapesc_tutorial_contrapartida_metas'));
        }

        // fapesc_tutorial_contrapartida_meta
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/meta/(?P<idMeta>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::metaAction',)), array('_route' => 'fapesc_tutorial_contrapartida_meta'));
        }

        // fapesc_tutorial_contrapartida_metapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/meta/(?P<idMeta>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::metaPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_metapost'));
        }

        // fapesc_tutorial_contrapartida_conciliacao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/conciliacao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::conciliacaoAction',)), array('_route' => 'fapesc_tutorial_contrapartida_conciliacao'));
        }

        // fapesc_tutorial_contrapartida_extrato
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/extrato$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::extratoAction',)), array('_route' => 'fapesc_tutorial_contrapartida_extrato'));
        }

        // fapesc_tutorial_contrapartida_extratopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/extrato/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::extratoPostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_extratopost'));
        }

        // fapesc_tutorial_contrapartida_cheque
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::chequeAction',)), array('_route' => 'fapesc_tutorial_contrapartida_cheque'));
        }

        // fapesc_tutorial_contrapartida_chequepost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::chequePostAction',)), array('_route' => 'fapesc_tutorial_contrapartida_chequepost'));
        }

        // fapesc_tutorial_contrapartida_chequedelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::chequeDeleteAction',)), array('_route' => 'fapesc_tutorial_contrapartida_chequedelete'));
        }

        // fapesc_tutorial_contrapartida_tc28
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/tc28$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::tc28Action',)), array('_route' => 'fapesc_tutorial_contrapartida_tc28'));
        }

        // fapesc_tutorial_contrapartida_devolucao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/devolucao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::devolucaoAction',)), array('_route' => 'fapesc_tutorial_contrapartida_devolucao'));
        }

        // fapesc_tutorial_contrapartida_delete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::deleteAction',)), array('_route' => 'fapesc_tutorial_contrapartida_delete'));
        }

        // fapesc_tutorial_contrapartida_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_contrapartida_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::indexAction',  '_route' => 'fapesc_tutorial_contrapartida_index',);
        }

        // fapesc_tutorial_contrapartida_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::inicioAction',  '_route' => 'fapesc_tutorial_contrapartida_inicio',);
        }

        // fapesc_tutorial_bolsista_bolsistas
        if ($pathinfo === '/bolsistas') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistasAction',  '_route' => 'fapesc_tutorial_bolsista_bolsistas',);
        }

        // fapesc_tutorial_bolsista_bolsista
        if (0 === strpos($pathinfo, '/bolsista') && preg_match('#^/bolsista/(?P<idBolsista>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaAction',)), array('_route' => 'fapesc_tutorial_bolsista_bolsista'));
        }

        // fapesc_tutorial_bolsista_bolsistapost
        if (0 === strpos($pathinfo, '/bolsista') && preg_match('#^/bolsista/(?P<idBolsista>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaPostAction',)), array('_route' => 'fapesc_tutorial_bolsista_bolsistapost'));
        }

        // fapesc_tutorial_bolsista_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_bolsista_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::indexAction',  '_route' => 'fapesc_tutorial_bolsista_index',);
        }

        // fapesc_tutorial_bolsista_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::inicioAction',  '_route' => 'fapesc_tutorial_bolsista_inicio',);
        }

        // fapesc_tutorial_impressao_impressao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/impressao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::impressaoAction',)), array('_route' => 'fapesc_tutorial_impressao_impressao'));
        }

        // fapesc_tutorial_impressao_imprimir
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/imprimir$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::imprimirAction',)), array('_route' => 'fapesc_tutorial_impressao_imprimir'));
        }

        // fapesc_tutorial_impressao_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_impressao_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::indexAction',  '_route' => 'fapesc_tutorial_impressao_index',);
        }

        // fapesc_tutorial_impressao_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::inicioAction',  '_route' => 'fapesc_tutorial_impressao_inicio',);
        }

        // fapesc_tutorial_relatorio_dados
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/dados$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosAction',)), array('_route' => 'fapesc_tutorial_relatorio_dados'));
        }

        // fapesc_tutorial_relatorio_dadospost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/dados/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosPostAction',)), array('_route' => 'fapesc_tutorial_relatorio_dadospost'));
        }

        // fapesc_tutorial_relatorio_relatorio
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/relatorio$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioAction',)), array('_route' => 'fapesc_tutorial_relatorio_relatorio'));
        }

        // fapesc_tutorial_relatorio_relatoriopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/relatorio/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioPostAction',)), array('_route' => 'fapesc_tutorial_relatorio_relatoriopost'));
        }

        // fapesc_tutorial_relatorio_metas
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/metas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metasAction',)), array('_route' => 'fapesc_tutorial_relatorio_metas'));
        }

        // fapesc_tutorial_relatorio_meta
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/meta/(?P<idMeta>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaAction',)), array('_route' => 'fapesc_tutorial_relatorio_meta'));
        }

        // fapesc_tutorial_relatorio_metapost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/meta/(?P<idMeta>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaPostAction',)), array('_route' => 'fapesc_tutorial_relatorio_metapost'));
        }

        // fapesc_tutorial_relatorio_conciliacao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/conciliacao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::conciliacaoAction',)), array('_route' => 'fapesc_tutorial_relatorio_conciliacao'));
        }

        // fapesc_tutorial_relatorio_extrato
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/extrato$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoAction',)), array('_route' => 'fapesc_tutorial_relatorio_extrato'));
        }

        // fapesc_tutorial_relatorio_extratopost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/extrato/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoPostAction',)), array('_route' => 'fapesc_tutorial_relatorio_extratopost'));
        }

        // fapesc_tutorial_relatorio_cheque
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeAction',)), array('_route' => 'fapesc_tutorial_relatorio_cheque'));
        }

        // fapesc_tutorial_relatorio_chequepost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)/post$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequePostAction',)), array('_route' => 'fapesc_tutorial_relatorio_chequepost'));
        }

        // fapesc_tutorial_relatorio_chequedelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/cheque/(?P<idCheque>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeDeleteAction',)), array('_route' => 'fapesc_tutorial_relatorio_chequedelete'));
        }

        // fapesc_tutorial_relatorio_tc28
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/tc28$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::tc28Action',)), array('_route' => 'fapesc_tutorial_relatorio_tc28'));
        }

        // fapesc_tutorial_relatorio_devolucao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/devolucao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::devolucaoAction',)), array('_route' => 'fapesc_tutorial_relatorio_devolucao'));
        }

        // fapesc_tutorial_relatorio_delete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>[^/]+?)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::deleteAction',)), array('_route' => 'fapesc_tutorial_relatorio_delete'));
        }

        // fapesc_tutorial_relatorio_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'fapesc_tutorial_relatorio_index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::indexAction',  '_route' => 'fapesc_tutorial_relatorio_index',);
        }

        // fapesc_tutorial_relatorio_inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::inicioAction',  '_route' => 'fapesc_tutorial_relatorio_inicio',);
        }

        // index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'index');
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'index',);
        }

        // cadastrar
        if ($pathinfo === '/cadastrar') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_cadastrar;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarAction',  '_route' => 'cadastrar',);
        }
        not_cadastrar:

        // cadastrarPost
        if ($pathinfo === '/cadastrar/post') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_cadastrarPost;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::cadastrarPostAction',  '_route' => 'cadastrarPost',);
        }
        not_cadastrarPost:

        // recuperar
        if ($pathinfo === '/recuperar') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_recuperar;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarAction',  '_route' => 'recuperar',);
        }
        not_recuperar:

        // recuperarPost
        if ($pathinfo === '/recuperar/post') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_recuperarPost;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarPostAction',  '_route' => 'recuperarPost',);
        }
        not_recuperarPost:

        // recuperarSenha
        if (0 === strpos($pathinfo, '/recuperar/senha') && preg_match('#^/recuperar/senha/(?P<cpf>.+)/(?P<email>.+)/(?P<hash>\\w+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_recuperarSenha;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaAction',)), array('_route' => 'recuperarSenha'));
        }
        not_recuperarSenha:

        // recuperarSenhaPost
        if (0 === strpos($pathinfo, '/recuperar/senha') && preg_match('#^/recuperar/senha/(?P<cpf>.+)/(?P<email>.+)/(?P<hash>\\w+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_recuperarSenhaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::recuperarSenhaPostAction',)), array('_route' => 'recuperarSenhaPost'));
        }
        not_recuperarSenhaPost:

        // login
        if ($pathinfo === '/login') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_login;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginAction',  '_route' => 'login',);
        }
        not_login:

        // loginPost
        if ($pathinfo === '/loginPost') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_loginPost;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::loginPostAction',  '_route' => 'loginPost',);
        }
        not_loginPost:

        // inicio
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::inicioAction',  '_route' => 'inicio',);
        }

        // perfil
        if ($pathinfo === '/perfil') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_perfil;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilAction',  '_route' => 'perfil',);
        }
        not_perfil:

        // perfilPost
        if ($pathinfo === '/perfil/post') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_perfilPost;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::perfilPostAction',  '_route' => 'perfilPost',);
        }
        not_perfilPost:

        // senha
        if ($pathinfo === '/senha') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_senha;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaAction',  '_route' => 'senha',);
        }
        not_senha:

        // senhaPost
        if ($pathinfo === '/senha/post') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_senhaPost;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::senhaPostAction',  '_route' => 'senhaPost',);
        }
        not_senhaPost:

        // logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\UsuarioController::logoutAction',  '_route' => 'logout',);
        }

        // bolsistas
        if ($pathinfo === '/bolsistas') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_bolsistas;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistasAction',  '_route' => 'bolsistas',);
        }
        not_bolsistas:

        // bolsista
        if (0 === strpos($pathinfo, '/bolsista') && preg_match('#^/bolsista/(?P<idBolsista>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_bolsista;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaAction',)), array('_route' => 'bolsista'));
        }
        not_bolsista:

        // bolsistaPost
        if (0 === strpos($pathinfo, '/bolsista') && preg_match('#^/bolsista/(?P<idBolsista>\\d+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_bolsistaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\BolsistaController::bolsistaPostAction',)), array('_route' => 'bolsistaPost'));
        }
        not_bolsistaPost:

        // fornecedores
        if ($pathinfo === '/fornecedores') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_fornecedores;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedoresAction',  '_route' => 'fornecedores',);
        }
        not_fornecedores:

        // fornecedor
        if (0 === strpos($pathinfo, '/fornecedor') && preg_match('#^/fornecedor/(?P<idFornecedor>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_fornecedor;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorAction',)), array('_route' => 'fornecedor'));
        }
        not_fornecedor:

        // fornecedorPost
        if (0 === strpos($pathinfo, '/fornecedor') && preg_match('#^/fornecedor/(?P<idFornecedor>\\d+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_fornecedorPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\FornecedorController::fornecedorPostAction',)), array('_route' => 'fornecedorPost'));
        }
        not_fornecedorPost:

        // pesquisadores
        if ($pathinfo === '/pesquisadores') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_pesquisadores;
            }
            return array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::pesquisadoresAction',  '_route' => 'pesquisadores',);
        }
        not_pesquisadores:

        // pesquisador
        if (0 === strpos($pathinfo, '/pesquisador') && preg_match('#^/pesquisador/(?P<idPesquisador>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_pesquisador;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::pesquisadorAction',)), array('_route' => 'pesquisador'));
        }
        not_pesquisador:

        // pesquisadorPost
        if (0 === strpos($pathinfo, '/pesquisador') && preg_match('#^/pesquisador/(?P<idPesquisador>\\d+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_pesquisadorPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\PesquisadorController::pesquisadorPostAction',)), array('_route' => 'pesquisadorPost'));
        }
        not_pesquisadorPost:

        // projetoDados
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/dados$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_projetoDados;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosAction',)), array('_route' => 'projetoDados'));
        }
        not_projetoDados:

        // projetoDadosPost
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/dados/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_projetoDadosPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::dadosPostAction',)), array('_route' => 'projetoDadosPost'));
        }
        not_projetoDadosPost:

        // projetoResumo
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/resumo$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_projetoResumo;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoAction',)), array('_route' => 'projetoResumo'));
        }
        not_projetoResumo:

        // projetoResumoPost
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/resumo/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_projetoResumoPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::resumoPostAction',)), array('_route' => 'projetoResumoPost'));
        }
        not_projetoResumoPost:

        // projetoMetas
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/metas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metasAction',)), array('_route' => 'projetoMetas'));
        }

        // projetoMeta
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/meta/(?P<idMeta>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_projetoMeta;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaAction',)), array('_route' => 'projetoMeta'));
        }
        not_projetoMeta:

        // projetoMetaPost
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/meta/(?P<idMeta>\\d+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_projetoMetaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaPostAction',)), array('_route' => 'projetoMetaPost'));
        }
        not_projetoMetaPost:

        // projetoMetaDelete
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/meta/(?P<idMeta>\\d+)/delete$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_projetoMetaDelete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::metaDeleteAction',)), array('_route' => 'projetoMetaDelete'));
        }
        not_projetoMetaDelete:

        // projetoRelatorios
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/relatorios$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::relatoriosAction',)), array('_route' => 'projetoRelatorios'));
        }

        // projetoDelete
        if (0 === strpos($pathinfo, '/projeto') && preg_match('#^/projeto/(?P<idProjeto>\\d+)/delete$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_projetoDelete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ProjetoController::deleteAction',)), array('_route' => 'projetoDelete'));
        }
        not_projetoDelete:

        // relatorioDados
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/dados$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioDados;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosAction',)), array('_route' => 'relatorioDados'));
        }
        not_relatorioDados:

        // relatorioDadosProjeto
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/dados/(?P<idProjeto>[^/]+?)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioDadosProjeto;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosAction',)), array('_route' => 'relatorioDadosProjeto'));
        }
        not_relatorioDadosProjeto:

        // relatorioDadosPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/dados/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioDadosPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::dadosPostAction',)), array('_route' => 'relatorioDadosPost'));
        }
        not_relatorioDadosPost:

        // relatorioRelatorio
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/relatorio$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioRelatorio;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioAction',)), array('_route' => 'relatorioRelatorio'));
        }
        not_relatorioRelatorio:

        // relatorioRelatorioPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/relatorio/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioRelatorioPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::relatorioPostAction',)), array('_route' => 'relatorioRelatorioPost'));
        }
        not_relatorioRelatorioPost:

        // relatorioMetas
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/metas$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metasAction',)), array('_route' => 'relatorioMetas'));
        }

        // relatorioMeta
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/meta/(?P<idMeta>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioMeta;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaAction',)), array('_route' => 'relatorioMeta'));
        }
        not_relatorioMeta:

        // relatorioMetaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/meta/(?P<idMeta>\\d+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioMetaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::metaPostAction',)), array('_route' => 'relatorioMetaPost'));
        }
        not_relatorioMetaPost:

        // relatorioEmpenhos
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenhos$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioEmpenhos;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosAction',)), array('_route' => 'relatorioEmpenhos'));
        }
        not_relatorioEmpenhos:

        // relatorioEmpenhosPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenhos/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhosPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhosPostAction',)), array('_route' => 'relatorioEmpenhosPost'));
        }
        not_relatorioEmpenhosPost:

        // relatorioEmpenho
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/categoria/(?P<categoria>\\w+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioEmpenho;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoAction',)), array('_route' => 'relatorioEmpenho'));
        }
        not_relatorioEmpenho:

        // relatorioEmpenhoBibliografiaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/bibliografia/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoBibliografiaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bibliografiaPostAction',)), array('_route' => 'relatorioEmpenhoBibliografiaPost'));
        }
        not_relatorioEmpenhoBibliografiaPost:

        // relatorioEmpenhoEquipamentoPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/equipamento/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoEquipamentoPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::equipamentoPostAction',)), array('_route' => 'relatorioEmpenhoEquipamentoPost'));
        }
        not_relatorioEmpenhoEquipamentoPost:

        // relatorioEmpenhoMobiliarioPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/mobiliario/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoMobiliarioPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::mobiliarioPostAction',)), array('_route' => 'relatorioEmpenhoMobiliarioPost'));
        }
        not_relatorioEmpenhoMobiliarioPost:

        // relatorioEmpenhoPessoaFisicaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/pessoaFisica/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoPessoaFisicaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaFisicaPostAction',)), array('_route' => 'relatorioEmpenhoPessoaFisicaPost'));
        }
        not_relatorioEmpenhoPessoaFisicaPost:

        // relatorioEmpenhoPessoaJuridicaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/pessoaJuridica/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoPessoaJuridicaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::pessoaJuridicaPostAction',)), array('_route' => 'relatorioEmpenhoPessoaJuridicaPost'));
        }
        not_relatorioEmpenhoPessoaJuridicaPost:

        // relatorioEmpenhoAluguelPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/aluguel/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoAluguelPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::aluguelPostAction',)), array('_route' => 'relatorioEmpenhoAluguelPost'));
        }
        not_relatorioEmpenhoAluguelPost:

        // relatorioEmpenhoMaterialPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/material/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoMaterialPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::materialPostAction',)), array('_route' => 'relatorioEmpenhoMaterialPost'));
        }
        not_relatorioEmpenhoMaterialPost:

        // relatorioEmpenhoBolsaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/bolsa/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoBolsaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::bolsaPostAction',)), array('_route' => 'relatorioEmpenhoBolsaPost'));
        }
        not_relatorioEmpenhoBolsaPost:

        // relatorioEmpenhoPassagemPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/passagem/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoPassagemPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::passagemPostAction',)), array('_route' => 'relatorioEmpenhoPassagemPost'));
        }
        not_relatorioEmpenhoPassagemPost:

        // relatorioEmpenhoDiariaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/diaria/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioEmpenhoDiariaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::diariaPostAction',)), array('_route' => 'relatorioEmpenhoDiariaPost'));
        }
        not_relatorioEmpenhoDiariaPost:

        // relatorioEmpenhoDelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/empenho/(?P<idEmpenho>\\d+)/categoria/(?P<categoria>\\w+)/delete$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioEmpenhoDelete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\EmpenhoController::empenhoDeleteAction',)), array('_route' => 'relatorioEmpenhoDelete'));
        }
        not_relatorioEmpenhoDelete:

        // relatorioContrapartidas
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartidas$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioContrapartidas;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasAction',)), array('_route' => 'relatorioContrapartidas'));
        }
        not_relatorioContrapartidas:

        // relatorioContrapartidasPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartidas/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidasPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidasPostAction',)), array('_route' => 'relatorioContrapartidasPost'));
        }
        not_relatorioContrapartidasPost:

        // relatorioContrapartida
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/categoria/(?P<categoria>\\w+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioContrapartida;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaAction',)), array('_route' => 'relatorioContrapartida'));
        }
        not_relatorioContrapartida:

        // relatorioContrapartidaBibliografiaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/bibliografia/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaBibliografiaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bibliografiaPostAction',)), array('_route' => 'relatorioContrapartidaBibliografiaPost'));
        }
        not_relatorioContrapartidaBibliografiaPost:

        // relatorioContrapartidaEquipamentoPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/equipamento/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaEquipamentoPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::equipamentoPostAction',)), array('_route' => 'relatorioContrapartidaEquipamentoPost'));
        }
        not_relatorioContrapartidaEquipamentoPost:

        // relatorioContrapartidaMobiliarioPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/mobiliario/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaMobiliarioPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::mobiliarioPostAction',)), array('_route' => 'relatorioContrapartidaMobiliarioPost'));
        }
        not_relatorioContrapartidaMobiliarioPost:

        // relatorioContrapartidaPessoaFisicaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/pessoaFisica/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaPessoaFisicaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaFisicaPostAction',)), array('_route' => 'relatorioContrapartidaPessoaFisicaPost'));
        }
        not_relatorioContrapartidaPessoaFisicaPost:

        // relatorioContrapartidaPessoaJuridicaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/pessoaJuridica/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaPessoaJuridicaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::pessoaJuridicaPostAction',)), array('_route' => 'relatorioContrapartidaPessoaJuridicaPost'));
        }
        not_relatorioContrapartidaPessoaJuridicaPost:

        // relatorioContrapartidaAluguelPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/aluguel/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaAluguelPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::aluguelPostAction',)), array('_route' => 'relatorioContrapartidaAluguelPost'));
        }
        not_relatorioContrapartidaAluguelPost:

        // relatorioContrapartidaMaterialPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/material/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaMaterialPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::materialPostAction',)), array('_route' => 'relatorioContrapartidaMaterialPost'));
        }
        not_relatorioContrapartidaMaterialPost:

        // relatorioContrapartidaBolsaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/bolsa/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaBolsaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::bolsaPostAction',)), array('_route' => 'relatorioContrapartidaBolsaPost'));
        }
        not_relatorioContrapartidaBolsaPost:

        // relatorioContrapartidaPassagemPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/passagem/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaPassagemPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::passagemPostAction',)), array('_route' => 'relatorioContrapartidaPassagemPost'));
        }
        not_relatorioContrapartidaPassagemPost:

        // relatorioContrapartidaDiariaPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/diaria/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaDiariaPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::diariaPostAction',)), array('_route' => 'relatorioContrapartidaDiariaPost'));
        }
        not_relatorioContrapartidaDiariaPost:

        // relatorioContrapartidaSalarioPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/salario/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioContrapartidaSalarioPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::salarioPostAction',)), array('_route' => 'relatorioContrapartidaSalarioPost'));
        }
        not_relatorioContrapartidaSalarioPost:

        // relatorioContrapartidaDelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/contrapartida/(?P<idContrapartida>\\d+)/categoria/(?P<categoria>\\w+)/delete$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioContrapartidaDelete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ContrapartidaController::contrapartidaDeleteAction',)), array('_route' => 'relatorioContrapartidaDelete'));
        }
        not_relatorioContrapartidaDelete:

        // relatorioConciliacao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/conciliacao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::conciliacaoAction',)), array('_route' => 'relatorioConciliacao'));
        }

        // relatorioExtrato
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/extrato$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioExtrato;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoAction',)), array('_route' => 'relatorioExtrato'));
        }
        not_relatorioExtrato:

        // relatorioExtratoPost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/extrato/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioExtratoPost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::extratoPostAction',)), array('_route' => 'relatorioExtratoPost'));
        }
        not_relatorioExtratoPost:

        // relatorioCheque
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/cheque/(?P<idCheque>\\d+)$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioCheque;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeAction',)), array('_route' => 'relatorioCheque'));
        }
        not_relatorioCheque:

        // relatorioChequePost
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/cheque/(?P<idCheque>\\d+)/post$#xs', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_relatorioChequePost;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequePostAction',)), array('_route' => 'relatorioChequePost'));
        }
        not_relatorioChequePost:

        // relatorioChequeDelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/cheque/(?P<idCheque>\\d+)/delete$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::chequeDeleteAction',)), array('_route' => 'relatorioChequeDelete'));
        }

        // relatorioTc28
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/tc28$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::tc28Action',)), array('_route' => 'relatorioTc28'));
        }

        // relatorioDevolucao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/devolucao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::devolucaoAction',)), array('_route' => 'relatorioDevolucao'));
        }

        // relatorioImpressao
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/impressao$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::impressaoAction',)), array('_route' => 'relatorioImpressao'));
        }

        // relatorioImprimir
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/imprimir$#xs', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\ImpressaoController::imprimirAction',)), array('_route' => 'relatorioImprimir'));
        }

        // relatorioDelete
        if (0 === strpos($pathinfo, '/relatorio') && preg_match('#^/relatorio/(?P<idRelatorio>\\d+)/delete$#xs', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_relatorioDelete;
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Fapesc\\TutorialBundle\\Controller\\RelatorioController::deleteAction',)), array('_route' => 'relatorioDelete'));
        }
        not_relatorioDelete:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
