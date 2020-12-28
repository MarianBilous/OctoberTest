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

/* C:\OpenServer\domains\OctoberTest/plugins/acme/blog/components/contactform/default.htm */
class __TwigTemplate_f9af676635bac799777af3da6ebedb1320405cd7c38175fe2330fcc330e63656 extends \Twig\Template
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
        $filters = array();
        $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
        echo "<style>
    span{
        color: red;
    }
</style>

<div class=\"row\">
    <div class=\"row\" style=\"margin-left: 50px\">
        <form data-request=\"onSend\"
              data-request-validate
              data-request-flash
              class=\"form-group\">

            <label>Name:</label>
            <input type=\"text\" class=\"form-control\" name=\"name\">
            <span data-validate-for=\"name\">Enter your name</span><br>

            <label>Email:</label>
            <input type=\"email\" class=\"form-control\" name=\"email\">
            <span data-validate-for=\"email\">Enter email</span><br>

            <label>Message:</label>
            <textarea type=\"text\" name=\"message\" class=\"form-control\" cols=\"65\" rows=\"7\"></textarea>

            <button type=\"submit\" class=\"btn btn-outline-dark mt-3\">Send</button>
        </form>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "C:\\OpenServer\\domains\\OctoberTest/plugins/acme/blog/components/contactform/default.htm";
    }

    public function getDebugInfo()
    {
        return array (  62 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<style>
    span{
        color: red;
    }
</style>

<div class=\"row\">
    <div class=\"row\" style=\"margin-left: 50px\">
        <form data-request=\"onSend\"
              data-request-validate
              data-request-flash
              class=\"form-group\">

            <label>Name:</label>
            <input type=\"text\" class=\"form-control\" name=\"name\">
            <span data-validate-for=\"name\">Enter your name</span><br>

            <label>Email:</label>
            <input type=\"email\" class=\"form-control\" name=\"email\">
            <span data-validate-for=\"email\">Enter email</span><br>

            <label>Message:</label>
            <textarea type=\"text\" name=\"message\" class=\"form-control\" cols=\"65\" rows=\"7\"></textarea>

            <button type=\"submit\" class=\"btn btn-outline-dark mt-3\">Send</button>
        </form>
    </div>
</div>", "C:\\OpenServer\\domains\\OctoberTest/plugins/acme/blog/components/contactform/default.htm", "");
    }
}
