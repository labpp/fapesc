<?php

/* FapescTutorialBundle:Email:senha.html.twig */
class __TwigTemplate_1a587498e64d2cd67280abb07d74de98 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<html>
\t<body>
\t\t<p>Olá,</p>
\t\t<p>Houve recentemente um pedido para alterar a senha de sua conta.</p>
\t\t<p>Se você solicitou esta alteração de senha, por favor, defina uma nova senha através do link abaixo:</p>
\t\t<p><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'link'), "html");
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, 'link'), "html");
        echo "</a></p>
\t\t<p>Se você não deseja alterar a sua senha, basta ignorar esta mensagem.</p>
\t\t<p>Atenciosamente,</p>
\t\t<p>FAPESC | Tutorial - Prestação de Contas</p>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Email:senha.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
