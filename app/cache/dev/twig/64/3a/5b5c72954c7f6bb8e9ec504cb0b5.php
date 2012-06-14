<?php

/* FapescTutorialBundle:Fapesc:inicio.html.twig */
class __TwigTemplate_643a5b5c72954c7f6bb8e9ec504cb0b5 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        $parent = "FapescTutorialBundle:Usuario:index.html.twig";
        if ($parent instanceof Twig_Template) {
            $name = $parent->getTemplateName();
            $this->parent[$name] = $parent;
            $parent = $name;
        } elseif (!isset($this->parent[$parent])) {
            $this->parent[$parent] = $this->env->loadTemplate($parent);
        }

        return $this->parent[$parent];
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"content\">

\t<div id=\"sidebar\">
\t\t<a id=\"projects-registry\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoDados", array("idProjeto" => 0)), "html");
        echo "\" title=\"Adicionar um projeto ao sistema.\">Registrar Projeto</a><br /><br /><br />
\t\t";
        // line 8
        if ((twig_length_filter($this->env, $this->getContext($context, 'projetos')) > 0)) {
            // line 9
            echo "\t\t<a id=\"new-report\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioDados", array("idRelatorio" => 0)), "html");
            echo "\" title=\"Iniciar um novo relatório.\">Iniciar Relatório</a><br /><br /><br />
\t\t";
        }
        // line 11
        echo "\t\t<a id=\"projects-button\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bolsistas"), "html");
        echo "\" title=\"Gerenciar bolsistas\">& Gerenciar Bolsistas</a><br /><br /><br />
                        <a id=\"projects-button\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fornecedores"), "html");
        echo "\" title=\"Gerenciar fornecedores\">& Gerenciar Fornecedores</a><br /><br /><br />
                        <a id=\"projects-button\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("pesquisadores"), "html");
        echo "\" title=\"Gerenciar pesquisadores\">& Gerenciar Pesquisadores</a><br /><br /><br />
\t\t<p><b>Instruções:</b> Nesta seção é possível visualizar todos os projetos cadastrados e suas respectivas prestações de contas. Antes de iniciar uma prestação de contas (relatório), faz-se necessário cadastrar o projeto ao qual esta se vincula.</p> 
\t\t<p><b>Cadastrando Projetos:</b> Para cadastrar um novo projeto, clique no botão \"Registrar Projeto\". Para editar as informações de um projeto existente, clique no título do mesmo na lista \"Meus Projetos\".</p>
\t\t<p><b>Editando Prestações de Contas:</b> Para vincular uma nova prestação de contas (relatório) a um projeto já cadastrado, clique no botão \"Iniciar Relatório\". Para continuar editando um relatório existente, clique na Nota de Liberação desejada, listada em \"Meus Projetos\".</p>
\t\t<p><b>Atenção:</b> Antes de iniciar a documentação de um projeto, recomendamos a leitura dos seguintes documentos:
\t\t\t<ul>
\t\t\t\t<li><a href=\"http://www.fapesc.sc.gov.br/index.php?option=com_docman&task=doc_download&gid=247&Itemid=42\">Guia Básico - Prestação de Contas;</a></li>
\t\t\t\t<li><a href=\"http://www.fapesc.sc.gov.br/index.php?option=com_content&view=article&id=41&Itemid=45\">Decreto 2060/09;</a></li>
\t\t\t\t<li><a href=\"http://www.fapesc.sc.gov.br/index.php?option=com_docman&task=doc_download&gid=30&Itemid=42\">Decreto 307/03.</a></li>

\t\t\t</ul>
\t\t</p>
\t</div><!-- #sidebar -->
\t
\t<div id=\"main-content\">
\t\t<h1>:: Meus Projetos</h1>
\t\t
\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'projetos'));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context['_key'] => $context['projeto']) {
            // line 31
            echo "\t\t<div class=\"project\">
\t\t\t<div class=\"project-label\">
\t\t\t\t<span class=\"project-title\"><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoDados", array("idProjeto" => $this->getAttribute($this->getContext($context, 'projeto'), "idProjeto", array(), "any", false))), "html");
            echo "\" title=\"Clique para editar informações do projeto\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'projeto'), "titulo", array(), "any", false), "html");
            echo "</a></span>
\t\t\t\t<span class=\"project-info\">
\t\t\t\t\t<table width=\"70%\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>Contrato: <b>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'projeto'), "contrato", array(), "any", false), "html");
            echo "</b></td>
\t\t\t\t\t\t\t<td>Chamada: <b>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'projeto'), "chamada", array(), "any", false), "html");
            echo "</b></td>
\t\t\t\t\t\t\t<td>Início em: <b>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'projeto'), "inicio", array(), "any", false), "html");
            echo "</b></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t</span>
\t\t\t\t<span class=\"project-delete\">
\t\t\t\t\t<a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoDelete", array("idProjeto" => $this->getAttribute($this->getContext($context, 'projeto'), "idProjeto", array(), "any", false))), "html");
            echo "\" title=\"Excluir projeto\" onclick=\"return confirm('Tem certeza que deseja excluir este projeto?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
            echo "\" alt=\"ExcluirProjeto\"></a>
\t\t\t\t</span>
\t\t\t</div>
\t\t\t<table class=\"project-report\">
\t\t\t\t<tr>
\t\t\t\t\t<th colspan=\"2\" >Nota de liquidação</th>
\t\t\t\t\t<th>Data NL</th>
\t\t\t\t\t<th>Rubrica</th>
\t\t\t\t\t<th>Relatório</th>
\t\t\t\t\t<th>Valor total</th>
\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t</tr>
\t\t\t\t";
            // line 56
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'projeto'), "relatorios", array(), "any", false));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context['_key'] => $context['relatorio']) {
                // line 57
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td style=\"text-align:center;\"><img src=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/report.png"), "html");
                echo "\" alt=\"Relatórios\"></td>
\t\t\t\t\t<td><a href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioDados", array("idRelatorio" => $this->getAttribute($this->getContext($context, 'relatorio'), "idRelatorio", array(), "any", false))), "html");
                echo "\" title=\"Clique para editar informações do relatório\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'relatorio'), "nota", array(), "any", false), "html");
                echo "</a></td>
\t\t\t\t\t<td style=\"text-align:center;\">";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'relatorio'), "liberacao", array(), "any", false), "html");
                echo "</td>
\t\t\t\t\t<td style=\"text-align:center;\">";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'relatorio'), "rubrica", array(), "any", false), "html");
                echo "</td>
\t\t\t\t\t<td style=\"text-align:center;\">";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'relatorio'), "tipo", array(), "any", false), "html");
                echo "</td>
\t\t\t\t\t<td style=\"text-align:right;\">";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'relatorio'), "valor", array(), "any", false), "html");
                echo "</td>\t
\t\t\t\t\t<td style=\"text-align:right;\"><a href=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioDelete", array("idRelatorio" => $this->getAttribute($this->getContext($context, 'relatorio'), "idRelatorio", array(), "any", false))), "html");
                echo "\" title=\"Excluir relatório\" onclick=\"return confirm('Tem certeza que deseja excluir este relatório?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
                echo "\" alt=\"Excluir\"></a></td>\t\t\t\t\t\t
\t\t\t\t</tr>
\t\t\t\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 67
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"6\">Nenhum relatório...</td>
\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['relatorio'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 71
            echo "\t\t\t</table>
\t\t</div><!-- #project -->
\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 74
            echo "\t\t<p>Nenhum projeto...</p>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['projeto'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 76
        echo "\t\t
\t</div><!-- #main-content -->
\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Fapesc:inicio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
