<?php

/* orderEnd.html */
class __TwigTemplate_5d1df54bb692841231f26636244018e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->env->loadTemplate("menu.html")->display($context);
        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
            integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
            crossorigin=\"anonymous\"></script>
</head>
<body>
<main>

        <div><h1>Спасибо за Ваш заказ!</h1></div>
        <div class=\"orderTableEnd\">
        <script>
            \$(document).ready(function() {
                renderOrderEnd();
            });
        </script>
        </div>
            
    ";
        // line 25
        $this->env->loadTemplate("footer.html")->display($context);
        // line 26
        echo "
<script src='js/my.js'></script>
</main>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "orderEnd.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 26,  49 => 25,  28 => 7,  21 => 2,  19 => 1,);
    }
}
