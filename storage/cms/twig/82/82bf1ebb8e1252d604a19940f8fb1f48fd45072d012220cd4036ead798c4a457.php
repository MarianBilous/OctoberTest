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

/* C:\OpenServer\domains\October/themes/news/partials/site/header.htm */
class __TwigTemplate_05708050dfaee144c3a5b9c3deff7f65796f1abe772845314a99c27e5758417d extends \Twig\Template
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
        $tags = array();
        $filters = array("page" => 3);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['page'],
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
                <b>Home</b>
            </h4>
        </a>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <!-- Left Side Of Navbar -->
            <ul class=\"navbar-nav mr-auto\">
                <a class=\"navbar-brand\" href=\"";
        // line 12
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("categories");
        echo "\">
                    Category
                </a>
                <a class=\"navbar-brand\" href=\"";
        // line 15
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("tags");
        echo "\">
                    Tags
                </a>
                <a class=\"navbar-brand\" href=\"";
        // line 18
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("contact-form");
        echo "\">
                    Contact Us
                </a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class=\"navbar-nav ml-auto\">
            </ul>
        </div>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\October/themes/news/partials/site/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 18,  84 => 15,  78 => 12,  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-md navbar-dark bg-dark shadow-sm\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"{{ 'home'|page }}\">
            <h4>
                <b>Home</b>
            </h4>
        </a>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <!-- Left Side Of Navbar -->
            <ul class=\"navbar-nav mr-auto\">
                <a class=\"navbar-brand\" href=\"{{ 'categories'|page }}\">
                    Category
                </a>
                <a class=\"navbar-brand\" href=\"{{ 'tags'|page }}\">
                    Tags
                </a>
                <a class=\"navbar-brand\" href=\"{{ 'contact-form'|page }}\">
                    Contact Us
                </a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class=\"navbar-nav ml-auto\">
            </ul>
        </div>
    </div>
</nav>", "C:\\OpenServer\\domains\\October/themes/news/partials/site/header.htm", "");
    }
}
