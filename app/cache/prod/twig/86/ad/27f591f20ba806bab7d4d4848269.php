<?php

/* FapescTutorialBundle:Usuario:formSenha.html.twig */
class __TwigTemplate_86ad27f591f20ba806bab7d4d4848269 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<script type=\"text/javascript\">
\t\$().ready(function() {
\t\t\$(\"form\").validate({
\t\t\trules: {
\t\t\t\tsenha1: {
\t\t\t\t\trequired: true,
\t\t\t\t\tminlength: 4
\t\t\t\t},
\t\t\t\tsenha2: {
\t\t\t\t\trequired: true,
\t\t\t\t\tminlength: 4,
\t\t\t\t\tequalTo: \"#senha1\"
\t\t\t\t}
\t\t\t},
\t\t\tmessages: {
\t\t\t\tsenha1: {
\t\t\t\t\trequired: \"Digite a senha\",
\t\t\t\t\tminlength: \"A senha deve ter no mínimo quatro caracteres\"
\t\t\t\t},
\t\t\t\tsenha2: {
\t\t\t\t\trequired: \"Digite a senha novamente\",
\t\t\t\t\tminlength: \"A senha deve ter no mínimo quatro caracteres\",
\t\t\t\t\tequalTo: \"As senhas digitadas não conferem\"
\t\t\t\t}
\t\t\t}
\t\t});
\t});
</script>
<form class=\"form-container\" action=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, 'action'), "html");
        echo "\" method=\"POST\">
\t<table class=\"form\" style=\"text-align: center;\">
\t\t<tr>
\t\t\t<td>Senha:<br /><input type=\"password\" id=\"senha1\" name=\"senha1\" /></td>
\t\t\t<td>Confirmar senha:<br /><input type=\"password\" id=\"senha2\" name=\"senha2\" /></td>
\t\t</tr>
\t</table>
\t<table class=\"submit\">
\t\t<tr><td><input type=\"submit\" value=\"Salvar\" /></td></tr>
\t</table>
</form>";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Usuario:formSenha.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
