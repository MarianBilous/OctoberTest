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

/* C:\OpenServer\domains\October/themes/news/pages/concrete-category.htm */
class __TwigTemplate_623bebbb0fef56f67d21562c61cf746a42d7c58bc3ff0c705bd9093f55af0802 extends \Twig\Template
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
        $tags = array("for" => 5);
        $filters = array("escape" => 2);
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
        echo "<div class=\"container\">
<h2>";
        // line 2
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["category"] ?? null), "name", [], "any", false, false, true, 2), 2, $this->source), "html", null, true);
        echo "</h2>

<div class=\"row\">
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 6
            echo "    <div class='col-lg-4 col-md-6 mb-4 p-3'>
        <div class=\"card h-100\">
            <a href=\"/info-article/";
            // line 8
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["article"], "slug", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\" style=\"text-align: center\">
                <img class=\"img-fluid\" src=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, true, 9), "thumb", [0 => 200, 1 => ($context["auto"] ?? null)], "method", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "\" style=\"width: auto; height:140px;\">
            </a>
            <div class=\"card-body\" style=\"alignment: inherit\">
                <a href=\"/info-article/";
            // line 12
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["article"], "slug", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "\">
                    <p class=\"card-text\">";
            // line 13
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "</p>
                </a>
            </div>
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</div></div>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\October/themes/news/pages/concrete-category.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 19,  93 => 13,  89 => 12,  83 => 9,  79 => 8,  75 => 6,  71 => 5,  65 => 2,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container\">
<h2>{{ category.name }}</h2>

<div class=\"row\">
    {% for article in articles %}
    <div class='col-lg-4 col-md-6 mb-4 p-3'>
        <div class=\"card h-100\">
            <a href=\"/info-article/{{ article.slug }}\" style=\"text-align: center\">
                <img class=\"img-fluid\" src=\"{{ article.image.thumb(200,auto) }}\" style=\"width: auto; height:140px;\">
            </a>
            <div class=\"card-body\" style=\"alignment: inherit\">
                <a href=\"/info-article/{{ article.slug }}\">
                    <p class=\"card-text\">{{ article.name }}</p>
                </a>
            </div>
        </div>
    </div>
    {% endfor %}
</div></div>", "C:\\OpenServer\\domains\\October/themes/news/pages/concrete-category.htm", "");
    }
}
