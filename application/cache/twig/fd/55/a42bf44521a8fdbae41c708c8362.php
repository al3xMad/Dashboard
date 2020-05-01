<?php

/* template-subcategories.twig */
class __TwigTemplate_fd55a42bf44521a8fdbae41c708c8362 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categoryDetails"]) ? $context["categoryDetails"] : null), "name"), "html", null, true);
        echo "</h2>
                        <p>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["categoryDetails"]) ? $context["categoryDetails"] : null), "description"), "html", null, true);
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
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Total AC</th>
                                </thead>
                                <tbody>
                                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["subcategories"]) ? $context["subcategories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 35
            echo "                                    <tr>
                                        <td><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "subcategory/getSubcategory/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true);
            echo "\"
                                                    title=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name")) ? ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name")) : ("Desconocido")), "html", null, true);
            echo "</a></td>
                                        <td><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
            echo "subcategory/getSubcategory/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "id"), "html", null, true);
            echo "\"
                                                    title=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "name"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "description")) ? ($this->getAttribute((isset($context["category"]) ? $context["category"] : null), "description")) : ("Desconocido")), "html", null, true);
            echo "</a></td>
                                        <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "totalAC"), "html", null, true);
            echo "</td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
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
        return "template-subcategories.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 43,  106 => 40,  100 => 39,  94 => 38,  88 => 37,  82 => 36,  79 => 35,  75 => 34,  56 => 18,  52 => 17,  43 => 11,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
