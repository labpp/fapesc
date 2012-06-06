<?php

/* FapescTutorialBundle:Fapesc:menu.html.twig */
class __TwigTemplate_9a77908671807a4599e79d8fbfa1d78b extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'navigation' => array($this, 'block_navigation'),
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
    public function block_navigation($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"navigation\">
\t<ul>
\t\t";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'menu'), "opcoes", array(), "any", false));
        foreach ($context['_seq'] as $context['_key'] => $context['opcao']) {
            // line 7
            echo "\t\t<li>";
            echo $this->getContext($context, 'opcao');
            echo "</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opcao'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 9
        echo "\t</ul>
</div><!-- #navigation -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Fapesc:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
