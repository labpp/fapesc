<?php

/* FapescTutorialBundle:Email:cadastro.html.twig */
class __TwigTemplate_b3191df9a3edcd4a1e07966fe900f8d1 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<html>
\t<body>
\t\t<p>Olá,</p>
\t\t<p>Seu cadastro no sistema foi concluído com sucesso.</p>
\t\t<p>Sua senha temporária é: <b>";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'senha'), "html");
        echo "</b></p>
\t\t<p>Atenciosamente,</p>
\t\t<p><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'link'), "html");
        echo "\">FAPESC | Tutorial - Prestação de Contas</a></p>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Email:cadastro.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
