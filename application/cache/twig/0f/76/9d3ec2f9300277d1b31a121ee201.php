<?php

/* template-main.twig */
class __TwigTemplate_0f769d3ec2f9300277d1b31a121ee201 extends Twig_Template
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
        echo "\t<!-- Head block -->
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "\t<main id=\"main\" role=\"main\" class=\"my-3 my-md-5\">
\t\t<div class=\"container\">
            <div class=\"page-header\">
                <h1 class=\"page-title\">Home</h1>
\t\t\t</div>

            <div class=\"card\">
                <div class=\"card-body\">
                    <div class=\"text-wrap pt-lg-2 pb-lg-6 pl-lg-6 pr-lg-6\">
                        <h2 class=\"mt-0 mb-4\">";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["pageTitle"]) ? $context["pageTitle"] : null), "html", null, true);
        echo "</h2>
                        <p>Los problemas están organizados por categorías para facilitar su búsqueda. Hay diferentes \"ejes\" de categorización, mostrados a continuación.</p>
                        <p>Se debe tener en cuenta que un mismo problema puede pertenecer a más de una categoría simultáneamente. Por tanto, la suma total del número de problemas de las categorías podría ser mayor que el número de problemas distintos disponibles.</p>
                    </div>
                </div>
            </div>

\t\t\t<div class=\"row row-cards row-deck\">
\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-hover table-outline table-vcenter text-nowrap card-table\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<th>Nombre</th>
\t\t\t\t\t\t\t\t\t<th>Descripción</th>
\t\t\t\t\t\t\t\t\t<th>Número de problemas</th>
\t\t\t\t\t\t\t\t\t<th>Total AC</th>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
                                ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 37
            echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "subcategory/getSubcategory/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
            echo "</a></td>
\t\t\t\t\t\t\t\t\t\t<td><a href=\"";
            // line 39
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "subcategory/getSubcategory/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "description"), "html", null, true);
            echo "</a></td>
\t\t\t\t\t\t\t\t\t\t<td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "numOfProblems"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t<td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "totalAC"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t</tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 44
        echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t</div>
\t</main>
";
    }

    public function getTemplateName()
    {
        return "template-main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 44,  102 => 41,  98 => 40,  88 => 39,  78 => 38,  75 => 37,  71 => 36,  49 => 17,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
