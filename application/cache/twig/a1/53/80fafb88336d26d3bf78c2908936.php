<?php

/* template-all-users-table.twig */
class __TwigTemplate_a15380fafb88336d26d3bf78c2908936 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate(((isset($context["theme_path"]) ? $context["theme_path"] : null) . "/template-base.twig"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "assets/plugins/charts-c3/plugin.css\" rel=\"stylesheet\" />
    <script src=\"";
        // line 5
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "assets/plugins/charts-c3/plugin.js\"></script>
";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "    <main id=\"main\" role=\"main\" class=\"my-3 my-md-5\">
        <div class=\"container\">
            <div class=\"page-header\">
                <h1 class=\"page-title\">";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["pageTitle"]) ? $context["pageTitle"] : null), "html", null, true);
        echo "</h1>
            </div>

            <div class=\"row row-cards row-deck\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h4 class=\"card-title\">Listado de usuarios</h4>
                            <div class=\"card-options\">
                                <form action=\"\">
                                    <div class=\"input-group\">
                                        <input class=\"form-control form-control-sm\" placeholder=\"Buscar usuario...\"
                                                name=\"s\" type=\"text\">
                                        <span class=\"input-group-btn ml-2\">
                                            <button class=\"btn btn-sm btn-default\" type=\"submit\">
                                                <span class=\"fe fe-search\"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"table-responsive\">
                            <table class=\"table table-hover table-outline table-vcenter text-nowrap card-table\">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th class=\"text-center\">Aciertos / Intentos</th>
                                    <th class=\"text-center\">Último envío</th>
                                    <th class=\"text-center\">País</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 49
            echo "                                <tr>
                                    <td>
                                        <a title=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 52
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "users/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"), "html", null, true);
            echo "</a>
                                    </td>
                                    <td>
                                        <div><a title=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name"), "html", null, true);
            echo "\"
                                                    href=\"";
            // line 56
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "users/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "first_name"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_name"), "html", null, true);
            echo "</a></div>
                                        <div class=\"small text-muted\">
                                            Registrado desde: ";
            // line 58
            echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "registrationDate") != "0000-00-00 00:00:00")) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "registrationDate"), "d/m/Y")) : ("data desconocido")), "html", null, true);
            echo "
                                        </div>
                                    </td>

                                    <td>";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email"), "html", null, true);
            echo "</td>

                                    <td>
                                        <div class=\"progress progress-sm\">
                                            ";
            // line 66
            $context["percent"] = ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "TotalSubmissions") == 0)) ? (0) : ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "TotalAC") / $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "TotalSubmissions")) * 100)));
            // line 67
            echo "                                            <div class=\"progress-bar bg-cyan-light\"
                                                    style=\"width: ";
            // line 68
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                        </div>
                                        <div class=\"small text-muted text-center\">";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "TotalAC"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "TotalSubmissions"), "html", null, true);
            echo "</div>
                                    </td>

                                    <td class=\"text-center\">";
            // line 73
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "LastSubmission")) ? (twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "LastSubmission"), "d/m/Y")) : ("Ningún envío")), "html", null, true);
            echo "</td>

                                    <td class=\"text-center\" width=\"60\">
                                        ";
            // line 76
            if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "country_id")) {
                // line 77
                echo "                                            <img alt=\"\" src=\"";
                echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
                echo "/images/flags/flags-svg/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "country_id"), "html", null, true);
                echo ".svg\">
                                        ";
            } else {
                // line 79
                echo "                                            ?
                                        ";
            }
            // line 81
            echo "                                    </td>
                                </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
";
    }

    public function getTemplateName()
    {
        return "template-all-users-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 84,  179 => 81,  175 => 79,  167 => 77,  165 => 76,  159 => 73,  151 => 70,  144 => 68,  141 => 67,  139 => 66,  132 => 62,  125 => 58,  114 => 56,  110 => 55,  100 => 52,  96 => 51,  92 => 49,  88 => 48,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
