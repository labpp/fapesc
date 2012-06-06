<?php

/* FapescTutorialBundle:Empenho:formEmpenho.html.twig */
class __TwigTemplate_7b9d269c8ffd562ecb84a12e3a683c11 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
        \$(\"#data\").mask(\"99/99/9999\");
        \$('#unitario').priceFormat({
            prefix: '',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });
        \$('#total').priceFormat({
            prefix: '',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });
    });
    function calcula() {
        \$(\"#total\").val(\$(\"#quantidade\").val().replace(/[^0-9]+/g,\"\") * \$(\"#unitario\").val().replace(/[^0-9]+/g,\"\")).priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.'});
    }
    \$(document).ready(function(){
        \$(\".trigger\").keyup(function(){
            calcula();
        });
        \$(\"form\").validate({
            rules: {
                descricao: \"required\",
                unidade: \"required\",
                quantidade: \"required\",
                unitario: \"required\",
                total: \"required\",
                documento: \"required\",
                data: \"required\",
                comprovante: \"required\"
            },
            messages: {
                descricao: \"Digite a descrição\",
                unidade: \"Digite a unidade\",
                quantidade: \"Digite a quantidade\",
                unitario: \"Digite o valor unitário\",
                total: \"Digite o valor total\",
                documento: \"Digite o documento fiscal/recibo\",
                data: \"Digite a data\",
                comprovante: \"Digite o comprovante\"
            }
        });
    });
</script>
<form class=\"form-container\" action=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getContext($context, 'action'), "html");
        echo "\" method=\"POST\">
    <table class=\"form\" width=\"90%\">
        <tr>
            <td>Fornecedor:<br />
                <select name=\"fornecedor\">
                    ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'fornecedores'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 52
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "idFornecedor", array(), "any", false), "html");
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, 'item'), "idFornecedor", array(), "any", false) == $this->getAttribute($this->getContext($context, 'fornecedor'), "idFornecedor", array(), "any", false))) {
                echo " selected=\"selected\" ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "nome", array(), "any", false), "html");
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "cadastro", array(), "any", false), "html");
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 54
        echo "                </select>
            </td>
        </tr>\t\t\t\t\t
    </table>
    <table class=\"form\" width=\"90%\">
        <tr>
            <td>Descrição do serviço:<br /><input type=\"text\" name=\"descricao\" title=\"Descrição do serviço a ser empenhado, conforme recibo ou documento fiscal.\" maxlength=\"255\" size=\"70\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getContext($context, 'descricao'), "html");
        echo "\"/></td>
        </tr>
    </table>
    <table class=\"form\" width=\"90%\">
        <tr>
            <td width=\"15%\">Unidade:<br /><input type=\"text\" name=\"unidade\" title=\"Informe a unidade de quantificação do serviço (ex: mês, horas, dias, etc).\" maxlength=\"15\" size=\"18\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getContext($context, 'unidade'), "html");
        echo "\" /></td>
            <td width=\"5%\">Quantidade:<br /><input type=\"text\" name=\"quantidade\" id=\"quantidade\" class=\"trigger\" title=\"Informe a quantidade de serviços adquiridos.\" maxlength=\"4\" size=\"6\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getContext($context, 'quantidade'), "html");
        echo "\"/></td>
            <td width=\"15%\">Valor unitário:<br /><input type=\"text\" name=\"unitario\" id=\"unitario\" class=\"trigger\" title=\"Informe o valor unitário do serviço.\" maxlength=\"10\" size=\"20\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getContext($context, 'unitario'), "html");
        echo "\" /></td>
            <td width=\"50%\">Valor total:<br /><input type=\"text\" name=\"total\" id=\"total\" title=\"Informe o valor total do serviço, conforme recibo ou documento fiscal.\" maxlength=\"10\" size=\"20\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getContext($context, 'total'), "html");
        echo "\"/></td>
        </tr>
    </table>
    <table class=\"form\" width=\"90%\">
        <tr>
            <td width=\"10%\">Documento fiscal / Recibo:<br /><input type=\"text\" name=\"documento\" title=\"Informe o número do recibo ou documento fiscal.\" maxlength=\"10\" size=\"20\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getContext($context, 'documento'), "html");
        echo "\"/></td>
            <td width=\"10%\">Data de emissão:<br /><input type=\"text\" name=\"data\" id=\"data\" title=\"Informe a data de emissão do recibo ou documento fiscal.\" maxlength=\"10\" size=\"12\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getContext($context, 'data'), "html");
        echo "\" /></td>
            <td width=\"50%\">Comprovante de transação:<br /><input type=\"text\" name=\"comprovante\" title=\"Informe o número do cheque o comprovante eletrônico de transação.\" maxlength=\"25\" size=\"20\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getContext($context, 'comprovante'), "html");
        echo "\"/></td>
        </tr>
    </table>
    <table class=\"submit\" width=\"90%\">
        <tr>
            <td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td>
        </tr>
    </table>
</form>";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Empenho:formEmpenho.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
