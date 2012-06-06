<?php

/* FapescTutorialBundle:Relatorio:meta.html.twig */
class __TwigTemplate_583b75cb3a4eae1559bfe4b6248a1f1e extends Twig_Template
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
        echo "<script type=\"text/javascript\">
\t\$().ready(function() {
\t\t\$(\"form\").validate({
\t\t\trules: {
\t\t\t\tjustificativa: \"required\",
\t\t\t},
\t\t\tmessages: {
\t\t\t\tjustificativa: \"Digite a justificativa\",
\t\t\t}
\t\t});
\t});
</script>
<div id=\"content\">
\t\t\t\t
\t<div id=\"sidebar\">
\t\t<p><b>Instruções:</b><br /><br />Acada novo relatório de prestação de contas, faz-se necessário atualizar o status do Plano de Metas do projeto.<br /><br />O estado atual de uma meta pode assumir as seguintes condições: \"Não alcançado\", \"Parcialmente alcançado\" ou \"Plenamente alcançado\".<br /><br />Caso a conclusão de uma meta esteja prevista à frente do tempo presente, esta deverá ser marcada como \"não alcançada\" e sua justificativa definida como \"Atividade em desenvolvimento\".<br /><br />Observação: Caso necessite editar a descrição de uma meta, acesse o link \"Meus Projetos\" (vide cabeçalho do site), selecione o título do projeto em questão e, sem seguida, clique na aba \"Plano de Metas\".</p>
\t</div><!-- #sidebar -->
\t\t\t
\t<div id=\"main-content\">
\t\t<h1>:: Plano de Metas</h1>
\t\t<form class=\"form-container\" action=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioMetaPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idMeta" => $this->getContext($context, 'id'))), "html");
        echo "\" method=\"POST\">
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Meta:<br />";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'meta'), "html");
        echo "</td>
\t\t\t\t</tr>
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"28%\">Resultado:<br />
\t\t\t\t\t\t<select name=\"resultado\" title=\"Informe o estado de desenvolvimento da meta/objetivo.\" style=\"width:250px;\">
\t\t\t\t\t\t\t";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'resultados'));
        foreach ($context['_seq'] as $context['_key'] => $context['resultado']) {
            // line 34
            echo "\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'resultado'), "value", array(), "any", false), "html");
            echo "\" ";
            if ($this->getAttribute($this->getContext($context, 'resultado'), "selected", array(), "any", false)) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'resultado'), "text", array(), "any", false), "html");
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['resultado'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 36
        echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<table class=\"form\" width=\"90%\">
\t\t\t\t<tr>
\t\t\t\t\t<td>Justificativa:<br />
\t\t\t\t\t<textarea name=\"justificativa\" title=\"Comente e justifique os resultados alcaçados. Obrigatório para metas definidas como NA e PR.\" rows=\"5\" cols=\"50\">";
        // line 43
        echo twig_escape_filter($this->env, $this->getContext($context, 'justificativa'), "html");
        echo "</textarea>
\t\t\t\t</tr>
\t\t\t</table>
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
        return "FapescTutorialBundle:Relatorio:meta.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
