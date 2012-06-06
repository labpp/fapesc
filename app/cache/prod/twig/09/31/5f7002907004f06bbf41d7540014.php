<?php

/* FapescTutorialBundle:Relatorio:cheque.html.twig */
class __TwigTemplate_09315f7002907004f06bbf41d7540014 extends Twig_Template
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
        echo "Relatório Técnico - Conciliação Bancária - Dados do Cheque";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
        \$(\".data\").mask(\"99/99/9999\");
        \$(\"#valor\").priceFormat({ prefix: '', centsSeparator: ',', thousandsSeparator: '.' });
    });
    \$().ready(function() {
        \$(\"form\").validate({
            rules: {
                numero: \"required\",
                emissao: \"required\",
                compesacao: \"required\",
                valor: \"required\",
            },
            messages: {
                numero: \"Digite o número\",
                emissao: \"Digite a data de emissão\",
                compesacao: \"Digite a data de compensação\",
                valor: \"Digite o valor\",
            }
        });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Dados do Cheque</h1>
        <form class=\"form-container\" action=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioChequePost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idCheque" => $this->getContext($context, 'idCheque'))), "html");
        echo "\" method=\"POST\">
            <table table class=\"form\" width=\"50%\">
                <tr>
                    <td>Número do Cheque:<br/><input type=\"text\" name=\"numero\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getContext($context, 'numero'), "html");
        echo "\" title=\"Número do cheque\"></td>
                    <td>Data de Emissão:<br/><input type=\"text\" class=\"data\" name=\"emissao\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getContext($context, 'emissao'), "html");
        echo "\" title=\"Data de emissão do cheque\"></td>
                    <td>Data de Compensação:<br/><input type=\"text\" class=\"data\" name=\"compensacao\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getContext($context, 'compensacao'), "html");
        echo "\" title=\"Data de compensação do cheque\"></td>
                    <td>Valor:<br/><input type=\"text\" id=\"valor\" name=\"valor\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getContext($context, 'valor'), "html");
        echo "\" title=\"Valor do cheque não compensado\"></td>
                </tr>
            </table>
            <table class=\"submit\" width=\"90%\">
                <tr>
                    <td><input type=\"submit\" value=\"Adicionar\"/></td>
                </tr>
            </table>
        </form>
    </div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Relatorio:cheque.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
