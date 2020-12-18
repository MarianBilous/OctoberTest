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
            Home
        </a>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <!-- Left Side Of Navbar -->
            <ul class=\"navbar-nav mr-auto\">
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
        return array (  66 => 3,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-md navbar-dark bg-dark shadow-sm\">
    <div class=\"container\">
        <a class=\"navbar-brand\" href=\"{{ 'home'|page }}\">
            Home
        </a>

        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <!-- Left Side Of Navbar -->
            <ul class=\"navbar-nav mr-auto\">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class=\"navbar-nav ml-auto\">

            </ul>
        </div>
    </div>
</nav>", "C:\\OpenServer\\domains\\October/themes/news/partials/site/header.htm", "");
    }
}
