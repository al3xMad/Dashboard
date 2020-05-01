<?php

/* template-teacher-dashboard.twig */
class __TwigTemplate_2fce2a34b8387c150790df9ec95c8a21 extends Twig_Template
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

            <h2>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subjectDetails"]) ? $context["subjectDetails"] : null), "name"), "html", null, true);
        echo "</h2>
            <h3>";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupDetails"]) ? $context["groupDetails"] : null), "name"), "html", null, true);
        echo "</h3>

            <div class=\"row row-cards\">
                <div class=\"col-sm-3\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "users/group/";
        echo twig_escape_filter($this->env, (isset($context["groupId"]) ? $context["groupId"] : null), "html", null, true);
        echo "\">
                                <div class=\"h5\">Alumnos totales</div>
                                <div class=\"display-4 font-weight-bold mb-4\">";
        // line 24
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["totalUsers"]) ? $context["totalUsers"] : null), 0, ",", "."), "html", null, true);
        echo "</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-3\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Países participantes</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 33
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["totalCountries"]) ? $context["totalCountries"] : null), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-3\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Problemas totales</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 41
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["totalProblemsSum"]) ? $context["totalProblemsSum"] : null), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-3\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Total intentos</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 49
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["totalProblemsAttempts"]) ? $context["totalProblemsAttempts"] : null), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards\">
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
                            <h3 class=\"card-title\">Aciertos</h3>
                        </div>
                        <div class=\"card-body\">
                            <div id=\"chart-pie-accepted\" class=\"c3 text-center\"></div>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-4\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h3 class=\"card-title\">Fallidos</h3>
                        </div>
                        <div class=\"card-body\">
                            <div id=\"chart-pie-errors\" class=\"c3 text-center\"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards row-deck\">
                <div class=\"col-sm-12\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h4 class=\"card-title\">Top 10 países participantes</h4>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"map\">
                                <div class=\"map-content\" id=\"map-world-svg\"></div>
                            </div>
                        </div>
                        <table class=\"table card-table\">
                            <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class=\"text-right\">Usuarios registrados</th>
                                <th class=\"text-right\">Porcentaje</th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 109
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["countriesStats"]) ? $context["countriesStats"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 110
            echo "                                <tr>
                                    <td width=\"60\"><img alt=\"\" src=\"";
            // line 111
            echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
            echo "/images/flags/flags-svg/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "id"), "html", null, true);
            echo ".svg\"</td>
                                    <td>";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "name"), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\">";
            // line 113
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "totalUsers"), 0, ",", "."), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\"><span class=\"text-muted\">";
            // line 114
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["country"]) ? $context["country"] : null), "totalUsers") / (isset($context["totalUsers"]) ? $context["totalUsers"] : null)) * 100), 2, ",", "."), "html", null, true);
            echo "%</span></td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 117
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards row-deck\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h4 class=\"card-title\">Problemas con más aciertos</h4>
                            <div class=\"card-options\">
                                <a href=\"";
        // line 129
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "problem/group/";
        echo twig_escape_filter($this->env, (isset($context["groupId"]) ? $context["groupId"] : null), "html", null, true);
        echo "\" class=\"btn btn-primary btn-sm\">Ver todos</a>
                            </div>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover table-outline table-vcenter text-nowrap card-table\">
                                    <thead>
                                    <tr>
                                        <th class=\"text-center\">ID</th>
                                        <th>Nombre del problema</th>
                                        <th class=\"text-center\">AC / Envíos</th>
                                        <th class=\"text-center\">AC / Usuarios</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";
        // line 144
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["problems"]) ? $context["problems"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["problem"]) {
            // line 145
            echo "                                        <tr>
                                            <td class=\"text-center\">
                                                <a title=\"";
            // line 147
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                        href=\"";
            // line 148
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "</a>
                                            </td>
                                            <td>
                                                <div><a title=\"";
            // line 151
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                            href=\"";
            // line 152
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name")) ? ($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name")) : ("Problema desconocido")), "html", null, true);
            echo "</a></div>
                                                <div class=\"small text-muted\">
                                                    Propuesto desde: ";
            // line 154
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "publicationDate"), "d/m/Y"), "html", null, true);
            echo "
                                                </div>
                                            </td>

                                            <td>
                                                <a title=\"";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                        href=\"";
            // line 160
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">
                                                    <div class=\"progress progress-sm\">
                                                        <div class=\"progress-bar bg-cyan-light\"
                                                                style=\"width: ";
            // line 163
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100), 2, ",", "."), "html", null, true);
            echo "%</div>
                                                    </div>
                                                    <div class=\"small text-muted text-center\">";
            // line 165
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs"), "html", null, true);
            echo "</div>
                                                </a>
                                            </td>

                                            <td>
                                                <a title=\"";
            // line 170
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                        href=\"";
            // line 171
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">
                                                    <div class=\"progress progress-sm\">
                                                        <div class=\"progress-bar bg-cyan-light\"
                                                                style=\"width: ";
            // line 174
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers")) * 100), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers")) * 100), 2, ",", "."), "html", null, true);
            echo "%</div>
                                                    </div>
                                                    <div class=\"small text-muted text-center\">";
            // line 176
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers"), "html", null, true);
            echo "</div>
                                                </a>
                                            </td>
                                        </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['problem'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 181
        echo "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        require(['jquery', 'vector-map', 'vector-map-world'], function(){
            \$(document).ready(function(){
                let dataRaw = ";
        // line 194
        echo twig_jsonencode_filter((isset($context["countriesStats"]) ? $context["countriesStats"] : null));
        echo ",
                    data = {};

                dataRaw.map(function (item) {
                    data[item.id] = item.totalUsers;
                });


                \$('#map-world-svg').vectorMap({
                    map: 'world_mill',
                    zoomButtons : false,
                    zoomOnScroll: false,
                    panOnDrag: false,
                    backgroundColor: 'transparent',
                    markers: false,
                    markerStyle: {
                        initial: {
                            fill: tabler.colors.blue,
                            stroke: '#fff',
                            \"stroke-width\": 1,
                            r: 5
                        },
                    },
                    onRegionTipShow: function(e, el, code, f){
                        el.html(el.html() + (data[code] ? ': <small>' + data[code]+'</small>' : ''));
                    },
                    series: {
                        regions: [{
                            values: data,
                            scale: ['#EFF3F6', tabler.colors.blue],
                            normalizeFunction: 'polynomial'
                        }]
                    },
                    regionStyle: {
                        initial: {
                            fill: '#F4F4F4'
                        }
                    }
                });
            });
        });
    </script>
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
                    dataErrors = [],
                    dataAccepted = [
                        ['Aciertos', ";
        // line 244
        echo twig_escape_filter($this->env, (isset($context["totalAccepted"]) ? $context["totalAccepted"] : null), "html", null, true);
        echo "],
                        ['Errores', ";
        // line 245
        echo twig_escape_filter($this->env, ((isset($context["totalProblemsAttempts"]) ? $context["totalProblemsAttempts"] : null) - (isset($context["totalAccepted"]) ? $context["totalAccepted"] : null)), "html", null, true);
        echo "]
                    ];

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

                let chartAccepted = c3.generate({
                    bindto: '#chart-pie-accepted', // id of chart wrapper
                    data: {
                        columns: dataAccepted,
                        type: 'donut', // default type of chart
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
        return "template-teacher-dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  418 => 245,  414 => 244,  407 => 240,  403 => 239,  355 => 194,  340 => 181,  327 => 176,  320 => 174,  312 => 171,  308 => 170,  298 => 165,  291 => 163,  283 => 160,  279 => 159,  271 => 154,  262 => 152,  258 => 151,  248 => 148,  244 => 147,  240 => 145,  236 => 144,  216 => 129,  202 => 117,  193 => 114,  189 => 113,  185 => 112,  179 => 111,  176 => 110,  172 => 109,  109 => 49,  98 => 41,  87 => 33,  75 => 24,  68 => 22,  59 => 16,  55 => 15,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
