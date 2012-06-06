<?php

/* FapescTutorialBundle:Projeto:metas.html.twig */
class __TwigTemplate_f448e3b63c597f84921425fb3c5fe2d5 extends Twig_Template
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
        echo "Plano de Metas";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
\t\t\t\t
\t<div id=\"sidebar\">
\t\t<a id=\"projects-button\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoMeta", array("idProjeto" => $this->getContext($context, 'idProjeto'), "idMeta" => 0)), "html");
        echo "\" title=\"Adicionar nova meta\">+ Adicionar Meta</a><br /><br />
\t\t<p><b>Instruções:</b><br /><br />Cadastre as metas de trabalho e respectivos indicadores exatamente como informado na proposta de trabalho aprovada pela FAPESC.<br /><br />Para cadastrar uma nova meta, clique no botão \"Adicionar Meta\".<br /><br />Para editar uma meta já existente, basta clicar em sua descrição na listagem \"Plano de Metas\".<br /><br />O botão \"X\", em cinza, exclui uma meta definitivamente.</p>
\t</div><!-- #sidebar -->
\t\t\t
\t<div id=\"main-content\">
\t\t<h1>:: Plano de Metas</h1>
\t\t<table id=\"goals\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
\t\t\t<tr>
\t\t\t\t<th width=\"30%\" >Meta</th>
\t\t\t\t<th width=\"30%\" >Indicadores</th>
\t\t\t\t<th width=\"3%\"></th>
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
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoMeta", array("idProjeto" => $this->getContext($context, 'idProjeto'), "idMeta" => $this->getAttribute($this->getContext($context, 'meta'), "id", array(), "any", false))), "html");
            echo "\" title=\"Editar esta meta de trabalho\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'meta'), "meta", array(), "any", false), "html");
            echo "</a></td>
\t\t\t\t<td >";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'meta'), "indicador", array(), "any", false), "html");
            echo "</td>
\t\t\t\t<td style=\"text-align:center;\"><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoMetaDelete", array("idProjeto" => $this->getContext($context, 'idProjeto'), "idMeta" => $this->getAttribute($this->getContext($context, 'meta'), "id", array(), "any", false))), "html");
            echo "\" title=\"Deletar meta\" onclick=\"return confirm('Tem certeza que deseja excluir esta meta?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
            echo "\" alt=\"Deletar\"></a></td>
\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 28
            echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"2\">Nenhuma meta...</td>
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
        return "FapescTutorialBundle:Projeto:metas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
