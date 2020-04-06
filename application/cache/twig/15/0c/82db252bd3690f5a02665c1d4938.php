<?php

/* template-all-problem-submissions-by-user-table.twig */
class __TwigTemplate_150c82db252bd3690f5a02665c1d4938 extends Twig_Template
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
        echo ": ";
        echo twig_escape_filter($this->env, (isset($context["userName"]) ? $context["userName"] : null), "html", null, true);
        echo "</h1>
            </div>

            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h3 class=\"card-title\">Perfil completo:</h3>
                            <div class=\"row\">
                                <div class=\"col-sm-6 col-md-6\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\">Nombre</label>
                                        <input class=\"form-control\" placeholder=\"Nombre\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "first_name")) ? ($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "first_name")) : ("Desconocido")), "html", null, true);
        echo "\" type=\"text\" readonly>
                                    </div>
                                </div>
                                <div class=\"col-sm-6 col-md-6\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\">Apellidos</label>
                                        <input class=\"form-control\" placeholder=\"Apellidos\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "last_name")) ? ($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "last_name")) : ("Desconocido")), "html", null, true);
        echo "\" type=\"text\" readonly>
                                    </div>
                                </div>

                                <div class=\"col-md-4\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\">Institución</label>
                                        <input class=\"form-control\" disabled=\"\" placeholder=\"Institución\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "institution_id")) ? ($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "institution_id")) : ("Desconocida")), "html", null, true);
        echo "\" type=\"text\" readonly>
                                    </div>
                                </div>
                                <div class=\"col-sm-6 col-md-2\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\">País</label>
                                        <input class=\"form-control\" placeholder=\"Email\" type=\"email\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "country_id")) ? ($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "country_id")) : ("Desconocido")), "html", null, true);
        echo "\" readonly>
                                    </div>
                                </div>
                                <div class=\"col-sm-6 col-md-4\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\">Email</label>
                                        <input class=\"form-control\" placeholder=\"Email\" type=\"email\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "email"), "html", null, true);
        echo "\" readonly>
                                    </div>
                                </div>
                                <div class=\"col-sm-6 col-md-2\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\">Fecha de registro</label>
                                        <input class=\"form-control\" placeholder=\"Registro\" value=\"";
        // line 55
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "registrationDate"), "d/m/Y"), "html", null, true);
        echo "\" type=\"text\" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards\">
                <div class=\"col-lg-12\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h4 class=\"card-title\">Listado de problemas</h4>
                            <div class=\"card-options\">
                                <form action=\"\">
                                    <div class=\"input-group\">
                                        <input class=\"form-control form-control-sm\" placeholder=\"Buscar problema...\"
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
                            <table class=\"table card-table table-striped table-vcenter\">
                                <thead>
                                <tr>
                                    <th>ID Problema</th>
                                    <th>Problema</th>
                                    <th>Aciertos / Intentos</th>
                                    <th>Lenguajes</th>
                                    <th>Última fecha de envío</th>
                                    <th class=\"text-center\">Último estado</th>
                                </tr>
                                </thead>
                                <tbody>

                                ";
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lastAttempts"]) ? $context["lastAttempts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["attempt"]) {
            // line 99
            echo "                                <tr>
                                    <td><a href=\"";
            // line 100
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_id"), "html", null, true);
            echo "\"
                                                title=\"";
            // line 101
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) ? ($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_id"), "html", null, true);
            echo "</a></td>
                                    <td><a href=\"";
            // line 102
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_id"), "html", null, true);
            echo "\"
                                                title=\"";
            // line 103
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) ? ($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) ? ($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "</a></td>
                                    <td>
                                        <div class=\"progress progress-sm\">
                                            ";
            // line 106
            $context["percent"] = ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAttempts") == 0)) ? (0) : ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAC") / $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAttempts")) * 100)));
            // line 107
            echo "                                            <div class=\"progress-bar bg-cyan-light\"
                                                    style=\"width: ";
            // line 108
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                        </div>
                                        <div class=\"small text-muted text-center\">";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAC"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAttempts"), "html", null, true);
            echo "</div>
                                    </td>
                                    <td class=\"text-nowrap\">
                                        ";
            // line 113
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "languages"), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 114
                echo "                                            ";
                if (((isset($context["language"]) ? $context["language"] : null) == "JAV")) {
                    // line 115
                    echo "                                                ";
                    $context["color"] = "success";
                    // line 116
                    echo "                                            ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "CPP")) {
                    // line 117
                    echo "                                                ";
                    $context["color"] = "warning";
                    // line 118
                    echo "                                            ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "C")) {
                    // line 119
                    echo "                                                ";
                    $context["color"] = "danger";
                    // line 120
                    echo "                                            ";
                }
                // line 121
                echo "                                            <span class=\"badge badge-";
                echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["language"]) ? $context["language"] : null), "html", null, true);
                echo "</span>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 123
            echo "                                    </td>
                                    <td class=\"text-nowrap\">";
            // line 124
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "last_date_attempt"), "d/m/Y H:i:s"), "html", null, true);
            echo "</td>
                                    <td class=\"text-nowrap text-center\"><span class=\"badge badge-";
            // line 125
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
        // line 128
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
        return "template-all-problem-submissions-by-user-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 128,  254 => 125,  250 => 124,  247 => 123,  236 => 121,  233 => 120,  230 => 119,  227 => 118,  224 => 117,  221 => 116,  218 => 115,  215 => 114,  211 => 113,  203 => 110,  196 => 108,  193 => 107,  191 => 106,  183 => 103,  177 => 102,  171 => 101,  165 => 100,  162 => 99,  158 => 98,  112 => 55,  103 => 49,  94 => 43,  85 => 37,  75 => 30,  66 => 24,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
