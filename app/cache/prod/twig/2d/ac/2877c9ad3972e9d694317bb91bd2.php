<?php

/* FapescTutorialBundle:Visitante:senha.html.twig */
class __TwigTemplate_2dac2877c9ad3972e9d694317bb91bd2 extends Twig_Template
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
        echo "Recuperar senha";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"login-content\">
\t<div id=\"sidebar\" class=\"login-sidebar\">
\t\t<span id=\"login-title\">Recuperar senha</span>
\t</div><!-- #sidebar -->
\t<div id=\"main-content\" class=\"login-main-content\">
\t\t";
        // line 11
        $this->env->loadTemplate("FapescTutorialBundle:Usuario:formSenha.html.twig")->display(array_merge($context, array("action" => $this->getContext($context, 'action'))));
        // line 12
        echo "\t</div><!-- #main-content -->\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Visitante:senha.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
