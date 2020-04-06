<?php

/* login.twig */
class __TwigTemplate_8132db1dc1c262ff0b6171f8de06c4c5 extends Twig_Template
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
        echo "<!-- Head block -->
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col col-login mx-auto\">
\t\t\t\t<div class=\"text-center mb-6\">
\t\t\t\t\t<img src=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["brandImage"]) ? $context["brandImage"] : null), "html", null, true);
        echo "\" class=\"h-6\" alt=\"\">
\t\t\t\t</div>
\t\t\t\t<form class=\"card\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "login\" method=\"post\">
\t\t\t\t\t<div class=\"card-body p-6\">
\t\t\t\t\t\t<div class=\"card-title\">Login to your account</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"form-label\" for=\"email\">Email address</label>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\"
\t\t\t\t\t\t\t\t\tid=\"email\" name=\"user_name\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"form-label\" for=\"password\">
\t\t\t\t\t\t\t\tPassword
\t\t\t\t\t\t\t\t<a href=\"\" class=\"float-right small\">I forgot password</a>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t<input type=\"password\" class=\"form-control\"
\t\t\t\t\t\t\t\t\tid=\"password\" name=\"user_pass\" placeholder=\"Password\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"custom-control custom-checkbox\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"custom-control-input\" />
\t\t\t\t\t\t\t\t<span class=\"custom-control-label\">Remember me</span>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-footer\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary btn-block\">Sign in</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t\t<div class=\"text-center text-muted\">
\t\t\t\t\tDon't have account yet? <a href=\"\">Sign up</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 14,  44 => 12,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
