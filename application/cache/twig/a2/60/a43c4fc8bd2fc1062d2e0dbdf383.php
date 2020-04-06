<?php

/* /layout/footer.twig */
class __TwigTemplate_a260a43c4fc8bd2fc1062d2e0dbdf383 extends Twig_Template
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
        echo "<footer class=\"footer\">
\t<div class=\"container\">
\t\t<div class=\"row align-items-center flex-row-reverse\">
\t\t\t<div class=\"col-auto ml-lg-auto\">
\t\t\t\t<div class=\"row align-items-center\">
\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t<ul class=\"list-inline list-inline-dots mb-0\">
\t\t\t\t\t\t\t<li class=\"list-inline-item\"><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "faq.html\">FAQ</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t<a href=\"http://informatica.ucm.es/\" class=\"btn btn-outline-primary btn-sm\">Universidad Complutense Madrid</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-12 col-lg-auto mt-3 mt-lg-0 text-center\">
\t\t\t\tAlexandra Pérez, TFG 2018.
\t\t\t</div>
\t\t</div>
\t</div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "/layout/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 8,  19 => 1,);
    }
}
