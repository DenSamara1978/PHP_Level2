<?php

/* menu.html */
class __TwigTemplate_460d25465ba156f716af9ce14b7b23bf extends Twig_Template
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
        echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\"
      integrity=\"sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB\" crossorigin=\"anonymous\">
<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\"
        integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\"
        integrity=\"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"
        integrity=\"sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T\"
        crossorigin=\"anonymous\"></script>
<link rel=\"stylesheet\" href=\"packages/font-awesome-4.7.0/css/font-awesome.min.css\">
<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.13/css/all.css\"
      integrity=\"sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp\" crossorigin=\"anonymous\">
<link rel=\"stylesheet\" href=\"packages/bootstrap-4.0.0-beta.2/dist/css/bootstrap.min.css\">
<link href=\"https://fonts.googleapis.com/css?family=El+Messiri\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"style.css\">



<header class=\"header\">
    <nav class=\"navbar fixed-top navbar-expand-lg navbar-light bg-lightNone\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavDropdown\"
                aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
            <ul class=\"navbar-nav\">
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"index.php\">Главная <span class=\"sr-only\">(current)</span></a>
                </li>                
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?c=page&act=guestbook\">Отзывы</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?c=page&act=promo\">Акции</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"index.php?c=page&act=contacts\">Контакты</a>
                </li>

                ";
        // line 42
        if ((isset($context["session"]) ? $context["session"] : null)) {
            // line 43
            echo "
                <li class='nav-item'>
                    <a class='nav-link' href='index.php?c=user&act=info'>Кабинет</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='index.php?c=user&act=logout'>Выйти (";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["login"]) ? $context["login"] : null), "html", null, true);
            echo ")</a>
                </li>

                ";
        } else {
            // line 52
            echo "
                <li class='nav-item'>
                    <a class='nav-link' href='index.php?c=user&act=login'>Войти</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='index.php?c=user&act=registration'>Регистрация</a>
                </li>

                ";
        }
        // line 61
        echo "                
                ";
        // line 62
        if (((isset($context["admin"]) ? $context["admin"] : null) == true)) {
            // line 63
            echo "                
                <li class='nav-item'>
                    <a class='nav-link' href='  /admin/admin.php'>Админка</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='  /admin/manager.php'>Управление заказами</a>
                </li>

                ";
        }
        // line 72
        echo "
            </ul>
\t\t\t
        </div>
\t\t<!-- Button trigger modal -->
        <button class=\"btn btn-outline-success btn-primary basketInfoOut\" type=\"button\" onclick='renderBasketModal()' data-toggle=\"modal\" data-target=\"#bascketModal\">
        
            <strong>Корзина</strong><br><strong></strong>
        ";
        // line 80
        if ((isset($context["countGoodsOrder"]) ? $context["countGoodsOrder"] : null)) {
            // line 81
            echo "            ";
            echo twig_escape_filter($this->env, (isset($context["countGoodsOrder"]) ? $context["countGoodsOrder"] : null), "html", null, true);
            echo "
        ";
        } else {
            // line 83
            echo "            товаров нет(
        ";
        }
        // line 85
        echo "            </strong>

        </button>
    </nav>
\t<!-- Modal -->
        <div class=\"modal fade\" id=\"bascketModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"exampleModalLabel\">КОРЗИНА</h5>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Продолжить покупки</button>
                        <a href=\"  /public/order.php?id=<?= \$good['id'] ?>\"><button type=\"button\" class=\"btn btn-primary\">Оформить заказ</button></a>
                    </div>
                </div>
            </div>
        </div>
</header>


";
    }

    public function getTemplateName()
    {
        return "menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 85,  123 => 83,  117 => 81,  115 => 80,  105 => 72,  94 => 63,  92 => 62,  89 => 61,  78 => 52,  71 => 48,  64 => 43,  62 => 42,  19 => 1,);
    }
}
