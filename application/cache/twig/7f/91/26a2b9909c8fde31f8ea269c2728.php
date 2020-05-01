<?php

/* /template-base.twig */
class __TwigTemplate_7f9126a2b9909c8fde31f8ea269c2728 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
            'ol_scripts_bottom' => array($this, 'block_ol_scripts_bottom'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html class=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["html_classes"]) ? $context["html_classes"] : null), "html", null, true);
        echo "\">
<head>
\t<meta charset=\"UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
\t<meta http-equiv=\"Content-Language\" content=\"en\" />
\t<meta name=\"msapplication-TileColor\" content=\"#2d89ef\">
\t<meta name=\"theme-color\" content=\"#4188c9\">
\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black-translucent\"/>
\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
\t<meta name=\"mobile-web-app-capable\" content=\"yes\">
\t<meta name=\"HandheldFriendly\" content=\"True\">
\t<meta name=\"MobileOptimized\" content=\"320\">
\t<link rel=\"icon\" href=\"./favicon.ico\" type=\"image/x-icon\"/>
\t<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"./favicon.ico\" />

\t<title>TFG Dashboard</title>

\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext\">
\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">

\t<script src=\"";
        // line 23
        echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
        echo "/js/require.min.js\"></script>
\t<script>
\t\trequirejs.config({
\t\t\tbaseUrl: '.'
\t\t});
\t</script>

\t<link href=\"";
        // line 30
        echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
        echo "/css/dashboard.css\" rel=\"stylesheet\" />
\t<script src=\"";
        // line 31
        echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
        echo "/js/dashboard.js\"></script>

\t";
        // line 33
        $this->displayBlock('head', $context, $blocks);
        // line 34
        echo "</head>
<body class=\"preload ";
        // line 35
        if ((isset($context["body_tags"]) ? $context["body_tags"] : null)) {
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["body_tags"]) ? $context["body_tags"] : null), "html", null, true);
        }
        echo "\">

\t<div class=\"page\">
\t\t<div class=\"page-";
        // line 38
        if ((isset($context["page_simple"]) ? $context["page_simple"] : null)) {
            echo "simple";
        } else {
            echo "main";
        }
        echo "\">

\t\t\t<!-- Header -->
\t\t\t";
        // line 41
        if ((!(isset($context["no_header"]) ? $context["no_header"] : null))) {
            // line 42
            echo "\t\t\t\t";
            $template = $this->env->resolveTemplate(twig_join_filter(array(0 => (isset($context["theme_path"]) ? $context["theme_path"] : null), 1 => "/layout/header.twig")));
            $template->display($context);
            // line 43
            echo "\t\t\t";
        }
        // line 44
        echo "\t\t\t<!-- End Header -->

\t\t\t<!-- Main -->
\t\t\t";
        // line 47
        $this->displayBlock('content', $context, $blocks);
        // line 48
        echo "\t\t\t<!-- End Main -->
\t\t</div>

\t\t<!-- Footer -->
\t\t";
        // line 52
        if ((!(isset($context["no_footer"]) ? $context["no_footer"] : null))) {
            // line 53
            echo "\t\t\t";
            $template = $this->env->resolveTemplate(twig_join_filter(array(0 => (isset($context["theme_path"]) ? $context["theme_path"] : null), 1 => "/layout/footer.twig")));
            $template->display($context);
            // line 54
            echo "\t\t";
        }
        // line 55
        echo "\t\t<!-- End Footer -->
\t</div>

\t<!-- Scripts bottom -->
\t";
        // line 59
        $this->displayBlock('ol_scripts_bottom', $context, $blocks);
        // line 60
        echo "\t<!-- # Scripts bottom -->
</body>
</html>
";
    }

    // line 33
    public function block_head($context, array $blocks = array())
    {
    }

    // line 47
    public function block_content($context, array $blocks = array())
    {
    }

    // line 59
    public function block_ol_scripts_bottom($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/template-base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 59,  143 => 47,  138 => 33,  131 => 60,  129 => 59,  123 => 55,  120 => 54,  116 => 53,  114 => 52,  108 => 48,  106 => 47,  101 => 44,  98 => 43,  94 => 42,  92 => 41,  82 => 38,  73 => 35,  70 => 34,  68 => 33,  63 => 31,  59 => 30,  49 => 23,  25 => 2,  22 => 1,);
    }
}
