<?php

/* template-all-countries-table.twig */
class __TwigTemplate_6d2f46540d9e31312840322d4e6370d4 extends Twig_Template
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
                            <h4 class=\"card-title\">Listado de países participantes</h4>
                            <div class=\"card-options\">
                                <form action=\"\">
                                    <div class=\"input-group\">
                                        <input class=\"form-control form-control-sm\" placeholder=\"Buscar país...\"
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
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["countriesStats"]) ? $context["countriesStats"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 50
            echo "                                <tr>
                                    <td width=\"60\"><img alt=\"\" src=\"";
            // line 51
            echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
            echo "/images/flags/flags-svg/";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "id")), "html", null, true);
            echo ".svg\"</td>
                                    <td>asdasdas ";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "name"), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\">";
            // line 53
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["country"]) ? $context["country"] : null), "totalUsers"), 0, ",", "."), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\"><span class=\"text-muted\">";
            // line 54
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["country"]) ? $context["country"] : null), "totalUsers") / (isset($context["totalUsers"]) ? $context["totalUsers"] : null)) * 100), 2, ",", "."), "html", null, true);
            echo "%</span></td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 57
        echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        require(['jquery', 'vector-map', 'vector-map-world'], function(){
            \$(document).ready(function(){
                let dataRaw = ";
        // line 69
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
";
    }

    public function getTemplateName()
    {
        return "template-all-countries-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 69,  119 => 57,  110 => 54,  106 => 53,  102 => 52,  96 => 51,  93 => 50,  89 => 49,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
