<?php

/* FapescTutorialBundle:Relatorio:metas.html.twig */
class __TwigTemplate_b822deb5d1700525307eaca2dd248a7f extends Twig_Template
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
        echo "Relatório Técnico - Plano de Metas";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
\t\t\t\t
\t<div id=\"sidebar\">
\t\t<!-- <a id=\"projects-button\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioMeta", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idMeta" => 0)), "html");
        echo "\" title=\"Adicionar nova meta\">+ Adicionar meta</a><br /><br /> -->
\t\t<p><b>Instruções:</b><br /><br />O Plano de Metas listado nesta seção deve estar consonante com as informações contidas na proposta de trabalho aprovada pela FAPESC.<br /><br />Para editar o estado atual de uma meta, clique em sua descrição.<br /><br />Observação: Caso necessite editar a descrição de uma meta, acesse o link \"Meus Projetos\" (vide cabeçalho do site), selecione o título do projeto e, sem seguida, clique na aba \"Plano de Metas\".</p>
\t</div><!-- #sidebar -->
\t\t\t
\t<div id=\"main-content\">
\t\t<h1>:: Plano de Metas</h1>
\t\t<table id=\"goals\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
\t\t\t<tr>
\t\t\t\t<th width=\"30%\" >Meta</th>
\t\t\t\t<th width=\"10%\" >Resultados</th>
\t\t\t\t<th width=\"30%\" >Justificativas</th>
\t\t\t</tr>
\t\t\t";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'metas'));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context['_key'] => $context['meta']) {
            // line 22
            echo "\t\t\t<tr>
\t\t\t\t<td ><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioMeta", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idMeta" => $this->getAttribute($this->getContext($context, 'meta'), "id", array(), "any", false))), "html");
            echo "\" title=\"Editar meta de trabalho\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'meta'), "meta", array(), "any", false), "html");
            echo "</a></td>
\t\t\t\t<td style=\"text-align:center;\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'meta'), "resultado", array(), "any", false), "html");
            echo "</td>
\t\t\t\t<td >";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'meta'), "justificativa", array(), "any", false), "html");
            echo "</td>
\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 28
            echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"4\">Nenhuma meta...</td>
\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meta'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "\t\t</table>
\t</div><!-- #main-content -->\t\t\t
\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Relatorio:metas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
