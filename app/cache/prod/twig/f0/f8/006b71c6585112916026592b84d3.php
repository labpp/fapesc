<?php

/* FapescTutorialBundle:Usuario:formDados.html.twig */
class __TwigTemplate_f0f8006b71c6585112916026592b84d3 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<script type=\"text/javascript\">
\tjQuery(function(\$){
\t   \$(\"#cpf\").mask(\"999.999.999-99\");
\t   \$(\"#cep\").mask(\"99999-999\");
\t   \$(\"#fone\").mask(\"(99) 9999-9999\");
\t});
\t\$().ready(function() {
\t\t\$(\"form\").validate({
\t\t\trules: {
\t\t\t\tcpf: \"required\",
\t\t\t\tnome: \"required\",
\t\t\t\tinstituicao: \"required\",
\t\t\t\tendereco: \"required\",
\t\t\t\tmunicipio: \"required\",
\t\t\t\tuf: \"required\",
\t\t\t\tcep: \"required\",
\t\t\t\temail: {
\t\t\t\t\trequired: true,
\t\t\t\t\temail: true
\t\t\t\t},
\t\t\t\tfone: \"required\"
\t\t\t},
\t\t\tmessages: {
\t\t\t\tcpf: \"Digite o CPF\",
\t\t\t\tnome: \"Digite o nome\",
\t\t\t\tinstituicao: \"Digite a instituição\",
\t\t\t\tendereco: \"Digite o endereço\",
\t\t\t\tmunicipio: \"Digite o município\",
\t\t\t\tuf: \"Digite a UF\",
\t\t\t\tcep: \"Digite o CEP\",
\t\t\t\temail: {
\t\t\t\t\trequired: \"Digite o email\",
\t\t\t\t\temail: \"Digite um email válido\"
\t\t\t\t},
\t\t\t\tfone: \"Digite o fone\"
\t\t\t}
\t\t});
\t});
</script>
<form class=\"form-container\" action=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getContext($context, 'action'), "html");
        echo "\" method=\"POST\">
\t<table class=\"form\">
\t\t<tr><td>CPF:<br /><input type=\"text\" id=\"cpf\" name=\"cpf\" title=\"Aqui, insira apenas números.\" size=\"14\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getContext($context, 'cpf'), "html");
        echo "\" /></td></tr>
\t\t<tr><td>Nome Completo:<br /><input type=\"text\" name=\"nome\" title=\"Entre com seu nome completo, sem abreviaturas.\" maxlength=\"150\" size=\"50\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getContext($context, 'nome'), "html");
        echo "\" /></td></tr>
\t\t<tr><td>Instituição de vínculo:<br /><input type=\"text\" name=\"instituicao\" title=\"Entre com o nome completo da instituição, sem abreviaturas.\"  maxlength=\"200\" size=\"50\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'instituicao'), "html");
        echo "\" /></td></tr>
\t</table>
\t<table class=\"form\">
\t\t<tr><td colspan=\"3\">Endereço correspondência:<br /><input type=\"text\" name=\"endereco\" title=\"Logradouro, Número, Complemento, etc.\"  maxlength=\"200\" size=\"60\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getContext($context, 'endereco'), "html");
        echo "\" /></td></tr>
\t\t<tr>
\t\t\t<td>Município:<br /><input type=\"text\" name=\"municipio\" title=\"Entre com o nome do município ou distrito, sem abreviaturas.\" maxlength=\"50\" size=\"31\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getContext($context, 'municipio'), "html");
        echo "\" /></td>
\t\t\t<td>UF:<br /><input type=\"text\" name=\"uf\" title=\"Digite o código da Unidade Federativa.\" size=\"2\" maxlength=\"2\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getContext($context, 'uf'), "html");
        echo "\" /></td>
\t\t\t<td>CEP:<br /><input type=\"text\" id=\"cep\" name=\"cep\" title=\"Aqui, insira apenas números\" size=\"9\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getContext($context, 'cep'), "html");
        echo "\" /></td>
\t\t</tr>
\t</table>
\t<table class=\"form\">
\t\t<tr><td colspan=\"2\">E-mail:<br /><input type=\"text\" name=\"email\" title=\"Preencha este campo com atenção! Seu e-mail será necessário em caso da necessidade de recuperação da senha de acesso ao sistema.\" maxlength=\"50\" size=\"38\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getContext($context, 'email'), "html");
        echo "\" /></td></tr>
\t\t<tr>
\t\t\t<td>Fone:<br /><input type=\"text\" id=\"fone\" name=\"fone\" title=\"Aqui, insira apenas números: DDD + Telefone\" size=\"14\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getContext($context, 'fone'), "html");
        echo "\" /></td>
\t\t</tr>
\t</table>
\t<table class=\"submit\">
\t\t<tr><td><input type=\"submit\" value=\"Salvar\" title=\"\" /></td></tr>
\t</table>
</form>";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Usuario:formDados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
