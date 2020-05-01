<?php

/* template-select-role.twig */
class __TwigTemplate_b9a388d942ac7de415bc6957721fa9dc extends Twig_Template
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
\t\t<div class=\"container mt-9\">
            <div class=\"page-header justify-content-center\">
                <h1 class=\"page-title\">Selecciona tu rol de usuario</h1>
\t\t\t</div>

\t\t\t<div class=\"row justify-content-around mt-9\">
\t\t\t\t<div class=\"col-4\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t<h3 class=\"container-fluid card-title text-center\">PROFESOR</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<a title=\"Entrada profesores\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "teachers\" class=\"btn btn-primary btn-block text-white\">ENTRAR</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-4\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t<h3 class=\"container-fluid card-title text-center\">ADMINISTRADOR</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<a title=\"Entrada administradores\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "admindashboard\" class=\"btn btn-primary btn-block\">ENTRAR</a>
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
        return "template-select-role.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 31,  53 => 21,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
