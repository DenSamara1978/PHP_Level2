<?php

/* admin.html */
class __TwigTemplate_928a7713bf17dac6096bf4795c1e1f29 extends Twig_Template
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
<html lang=\"en\">
<head>
<meta charset='UTF-8'>
<title>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
<script src=\"https://code.jquery.com/jquery-3.3.1.min.js\"
            integrity=\"sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=\"
            crossorigin=\"anonymous\"></script>



</head>
<body>
<div class=\"operationWrap\">
        <button class=\"btn btn-primary\" onclick=\"addNewGood()\">Добавить товар</button>
\t\t\t
        <!-- Modal -->
<div class=\"modal fade\" id=\"scanDirLoadFiles\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Modal title</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\">
        Вы уверены?
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Отмена</button>
        <button type=\"button\" class=\"btn btn-primary\" onclick=\"scanDirLoadFiles()\"  >Загрузить файлы</button>
      </div>
    </div>
  </div>
</div>
 </div>  


 
 
 
<div class='mainTable'>
<script>
  \$(document).ready(function() {
    renderAdmin ();
  });
</script>
</div>

";
        // line 55
        $this->env->loadTemplate("footer.html")->display($context);
        // line 56
        echo "  
<script src='js/my.js'></script>

</body>
</html>



";
    }

    public function getTemplateName()
    {
        return "admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 56,  79 => 55,  29 => 8,  21 => 2,  19 => 1,);
    }
}
