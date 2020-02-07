<?php

/* guestbook.html */
class __TwigTemplate_d2a9dab21204fa10b80b7e8f7ceadd13 extends Twig_Template
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
    <link rel=\"stylesheet\" href=\"styles.css\" type=\"text/css\" media=\"all\">
</head>
<body>

<div id=\"container\">
    
    <div class=\"leftblock\">
       
    </div>
    <div class=\"content\">
        <h1>Гостевая книга</h1>

        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 25
            echo "            <div style='border: 1px solid #ccc; margin: 10px; padding: 5px;;'>
                ФИО: ";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "fio"), "html", null, true);
            echo "<br>
                Email: ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "email"), "html", null, true);
            echo "<br>
                Текст: ";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "text"), "html", null, true);
            echo "<br>
                <i>Дата: ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "date"), "html", null, true);
            echo "</i></div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "        <hr>
        <form method=\"post\">
            <p><strong>Оставить отзыв о сайте:</strong></p>
            <p>Введите ФИО: <input type=\"text\" name=\"fio\" maxlength=\"30\" required></p>
            <p>Введите Email: <input type=\"email\" name=\"email\" maxlength=\"20\" required></p>
            <p>Введите Текст: <textarea name=\"text\" rows=\"10\" required></textarea></p>
            <p><input type=\"submit\" name=\"submit\"></p>
        </form>
    </div>

    ";
        // line 41
        $this->env->loadTemplate("footer.html")->display($context);
        // line 42
        echo "
</div>
<script src='js/my.js' defer></script>;
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "guestbook.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 42,  87 => 41,  75 => 31,  67 => 29,  63 => 28,  59 => 27,  55 => 26,  52 => 25,  48 => 24,  28 => 7,  21 => 2,  19 => 1,);
    }
}
