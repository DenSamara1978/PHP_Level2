<?php

/* login.html */
class __TwigTemplate_3210b124ab947840f72b607387f0c4e0 extends Twig_Template
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
<html lang=\"ru\">
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
    <link rel=\"stylesheet\" href=\"styles.css\" type=\"text/css\" media=\"all\">
</head>
<body>
<div id=\"container\">
    <div class=\"leftblock\">
    </div>
    <div class=\"content\">

    ";
        // line 20
        if (((isset($context["posted"]) ? $context["posted"] : null) == true)) {
            // line 21
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "
    ";
        } else {
            // line 23
            echo "        <h1>Вход на сайт</h1><hr>
        ";
            // line 24
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "
        <form method=\"post\">
            <p>Логин: <input type=\"text\" name=\"login\" maxlength=\"30\" placeholder=\"Введите Логин\" autofocus required></p>
            <p>Пароль: <input type=\"password\" minlength=\"2\" name=\"pass\" placeholder=\"Введите Пароль\" required></p>
            <input type=\"submit\" name=\"enter\" value=\"Войти\">
        </form>
    ";
        }
        // line 31
        echo "
    </div>

    ";
        // line 34
        $this->env->loadTemplate("footer.html")->display($context);
        // line 35
        echo "
</div>
<script src='js/my.js' defer></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 35,  70 => 34,  65 => 31,  55 => 24,  52 => 23,  46 => 21,  44 => 20,  28 => 7,  21 => 2,  19 => 1,);
    }
}
