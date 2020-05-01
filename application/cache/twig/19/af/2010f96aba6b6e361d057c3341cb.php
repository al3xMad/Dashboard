<?php

/* template-all-problems-table.twig */
class __TwigTemplate_19af2010f96aba6b6e361d057c3341cb extends Twig_Template
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
                ";
        // line 16
        if ((!(isset($context["silentResume"]) ? $context["silentResume"] : null))) {
            // line 17
            echo "                    <div class=\"col-sm-6 col-lg-6\">
                        <div class=\"card p-3\">
                            <div class=\"d-flex align-items-center\">
                                <span class=\"stamp stamp-md bg-green mr-3\">
                                  <i class=\"fe fe-thumbs-up\"></i>
                                </span>
                                <div>
                                    <h4 class=\"m-0\"><a href=\"javascript:void(0)\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["problems"]) ? $context["problems"] : null), 0, array(), "array"), "totalAC"), "html", null, true);
            echo " <small>Aciertos</small></a></h4>
                                    <small class=\"text-muted\"><a title=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 26
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["problems"]) ? $context["problems"] : null), 0, array(), "array"), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["problems"]) ? $context["problems"] : null), 0, array(), "array"), "name"), "html", null, true);
            echo "</a></small>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class=\"col-sm-6 col-lg-6\">
                        <div class=\"card p-3\">
                            <div class=\"d-flex align-items-center\">
                        <span class=\"stamp stamp-md bg-red mr-3\">
                          <i class=\"fe fe-thumbs-down\"></i>
                        </span>
                                <div>
                                    <h4 class=\"m-0\"><a href=\"javascript:void(0)\">";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["worseProblem"]) ? $context["worseProblem"] : null), "totalAC"), "html", null, true);
            echo " <small>Aciertos</small></a></h4>
                                    <small class=\"text-muted\"><a title=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["worseProblem"]) ? $context["worseProblem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 42
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["worseProblem"]) ? $context["worseProblem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["worseProblem"]) ? $context["worseProblem"] : null), "name"), "html", null, true);
            echo "</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
        }
        // line 48
        echo "
                <div class=\"col-12\">
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
        // line 79
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["problems"]) ? $context["problems"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["problem"]) {
            // line 80
            echo "                                <tr>
                                    <td class=\"text-center\">
                                        <a title=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 83
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "</a>
                                    </td>
                                    <td>
                                        <div><a title=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                    href=\"";
            // line 87
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name")) ? ($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name")) : ("Problema desconocido")), "html", null, true);
            echo "</a></div>
                                        <div class=\"small text-muted\">
                                            Propuesto desde: ";
            // line 89
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "publicationDate"), "d/m/Y"), "html", null, true);
            echo "
                                        </div>
                                    </td>

                                    <td>
                                        <a title=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 95
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">
                                            <div class=\"progress progress-sm\">
                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 98
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs")) * 100), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs"), "html", null, true);
            echo "</div>
                                        </a>
                                    </td>

                                    <td>
                                        <a title=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "name"), "html", null, true);
            echo "\"
                                                href=\"";
            // line 106
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/id/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\">
                                            <div class=\"progress progress-sm\">
                                                <div class=\"progress-bar bg-cyan-light\"
                                                        style=\"width: ";
            // line 109
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers")) * 100), 0, ",", "."), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDACU") / $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers")) * 100), 2, ",", "."), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"small text-muted text-center\">";
            // line 111
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
        // line 116
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
        return "template-all-problems-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 116,  241 => 111,  234 => 109,  226 => 106,  222 => 105,  212 => 100,  205 => 98,  197 => 95,  193 => 94,  185 => 89,  176 => 87,  172 => 86,  162 => 83,  158 => 82,  154 => 80,  150 => 79,  117 => 48,  104 => 42,  100 => 41,  96 => 40,  75 => 26,  71 => 25,  67 => 24,  58 => 17,  56 => 16,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
