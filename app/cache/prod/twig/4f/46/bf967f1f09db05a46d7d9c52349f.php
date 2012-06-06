<?php

/* FapescTutorialBundle:Relatorio:relatorio.html.twig */
class __TwigTemplate_4f46bf967f1f09db05a46d7d9c52349f extends Twig_Template
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
        echo "Relatório Técnico - Informações Gerais";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
\t\$().ready(function() {
\t\t\$(\"form\").validate({
\t\t\trules: {
\t\t\t\tresultado: \"required\",
\t\t\t\tjustificativa: \"required\",
\t\t\t\tdificuldade: \"required\",
\t\t\t},
\t\t\tmessages: {
\t\t\t\tresultado: \"Digite o resultado\",
\t\t\t\tjustificativa: \"Digite a justificativa\",
\t\t\t\tdificuldade: \"Digite a dificuldade\",
\t\t\t}
\t\t});
\t});
</script>
<div id=\"content\">
\t\t\t
\t<div id=\"sidebar\">
\t\t<p><b>Instruções:</b><br /><br />O Relatório Técnico pode ser \"PARCIAL\", se ainda existirem recursos de capital ou custeio para serem empenhados dentro do cronograma do projeto, ou \"FINAL\", se a Nota de Liberação a que se refere o presente Relatório Técnico encerra o orçamento do projeto.<br /><br />No relatório parcial, os campos devem ser preenchidos apenas no âmbito da aplicação dos recursos disponibilizados pela Nota de Liberação em questão.</p>
\t</div><!-- #sidebar -->

\t<div id=\"main-content\">
\t\t<h1>:: Relatório Técnico</h1>
\t\t<form class=\"form-container\" action=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioRelatorioPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" method=\"POST\">
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Resultados alcançados (até 1000 caracteres):<br />
\t\t\t\t\t<textarea name=\"resultado\" rows=\"15\" cols=\"70\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getContext($context, 'resultado'), "html");
        echo "</textarea>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Os equipamentos e demais itens de capital previstos no plano de trabalho, foram adquiridos? Caso negativo, justifique:<br />
\t\t\t\t\t<textarea name=\"justificativa\" rows=\"10\" cols=\"70\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getContext($context, 'justificativa'), "html");
        echo "</textarea>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Descreva as principais dificuldades enfrentadas quando da execução do projeto:<br />
\t\t\t\t\t<textarea name=\"dificuldade\" rows=\"10\" cols=\"70\">";
        // line 46
        echo twig_escape_filter($this->env, $this->getContext($context, 'dificuldade'), "html");
        echo "</textarea>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Houve alteração na equipe do projeto? Caso afirmativo, especifique as mudanças:<br />
\t\t\t\t\t<textarea name=\"alteracao\" rows=\"10\" cols=\"70\">";
        // line 52
        echo twig_escape_filter($this->env, $this->getContext($context, 'alteracao'), "html");
        echo "</textarea>
\t\t\t\t</tr>
\t\t\t</table>\t\t\t\t
\t\t\t<table class=\"submit\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</form>\t\t\t\t\t
\t</div><!-- #main-content -->\t\t\t
\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Relatorio:relatorio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
