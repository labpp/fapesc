<?php

/* FapescTutorialBundle:Contrapartida:bibliografia.html.twig */
class __TwigTemplate_f150bcba0f973b0c9dc62bfdbcd54627 extends Twig_Template
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
        echo "Contrapartidas - Bibliografia";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
    <div id=\"sidebar\">
        <a id=\"projects-button\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fornecedores"), "html");
        echo "\" title=\"Gerenciar fornecedores\">& Gerenciar Fornecedores</a><br /><br />
        <p><b>Instruções:</b><br /><br />Os dados relativos ao dispêndio devem estar consonantes com as informações contidas no documento comprobatório de aplicação do recurso (ex: nota fiscal), bem como ter sua execução prevista no plano de trabalho aprovado pela FAPESC.<br /><br />Posicione o ponteiro do mouse por alguns instantes sobre cada campo para obter instruções complementares acerca de seu preenchimento.<br /><br />Para o caso do dispêndio ter sido pago em espécie, basta registrar a informação (\"em espécie\") no campo \"Comprovante da transação\".<br /><br />É obrigatório o preenchimento de todos os campos do formulário.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Contrapartidas - Bibliografia</h1>
        ";
        // line 13
        $this->env->loadTemplate("FapescTutorialBundle:Contrapartida:formContrapartida.html.twig")->display(array_merge($context, array("action" => $this->getContext($context, 'action'))));
        // line 14
        echo "    </div><!-- #main-content -->\t\t\t
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Contrapartida:bibliografia.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
