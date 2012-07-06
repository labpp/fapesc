<?php

/* FapescTutorialBundle:Contrapartida:contrapartidas.html.twig */
class __TwigTemplate_d2e17b5cdd0a354ff2800df8c94249d3 extends Twig_Template
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
        echo "Contrapartidas";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"content\">
    <div id=\"sidebar\">
        <p><b>Instruções:</b><br /><br />Cada comprovante de dispêndio (ex: nota fiscal de compra de itens de consumo) deverá ser cadastrado individualmente.<br /><br />O valor \"Total de Contrapartidas\" lista o total dos dispêndios registrados até o momento.<br /><br />Para incluir uma nova contrapartida, selecione a categoria de melhor enquadramento e clique em \"Registrar\".<br /><br />Para editar um dispêndio já cadastrado, clique na descrição do mesmo.<br /><br />O botão \"X\", em cinza, exclui um registro definitivamente.</p>
        <p>Antes de iniciar o cadastro de novas contrapartidas, sugerimos a leitura do <a href=\"http://www.fapesc.sc.gov.br/index.php?option=com_docman&task=doc_download&gid=247&Itemid=42\">Guia Básico para Prestação de Contas da FAPESC</a><br /><br />Em caso de dúvida sobre a validade ou o melhor enquadramento de um dispêndio, entre em contato com a Gerência de Projetos ds FAPESC.</p>
    </div><!-- #sidebar -->
    <div id=\"main-content\">
        <h1>:: Contrapartidas</h1>
        <div id=\"budget-panel-c\">
            <table>
                <tr>
                   <th>Total de Contrapartidas:</th>
                </tr>
                <tr>
                  <td title=\"Valor total das contrapartidas\">R\$ ";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, 'empenhado'), "html");
        echo "</td>
                </tr>
            </table>
        </div>
        <form class=\"form-container\" action=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidasPost", array("idRelatorio" => $this->getContext($context, 'idRelatorio'))), "html");
        echo "\" method=\"POST\">
            <table class=\"submit\" width=\"90%\"  style=\"clear:both;\">
                <tr>
                    <td width=\"90%\" style=\"text-align:right; padding-right:10px;\">Categoria:</td>
                    <td>
                        <select name=\"categoria\" title=\"Selecione a categoria de item a empenhar\">
                            ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'opcoes'));
        foreach ($context['_seq'] as $context['_key'] => $context['opcao']) {
            // line 30
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcao'), "value", array(), "any", false), "html");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcao'), "text", array(), "any", false), "html");
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opcao'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 32
        echo "                        </select>
                    </td>
                    <td><input type=\"submit\" value=\"Registrar\" title=\"\" /></td>
                </tr>
            </table>
        </form>

        ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'categorias'));
        foreach ($context['_seq'] as $context['_key'] => $context['categoria']) {
            // line 40
            echo "        ";
            if (($this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false) == "salario")) {
                // line 41
                echo "        <p style=\"font-size:12px;\"><b>:: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'categoria'), "descricao", array(), "any", false), "html");
                echo "</b></p>
        <table id=\"budget-pledged\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
            <tr>
                <th width=\"30%\">Pesquisador</th>
                <th width=\"5%\">Período</th>
                <th width=\"16%\">Valor Proporcional</th>
                <th width=\"3%\"></th>
            </tr>
            ";
                // line 49
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'categoria'), "itens", array(), "any", false));
                foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                    // line 50
                    echo "            <tr>
                <td><a href=\"";
                    // line 51
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartida", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                    echo "\" title=\"Clique para editar item empenhado\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'item'), "pesquisador", array(), "any", false), "nome", array(), "any", false), "html");
                    echo "</a></td>
                <td>";
                    // line 52
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "data", array(), "any", false), "html");
                    echo "</td>
                <td style=\"text-align:right;\">R\$ ";
                    // line 53
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "proporcional", array(), "any", false), "html");
                    echo "</td>
                <td style=\"text-align:center;\"><a href=\"";
                    // line 54
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidaDelete", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                    echo "\" title=\"Deletar item\" onclick=\"return confirm('Tem certeza que deseja excluir este item?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
                    echo "\" alt=\"Deletar\"></a></td>
            </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 57
                echo "        </table>
        ";
            } else {
                // line 59
                echo "        ";
                if (($this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false) == "diaria")) {
                    // line 60
                    echo "        <p style=\"font-size:12px;\"><b>:: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'categoria'), "descricao", array(), "any", false), "html");
                    echo "</b></p>
        <table id=\"budget-pledged\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
            <tr>
                <th width=\"30%\">Beneficiario</th>
                <th width=\"5%\">Instituição</th>
                <th width=\"16%\">Valor</th>
                <th width=\"3%\"></th>
            </tr>
            ";
                    // line 68
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'categoria'), "itens", array(), "any", false));
                    foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                        // line 69
                        echo "            <tr>
                <td><a href=\"";
                        // line 70
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartida", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                        echo "\" title=\"Clique para editar item empenhado\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "beneficiario", array(), "any", false), "html");
                        echo "</a></td>
                <td>";
                        // line 71
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "instituicao", array(), "any", false), "html");
                        echo "</td>
                <td style=\"text-align:right;\">R\$ ";
                        // line 72
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "valor", array(), "any", false), "html");
                        echo "</td>
                <td style=\"text-align:center;\"><a href=\"";
                        // line 73
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidaDelete", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                        echo "\" title=\"Deletar item\" onclick=\"return confirm('Tem certeza que deseja excluir este item?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
                        echo "\" alt=\"Deletar\"></a></td>
            </tr>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 76
                    echo "        </table>
        ";
                } else {
                    // line 78
                    echo "        ";
                    if (($this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false) == "passagem")) {
                        // line 79
                        echo "        <p style=\"font-size:12px;\"><b>:: ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'categoria'), "descricao", array(), "any", false), "html");
                        echo "</b></p>
        <table id=\"budget-pledged\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
            <tr>
                <th width=\"30%\">Origem</th>
                <th width=\"5%\">Destino</th>
                <th width=\"30%\">Tipo</th>
                <th width=\"16%\">Valor Total</th>
                <th width=\"3%\"></th>
            </tr>
            ";
                        // line 88
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'categoria'), "itens", array(), "any", false));
                        foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                            // line 89
                            echo "            <tr>
                <td><a href=\"";
                            // line 90
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartida", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                            echo "\" title=\"Clique para editar item empenhado\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "origem", array(), "any", false), "html");
                            echo "</a></td>
                <td>";
                            // line 91
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "destino", array(), "any", false), "html");
                            echo "</td>
                <td>";
                            // line 92
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'item'), "tipos", array(), "any", false), $this->getAttribute($this->getContext($context, 'item'), "tipo", array(), "any", false), array(), "array", false), "html");
                            echo "</td>
                <td style=\"text-align:right;\">R\$ ";
                            // line 93
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "valor", array(), "any", false), "html");
                            echo "</td>
                <td style=\"text-align:center;\"><a href=\"";
                            // line 94
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidaDelete", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                            echo "\" title=\"Deletar item\" onclick=\"return confirm('Tem certeza que deseja excluir este item?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
                            echo "\" alt=\"Deletar\"></a></td>
            </tr>
            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 97
                        echo "        </table>
        ";
                    } else {
                        // line 99
                        echo "        ";
                        if (($this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false) == "bolsa")) {
                            // line 100
                            echo "        <p style=\"font-size:12px;\"><b>:: ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'categoria'), "descricao", array(), "any", false), "html");
                            echo "</b></p>
        <table id=\"budget-pledged\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
            <tr>
                <th width=\"30%\">Bolsista</th>
                <th width=\"5%\">Tipo</th>
                <th width=\"16%\">Instituição</th>
                <th width=\"16%\">Valor Total</th>
                <th width=\"3%\"></th>
            </tr>
            ";
                            // line 109
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'categoria'), "itens", array(), "any", false));
                            foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                                // line 110
                                echo "            <tr>
                <td><a href=\"";
                                // line 111
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartida", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                                echo "\" title=\"Clique para editar item empenhado\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'item'), "bolsista", array(), "any", false), "nome", array(), "any", false), "html");
                                echo "</a></td>
                <td>";
                                // line 112
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, 'item'), "bolsista", array(), "any", false), "tipos", array(), "any", false), $this->getAttribute($this->getAttribute($this->getContext($context, 'item'), "bolsista", array(), "any", false), "tipo", array(), "any", false), array(), "array", false), "html");
                                echo "</td>
                <td>";
                                // line 113
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, 'item'), "bolsista", array(), "any", false), "instituicao", array(), "any", false), "html");
                                echo "</td>
                <td style=\"text-align:right;\">R\$ ";
                                // line 114
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "valor", array(), "any", false), "html");
                                echo "</td>
                <td style=\"text-align:center;\"><a href=\"";
                                // line 115
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidaDelete", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                                echo "\" title=\"Deletar item\" onclick=\"return confirm('Tem certeza que deseja excluir este item?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
                                echo "\" alt=\"Deletar\"></a></td>
            </tr>
            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            // line 118
                            echo "        </table>
        ";
                        } else {
                            // line 120
                            echo "        <p style=\"font-size:12px;\"><b>:: ";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'categoria'), "descricao", array(), "any", false), "html");
                            echo "</b></p>
        <table id=\"budget-pledged\" class=\"form\" width=\"90%\" cellspacing=\"5\" cellpadding=\"5\">
            <tr>
                <th width=\"30%\">Item</th>
                <th width=\"5%\">Quantidade</th>
                <th width=\"16%\">Valor Unitário</th>
                <th width=\"16%\">Valor Total</th>
                <th width=\"3%\"></th>
            </tr>
            ";
                            // line 129
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, 'categoria'), "itens", array(), "any", false));
                            foreach ($context['_seq'] as $context['_key'] => $context['item']) {
                                // line 130
                                echo "            <tr>
                <td><a href=\"";
                                // line 131
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartida", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                                echo "\" title=\"Clique para editar item empenhado\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "descricao", array(), "any", false), "html");
                                echo "</a></td>
                <td style=\"text-align:center;\">";
                                // line 132
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "quantidade", array(), "any", false), "html");
                                echo "</td>
                <td style=\"text-align:right;\">R\$ ";
                                // line 133
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "unitario", array(), "any", false), "html");
                                echo "</td>
                <td style=\"text-align:right;\">R\$ ";
                                // line 134
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'item'), "total", array(), "any", false), "html");
                                echo "</td>
                <td style=\"text-align:center;\"><a href=\"";
                                // line 135
                                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("relatorioContrapartidaDelete", array("idRelatorio" => $this->getContext($context, 'idRelatorio'), "idContrapartida" => $this->getAttribute($this->getContext($context, 'item'), "id", array(), "any", false), "categoria" => $this->getAttribute($this->getContext($context, 'categoria'), "categoria", array(), "any", false))), "html");
                                echo "\" title=\"Deletar item\" onclick=\"return confirm('Tem certeza que deseja excluir este item?\\nEsta ação não poderá ser desfeita.')\" ><img src=\"";
                                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/excluir-pq.png"), "html");
                                echo "\" alt=\"Deletar\"></a></td>
            </tr>
            ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                            $context = array_merge($_parent, array_intersect_key($context, $_parent));
                            // line 138
                            echo "        </table>
        ";
                        }
                        // line 140
                        echo "        ";
                    }
                    // line 141
                    echo "        ";
                }
                // line 142
                echo "        ";
            }
            // line 143
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categoria'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 144
        echo "    </div><!-- #main-content -->
</div><!-- #content -->
";
    }

    public function getTemplateName()
    {
        return "FapescTutorialBundle:Contrapartida:contrapartidas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
