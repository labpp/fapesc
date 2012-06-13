<?php

/* FapescTutorialBundle:Usuario:index.html.twig */
class __TwigTemplate_8d0f5721d457a349c8bc6a2cba9da7c9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'navigation' => array($this, 'block_navigation'),
            'notification' => array($this, 'block_notification'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t\t<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-1.7.1.min.js"), "html");
        echo "\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.maskedinput-1.3.min.js"), "html");
        echo "\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.price_format.1.6.min.js"), "html");
        echo "\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.validate.min.js"), "html");
        echo "\" type=\"text/javascript\"></script>
\t\t<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/additional-methods.min.js"), "html");
        echo "\" type=\"text/javascript\"></script>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html");
        echo "\" type=\"text/css\" media=\"all\" />
\t\t<title>FAPESC | ";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link rel=\"shortcut icon\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html");
        echo "\" />
\t</head>
\t<body>
\t\t<div id=\"wrapper\">
\t\t\t<div id=\"header\">
\t\t\t\t<div id=\"header-left\"><img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo-fapesc.png"), "html");
        echo "\" alt=\"FAPESC\" /></div><!-- #header-left -->
\t\t\t\t<div id=\"header-center\">Bem vindo, <b>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'usuario'), "nome", array(), "any", false), "html");
        echo "</b>!</div><!-- #header-center -->
\t\t\t\t<div id=\"header-right\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inicio"), "html");
        echo "\" title=\"Meus Projetos\">Meus Projetos</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("perfil"), "html");
        echo "\" title=\"Atualizar meus dados\">Meu Cadastro</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("logout"), "html");
        echo "\" title=\"Sair do tutorial\"  onclick=\"return confirm('Tem certeza que deseja sair da aplicação?')\">Sair</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div><!-- #header-right -->
\t\t\t</div><!-- #header -->
\t\t\t";
        // line 27
        $this->displayBlock('navigation', $context, $blocks);
        // line 30
        echo "
\t\t\t";
        // line 31
        $this->displayBlock('notification', $context, $blocks);
        // line 42
        echo "
\t\t\t";
        // line 43
        $this->displayBlock('content', $context, $blocks);
        // line 46
        echo "\t\t</div><!-- #wrapper -->
\t\t<div id=\"footer\">
\t\t\t<p id=\"copyright\">2011 - Todos os direitos reservados - Fundação de Amparo à Pesquisa e Inovação do Estado de Santa Catarina.</p><!-- #copyright -->
\t\t</div><!-- #footer -->
\t</body>
</html>
";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Tutorial - Prestação de Contas";
    }

    // line 27
    public function block_navigation($context, array $blocks = array())
    {
        // line 28
        echo "\t\t\t<div id=\"navigation\"></div><!-- #navigation -->
\t\t\t";
    }

    // line 31
    public function block_notification($context, array $blocks = array())
    {
        // line 32
        echo "\t\t\t<div id=\"notification-box\">
\t\t\t\t";
        // line 33
        if ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("sucesso", ), "method", false)) {
            // line 34
            echo "\t\t\t\t<div id=\"ok-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("sucesso", ), "method", false), "html");
            echo "</span></div>
\t\t\t\t";
        } elseif ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("erro", ), "method", false)) {
            // line 36
            echo "\t\t\t\t<div id=\"error-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("erro", ), "method", false), "html");
            echo "</span></div>
\t\t\t\t";
        } elseif ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("aviso", ), "method", false)) {
            // line 38
            echo "\t\t\t\t<div id=\"attention-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("aviso", ), "method", false), "html");
            echo "</span></div>\t
\t\t\t\t";
        }
        // line 40
        echo "\t\t\t</div>
\t\t\t";
    }

    // line 43
    public function block_content($context, array $blocks = array())
    {
        // line 44
        echo "\t\t\t";
        echo twig_escape_filter($this->env, $this->getContext($context, 'content'), "html");
        echo "
\t\t\t";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Usuario:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
