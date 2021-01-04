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

/* C:\OpenServer\domains\OctoberTest/themes/news/pages/test.htm */
class __TwigTemplate_ad33f014a7a447058533033a4994b00b037a0ad8a23d964bf8d122f55f7c6c12 extends \Twig\Template
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
        $tags = array("content" => 7);
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['content'],
                [],
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
        
    </div>
</div>
<div class=\"col-sm-9 navbar-container\">
    ";
        // line 7
        $context['__cms_content_params'] = [];
        $context['__cms_content_params']['name'] =         twig_escape_filter($this->env, "Mark"        )        ;
        echo $this->env->getExtension('Cms\Twig\Extension')->contentFunction("testContent.htm"        , $context['__cms_content_params']        );
        unset($context['__cms_content_params']);
        // line 8
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\OctoberTest/themes/news/pages/test.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 8,  70 => 7,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"col-sm-3 navbar-container\" style=\"margin-left: 0px\">
    <div class=\"list-group\" style=\"cursor: pointer\">
        
    </div>
</div>
<div class=\"col-sm-9 navbar-container\">
    {% content 'testContent.htm' name='Mark' %}
</div>", "C:\\OpenServer\\domains\\OctoberTest/themes/news/pages/test.htm", "");
    }
}
