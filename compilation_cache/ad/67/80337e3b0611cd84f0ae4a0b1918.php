<?php

/* manager.html */
class __TwigTemplate_ad6780337e3b0611cd84f0ae4a0b1918 extends Twig_Template
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
  <button type=\"button\" onclick=\"renderManager()\" class=\"btn btn-primary\">Обновить стол заказов</button>
  <div class='mainTableManager'>
    <script>
\t\t\t\$(document).ready ( function () 
\t\t\t{
\t\t\t\trenderManager ();
\t\t\t} );
    </script>
  </div>

  <div class=\"modalWindows\">
    <!-- OrderModal -->
    <div class=\"modal fade \" id=\"orderModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLongTitle\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-lg\" role=\"document\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Детали заказа</h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
          </div>
          <div class=\"orderModalBody\">
            ...
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">OK</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  ";
        // line 51
        $this->env->loadTemplate("footer.html")->display($context);
        // line 52
        echo "  <script src='js/my.js'></script>

</body>
</html>



";
    }

    public function getTemplateName()
    {
        return "manager.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 52,  75 => 51,  29 => 8,  21 => 2,  19 => 1,);
    }
}
