<?php

/* FapescTutorialBundle:Empenho:bolsa.html.twig */
class __TwigTemplate_e24aeaaef4ff9b947e724c321b8c9310 extends Twig_Template
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
        echo "Empenho de Recursos - Bolsa";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
    \$(\".data\").mask(\"99/99/9999\");
    \$(\"#valor\").priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: '.'
    });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <a id=\"projects-button\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bolsistas"), "html");
        echo "\" title=\"Gerenciar bolsistas\">& Gerenciar Bolsistas</a><br /><br />
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Empenho de Recursos - Bolsa</h1>
        <form class=\"form-container\" action=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioEmpenhoBolsaPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idEmpenho" => $this->getContext($context, 'idEmpenho'))), "html");
        echo "\" method=\"POST\">
            <table class=\"form\" width=\"90%\">
                <td width=\"15%\">Bolsista:<br />
                    <select name=\"bolsista\">
                        ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'bolsistas'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 28
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "idBolsista", array(), "any", false), "html");
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, 'item'), "idBolsista", array(), "any", false) == $this->getAttribute($this->getContext($context, 'bolsista'), "idBolsista", array(), "any", false))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "nome", array(), "any", false), "html");
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "cpf", array(), "any", false), "html");
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 30
        echo "                    </select>
                </td>
                <tr>
                    <td>Descrição da Atividade:<textarea name=\"descricao\" cols=\"60\" rows=\"5\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'descricao'), "html");
        echo "</textarea></td>
                </tr>
            </table>
            <table class=\"form\" width=\"40%\">
                <tr> Período de Referência: <br />
                <td width=\"15%\">De:<br /><input type=\"text\" class=\"data\" name=\"inicio\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getContext($context, 'inicio'), "html");
        echo "\" maxlength=\"15\" size=\"15\" /></td>
                <td width=\"15%\">Até:<br /><input type=\"text\" class=\"data\" name=\"fim\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getContext($context, 'fim'), "html");
        echo "\" maxlength=\"15\" size=\"15\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"25%\">
                <tr>
                    <td width=\"35%\">Data do Pagamento:<br /><input type=\"text\" class=\"data\" name=\"data\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'data'), "html");
        echo "\" title=\"\" maxlength=\"255\" size=\"12\" /></td>
                    <td>Valor R\$:<br /><input type=\"text\" id=\"valor\" name=\"valor\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, 'valor'), "html");
        echo "\" title=\"\" maxlength=\"18\" /></td>
                </tr>\t\t\t\t\t
            </table>\t\t
            <table class=\"submit\" width=\"90%\">
                <tr>
                    <td><input type=\"submit\" value=\"Incluir\" title=\"\" /></td>
                </tr>
            </table>
        </form>\t\t\t
    </div><!-- #main-content -->\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Empenho:bolsa.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
