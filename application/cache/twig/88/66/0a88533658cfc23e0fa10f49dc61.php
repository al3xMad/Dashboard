<?php

/* /layout/header.twig */
class __TwigTemplate_88660a88533658cfc23e0fa10f49dc61 extends Twig_Template
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
        echo "<div class=\"header py-4\">
\t<div class=\"container\">
\t\t<div class=\"d-flex\">
\t\t\t<a class=\"header-brand\" title=\"Inicio\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["projectTitle"]) ? $context["projectTitle"] : null), "html", null, true);
        echo "</a>

\t\t\t<div class=\"d-flex order-lg-2 ml-auto\">
\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t<a href=\"#\" class=\"nav-link pr-0 leading-none\" data-toggle=\"dropdown\">
\t\t\t\t\t\t<span class=\"avatar\" style=\"background-image: url(";
        // line 9
        echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
        echo "/images/demo/user.jpg)\"></span>
\t\t\t\t\t\t<span class=\"ml-2 d-none d-lg-block\">
\t\t\t\t\t\t\t<span class=\"text-default\">";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["user"]) ? $context["user"] : null), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t<small class=\"text-muted d-block mt-1\">Administrator</small>
\t\t\t\t\t\t</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right dropdown-menu-arrow\">
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"dropdown-icon fe fe-user\"></i> Profile
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"dropdown-icon fe fe-settings\"></i> Settings
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t\t<span class=\"float-right\"><span class=\"badge badge-primary\">6</span></span>
\t\t\t\t\t\t\t<i class=\"dropdown-icon fe fe-mail\"></i> Inbox
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"dropdown-icon fe fe-send\"></i> Message
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<div class=\"dropdown-divider\"></div>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"dropdown-icon fe fe-help-circle\"></i> Need help?
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "login/logout\">
\t\t\t\t\t\t\t<i class=\"dropdown-icon fe fe-log-out\"></i> Sign out
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<a href=\"#\" class=\"header-toggler d-lg-none ml-3 ml-lg-0\" data-toggle=\"collapse\" data-target=\"#headerMenuCollapse\">
\t\t\t\t<span class=\"header-toggler-icon\"></span>
\t\t\t</a>
\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/layout/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 33,  39 => 11,  34 => 9,  24 => 4,  19 => 1,  66 => 31,  53 => 21,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
