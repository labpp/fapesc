<?php

/* FapescTutorialBundle:Bolsista:bolsista.html.twig */
class __TwigTemplate_3921ed80871e237ea9d9cfff3c5fd979 extends Twig_Template
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
        $parent = "FapescTutorialBundle:Usuario:index.html.twig";
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
        echo "Bolsista";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
    jQuery(function(\$){
        \$(\"#cpf\").mask(\"999.999.999-99\");
        \$(\"#cep\").mask(\"99999-999\");
        \$(\".fone\").mask(\"(99) 9999-9999\");
    });
    \$(document).ready(function(){
        \$(\"form\").validate({
            rules: {
                nome: \"required\",
                cpf: \"required\",
                instituicao: \"required\",
                matricula: \"required\",
                endereco: \"required\",
                cidade: \"required\",
                uf: \"required\",
                cep: \"required\",
                email: {
                    required: true,
                    email: true
                },
                telefone: \"required\",
                celular: \"required\",
                banco: \"required\",
                conta: \"required\",
                agencia: \"required\"
            },
            messages: {
                nome: \"Digite o nome\",
                cpf: \"Digite o CPF\",
                instituicao: \"Digite a instituição\",
                matricula: \"Digite a matrícula\",
                endereco: \"Digite o endereço\",
                cidade: \"Digite a cidade\",
                uf: \"Digite a UF\",
                cep: \"Digite o CEP\",
                email: {
                    required: \"Digite o email\",
                    email: \"Digite um email válido\"
                },
                telefone: \"Digite o telefone\",
                celular: \"Digite o celular\",
                banco: \"Digite o banco\",
                conta: \"Digite a conta\",
                agencia: \"Digite a agência\"
            }
        });
    });
</script>
<div id=\"content\">
    <div id=\"sidebar\">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Bolsista</h1>
        <form class=\"form-container\" action=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("bolsistaPost", array("idBolsista" => $this->getContext($context, 'idBolsista'))), "html");
        echo "\" method=\"POST\">
            <table class=\"form\" width=\"90%\">
                <tr>
                    <td>Nome:<br /><input type=\"text\" name=\"nome\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getContext($context, 'nome'), "html");
        echo "\" title=\"Nome do bolsista.\" size=\"50\" /></td>
                    <td>CPF:<br /><input type=\"text\" id=\"cpf\" name=\"cpf\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->getContext($context, 'cpf'), "html");
        echo "\" title=\"CPF do bolsista.\" size=\"20\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"90%\">
                <tr>
                    <td width=\"15%\">Instituição de Vínculo:<br /><input type=\"text\" name=\"instituicao\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getContext($context, 'instituicao'), "html");
        echo "\" title=\"Informe a instituição de vínculo do bolsista.\" size=\"35\" /></td>
                    <td width=\"15%\">Tipo:<br />
                        <select name=\"tipo\">
                            ";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'tipoSelect'));
        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
            // line 74
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
        // line 76
        echo "                        </select>
                    </td>
                    <td width=\"30%\">Matrícula:<br /><input type=\"text\" name=\"matricula\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->getContext($context, 'matricula'), "html");
        echo "\" title=\"Informe o valor unitário do item adquirido.\" size=\"22\" /></td>
                </tr>
            </table>
            <table class=\"form\" style=\"border-bottom: #DDD dotted 0px; margin-bottom: 0px; padding-bottom: 5px;\" width=\"90%\">
                <tr>
                    <td width=\"35%\">Endereço:<br /><input type=\"text\" name=\"endereco\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->getContext($context, 'endereco'), "html");
        echo "\" title=\"Informe o endereço do bolsista:\" size=\"25\" /></td>
                    <td>Cidade:<br /><input type=\"text\" name=\"cidade\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->getContext($context, 'cidade'), "html");
        echo "\" title=\"Informe a cidade do bolsista.\" size=\"20\" /></td>
                    <td>UF:<br /><input type=\"text\" name=\"uf\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->getContext($context, 'uf'), "html");
        echo "\" title=\"Informe o estado do bolsista.\" size=\"2\" /></td>
                    <td>CEP:<br /><input type=\"text\" id=\"cep\" name=\"cep\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getContext($context, 'cep'), "html");
        echo "\" title=\"Informe o cep do bolsista.\" size=\"18\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"90%\">
                <tr>
                    <td width=\"30%\">Email:<br /><input type=\"text\" name=\"email\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->getContext($context, 'email'), "html");
        echo "\" title=\"Informe o e-mail de contato com o bolsista.\" size=\"35\" /></td>
                    <td width=\"10%\">Telefone:<br /><input type=\"text\" name=\"telefone\" class=\"fone\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->getContext($context, 'telefone'), "html");
        echo "\" title=\"Informe o número do telefone de contato do bolsista.\" size=\"12\" /></td>
                    <td width=\"30%\">Celular:<br /><input type=\"text\" name=\"celular\" class=\"fone\" value=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->getContext($context, 'celular'), "html");
        echo "\" title=\"Informe o número do celular de contato do bolsista.\" size=\"12\" /></td>
                </tr>
            </table>
            <table class=\"form\" width=\"55%\">
                <tr>
                    <td width=\"10%\">Banco:<br /><input type=\"text\" name=\"banco\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getContext($context, 'banco'), "html");
        echo "\" title=\"Informe o número do banco.\" size=\"12\" /></td>
                    <td width=\"10%\">Conta:<br /><input type=\"text\" name=\"conta\" value=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getContext($context, 'conta'), "html");
        echo "\" title=\"Informe o número da conta do bolsista.\" size=\"12\" /></td>
                    <td width=\"10%\">Agência:<br /><input type=\"text\" name=\"agencia\" value=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->getContext($context, 'agencia'), "html");
        echo "\" title=\"Informe o número da agência do bolsista.\" size=\"12\" /></td>
                </tr>
            </table>
            <table class=\"submit\" width=\"90%\">
                <tr>
                    <td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td>
                </tr>
            </table>
        </form>
    </div><!-- #main-content -->\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Bolsista:bolsista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
