<?php

/* /layout/breadcrumb.twig */
class __TwigTemplate_7d432ca615ba014f931dbb8bb86683ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"header collapse d-lg-flex p-0\" id=\"headerMenuCollapse\">
\t<div class=\"container\">
\t\t<div class=\"row align-items-center\">
\t\t\t<div class=\"col-lg order-lg-first\">
\t\t\t\t<nav aria-label=\"breadcrumb\">
\t\t\t\t\t<ol class=\"nav nav-tabs border-0 flex-column flex-lg-row breadcrumb bg-white\">
\t\t\t\t\t\t<li class=\"breadcrumb-item\"><a title=\"Home\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "\">Home</a></li>
                        ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["bread"]) {
            // line 9
            echo "\t\t\t\t\t\t\t<li class=\"breadcrumb-item\"><a title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bread"]) ? $context["bread"] : null), "title"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bread"]) ? $context["bread"] : null), "url"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bread"]) ? $context["bread"] : null), "title"), "html", null, true);
            echo "</a></li>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bread'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 11
        echo "\t\t\t\t\t\t<li class=\"breadcrumb-item active\" aria-current=\"page\">";
        echo twig_escape_filter($this->env, (isset($context["pageTitle"]) ? $context["pageTitle"] : null), "html", null, true);
        echo "</li>
\t\t\t\t\t</ol>
\t\t\t\t</nav>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/layout/breadcrumb.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 11,  35 => 9,  31 => 8,  27 => 7,  19 => 1,);
    }
}
