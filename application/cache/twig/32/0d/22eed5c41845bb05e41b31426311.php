<?php

/* template-all-problem-submissions-table.twig */
class __TwigTemplate_320d22eed5c41845bb05e41b31426311 extends Twig_Template
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
                            <h3 class=\"card-title\">Listado de envíos por usuario</h3>
                            <div class=\"card-options\">
                                <form action=\"\">
                                    <div class=\"input-group\">
                                        <input class=\"form-control form-control-sm\" placeholder=\"Buscar alumno...\"
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

                        <div class=\"table-responsive\">
                            <table class=\"table card-table table-striped table-vcenter\">
                                <thead>
                                <tr>
                                    <th colspan=\"2\">User</th>
                                    <th>Aciertos / Intentos</th>
                                    <th>Lenguajes</th>
                                    <th>Última fecha de envío</th>
                                    <th class=\"text-center\">Último estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 47
        $context["face"] = 0;
        // line 48
        echo "                                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lastAttempts"]) ? $context["lastAttempts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["attempt"]) {
            // line 49
            echo "                                    ";
            // line 50
            $context["face"] = ((((isset($context["face"]) ? $context["face"] : null) > 32)) ? (1) : (((isset($context["face"]) ? $context["face"] : null) + 1)));
            // line 52
            echo "                                    <tr>
                                        <td class=\"w-1\">
                                        <span class=\"avatar\"
                                                style=\"background-image: url(";
            // line 55
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "assets/images/demo/faces/";
            echo twig_escape_filter($this->env, (isset($context["face"]) ? $context["face"] : null), "html", null, true);
            echo ".jpg)\"></span>
                                        </td>
                                        <td>
                                            <div><a title=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "first_name"), "html", null, true);
            echo "\"
                                                    href=\"";
            // line 59
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "users/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "first_name"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "last_name"), "html", null, true);
            echo "</a></div>
                                        </td>
                                        <td>
                                            <div class=\"progress progress-sm\">
                                                ";
            // line 63
            $context["percent"] = (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "accepted") / $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "attempts")) * 100);
            // line 64
            echo "                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 65
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "accepted"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "attempts"), "html", null, true);
            echo "</div>
                                        </td>
                                        <td class=\"text-nowrap\">
                                            ";
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "languages"), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 71
                echo "                                                ";
                if (((isset($context["language"]) ? $context["language"] : null) == "JAV")) {
                    // line 72
                    echo "                                                    ";
                    $context["color"] = "success";
                    // line 73
                    echo "                                                ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "CPP")) {
                    // line 74
                    echo "                                                    ";
                    $context["color"] = "warning";
                    // line 75
                    echo "                                                ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "C")) {
                    // line 76
                    echo "                                                    ";
                    $context["color"] = "danger";
                    // line 77
                    echo "                                                ";
                }
                // line 78
                echo "                                                <span class=\"badge badge-";
                echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : null), "html", null, true);
                echo "</span>
                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 80
            echo "                                        </td>
                                        <td class=\"text-nowrap\">";
            // line 81
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "last_date_attempt"), "d/m/Y H:i:s"), "html", null, true);
            echo "</td>
                                        <td class=\"text-nowrap text-center\"><span class=\"badge badge-";
            // line 82
            echo ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "lastAttempt") == "AC")) ? ("success") : ("danger"));
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "lastAttempt"), "html", null, true);
            echo "</span></td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attempt'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 85
        echo "                                </tbody>
                            </table>
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
        return "template-all-problem-submissions-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 85,  191 => 82,  187 => 81,  184 => 80,  173 => 78,  170 => 77,  167 => 76,  164 => 75,  161 => 74,  158 => 73,  155 => 72,  152 => 71,  148 => 70,  140 => 67,  133 => 65,  130 => 64,  128 => 63,  115 => 59,  111 => 58,  103 => 55,  98 => 52,  96 => 50,  94 => 49,  89 => 48,  87 => 47,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
