<?php

/* FapescTutorialBundle:Relatorio:conciliacao.html.twig */
class __TwigTemplate_a31e1b94afdcd2202d6ebb465126cc21 extends Twig_Template
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
        echo "Conciliacao";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
\t<div id=\"sidebar\">
\t\t<a id=\"projects-button\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioExtrato", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" title=\"Clique para editar dados do extrato\">+ Editar extrato</a><br /><br /><br />
\t\t<a id=\"projects-button\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioCheque", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idCheque" => 0)), "html");
        echo "\" title=\"Adicionar novo cheque\">+ Adicionar Cheque</a><br /><br />
\t\t<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
\t</div><!-- #sidebar -->
\t<div id=\"main-content\">
\t\t<h1>:: Conciliação Bancária</h1>
\t\t<div id=\"conc-panel\">
\t\t\t<table style=\"padding-bottom: 8px;\">
\t\t\t\t<tr>
\t\t\t\t\t<th>Data do Extrato</th>
\t\t\t\t\t<th>Saldo do Extrato:</th>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, 'data'), "html");
        echo "</td>
\t\t\t\t\t<td title=\"Montante informado no saldo impresso\">R\$ ";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, 'saldo'), "html");
        echo "</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t\t<h2>Cheques não compensados</h2>
\t\t<table id=\"budget-pledged\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
\t\t\t<tr>
\t\t\t\t<th width=\"30%\">Número do Cheque</th>
\t\t\t\t<th width=\"20%\">Data de Emissão</th>
\t\t\t\t<th width=\"20%\">Data de Compensação</th>
\t\t\t\t<th width=\"30%\">Valor</th>
\t\t\t\t<th width=\"3%\"></th>
\t\t\t</tr>
\t\t\t";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'cheques'));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context['_key'] => $context['cheque']) {
            // line 36
            echo "\t\t\t<tr>
\t\t\t\t<td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioCheque", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idCheque" => $this->getAttribute($this->getContext($context, 'cheque'), "idCheque", array(), "any", false))), "html");
            echo "\" title=\"Clique para editar dados do cheque\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'cheque'), "numero", array(), "any", false), "html");
            echo "</a></td>
\t\t\t\t<td style=\"text-align:center;\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'cheque'), "emissao", array(), "any", false), "html");
            echo "</td>
\t\t\t\t<td style=\"text-align:center;\">";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'cheque'), "compensacao", array(), "any", false), "html");
            echo "</td>
\t\t\t\t<td style=\"text-align:center;\">R\$ ";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'cheque'), "valor", array(), "any", false), "html");
            echo "</td>
\t\t\t\t<td style=\"text-align:center;\"><a href=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioChequeDelete", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idCheque" => $this->getAttribute($this->getContext($context, 'cheque'), "idCheque", array(), "any", false))), "html");
            echo "\" title=\"Deletar cheque\" onclick=\"return confirm('Tem certeza que deseja excluir este cheque?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
            echo "\" alt=\"Deletar\"></a></td>
\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 44
            echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"4\">Nenhum cheque...</td>
\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cheque'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 48
        echo "\t\t</table>
\t\t<div class=\"total\">
\t\t\t<table>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"225\" style=\"text-align: right; padding-left: 4px; padding-right: 10px; font-weight: bold; background: #DDD\">Total de cheques não compensados</td>
\t\t\t\t\t<td width=\"175\" style=\"background: #EEEEEE; text-align: right;\">R\$ ";
        // line 53
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t\t<div class=\"total\">
\t\t\t<table>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"225\" style=\"text-align: right; padding-right: 10px; font-weight: bold; background: #DDD\">Saldo Real</td>
\t\t\t\t\t<td width=\"175\" style=\"background: #EEEEEE; text-align: right;\">R\$ ";
        // line 61
        echo twig_escape_filter($this->env, $this->getContext($context, 'real'), "html");
        echo "</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Relatorio:conciliacao.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
