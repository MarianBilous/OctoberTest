<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* C:\OpenServer\domains\October/themes/news/pages/home.htm */
class __TwigTemplate_d0dcb3e97d98279d13a46baea8a56015fc2e7ccfdb8e118b0ff696cbd7f2a127 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = array("for" => 3);
        $filters = array("escape" => 5);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"col-sm-3 navbar-container\" style=\"margin-left: 0px\">
    <div class=\"list-group\" style=\"cursor: pointer\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Articles"] ?? null), "getCategory", [], "any", false, false, true, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 4
            echo "        <a class=\"list-group-item list-group-item-action\">
            ";
            // line 5
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "
        </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "    </div>
</div>

<div class=\"col-sm-9 content-container\">
    <div class=\"m-4\">
gsdgsdg
    </div>
</div>

<!--<div class=\"container\">-->
<!--    <div class=\"row\">-->

<!--    </div>-->
<!--</div>-->";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\October/themes/news/pages/home.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 8,  73 => 5,  70 => 4,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"col-sm-3 navbar-container\" style=\"margin-left: 0px\">
    <div class=\"list-group\" style=\"cursor: pointer\">
        {% for category in Articles.getCategory %}
        <a class=\"list-group-item list-group-item-action\">
            {{ category.name }}
        </a>
        {% endfor %}
    </div>
</div>

<div class=\"col-sm-9 content-container\">
    <div class=\"m-4\">
gsdgsdg
    </div>
</div>

<!--<div class=\"container\">-->
<!--    <div class=\"row\">-->

<!--    </div>-->
<!--</div>-->", "C:\\OpenServer\\domains\\October/themes/news/pages/home.htm", "");
    }
}
