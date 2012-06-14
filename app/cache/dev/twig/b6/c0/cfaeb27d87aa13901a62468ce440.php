<?php

/* FapescTutorialBundle:Relatorio:dados.html.twig */
class __TwigTemplate_b6c0cfaeb27d87aa13901a62468ce440 extends Twig_Template
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
        echo "Relatório Técnico - Dados Iniciais";
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
                nota: \"required\",
                liberacao: \"required\",
                vigencia: \"required\",
                valor: \"required\",
            },
            messages: {
                nota: \"Digite a nota de liquidação\",
                liberacao: \"Digite a data de liberação\",
                vigencia: \"Digite a data de vigência\",
                valor: \"Digite o valor\",
            }
        });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <p><b>Instruções:</b><br /><br />Deve-se proceder uma prestação de contas distinta para cada Nota de Liberação existente.<br /><br />Cada Nota de Liberação possui um número de identificação, um tipo (custeio ou capital), um valor contigenciado e uma data de liberação dos recursos. Tais informações estão contidas no e-mail \"Comunicado de Repasse\", enviado ao coordenador do projeto pela Gerência de Projetos da FAPESC.<br /><br />Como \"custeio\", entende-se a aplicação dos recursos na contratação de serviços em geral, pagamento de bolsas, compra de material de consumo, bem como passagens e diárias.  Dispêndios com equipamentos, mobiliário e bibliografia são caracterizados como de \"capital\".<br /><br />Se a Nota de Liberação se refere ao último dos empenhos previstos na proposta de trabalho, deve-se definir o \"Tipo de relatório\" como final.<br /><br />O preenchimento de todos os campos desta seção é obrigatório.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Informações Gerais</h1>
        <form class=\"form-container\" action=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioDadosPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" method=\"POST\">
            <table class=\"form\">
                <tr>
                    <td>Projeto:<br />
                        <select name=\"projeto\" title=\"Selecione o projeto aque se refere este relatório.\">
                            ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'projetos'));
        foreach ($context['_seq'] as $context['_key'] => $context['projeto']) {
            // line 40
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'projeto'), "idProjeto", array(), "any", false), "html");
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, 'projeto'), "idProjeto", array(), "any", false) == $this->getContext($context, 'projeto'))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'projeto'), "titulo", array(), "any", false), "html");
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['projeto'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 42
        echo "                        </select>
                    </td>
                </tr>
            </table>
            <table class=\"form\">
                <tr>
                    <td>Nota de liquidação:<br /><input type=\"text\" name=\"nota\" title=\"Informe o número da Nota de Liquidação referente ao relatório.\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getContext($context, 'nota'), "html");
        echo "\" /></td>
                    <td>Data de liberação:<br /><input type=\"text\" class=\"data\" name=\"liberacao\" title=\"Informe a data de liberação dos recursos.\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getContext($context, 'liberacao'), "html");
        echo "\" /></td>
                    <td>Data de vigência:<br /><input type=\"text\" class=\"data\" name=\"vigencia\" title=\"Informe a data de vigência dos recursos.\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getContext($context, 'vigencia'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"form\">
                <tr>
                    <td>Rubrica:<br />
                        <select name=\"rubrica\" title=\"Selecione o tipo de rubrica relativa aos recursos oriundos da Nota de Liquidação.\">
                            ";
        // line 57
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'rubricaSelect'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 58
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "value", array(), "any", false), "html");
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, 'item'), "value", array(), "any", false) == $this->getContext($context, 'rubrica'))) {
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
        // line 60
        echo "                        </select>
                    </td>
                    <td>Valor NL:<br />R\$ <input type=\"text\" id=\"valor\" name=\"valor\" title=\"Informe o montante total relativo à Nota de Liquidação.\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getContext($context, 'valor'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"form\">
                <tr>
                    <td>Tipo de relatório:<br />
                        <select name=\"tipo\" title=\"Selecione o tipo de relatório.\">
                            ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'tipoSelect'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 70
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
        // line 72
        echo "                        </select>
                    </td>
                </tr>
            </table>
            <table class=\"submit\">
                <tr>
                    <td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td>
                </tr>
            </table>
        </form>
    </div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Relatorio:dados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
