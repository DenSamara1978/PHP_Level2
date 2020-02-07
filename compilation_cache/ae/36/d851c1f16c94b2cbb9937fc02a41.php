<?php

/* main.html */
class __TwigTemplate_ae36d851c1f16c94b2cbb9937fc02a41 extends Twig_Template
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
\t
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
            integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
            crossorigin=\"anonymous\"></script>

</head>
<body>
<main>
    <div class='goodsTable'>

    ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["goods"]) ? $context["goods"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["good"]) {
            // line 20
            echo "        <div class='goodsWrap'>

        ";
            // line 22
            if (($this->getAttribute((isset($context["good"]) ? $context["good"] : null), "discount") > 0)) {
                // line 23
                echo "            <div class=\"sticker\"><img class=\"stickerImg\" src=\"images/star.png\"><span class=\"stickerTextFit\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "discount"), "html", null, true);
                echo "%</span></div>
        ";
            }
            // line 25
            echo "
        ";
            // line 26
            if (($this->getAttribute((isset($context["good"]) ? $context["good"] : null), "stickerFit") == true)) {
                // line 27
                echo "            <div class=\"sticker\"><img class=\"stickerImg\" src=\"images/star.png\"><span class=\"stickerTextFit\">Fit!</span></div>
        ";
            }
            // line 29
            echo "
        ";
            // line 30
            if (($this->getAttribute((isset($context["good"]) ? $context["good"] : null), "stickerHit") == true)) {
                // line 31
                echo "            <div class=\"sticker\"><img class=\"stickerImg\" src=\"images/star.png\"><span class=\"stickerTextHit\">Hit!</span></div>
        ";
            }
            // line 33
            echo "
            <div class=\"wrapGoodImg\">
                <a href=\"index.php?c=page&act=good&id=";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
            echo "\"><img class='goodImg'src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "miniPhoto"), "html", null, true);
            echo "\"></a>
            </div>
            <div class=\"wrapGoodInfo\">
                <div class='goodsNameFull'>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "nameFull"), "html", null, true);
            echo "</div>
                <div class='goodsPrice'>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "price"), "html", null, true);
            echo "<b>&#8381;</b></div>
                <div class='goodsParam'><span><b>Состав: </b></span>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "param"), "html", null, true);
            echo "</div>
            </div>
            <div class=\"btnWrap\">
                <input type='button' class='addToBasket btn' value='Дoбавить в корзину' ";
            // line 43
            if (((isset($context["session"]) ? $context["session"] : null) == false)) {
                echo " style='display:none'";
            }
            echo " onclick=\"addToBasket ( ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
            echo " )\" data-id='";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
            echo "'>
                <input type='button' class='deleteFromBasket btn' value='Удалить из корзины' ";
            // line 44
            if (((isset($context["session"]) ? $context["session"] : null) == false)) {
                echo " style='display:none'";
            }
            echo " onclick=\"deleteFromBasket ( ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
            echo " )\" data-id='";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["good"]) ? $context["good"] : null), "id"), "html", null, true);
            echo "'>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['good'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 48
        echo "
    </div>

    ";
        // line 51
        $this->env->loadTemplate("footer.html")->display($context);
        // line 52
        echo "
    <script src='js/my.js' defer></script>
</main>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 52,  134 => 51,  129 => 48,  113 => 44,  103 => 43,  97 => 40,  93 => 39,  89 => 38,  81 => 35,  77 => 33,  73 => 31,  71 => 30,  68 => 29,  64 => 27,  62 => 26,  59 => 25,  53 => 23,  51 => 22,  47 => 20,  43 => 19,  28 => 7,  21 => 2,  19 => 1,);
    }
}
