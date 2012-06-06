<?php

/* FapescTutorialBundle:Projeto:dados.html.twig */
class __TwigTemplate_7d2f94c2d202db546a95394e2a8e522e extends Twig_Template
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
        echo "Dados do Projeto";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
    \$(\"#contrato\").mask(\"999999-9999\");
    \$(\".data\").mask(\"99/99/9999\");
    \$('#orcamento').priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: '.'
    });
    });
    \$().ready(function() {
    \$(\"form\").validate({
    rules: {
    contrato: {
    required: true,
    minlength: 11
    },
    titulo: \"required\",
    chamada: \"required\",
    area: \"required\",
    municipio: \"required\",
    regiao: \"required\",
    sdr: \"required\",
    inicio: \"required\",
    termino: \"required\",
    orcamento: \"required\"
    },
    messages: {
    contrato: {
    required: \"Digite o contrato\",
    minlength: \"Digite um número de contrato válido\"
    },
    titulo: \"Digite o título\",
    chamada: \"Digite a chamada\",
    area: \"Digite a área\",
    municipio: \"Digite o município\",
    regiao: \"Digite a região\",
    sdr: \"Digite o SDR\",
    inicio: \"Digite a data de início\",
    termino: \"Digite a data de término\",
    orcamento: \"Digite o orçamento\"
    }
    });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <p><b>Instruções:</b><br /><br />As informações gerais para um determinado projeto (título, área do conhecimento, região de aplicação, etc) devem ser as mesmas que foram informadas na proposta de trabalho aprovada pela FAPESC.<br /><br /> Para preenchimento dos campos \"Contrato FAPESC\", \"Orçamento total\", \"Data de ínício\" e \"Data de Término\" consulte o e-mail \"Comunicado de Repasse\", enviado pela Gerência de Projetos da FAPESC ao coordenador de projeto, quando da liberação dos recursos.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Dados do Projeto</h1>
        <form class=\"form-container\" action=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("projetoDadosPost", array("idProjeto" => $this->getContext($context, 'idProjeto'))), "html");
        echo "\" method=\"POST\">
            <table class=\"form\" width=\"90%\">
                <tr><td>Contrato FAPESC:<br /><input type=\"text\" id=\"contrato\" name=\"contrato\" title=\"Aqui, insira apenas números.\" size=\"12\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getContext($context, 'contrato'), "html");
        echo "\" /></td></tr>
                <tr><td>Título do projeto:<br /><input type=\"text\" name=\"titulo\" title=\"Entre com o título do projeto, sem abreviaturas.\" maxlength=\"250\" size=\"80\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" /></td></tr>
                <tr><td>Chamada:<br /><input type=\"text\" name=\"chamada\" title=\"Entre com o nome completo da chamada, sem abreviaturas.\" maxlength=\"200\" size=\"50\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getContext($context, 'chamada'), "html");
        echo "\" /></td></tr>
            </table>
            <table class=\"form\" width=\"90%\">
                <tr><td colspan=\"3\" >Área do conhecimento / Sub-área:<br /><input type=\"text\" name=\"area\" title=\"Informe a área do conhecimento relativa ao projeto\" maxlength=\"100\" size=\"50\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getContext($context, 'area'), "html");
        echo "\" /></td></tr>
                <tr>
                    <td width=\"41%\">Localização (município):<br /><input type=\"text\" name=\"municipio\" title=\"Entre com o nome do município ou distrito, sem abreviaturas.\" maxlength=\"50\" size=\"30\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getContext($context, 'municipio'), "html");
        echo "\" /></td>
                    <td>Região (IBGE):<br /><input type=\"text\" name=\"regiao\" title=\"Entre com o nome da região de abrangência.\" maxlength=\"50\" size=\"25\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getContext($context, 'regiao'), "html");
        echo "\" /></td>
                    <td>SDR:<br /><input type=\"text\" name=\"sdr\" title=\"Entre com o nome da SDR de abrangência.\" maxlength=\"50\" size=\"25\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getContext($context, 'sdr'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"90%\">
                <tr>
                    <td>Data de início:<br /><input type=\"text\" id=\"inicio\" name=\"inicio\" class=\"data\" title=\"Informe a data de início das atividades.\" size=\"10\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getContext($context, 'inicio'), "html");
        echo "\" /></td>
                    <td>Data de término:<br /><input type=\"text\" id=\"termino\" name=\"termino\" class=\"data\" title=\"Informe a data de término das atividades.\" size=\"10\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getContext($context, 'termino'), "html");
        echo "\" /></td>
                    <td>Orçamento total do projeto (R\$):<br /><input type=\"text\" id=\"orcamento\" name=\"orcamento\" title=\"Informe o valor total do orçamento do projeto, incluindo todo os intervenientes.\" size=\"25\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getContext($context, 'orcamento'), "html");
        echo "\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"55%\">
                <tr>
                    <td width=\"10%\">Banco:<br /><input type=\"text\" name=\"banco\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->getContext($context, 'banco'), "html");
        echo "\" title=\"Informe o número do banco.\" size=\"12\" /></td>
                    <td width=\"10%\">Conta:<br /><input type=\"text\" name=\"conta\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getContext($context, 'conta'), "html");
        echo "\" title=\"Informe o número da conta do bolsista.\" size=\"12\" /></td>
                    <td width=\"10%\">Agência:<br /><input type=\"text\" name=\"agencia\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->getContext($context, 'agencia'), "html");
        echo "\" title=\"Informe o número da agência do bolsista.\" size=\"12\" /></td>
                </tr>
            </table>
            <table class=\"submit\" width=\"90%\">
                <tr><td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td></tr>
            </table>
        </form>
    </div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Projeto:dados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
