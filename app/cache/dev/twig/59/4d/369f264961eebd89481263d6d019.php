<?php

/* FapescTutorialBundle:Visitante:login.html.twig */
class __TwigTemplate_594d369f264961eebd89481263d6d019 extends Twig_Template
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
        echo "Login";
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
\t\t\t\tsenha: {
\t\t\t\t\trequired: true,
\t\t\t\t\tminlength: 4
\t\t\t\t}
\t\t\t},
\t\t\tmessages: {
\t\t\t\tcpf: \"Digite o CPF\",
\t\t\t\tsenha: {
\t\t\t\t\trequired: \"Digite a senha\",
\t\t\t\t\tminlength: \"A senha deve ter no mínimo quatro caracteres\"
\t\t\t\t}
\t\t\t}
\t\t});
\t});
</script>
<div id=\"login-content\">
\t<div id=\"sidebar\" class=\"login-sidebar\">
\t\t<p id=\"login-title\">Tutorial Eletrônico para prestação de contas de projetos apoiados pela FAPESC.</p>
\t\t<ul>
\t\t\t<li><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("cadastrar"), "html");
        echo "\">Novo usuário</a></li>
\t\t\t<li><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("recuperar"), "html");
        echo "\">Recuperar senha</a></li>
\t\t</ul>
\t</div><!-- #sidebar -->
\t<div id=\"main-content\" class=\"login-main-content\">
\t\t<form class=\"form-container\" action=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("loginPost"), "html");
        echo "\" method=\"POST\">
\t\t\t<table cellpadding=\"5\">
\t\t\t\t<tr><td>CPF:<br /><input type=\"text\" id=\"cpf\" name=\"cpf\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getContext($context, 'cpf'), "html");
        echo "\" /></td></tr>
\t\t\t\t<tr><td>Senha:<br /><input type=\"password\" name=\"senha\" /></td></tr>
\t\t\t\t<tr><td><input type=\"submit\" value=\"Entrar\" title=\"Entrar no sistema\" /></td></tr>
\t\t\t</table>
\t\t</form>
\t</div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Visitante:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
