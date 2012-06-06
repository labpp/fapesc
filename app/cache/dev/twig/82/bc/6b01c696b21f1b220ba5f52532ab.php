<?php

/* FapescTutorialBundle:Impressao:impressao.html.twig */
class __TwigTemplate_82bc6b01c696b21f1b220ba5f52532ab extends Twig_Template
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
        echo "Impressão";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
\t\t\t\t
\t<div id=\"sidebar\">
\t\t<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec magna magna, porttitor a ornare quis, interdum quis massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br /><br />Integer in commodo tellus. Suspendisse lobortis lacinia felis, ut laoreet ipsum posuere sed. Ut placerat volutpat luctus. <br /><br />Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec velit diam, tincidunt sed ultricies vel, scelerisque et ligula.</p>
\t</div><!-- #sidebar -->
\t\t\t
\t<div id=\"main-content\">
\t\t<a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioImprimir", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" title=\"Imprimir relatorio\" > Imprimir </a>
\t</div><!-- #main-content -->
\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Impressao:impressao.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
