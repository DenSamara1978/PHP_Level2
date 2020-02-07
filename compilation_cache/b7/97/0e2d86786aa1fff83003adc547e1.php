<?php

/* contacts.html */
class __TwigTemplate_b7970e2d86786aa1fff83003adc547e1 extends Twig_Template
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
        <h1>Наш адрес:</h1>
        <p><b>Телефон:</b> 8 495 647-93-12</p>
        <p><b>Адрес:</b> г. Москва, 2-я улица Машиностроения, дом 11</p>
        <p><b>Email:</b> noutbuk@mail.ru</p>
        <p>Здесь будет описание того, как легко, быстро и непринужденно мы будем обслуживать клиентов на любом удалении от наших торговых точек.</p>
        <div class=\"map\">
            <script type=\"text/javascript\" charset=\"utf-8\" async
                    src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3c1948155bb548fe663673b36ab421c033da92c82f0cd30937890052e747cb8c&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=true\"></script>
        </div>
        <hr>
    </div>

    ";
        // line 32
        $this->env->loadTemplate("footer.html")->display($context);
        // line 33
        echo "
</div>
<script src='../js/my.js' defer></script>
</body>
</html";
    }

    public function getTemplateName()
    {
        return "contacts.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 33,  56 => 32,  28 => 7,  21 => 2,  19 => 1,);
    }
}
