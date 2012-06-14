<?php

/* FapescTutorialBundle:Visitante:recupera.html.twig */
class __TwigTemplate_927799a6c3501580164fae50fad69569 extends Twig_Template
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
        $parent = "FapescTutorialBundle:Visitante:index.html.twig";
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
        echo "Recuperar Senha";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<script type=\"text/javascript\">
\tjQuery(function(\$){
\t   \$(\"#cpf\").mask(\"999.999.999-99\");
\t});
\t\$().ready(function() {
\t\t\$(\"form\").validate({
\t\t\trules: {
\t\t\t\tcpf: \"required\",
\t\t\t\temail: {
\t\t\t\t\trequired: true,
\t\t\t\t\temail: true
\t\t\t\t}
\t\t\t},
\t\t\tmessages: {
\t\t\t\tcpf: \"Digite o CPF\",
\t\t\t\tsenha: {
\t\t\t\t\trequired: \"Digite o email\",
\t\t\t\t\temail: \"Digite um email válido\"
\t\t\t\t}
\t\t\t}
\t\t});
\t});
</script>
<div id=\"login-content\">
\t<div id=\"sidebar\" class=\"login-sidebar\">
\t\t<p id=\"login-title\">Recuperar Senha</p>
\t</div><!-- #sidebar -->
\t<div id=\"main-content\" class=\"login-main-content\">
\t\t<form class=\"form-container\" action=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("recuperarPost"), "html");
        echo "\" method=\"POST\">
\t\t\t<table cellpadding=\"5\">
\t\t\t\t<tr><td>CPF:<br /><input type=\"text\" id=\"cpf\" name=\"cpf\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getContext($context, 'cpf'), "html");
        echo "\" /></td></tr>
\t\t\t\t<tr><td>E-mail:<br /><input type=\"text\" id=\"email\" name=\"email\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getContext($context, 'email'), "html");
        echo "\" /></td></tr>
\t\t\t\t<tr><td><input type=\"submit\" value=\"Enviar\" /></td></tr>
\t\t\t</table>
\t\t</form>
\t</div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Visitante:recupera.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
