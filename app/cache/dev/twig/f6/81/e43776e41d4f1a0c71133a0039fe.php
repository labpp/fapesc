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
        \$(\".dinheiro\").priceFormat({ prefix: '', centsSeparator: ',', thousandsSeparator: '.' });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <p><b>Instruções:</b><br /><br />Posicione o ponteiro do mouse sobre um campo em específico para receber ajuda em seu preenchimento.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <form class=\"\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioExtratoPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" method=\"POST\">
            <fieldset class=\"\">
                <legend>Extrato Bancário</legend>
                <div class=\"coluna2\">
                    <label>Data do extrato:</label>
                    <input type=\"text\" name=\"data\" class=\"data\" title=\"Informe a data do extrato.\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, 'data'), "html");
        echo "\" />
                </div>
                <div class=\"coluna2\">
                    <label>Saldo (R\$):</label>
                    <input type=\"text\" name=\"saldo\" class=\"dinheiro\" title=\"Informe o saldo.\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, 'saldo'), "html");
        echo "\" />
                </div>
            </fieldset>
            <div>
                <input type=\"submit\" value=\"Salvar\" />
            </div>
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
