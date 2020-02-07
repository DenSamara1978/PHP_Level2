<?php

/* good.html */
class __TwigTemplate_a9ed4f29b378fa51eaa0b403ffee4306 extends Twig_Template
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
    <meta charset=\"UTF-8\">
    <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
            integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
            crossorigin=\"anonymous\"></script>
\t\t\t<link rel=\"stylesheet\" href=\"styles.css\" type=\"text/css\" media=\"all\">
</head>
<body>
\t<div class='goodsWrapItem'>
\t\t<div class=\"wrapGoodImgItem\">
            <img class='goodImg'src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "bigPhoto"), "html", null, true);
        echo "\">
        </div>
\t\t<div class=\"wrapGoodInfo\">
\t\t\t<div class='goodsNameFull'>";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "nameFull"), "html", null, true);
        echo "</div>
            <div class='goodsPriceItem'>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "price"), "html", null, true);
        echo "<b>&#8381;</b></div>
            <div class='goodsParam'><span><b>Состав: </b></span>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "param"), "html", null, true);
        echo "</div>
        \t<div class='goodsWeightItem'><span><b>Вес: </b></span>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "weight"), "html", null, true);
        echo " гр./порцию</div>

\t\t\t";
        // line 25
        if (($this->getAttribute((isset($context["good"]) ? $context["good"] : null), "discount") > 0)) {
            // line 26
            echo "\t\t\t\t<div class=\"stickerItem\"><img class=\"stickerImgItem\" src=\"/images/star.png\"><span class=\"stickerTextItem\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "discount"), "html", null, true);
            echo "%</span>
\t\t\t\t\t<div class=\"explain\">блюдо со скидкой дня ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "discount"), "html", null, true);
            echo "%</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 30
        echo "
\t\t\t";
        // line 31
        if (($this->getAttribute((isset($context["good"]) ? $context["good"] : null), "stickerFit") == true)) {
            // line 32
            echo "\t\t\t\t<div class=\"stickerItem\"><img class=\"stickerImgItem\" src=\"/images/star.png\"><span class=\"stickerTextItem\">Fit!</span> 
\t\t\t\t\t<div class=\"explain\">блюдо с низкой калорийностью</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 36
        echo "
\t\t\t";
        // line 37
        if (($this->getAttribute((isset($context["good"]) ? $context["good"] : null), "stickerHit") == true)) {
            // line 38
            echo "\t\t\t\t<div class=\"stickerItem\"><img class=\"stickerImgItem\" src=\"/images/star.png\"><span class=\"stickerTextItem\">Hit!</span>
\t\t\t\t\t<div class=\"explain\">популярное блюдо</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 42
        echo "
\t\t</div>
\t\t<div class=\"btnWrapItem\">
            <input type='button' class='addToBasket btn' value='Дoбавить в корзину' ";
        // line 45
        if (((isset($context["session"]) ? $context["session"] : null) == false)) {
            echo " style='display:none'";
        }
        echo " onclick=\"addToBasket( ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
        echo " )\" data-id='";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
        echo "'>
            <input type='button' class='deleteFromBasket btn' value='Удалить из корзины' ";
        // line 46
        if (((isset($context["session"]) ? $context["session"] : null) == false)) {
            echo " style='display:none'";
        }
        echo " onclick=\"deleteFromBasket( ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
        echo " )\" data-id='";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
        echo "'>
\t\t</div>
    </div>

\t";
        // line 50
        $this->env->loadTemplate("footer.html")->display($context);
        // line 51
        echo "
<script src='js/my.js'></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "good.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 51,  127 => 50,  114 => 46,  104 => 45,  99 => 42,  93 => 38,  91 => 37,  88 => 36,  82 => 32,  80 => 31,  77 => 30,  71 => 27,  66 => 26,  64 => 25,  59 => 23,  55 => 22,  51 => 21,  47 => 20,  41 => 17,  28 => 7,  21 => 2,  19 => 1,);
    }
}
