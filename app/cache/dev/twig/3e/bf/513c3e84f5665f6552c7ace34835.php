<?php

/* FapescTutorialBundle:Contrapartida:diaria.html.twig */
class __TwigTemplate_3ebf513c3e84f5665f6552c7ace34835 extends Twig_Template
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
        echo "Contrapartidas - Diária";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
        \$(\".data\").mask(\"99/99/9999\");
        \$(\"#cpf\").mask(\"999.999.999-99\");
        \$(\"#valor\").priceFormat({ prefix: '', centsSeparator: ',', thousandsSeparator: '.' });
    });
    function calcula() {
        var tabela = new Array();
        tabela[11] = 11000;
        tabela[12] = 15300;
        tabela[13] = 20000;
        tabela[21] = 5500;
        tabela[22] = 0;
        tabela[23] = 0;
        var indice;
        indice = \$(\"#tipo\").val() + \$(\"#destino\").val();
        \$(\"#valor\").val(\$(\"#quantidade\").val().replace(/[^0-9]+/g,\"\") * tabela[indice]).priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.'});
        return true;
    }
    \$.validator.addMethod('minStrict', function (value, el, param) {
        return parseInt(value.replace(/[^0-9]+/g,\"\")) >= param;        
    });
    \$.validator.addMethod('minField', function (value, el, param) {
        return parseInt(value) >= parseInt(\$(param).val());
    });
    \$(document).ready(function(){
        \$(\"#quantidade\").keyup(function(){
            \$(\"#quantidade\").val(\$(\"#quantidade\").val().replace(/[^0-9]+/g,\"\"));
            calcula();
            \$(\"form\").validate().element(\"#documentos\");
        });
        \$(\"#documentos\").keyup(function(){
            \$(\"#documentos\").val(\$(\"#documentos\").val().replace(/[^0-9]+/g,\"\"));
        });
        \$(\".trigger\").change(function(){
            calcula();
            \$(\"form\").validate().element(\"#valor\");
        });
        \$(\"form\").validate({
            rules: {
                beneficiario: \"required\",
                cpf: \"required\",
                instituicao: \"required\",
                objetivos: \"required\",
                roteiro: \"required\",
                resultados: \"required\",
                inicio: \"required\",
                fim: \"required\",
                quantidade: \"required\",
                valor: {
                    minStrict: 5500
                },
                documentos: {
                    minField: \"#quantidade\"
                }
            },
            messages: {
                beneficiario: \"Digite o beneficiário\",
                cpf: \"Digite o CPF\",
                instituicao: \"Digite a instituição\",
                objetivos: \"Digite os objetivos\",
                roteiro: \"Digite o roteiro\",
                resultados: \"Digite os resultados\",
                inicio: \"Digite a data de início\",
                fim: \"Digite a data de fim\",
                quantidade: \"Digite a quantidade de diárias\",
                valor: {
                    minStrict: \"Não é possivel cadastrar diárias para Auxiliar Técnico para Fora do Estado ou Exterior\"
                },
                documentos: {
                    minField: \"O número de documentos não pode ser menor que a quantidade de diárias\"
                }
            }
        });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Contrapartidas - Diária</h1>
        <form class=\"form-container\" action=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidaDiariaPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getContext($context, 'idContrapartida'))), "html");
        echo "\" method=\"POST\">
            <table class=\"form\">
                <tr>
                    <td>Beneficiário:<br /><input type=\"text\" name=\"beneficiario\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getContext($context, 'beneficiario'), "html");
        echo "\" /></td>
                    <td>CPF:<br /><input type=\"text\" id=\"cpf\" name=\"cpf\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getContext($context, 'cpf'), "html");
        echo "\" /></td>
                </tr>
                <tr>
                    <td>Instituição:<br /><input type=\"text\" name=\"instituicao\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getContext($context, 'instituicao'), "html");
        echo "\" /></td>
                    <td>Tipo:<br />
                        <select class=\"trigger\" id=\"tipo\" name=\"tipo\">
                            ";
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'tipoSelect'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 99
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "value", array(), "any", false), "html");
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, 'item'), "value", array(), "any", false) == $this->getContext($context, 'tipo'))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "text", array(), "any", false), "html");
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 101
        echo "                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Objetivos:<textarea name=\"objetivos\">";
        // line 105
        echo twig_escape_filter($this->env, $this->getContext($context, 'objetivos'), "html");
        echo "</textarea></td>
                </tr>
                <tr>
                    <td>Roteiro/Itinerário:<textarea name=\"roteiro\">";
        // line 108
        echo twig_escape_filter($this->env, $this->getContext($context, 'roteiro'), "html");
        echo "</textarea></td>
                    <td>Destino:<br />
                        <select class=\"trigger\" id=\"destino\" name=\"destino\">
                            ";
        // line 111
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'destinoSelect'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 112
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "value", array(), "any", false), "html");
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, 'item'), "value", array(), "any", false) == $this->getContext($context, 'destino'))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "text", array(), "any", false), "html");
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 114
        echo "                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Resultados Obtidos:<textarea name=\"resultados\">";
        // line 118
        echo twig_escape_filter($this->env, $this->getContext($context, 'resultados'), "html");
        echo "</textarea></td>
                </tr>
                <tr>
                    <td>De:<br /><input type=\"text\" class=\"data\" name=\"inicio\" value=\"";
        // line 121
        echo twig_escape_filter($this->env, $this->getContext($context, 'inicio'), "html");
        echo "\" /></td>
                    <td>Até:<br /><input type=\"text\" class=\"data\" name=\"fim\" value=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->getContext($context, 'fim'), "html");
        echo "\" /></td>
                    <td>Quantidade:<br /><input type=\"text\" id=\"quantidade\" name=\"quantidade\" value=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->getContext($context, 'quantidade'), "html");
        echo "\" /></td>
                    <td>Valor:<br /><input type=\"text\" id=\"valor\" name=\"valor\" value=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->getContext($context, 'valor'), "html");
        echo "\" readonly=\"readonly\" /></td>
                </tr>
                <tr>
                    <td>Quantidade de documentos comprobatórios:<br /><input type=\"text\" id=\"documentos\" name=\"documentos\" value=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->getContext($context, 'documentos'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"submit\" width=\"90%\">
                <tr>
                    <td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td>
                </tr>
            </table>
        </form>\t\t\t
    </div><!-- #main-content -->\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Contrapartida:diaria.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
