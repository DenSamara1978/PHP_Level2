<?php

/* promo.html */
class __TwigTemplate_ae798bd20b2919e0b687e72a82ba48cc extends Twig_Template
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
    <title>Фотогаллерея</title>
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
            integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
            crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"styles.css\" type=\"text/css\" media=\"all\">
</head>
<body>
<main>
<div class=\"promoHeader\">Акции</div>
<div id=\"container\">
    <div class=\"content\">
        <div class=\"promoWrap\">
\t\t<i class=\"fas fa-truck fa-7x\"></i>
\t\t<div class=\"promoText\">
\t\t<span>Самовывоз</span><br>
\t\t<span>Скидка 10% если забираете заказ самостоятельно в филиале компании</span>
\t\t</div>
\t\t</div>
\t\t<div class=\"promoWrap\">
\t\t<i class=\"far fa-clock fa-9x\"></i>
\t\t<div class=\"promoText\">
\t\t<span>Акция \"Счастливый час!</span><br>
\t\t<span>Скидка 7% при заказе от 0ч 00м до 8ч 00м</span>
\t\t</div>
\t\t</div>
\t\t<div class=\"promoWrap\">
\t\t<i class=\"far fa-smile fa-9x\"></i>
\t\t<div class=\"promoText\">
\t\t<span>Скидка дня!</span><br>
\t\t<span>Скидки до 10% на отдельные роллы и суши. Следите за акциями компании. Новые скидки каждый день!</span>
\t\t</div>
\t\t</div>
        
    </div>

\t";
        // line 43
        $this->env->loadTemplate("footer.html")->display($context);
        // line 44
        echo "
</div>
</main>
<script src='js/my.js' defer></script>;
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "promo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 44,  64 => 43,  21 => 2,  19 => 1,);
    }
}
