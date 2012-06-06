<?php

/* FapescTutorialBundle:Fapesc:info.html.twig */
class __TwigTemplate_04a027a85d48fe5cb86f2d62cfc8f0df extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'notification' => array($this, 'block_notification'),
        );
    }

    public function getParent(array $context)
    {
        $parent = "FapescTutorialBundle:Fapesc:menu.html.twig";
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
    public function block_notification($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"title\">
\t<div id=\"project-title\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'info'), "projeto", array(), "any", false), "html");
        echo "</div>
\t
\t<div id=\"report-title\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'info'), "relatorio", array(), "any", false), "html");
        echo "</div>
\t
\t<div id=\"notification-box\">
\t\t";
        // line 10
        if ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("sucesso", ), "method", false)) {
            // line 11
            echo "\t\t<div id=\"ok-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("sucesso", ), "method", false), "html");
            echo "</span></div>
\t\t";
        } elseif ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("erro", ), "method", false)) {
            // line 13
            echo "\t\t<div id=\"error-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("erro", ), "method", false), "html");
            echo "</span></div>
\t\t";
        } elseif ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("aviso", ), "method", false)) {
            // line 15
            echo "\t\t<div id=\"attention-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("aviso", ), "method", false), "html");
            echo "</span></div>\t
\t\t";
        }
        // line 17
        echo "\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Fapesc:info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
