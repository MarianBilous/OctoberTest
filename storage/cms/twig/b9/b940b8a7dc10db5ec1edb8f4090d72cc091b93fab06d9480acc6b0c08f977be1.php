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

/* C:\OpenServer\domains\OctoberTest/themes/demo/partials/site/footer.htm */
class __TwigTemplate_f04a0ab6d4217ff077e85e608784569c964953a4857f2486805af93cc13112a9 extends \Twig\Template
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
        $filters = array("escape" => 4, "date" => 4);
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 'date'],
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
        echo "<div id=\"footer\">
    <div class=\"container\">
        <hr />
        <p class=\"muted credit\">&copy; 2013 - ";
        // line 4
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " Alexey Bobkov &amp; Samuel Georges.</p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\OctoberTest/themes/demo/partials/site/footer.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 4,  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"footer\">
    <div class=\"container\">
        <hr />
        <p class=\"muted credit\">&copy; 2013 - {{ \"now\"|date(\"Y\") }} Alexey Bobkov &amp; Samuel Georges.</p>
    </div>
</div>", "C:\\OpenServer\\domains\\OctoberTest/themes/demo/partials/site/footer.htm", "");
    }
}
