<?php

/* template-problems.twig */
class __TwigTemplate_691b8651fc397dcf49b87fe4e76516f9 extends Twig_Template
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
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <main id=\"main\" role=\"main\" class=\"my-3 my-md-5\">
        <div class=\"container\">
            <div class=\"page-header\">
                <h1 class=\"page-title\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["pageTitle"]) ? $context["pageTitle"] : null), "html", null, true);
        echo "</h1>
            </div>

            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"text-wrap pt-lg-2 pb-lg-6 pl-lg-6 pr-lg-6\">
                        <h2 class=\"mt-0 mb-4\">";
        // line 17
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["categoryDetails"]) ? $context["categoryDetails"] : null), "name")) ? ($this->getAttribute((isset($context["categoryDetails"]) ? $context["categoryDetails"] : null), "name")) : ("Nombre de subcategoría desconocido")), "html", null, true);
        echo "</h2>
                        <p>";
        // line 18
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["categoryDetails"]) ? $context["categoryDetails"] : null), "description")) ? ($this->getAttribute((isset($context["categoryDetails"]) ? $context["categoryDetails"] : null), "description")) : ("No tenemos descripción para esta subcategoría")), "html", null, true);
        echo "</p>
                    </div>
                </div>
            </div>

            <div class=\"row row-cards row-deck\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"table-responsive\">
                            <table class=\"table table-hover table-outline table-vcenter text-nowrap card-table\">
                                <thead>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>AC / Envíos</th>
                                    <th>AC / Usuarios</th>
                                </thead>
                                <tbody>
                                ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["problems"]) ? $context["problems"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["problem"]) {
            // line 36
            echo "                                    <tr>
                                        <td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/getProblem/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\"
                                                    title=\"\">";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "</a></td>
                                        <td><a href=\"";
            // line 39
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "problem/getProblem/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "internalId"), "html", null, true);
            echo "\"
                                                    title=\"\">";
            // line 40
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "title")) ? ($this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "title")) : ("Nombre de problema desconocido")), "html", null, true);
            echo "</a></td>
                                        <td>
                                            <div class=\"progress progress-sm\">
                                                <div class=\"progress-bar bg-cyan-light\" style=\"width: ";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "AC1"), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "AC1"), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"text-center\">";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalSubs"), "html", null, true);
            echo "</div>
                                        </td>
                                        <td>
                                            <div class=\"progress progress-sm\">
                                                <div class=\"progress-bar bg-cyan-light\" style=\"width: ";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "AC2"), "html", null, true);
            echo "%\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "AC2"), "html", null, true);
            echo "%</div>
                                            </div>
                                            <div class=\"text-center\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalDistinctUsers"), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["problem"]) ? $context["problem"] : null), "totalAC"), "html", null, true);
            echo "</div>
                                        </td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['problem'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 55
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
        return "template-problems.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 55,  128 => 51,  121 => 49,  112 => 45,  105 => 43,  99 => 40,  93 => 39,  89 => 38,  83 => 37,  80 => 36,  76 => 35,  56 => 18,  52 => 17,  43 => 11,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
