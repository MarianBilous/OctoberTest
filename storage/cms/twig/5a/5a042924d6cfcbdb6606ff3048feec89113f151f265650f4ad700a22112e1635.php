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

/* C:\OpenServer\domains\October/themes/news/pages/info-article.htm */
class __TwigTemplate_8cb18f5bf5381efeb39bcefa47996fe30f1938e5e53dffb3be7ce28ff8b3c9b9 extends \Twig\Template
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
        $tags = array("for" => 22);
        $filters = array("escape" => 3, "raw" => 8);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'raw'],
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
        echo "<div class=\"card mt-4\">
    <div style=\"text-align: center\">
        <img class=\"card-img-top img-fluid\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 3), "image", [], "any", false, false, true, 3), "thumb", [0 => 200, 1 => ($context["auto"] ?? null)], "method", false, false, true, 3), 3, $this->source), "html", null, true);
        echo "\" style=\"width: 440px; height: auto;\">
    </div>

    <div class=\"card-body\">
        <h3 class=\"card-title\">";
        // line 7
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 7), "name", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
        echo " </h3>
        ";
        // line 8
        echo $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 8), "content", [], "any", false, false, true, 8), 8, $this->source);
        echo "
        <div>
            Date created: ";
        // line 10
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 10), "created_at", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
        echo "
        </div>
        <div>
            Date updated: ";
        // line 13
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 13), "updated_at", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
        echo "
        </div>

        <h3>Category</h3>

        ";
        // line 18
        echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 18), "category", [], "any", false, false, true, 18), "name", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
        echo "

        <h3>Tags</h3>

        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["articleDetail"] ?? null), "getSlug", [], "any", false, false, true, 22), "tag", [], "any", false, false, true, 22));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 23
            echo "            ";
            echo twig_escape_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["tag"], "name", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\October/themes/news/pages/info-article.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 25,  107 => 23,  103 => 22,  96 => 18,  88 => 13,  82 => 10,  77 => 8,  73 => 7,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card mt-4\">
    <div style=\"text-align: center\">
        <img class=\"card-img-top img-fluid\" src=\"{{ articleDetail.getSlug.image.thumb(200,auto) }}\" style=\"width: 440px; height: auto;\">
    </div>

    <div class=\"card-body\">
        <h3 class=\"card-title\">{{ articleDetail.getSlug.name }} </h3>
        {{ articleDetail.getSlug.content|raw }}
        <div>
            Date created: {{ articleDetail.getSlug.created_at }}
        </div>
        <div>
            Date updated: {{ articleDetail.getSlug.updated_at }}
        </div>

        <h3>Category</h3>

        {{ articleDetail.getSlug.category.name }}

        <h3>Tags</h3>

        {% for tag in articleDetail.getSlug.tag %}
            {{ tag.name }}
        {% endfor %}
    </div>
</div>", "C:\\OpenServer\\domains\\October/themes/news/pages/info-article.htm", "");
    }
}
