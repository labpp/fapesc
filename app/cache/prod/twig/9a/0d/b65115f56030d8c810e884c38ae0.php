<?php

/* FapescTutorialBundle:Visitante:dados.html.twig */
class __TwigTemplate_9a0db65115f56030d8c810e884c38ae0 extends Twig_Template
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
        echo "Cadastro de Usuário";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"login-content\">
\t<div id=\"sidebar\">
\t\t<p><b>Instruções:</b><br /><br />Antes de iniciar sua prestação de contas, faz-se necessário realizar o cadastro do coordenador do projeto em questão.<br /><br />Preencha os campos ao lado com atenção.<br /><br />Todos os campos listados são de preenchimento obrigatório</p> 
\t</div><!-- #sidebar -->
\t<div id=\"main-content\">
\t\t<h1>:: Cadastro de Usuário</h1>
\t\t";
        // line 12
        $this->env->loadTemplate("FapescTutorialBundle:Usuario:formDados.html.twig")->display(array_merge($context, array("action" => $this->getContext($context, 'action'))));
        // line 13
        echo "\t</div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Visitante:dados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
