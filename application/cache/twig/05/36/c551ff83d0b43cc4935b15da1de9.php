<?php

/* chart-simple.twig */
class __TwigTemplate_0536c551ff83d0b43cc4935b15da1de9 extends Twig_Template
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
        echo "    <!-- Head block -->
    <script>
        requirejs.config({
            baseUrl: '";
        // line 7
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo ".'
        });
    </script>
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "assets/plugins/charts-c3/plugin.css\" rel=\"stylesheet\" />
    <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "assets/plugins/charts-c3/plugin.js\"></script>
";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "
    <div class=\"col-lg-6 col-xl-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h3 class=\"card-title\">Lorem ipsum xxx</h3>
            </div>
            <div class=\"card-body\">
                <div id=\"chart-pie\" style=\"height: 16rem\"></div>
            </div>
        </div>
        <script>
            require(['c3', 'jquery'], function(c3, \$) {
                \$(document).ready(function(){
                    var chart = c3.generate({
                        bindto: '#chart-pie', // id of chart wrapper
                        data: {
                            columns: [
                                // each columns data
                                ['data1', 63],
                                ['data2', 44],
                                ['data3', 12],
                                ['data4', 14]
                            ],
                            type: 'pie', // default type of chart
                            colors: {
                                'data1': tabler.colors[\"blue-darker\"],
                                'data2': tabler.colors[\"blue\"],
                                'data3': tabler.colors[\"blue-light\"],
                                'data4': tabler.colors[\"blue-lighter\"]
                            },
                            names: {
                                // name of each serie
                                'data1': 'A',
                                'data2': 'B',
                                'data3': 'C',
                                'data4': 'D'
                            }
                        },
                        axis: {
                        },
                        legend: {
                            show: false, //hide legend
                        },
                        padding: {
                            bottom: 0,
                            top: 0
                        },
                    });
                });
            });
        </script>
    </div>
";
    }

    public function getTemplateName()
    {
        return "chart-simple.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 15,  51 => 14,  45 => 11,  41 => 10,  35 => 7,  30 => 4,  27 => 3,);
    }
}
