<?php

/* order.html */
class __TwigTemplate_6de655bafa9cb2933f53b69f438e488f extends Twig_Template
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
\t<script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
            integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
            crossorigin=\"anonymous\"></script>
</head>
<body>
<main>

<div class=\"orderBody\">
 <div class=\"order\">
        <div><h1>Ваш заказ</h1></div>
        <div class=\"orderTable\">
\t\t<script>
\t\t\t\$(document).ready ( function () 
\t\t\t{
\t\t\t\trenderBasket ();
\t\t\t} );
\t\t</script>
\t\t</div>
    </div>
    <div class=\"formClientInfo\">
\t<form class=\"formOrder\" id=\"formOrder\" action=\"/my_shop/public/orderEnd.php\"  method=\"POST\">
\t\t\t\t<label for=\"delivery\" class=\"\">Способ доставки</label>

\t\t\t\t<select class=\"form-control input-sm\" name=\"delivery\" id=\"delivery\" onchange=\"renderBasket()\">
\t\t\t\t\t<option value=\"0\">Доставка</option>
\t\t\t\t\t<option value=\"1\">Самовывоз</option>
\t\t\t\t</select>

\t\t\t\t<label for=\"inputName\" class=\"\">Имя</label>
                <input type=\"text\" name=\"name\" id=\"inputName\" placeholder=\"Введите имя\">
\t\t\t\t<label for=\"inputPhone\" class=\"\">Телефон</label>
                <div class=\"inputGroup\"><input type=\"text\" name=\"phone\" class=\"rowGoods nameFull\" placeholder=\"Введите номер телефона\"></div>
\t\t\t\t<label for=\"inputDiscountCard\" class=\"\">Дисконтная карта</label>
                <input type=\"text\" name=\"discountCard\" id=\"inputDiscountCard\" class=\"\" placeholder=\"Номер дисконтной карты\">
\t\t\t\t<label for=\"inputPersons\" class=\"\">Количество персон</label>
                <input type=\"text\" name=\"persons\" id=\"inputPersons\" placeholder=\"Введите Количество персон\">
\t\t\t\t<label for=\"inputtypepay\" class=\"\">Способ оплаты</label>
\t\t\t\t<select class=\"form-control input-sm\" name=\"pay\" id=\"inputtypepay\">
\t\t\t\t\t<option value=\"0\">Наличные</option>
\t\t\t\t\t<option value=\"1\">Кредитная карта</option>
\t\t\t\t</select>
\t\t\t\t<label for=\"inputTime\" class=\"\">Заказ на время</label>
                <input type=\"text\" name=\"desiredTime\" id=\"inputTime\" placeholder=\"Введите желаемое время исполнения заказа\">
\t\t\t\t<label for=\"inputMoney\" class=\"\">Сдача</label>
                <input type=\"text\" name=\"money\" id=\"inputMoney\" placeholder=\"С какой купюры приготовить сдачу\">
\t\t\t\t<label for=\"inputAddress\" class=\"\">Адрес</label>
                <textarea type=\"text\" name=\"address\" id=\"inputAddress\" placeholder=\"Адрес доставки\"></textarea>
\t\t\t\t<label for=\"inputComment\" class=\"\">Комментарий</label>
                <textarea type=\"text\" name=\"comment\" id=\"inputComment\" placeholder=\"Комментарий к заказу\"></textarea>
\t\t\t\t<input type=\"hidden\"  name=\"payAmount\" id=\"payAmount\" value=\"123456!\">
\t\t\t\t<input type=\"button\" class=\"btn btn-primary\" onclick=\"sendOrder()\" value=\"Заказать!\">
               </form>
\t</div>
\t</div>

\t";
        // line 64
        $this->env->loadTemplate("footer.html")->display($context);
        // line 65
        echo "
<script src='js/my.js'></script>
</main>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "order.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 65,  88 => 64,  28 => 7,  21 => 2,  19 => 1,);
    }
}
