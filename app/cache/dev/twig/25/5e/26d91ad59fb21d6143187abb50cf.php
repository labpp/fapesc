<?php

/* FapescTutorialBundle:Projeto:resumo.html.twig */
class __TwigTemplate_255e26d91ad59fb21d6143187abb50cf extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        $parent = "FapescTutorialBundle:Fapesc:info.html.twig";
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
    public function block_title($context, array $blocks = array())
    {
        echo "Resumo";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
\t\t\t
\t<div id=\"sidebar\">
\t\t<p><b>Instruções:</b> No campo de texto ao lado, informe sucintamente (2000 caracteres) acerca dos objetivos gerais e específicos do projeto, sua motivação, a metodologia de trabalho, bem como os resultados esperados de sua conclusão.</p>
\t</div><!-- #sidebar -->

\t<div id=\"main-content\">
\t\t<h1>:: Relatório Técnico</h1>
\t\t<form class=\"form-container\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoResumoPost", array("idProjeto" => $this->getContext($context, 'idProjeto'))), "html");
        echo "\" method=\"POST\">
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Resumo da pesquisa (até 2000 caracteres):<br /><textarea name=\"resumo\" rows=\"15\" cols=\"70\">";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'resumo'), "html");
        echo "</textarea>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<table class=\"submit\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</form>
\t</div><!-- #main-content -->

</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Projeto:resumo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
