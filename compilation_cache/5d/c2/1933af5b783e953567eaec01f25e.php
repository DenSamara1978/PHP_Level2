<?php

/* registration.html */
class __TwigTemplate_5dc21933af5b783e953567eaec01f25e extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 5
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
        ";
        // line 15
        $this->env->loadTemplate("menu.html")->display($context);
        // line 16
        echo "    </div>
    <div class=\"content\">
        <h1>Регистрация на сайте</h1>
        <hr>

        ";
        // line 21
        if (((isset($context["posted"]) ? $context["posted"] : null) == true)) {
            // line 22
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "
        ";
        } else {
            // line 24
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "
            <form method=\"post\">
                <p>Имя: <input type=\"text\" name=\"name\" maxlength=\"30\" placeholder=\"Введите Имя\" autofocus required></p>
                <p>Логин: <input type=\"text\" name=\"login\" maxlength=\"30\" placeholder=\"Введите Логин\" required></p>
                <p>Email: <input type=\"email\" name=\"email\" maxlength=\"30\" placeholder=\"Введите Email\" required></p>
                <p>Пароль: <input type=\"password\" minlength=\"2\" name=\"pass\" placeholder=\"Введите Пароль\" required></p>
                <input type=\"submit\" name=\"submit\" value=\"Зарегистрироваться\">
            </form>
        ";
        }
        // line 33
        echo "
    </div>

    ";
        // line 36
        $this->env->loadTemplate("footer.html")->display($context);
        // line 37
        echo "
</div>
<script src='js/my.js' defer></script>;
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "registration.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 37,  73 => 36,  68 => 33,  55 => 24,  49 => 22,  47 => 21,  40 => 16,  38 => 15,  25 => 5,  19 => 1,);
    }
}
