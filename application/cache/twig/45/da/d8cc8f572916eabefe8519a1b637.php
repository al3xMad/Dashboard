<?php

/* template-admin-dashboard.twig */
class __TwigTemplate_45dad8cc8f572916eabefe8519a1b637 extends Twig_Template
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

            <div class=\"row row-cards\">
                <div class=\"col-sm-3\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Usuarios totales</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 20
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["totalUsers"]) ? $context["totalUsers"] : null), 0, ",", "."), "html", null, true);
        echo "</div>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-3\">
                    <div class=\"card\">
                        <div class=\"card-body text-center\">
                            <div class=\"h5\">Países participantes</div>
                            <div class=\"display-4 font-weight-bold mb-4\">";
        // line 28
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
        // line 36
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
        // line 44
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
                            <div class=\"card-options\">
                                <a href=\"";
        // line 89
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "countries\" class=\"btn btn-primary btn-sm\">Ver todos</a>
                            </div>
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
        // line 107
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["countriesStats"]) ? $context["countriesStats"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 108
            echo "                                <tr>
                                    <td width=\"60\"><img alt=\"\" src=\"";
            // line 109
            echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
            echo "/images/flags/flags-svg/";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "id")), "html", null, true);
            echo ".svg\"></td>
                                    <td>";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "name"), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\">";
            // line 111
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "totalUsers"), 0, ",", "."), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\"><span class=\"text-muted\">";
            // line 112
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["country"]) ? $context["country"] : null), "totalUsers") / (isset($context["totalUsers"]) ? $context["totalUsers"] : null)) * 100), 2, ",", "."), "html", null, true);
            echo "%</span></td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 115
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
        // line 127
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "problem\" class=\"btn btn-primary btn-sm\">Ver todos</a>
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
        // line 142
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["problems"]) ? $context["problems"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["problem"]) {
            // line 143
            echo "                                <tr>
                                    <td class=\"text-center\">
                                        <a title=\"";
            // line 145
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 146
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "</a>
                                    </td>
                                    <td>
                                        <div><a title=\"";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                    href=\"";
            // line 150
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name")) ? ($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name")) : ("Problema desconocido")), "html", null, true);
            echo "</a></div>
                                        <div class=\"small text-muted\">
                                            Propuesto desde: ";
            // line 152
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "publicationDate"), "d/m/Y"), "html", null, true);
            echo "
                                        </div>
                                    </td>

                                    <td>
                                        <a title=\"";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 158
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">
                                            <div class=\"progress progress-sm\">
                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 161
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 163
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs"), "html", null, true);
            echo "</div>
                                        </a>
                                    </td>

                                    <td>
                                        <a title=\"";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 169
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">
                                            <div class=\"progress progress-sm\">
                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 172
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers")) * 100), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers")) * 100), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 174
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
        // line 179
        echo "                                </tbody>
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
        // line 193
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
        // line 238
        echo twig_jsonencode_filter((isset($context["programmingLanguages"]) ? $context["programmingLanguages"] : null));
        echo ",
                    submissionErrors = ";
        // line 239
        echo twig_jsonencode_filter((isset($context["submissionErrors"]) ? $context["submissionErrors"] : null));
        echo ",
                    dataLanguages = [],
                    dataErrors = [],
                    dataAccepted = [
                        ['Aciertos', ";
        // line 243
        echo twig_escape_filter($this->env, (isset($context["totalAccepted"]) ? $context["totalAccepted"] : null), "html", null, true);
        echo "],
                        ['Errores', ";
        // line 244
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
        return "template-admin-dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  407 => 244,  403 => 243,  396 => 239,  392 => 238,  344 => 193,  328 => 179,  315 => 174,  308 => 172,  300 => 169,  296 => 168,  286 => 163,  279 => 161,  271 => 158,  267 => 157,  259 => 152,  250 => 150,  246 => 149,  236 => 146,  232 => 145,  228 => 143,  224 => 142,  206 => 127,  192 => 115,  183 => 112,  179 => 111,  175 => 110,  169 => 109,  166 => 108,  162 => 107,  141 => 89,  93 => 44,  82 => 36,  71 => 28,  60 => 20,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
