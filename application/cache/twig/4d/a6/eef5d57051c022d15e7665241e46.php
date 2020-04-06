<?php

/* template-teacher-selection.twig */
class __TwigTemplate_4da6eef5d57051c022d15e7665241e46 extends Twig_Template
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

            <div class=\"row row-cards\">
                <div class=\"col-12\">
                    <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, twg_func("base_url"), "html", null, true);
        echo "teachers\" method=\"POST\" class=\"card\">
                        <div class=\"card-header\">
                            <h3 class=\"card-title\">Selección de Grupo Educativo dentro de la UCM:</h3>
                        </div>
                        <div class=\"card-body institution-frame\" style=\"background-image: url(";
        // line 21
        echo twig_escape_filter($this->env, twg_func("assets_url"), "html", null, true);
        echo "/images/demo/institutions/UCM.png)\">
                            <div class=\"row\">
                                <div class=\"col-md-6 col-lg-4\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\"><span class=\"tag tag-teal\">1</span> Elija la asignatura:</label>
                                        <select name=\"subject\" id=\"select-subject\" class=\"form-control custom-select\">
                                            ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["subjects"]) ? $context["subjects"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["subject"]) {
            // line 28
            echo "                                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subject"]) ? $context["subject"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subject"]) ? $context["subject"] : null), "name"), "html", null, true);
            echo "</option>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subject'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 30
        echo "                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class=\"row mt-sm-9 mb-sm-7\">
                                <div class=\"col-md-6 col-lg-4\">
                                    <div class=\"form-group\">
                                        <label class=\"form-label\"><span class=\"tag tag-teal\">2</span> Elija el grupo:</label>
                                        <select name=\"group\" id=\"select-group\" class=\"form-control custom-select\">
                                            ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 40
            echo "                                                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "name"), "html", null, true);
            echo "</option>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 42
        echo "                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"card-footer text-right\">
                            <div class=\"d-flex\">
                                <button type=\"submit\" class=\"btn btn-primary ml-auto\">ACCEDER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
";
    }

    public function getTemplateName()
    {
        return "template-teacher-selection.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 42,  103 => 40,  99 => 39,  88 => 30,  77 => 28,  73 => 27,  64 => 21,  57 => 17,  49 => 12,  44 => 9,  41 => 8,  35 => 5,  30 => 4,  27 => 3,);
    }
}
