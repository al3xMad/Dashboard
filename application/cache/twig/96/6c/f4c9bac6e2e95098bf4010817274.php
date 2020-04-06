<?php

/* template-user-details.twig */
class __TwigTemplate_966cf4c9bac6e2e95098bf4010817274 extends Twig_Template
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
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Intentos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 70
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "TotalSubmissions"), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Aciertos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 78
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "TotalAC"), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Fallidos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 86
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "TotalSubmissions") - $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "TotalAC")), 0, ",", "."), "html", null, true);
        // line 88
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Problemas enfrentados</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "problemAttempted"), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Problemas resueltos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "problemResolved"), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards\">
                <div class=\"col-lg-12\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h3 class=\"card-title\">Últimos problemas intentados:</h3>
                            <div class=\"card-options\">
                                <a href=\"";
        // line 116
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "problem/user/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "id"), "html", null, true);
        echo "\" class=\"btn btn-primary btn-sm\">Ver todos</a>
                            </div>
                        </div>
                        ";
        // line 120
        echo "                        <div class=\"table-responsive\">
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
        // line 134
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lastAttempts"]) ? $context["lastAttempts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["attempt"]) {
            // line 135
            echo "                                <tr>
                                    <td><a href=\"";
            // line 136
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_id"), "html", null, true);
            echo "\"
                                                title=\"";
            // line 137
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) ? ($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_id"), "html", null, true);
            echo "</a></td>
                                    <td><a href=\"";
            // line 138
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_id"), "html", null, true);
            echo "\"
                                                title=\"";
            // line 139
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) ? ($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) ? ($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "problem_name")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "</a></td>
                                    <td>
                                        <div class=\"progress progress-sm\">
                                            ";
            // line 142
            $context["percent"] = ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAttempts") == 0)) ? (0) : ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAC") / $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAttempts")) * 100)));
            // line 143
            echo "                                            <div class=\"progress-bar bg-cyan-light\"
                                                    style=\"width: ";
            // line 144
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                        </div>
                                        <div class=\"small text-muted text-center\">";
            // line 146
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAC"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "totalAttempts"), "html", null, true);
            echo "</div>
                                    </td>
                                    <td class=\"text-nowrap\">
                                        ";
            // line 149
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "languages"), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 150
                echo "                                            ";
                if (((isset($context["language"]) ? $context["language"] : null) == "JAV")) {
                    // line 151
                    echo "                                                ";
                    $context["color"] = "success";
                    // line 152
                    echo "                                            ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "CPP")) {
                    // line 153
                    echo "                                                ";
                    $context["color"] = "warning";
                    // line 154
                    echo "                                            ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "C")) {
                    // line 155
                    echo "                                                ";
                    $context["color"] = "danger";
                    // line 156
                    echo "                                            ";
                }
                // line 157
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
            // line 159
            echo "                                    </td>
                                    <td class=\"text-nowrap\">";
            // line 160
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "last_date_attempt"), "d/m/Y H:i:s"), "html", null, true);
            echo "</td>
                                    <td class=\"text-nowrap text-center\"><span class=\"badge badge-";
            // line 161
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
        // line 164
        echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards\">
                <div class=\"col-lg-12\">
                    <div class=\"row\">
                        <div class=\"col-sm-6\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h3 class=\"card-title\">Lenguajes de programación</h3>
                                </div>
                                <div class=\"card-body\">
                                    <div id=\"chart-pie-languages\" class=\"c3 text-center\"></div>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-sm-6\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h3 class=\"card-title\">Errores presentados</h3>
                                </div>
                                <div class=\"card-body\">
                                    <div id=\"chart-pie-errors\" class=\"c3 text-center\"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards row-deck\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"table-responsive\">
                            <table class=\"table table-hover table-outline table-vcenter text-nowrap card-table\">
                                <thead>
                                <tr>
                                    <th>Prefijo</th>
                                    <th>Tipo de error</th>
                                    <th class=\"text-left\">Total de ocurrencias</th>
                                    <th class=\"text-center\">Ocurrencias / Totales</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 212
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["submissionErrorsTable"]) ? $context["submissionErrorsTable"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["submissionError"]) {
            // line 213
            echo "                                    <tr>
                                        <td>";
            // line 214
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "status"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 215
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "name"), "html", null, true);
            echo "</td>
                                        <td class=\"text-left\">";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "totals"), "html", null, true);
            echo "</td>
                                        <td>
                                            <div class=\"progress progress-sm\">
                                                ";
            // line 219
            $context["errorPercent"] = (($this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "totals") / $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "TotalSubmissions")) * 100);
            // line 220
            echo "
                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 222
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["errorPercent"]) ? $context["errorPercent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["errorPercent"]) ? $context["errorPercent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 224
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "totals"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["userDetails"]) ? $context["userDetails"] : null), "TotalSubmissions"), "html", null, true);
            echo "</div>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submissionError'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 228
        echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        require(['c3', 'jquery'], function(c3, \$) {
            \$(document).ready(function(){
                let programmingLanguages = ";
        // line 239
        echo twig_jsonencode_filter((isset($context["programmingLanguages"]) ? $context["programmingLanguages"] : null));
        echo ",
                    submissionErrors = ";
        // line 240
        echo twig_jsonencode_filter((isset($context["submissionErrors"]) ? $context["submissionErrors"] : null));
        echo ",
                    dataLanguages = [],
                    dataErrors = [];

                programmingLanguages.map(function (language) {
                    dataLanguages.push([ language.language, language.totals]);
                });

                submissionErrors.map(function (userError) {
                    dataErrors.push([ userError.status, userError.totals]);
                });

                let chartLanguages = c3.generate({
                    bindto: '#chart-pie-languages', // id of chart wrapper
                    data: {
                        columns: dataLanguages,
                        type: 'pie', // default type of chart
                        colors: {
                            'data1': tabler.colors[\"blue-darker\"],
                            'data2': tabler.colors[\"blue\"],
                            'data3': tabler.colors[\"blue-light\"],
                            'data4': tabler.colors[\"blue-lighter\"]
                        },
                        names: {}
                    },
                    axis: {},
                    legend: {
                        show: true,
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });

                let chartErrors = c3.generate({
                    bindto: '#chart-pie-errors', // id of chart wrapper
                    data: {
                        columns: dataErrors,
                        type: 'pie', // default type of chart
                        colors: {
                            'data1': tabler.colors[\"blue-darker\"],
                            'data2': tabler.colors[\"blue\"],
                            'data3': tabler.colors[\"blue-light\"],
                            'data4': tabler.colors[\"blue-lighter\"]
                        },
                        names: {}
                    },
                    axis: {},
                    legend: {
                        show: true,
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });
            });
        });
    </script>

";
    }

    public function getTemplateName()
    {
        return "template-user-details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  434 => 240,  430 => 239,  417 => 228,  405 => 224,  398 => 222,  394 => 220,  392 => 219,  386 => 216,  382 => 215,  378 => 214,  375 => 213,  371 => 212,  321 => 164,  310 => 161,  306 => 160,  303 => 159,  292 => 157,  289 => 156,  286 => 155,  283 => 154,  280 => 153,  277 => 152,  274 => 151,  271 => 150,  267 => 149,  259 => 146,  252 => 144,  249 => 143,  247 => 142,  239 => 139,  233 => 138,  227 => 137,  221 => 136,  218 => 135,  214 => 134,  198 => 120,  190 => 116,  175 => 104,  164 => 96,  154 => 88,  152 => 86,  141 => 78,  130 => 70,  112 => 55,  103 => 49,  94 => 43,  85 => 37,  75 => 30,  66 => 24,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
