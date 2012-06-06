<?php

/* FapescTutorialBundle:Projeto:meta.html.twig */
class __TwigTemplate_80dad8dc9cea24b4ff17b686e5673f16 extends Twig_Template
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
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"content\">
\t<div id=\"sidebar\">
\t\t<p><b>Instruções:</b><br /><br />No campo \"Meta\", informe a descrição da meta/objetivo de projeto conforme descrito na proposta submetida à FAPESC.<br /><br />No campo \"Indicadores\", informe o indicador físico ou informacional que ratifica a conclusão da respectiva meta de trabalho.<br /><br />Todos os campos são de preenchimento obrigatório.</p>
\t</div><!-- #sidebar -->
\t<div id=\"main-content\">
\t\t<h1>:: Plano de Metas</h1>
\t\t<form class=\"form-container\" action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoMetaPost", array("idProjeto" => $this->getContext($context, 'idProjeto'), "idMeta" => $this->getContext($context, 'id'))), "html");
        echo "\" method=\"POST\">
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Meta:<br />
\t\t\t\t\t<textarea name=\"meta\" title=\"Descrição da meta/objetivo\" rows=\"5\" cols=\"50\">";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'meta'), "html");
        echo "</textarea></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Indicadores:<br />
\t\t\t\t\t<textarea name=\"indicador\" title=\"Informe os indicadores para ratificação da meta proposta\" rows=\"5\" cols=\"50\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, 'indicador'), "html");
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
        return "FapescTutorialBundle:Projeto:meta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
