<?php

/* FapescTutorialBundle:Visitante:index.html.twig */
class __TwigTemplate_dd7fd3316907d20cae0640844a0cb1b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
\t\t\t\t<div id=\"header-left\">&nbsp;</div><!-- #header-left -->
\t\t\t\t<div id=\"header-center\"><img src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo-fapesc.png"), "html");
        echo "\" alt=\"FAPESC\" /></div><!-- #header-center -->
\t\t\t\t<div id=\"header-right\">&nbsp;</div><!-- #header-right -->
\t\t\t</div><!-- #header -->

\t\t\t";
        // line 22
        $this->displayBlock('notification', $context, $blocks);
        // line 33
        echo "\t\t\t
\t\t\t";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 35
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

    // line 22
    public function block_notification($context, array $blocks = array())
    {
        // line 23
        echo "\t\t\t<div id=\"notification-box\">
\t\t\t\t";
        // line 24
        if ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("sucesso", ), "method", false)) {
            // line 25
            echo "\t\t\t\t<div id=\"ok-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("sucesso", ), "method", false), "html");
            echo "</span></div>
\t\t\t\t";
        } elseif ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("erro", ), "method", false)) {
            // line 27
            echo "\t\t\t\t<div id=\"error-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("erro", ), "method", false), "html");
            echo "</span></div>
\t\t\t\t";
        } elseif ($this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "hasFlash", array("aviso", ), "method", false)) {
            // line 29
            echo "\t\t\t\t<div id=\"attention-bar\" class=\"notification\"><span class=\"notification-content\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'app'), "session", array(), "any", false), "flash", array("aviso", ), "method", false), "html");
            echo "</span></div>\t
\t\t\t\t";
        }
        // line 31
        echo "\t\t\t</div>
\t\t\t";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Visitante:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
