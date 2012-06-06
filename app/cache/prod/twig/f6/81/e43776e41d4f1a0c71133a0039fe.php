<?php

/* FapescTutorialBundle:Relatorio:extrato.html.twig */
class __TwigTemplate_f681e43776e41d4f1a0c71133a0039fe extends Twig_Template
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
        echo "Relatório Técnico - Extrato Bancário";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
        \$(\".data\").mask(\"99/99/9999\");
        \$(\"#saldo\").priceFormat({ prefix: '', centsSeparator: ',', thousandsSeparator: '.' });
    });
</script>
<div id=\"content\">

    <div id=\"sidebar\">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
    </div><!-- #sidebar -->

    <div id=\"main-content\">
        <h1>:: Extrato Bancário</h1>
        <form class=\"form-container\" action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioExtratoPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" method=\"POST\">
            <table class=\"form\" width=\"90%\">
                <tr>
                    <td>Data do extrato:<br /><input type=\"text\" name=\"data\" class=\"data\" title=\"Informe a data do extrato.\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, 'data'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"90%\">
                <tr>
                    <td>Saldo (R\$):<br /><input type=\"text\" name=\"saldo\" id=\"saldo\" title=\"Informe o saldo.\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, 'saldo'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"submit\" width=\"90%\">
                <tr>
                    <td><input type=\"submit\" value=\"Salvar\" /></td>
                </tr>
            </table>
        </form>
    </div><!-- #main-content -->

</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Relatorio:extrato.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
