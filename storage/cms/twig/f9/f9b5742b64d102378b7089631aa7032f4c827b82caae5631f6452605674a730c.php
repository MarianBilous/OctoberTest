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

/* C:\OpenServer\domains\OctoberTest/themes/news/partials/site/header.htm */
class __TwigTemplate_63e5718a7e5bb3ae25ef6fa3a849141b0f5c66db4a1751102cacc207e246c233 extends \Twig\Template
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
        $tags = array("component" => 27);
        $filters = array("page" => 3, "_" => 5);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['component'],
                ['page', '_'],
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
        echo "<nav class=\"navbar navbar-expand-md navbar-dark bg-dark shadow-sm\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"";
        // line 3
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("home");
        echo "\">
            <h4>
                <b>";
        // line 5
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Home"]);
        echo "</b>
            </h4>
        </a>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <!-- Left Side Of Navbar -->
            <ul class=\"navbar-nav mr-auto\">
                <a class=\"navbar-brand\" href=\"";
        // line 12
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("categories");
        echo "\">
                    ";
        // line 13
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Category"]);
        echo "
                </a>
                <a class=\"navbar-brand\" href=\"";
        // line 15
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("tags");
        echo "\">
                    ";
        // line 16
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Tags"]);
        echo "
                </a>
                <a class=\"navbar-brand\" href=\"";
        // line 18
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("contact");
        echo "\">
                    ";
        // line 19
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Contact Us"]);
        echo "
                </a>                
                <a class=\"navbar-brand\" href=\"";
        // line 21
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("test");
        echo "\">
                    ";
        // line 22
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Test Partial"]);
        echo "
                </a>
            </ul>

            <form class=\"navbar-form navbar-right\">
                ";
        // line 27
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("localePicker"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 28
        echo "            </form>
        </div>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\OctoberTest/themes/news/partials/site/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 28,  120 => 27,  112 => 22,  108 => 21,  103 => 19,  99 => 18,  94 => 16,  90 => 15,  85 => 13,  81 => 12,  71 => 5,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-md navbar-dark bg-dark shadow-sm\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"{{ 'home'|page }}\">
            <h4>
                <b>{{ 'Home'|_ }}</b>
            </h4>
        </a>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <!-- Left Side Of Navbar -->
            <ul class=\"navbar-nav mr-auto\">
                <a class=\"navbar-brand\" href=\"{{ 'categories'|page }}\">
                    {{ 'Category'|_ }}
                </a>
                <a class=\"navbar-brand\" href=\"{{ 'tags'|page }}\">
                    {{ 'Tags'|_ }}
                </a>
                <a class=\"navbar-brand\" href=\"{{ 'contact'|page }}\">
                    {{ 'Contact Us'|_ }}
                </a>                
                <a class=\"navbar-brand\" href=\"{{ 'test'|page }}\">
                    {{ 'Test Partial'|_ }}
                </a>
            </ul>

            <form class=\"navbar-form navbar-right\">
                {% component 'localePicker' %}
            </form>
        </div>
    </div>
</nav>", "C:\\OpenServer\\domains\\OctoberTest/themes/news/partials/site/header.htm", "");
    }
}
