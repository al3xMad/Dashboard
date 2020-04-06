<?php

/* template-problem-details.twig */
class __TwigTemplate_b6e2b623de200648691ac703b4e2d3f1 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
        echo "</h1>
            </div>

            <div class=\"row row-cards\">
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Intentos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 20
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs"), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Aciertos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 28
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC"), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Fallidos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 36
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (((((((($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalPE") + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalWA")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalTL")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalML")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalOL")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalRF")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalRTE")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalCE")) + $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalIR")), 0, ",", "."), "html", null, true);
        // line 45
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Usuarios únicos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 53
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers"), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">DACU</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 61
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU"), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards\">
                <div class=\"col-lg-12\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h3 class=\"card-title\">Últimos intentos por usuario</h3>
                            <div class=\"card-options\">
                                <a href=\"";
        // line 73
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "problem/submissions/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "id"), "html", null, true);
        echo "\" class=\"btn btn-primary btn-sm\">Ver todos</a>
                            </div>
                        </div>
                        <div id=\"chart-development-activity\" style=\"height: 10rem; position: relative; max-height: 160px;\" class=\"c3\"></div>
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
        // line 89
        $context["face"] = 0;
        // line 90
        echo "                                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lastAttempts"]) ? $context["lastAttempts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["attempt"]) {
            // line 91
            echo "                                    ";
            $context["face"] = ((isset($context["face"]) ? $context["face"] : null) + 1);
            // line 92
            echo "                                <tr>
                                    <td class=\"w-1\">
                                        <span class=\"avatar\"
                                            style=\"background-image: url(";
            // line 95
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "assets/images/demo/faces/";
            echo twig_escape_filter($this->env, (isset($context["face"]) ? $context["face"] : null), "html", null, true);
            echo ".jpg)\"></span>
                                    </td>
                                    <td>
                                        <div><a title=\"";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "first_name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 99
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "users/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "first_name"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "last_name"), "html", null, true);
            echo "</a></div>
                                    <td>
                                        <div class=\"progress progress-sm\">
                                            ";
            // line 102
            $context["percent"] = ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "attempts") == 0)) ? (0) : ((($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "accepted") / $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "attempts")) * 100)));
            // line 103
            echo "                                            <div class=\"progress-bar bg-cyan-light\"
                                                    style=\"width: ";
            // line 104
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["percent"]) ? $context["percent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                        </div>
                                        <div class=\"small text-muted text-center\">";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "accepted"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "attempts"), "html", null, true);
            echo "</div>
                                    </td>
                                    <td class=\"text-nowrap\">
                                        ";
            // line 109
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "languages"), ","));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 110
                echo "                                            ";
                if (((isset($context["language"]) ? $context["language"] : null) == "JAV")) {
                    // line 111
                    echo "                                                ";
                    $context["color"] = "success";
                    // line 112
                    echo "                                            ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "CPP")) {
                    // line 113
                    echo "                                                ";
                    $context["color"] = "warning";
                    // line 114
                    echo "                                            ";
                } elseif (((isset($context["language"]) ? $context["language"] : null) == "C")) {
                    // line 115
                    echo "                                                ";
                    $context["color"] = "danger";
                    // line 116
                    echo "                                            ";
                }
                // line 117
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
            // line 119
            echo "                                    </td>
                                    <td class=\"text-nowrap\">";
            // line 120
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["attempt"]) ? $context["attempt"] : null), "last_date_attempt"), "d/m/Y H:i:s"), "html", null, true);
            echo "</td>
                                    <td class=\"text-nowrap text-center\"><span class=\"badge badge-";
            // line 121
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
        // line 124
        echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards\">
                <div class=\"col-lg-12\">
                    <div class=\"row\">
                        <div class=\"col-sm-4\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h3 class=\"card-title\">Lenguajes de programación</h3>
                                </div>
                                <div class=\"card-body\">
                                    <div id=\"chart-pie-languages\" class=\"c3 text-center\"></div>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-sm-4\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h3 class=\"card-title\">Errores presentados</h3>
                                </div>
                                <div class=\"card-body\">
                                    <div id=\"chart-pie-errors\" class=\"c3 text-center\"></div>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-sm-4\">
                            <div class=\"card\">
                                <div class=\"card-header\">
                                    <h3 class=\"card-title\">Aciertos por países</h3>
                                </div>
                                <div class=\"card-body\">
                                    <div id=\"chart-pie-countries\" class=\"c3 text-center\"></div>
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
        // line 182
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["submissionErrorsTable"]) ? $context["submissionErrorsTable"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["submissionError"]) {
            // line 183
            echo "                                    <tr>
                                        <td>";
            // line 184
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "status"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 185
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "name"), "html", null, true);
            echo "</td>
                                        <td class=\"text-left\">";
            // line 186
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "totals"), "html", null, true);
            echo "</td>
                                        <td>
                                            <div class=\"progress progress-sm\">
                                                ";
            // line 189
            $context["errorPercent"] = (($this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "totals") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100);
            // line 190
            echo "
                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 192
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["errorPercent"]) ? $context["errorPercent"] : null), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["errorPercent"]) ? $context["errorPercent"] : null), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 194
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["submissionError"]) ? $context["submissionError"] : null), "totals"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs"), "html", null, true);
            echo "</div>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['submissionError'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 198
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
        // line 209
        echo twig_jsonencode_filter((isset($context["programmingLanguages"]) ? $context["programmingLanguages"] : null));
        echo ",
                    submissionErrors = ";
        // line 210
        echo twig_jsonencode_filter((isset($context["submissionErrors"]) ? $context["submissionErrors"] : null));
        echo ",
                    acceptedCountries = ";
        // line 211
        echo twig_jsonencode_filter((isset($context["acceptedByCountry"]) ? $context["acceptedByCountry"] : null));
        echo ",
                    dataLanguages = [],
                    dataErrors = [],
                    dataCountries = [];

                programmingLanguages.map(function (language) {
                    dataLanguages.push([ language.language, language.totals]);
                });

                submissionErrors.map(function (userError) {
                    dataErrors.push([ userError.status, userError.totals]);
                });

                acceptedCountries.map(function (country) {
                    dataCountries.push([ country.country_id, country.accepted]);
                } );

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

                let chartCountries = c3.generate({
                    bindto: '#chart-pie-countries', // id of chart wrapper
                    data: {
                        columns: dataCountries,
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
    <script>
        require(['c3', 'jquery'], function(c3, \$) {
            \$(document).ready(function(){
                var data = ";
        // line 302
        echo twig_jsonencode_filter((isset($context["problemAttemptsEvolution"]) ? $context["problemAttemptsEvolution"] : null));
        echo ";
                data.unshift('data1');
                console.info('data', data);
                var chart = c3.generate({
                    bindto: '#chart-development-activity', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            data
                        ],
                        type: 'area', // default type of chart
                        groups: [
                            [ 'data1', 'data2', 'data3']
                        ],
                        colors: {
                            'data1': tabler.colors[\"blue\"]
                        },
                        names: {
                            // name of each serie
                            'data1': 'Evolución de los aciertos'
                        }
                    },
                    axis: {
                        y: {
                            padding: {
                                bottom: 0,
                            },
                            show: false,
                            tick: {
                                outer: true
                            }
                        },
                        x: {
                            type: 'category',
                            padding: {
                                left: 0,
                                right: 0
                            },
                            show: false,
                            categories: ['foo', 'bar']
                        },
                        rotate: true

                    },
                    legend: {
                        position: 'inset',
                        padding: 0,
                        inset: {
                            anchor: 'top-left',
                            x: 20,
                            y: 8,
                            step: 10
                        }
                    },
                    tooltip: {
                        format: {
                            title: function (x) {
                                return '';
                            }
                        }
                    },
                    padding: {
                        bottom: 0,
                        left: -1,
                        right: -1
                    },
                    point: {
                        show: false
                    }
                });
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "template-problem-details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  477 => 302,  383 => 211,  379 => 210,  375 => 209,  362 => 198,  350 => 194,  343 => 192,  339 => 190,  337 => 189,  331 => 186,  327 => 185,  323 => 184,  320 => 183,  316 => 182,  256 => 124,  245 => 121,  241 => 120,  238 => 119,  227 => 117,  224 => 116,  221 => 115,  218 => 114,  215 => 113,  212 => 112,  209 => 111,  206 => 110,  202 => 109,  194 => 106,  187 => 104,  184 => 103,  182 => 102,  170 => 99,  166 => 98,  158 => 95,  153 => 92,  150 => 91,  145 => 90,  143 => 89,  122 => 73,  107 => 61,  96 => 53,  86 => 45,  84 => 36,  73 => 28,  62 => 20,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
