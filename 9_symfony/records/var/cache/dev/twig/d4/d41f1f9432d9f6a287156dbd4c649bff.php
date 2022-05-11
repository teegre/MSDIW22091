<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* artist/index.html.twig */
class __TwigTemplate_bc15cb3bb0f17e09b2a07319c5187e56 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "artist/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "artist/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["artist"]) || array_key_exists("artist", $context) ? $context["artist"] : (function () { throw new RuntimeError('Variable "artist" does not exist.', 3, $this->source); })()), "artistname", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "  <div class=\"container mt-4\">
    <div class=\"row\">
      <h1 class=\"display-4\"><b>";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["artist"]) || array_key_exists("artist", $context) ? $context["artist"] : (function () { throw new RuntimeError('Variable "artist" does not exist.', 8, $this->source); })()), "artistname", [], "any", false, false, false, 8), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["artist"]) || array_key_exists("artist", $context) ? $context["artist"] : (function () { throw new RuntimeError('Variable "artist" does not exist.', 8, $this->source); })()), "records", [], "any", false, false, false, 8)), "html", null, true);
        echo ")</b></h1>
    </div>
    <div class=\"row\">
      <div class=\"col-md-4 d-flex flex-row align-self-center m-1 p-1\">
        <img class=\"img-fluid img-thumbnail\"
             src=\"/img/";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["artist"]) || array_key_exists("artist", $context) ? $context["artist"] : (function () { throw new RuntimeError('Variable "artist" does not exist.', 13, $this->source); })()), "artistimg", [], "any", false, false, false, 13), "html", null, true);
        echo "\"
             width=\"400\"
        >
      </div>
      ";
        // line 17
        $context["c"] = 1;
        // line 18
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["artist"]) || array_key_exists("artist", $context) ? $context["artist"] : (function () { throw new RuntimeError('Variable "artist" does not exist.', 18, $this->source); })()), "records", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
            // line 19
            echo "        ";
            if (((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 19, $this->source); })()) == 1)) {
                // line 20
                echo "        <div class=\"col-md-2 d-flex flex-column m-1 p-0\">
        ";
            }
            // line 22
            echo "          <a href=\"http://localhost:8000/record/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["record"], "recordid", [], "any", false, false, false, 22), "html", null, true);
            echo "\">
            <img class=\"img-fluid p-1 m-0\"
                 src=\"/img/";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["record"], "recordpicture", [], "any", false, false, false, 24), "html", null, true);
            echo "\"
                 width=\"200\"
                 title=\"";
            // line 26
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["record"], "recordtitle", [], "any", false, false, false, 26) . " (") . twig_get_attribute($this->env, $this->source, $context["record"], "recordyear", [], "any", false, false, false, 26)) . ")"), "html", null, true);
            echo "\"
            >
          </a>
        ";
            // line 29
            if (((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 29, $this->source); })()) == 2)) {
                // line 30
                echo "        </div>
          ";
                // line 31
                $context["c"] = 1;
                // line 32
                echo "        ";
            } else {
                // line 33
                echo "          ";
                $context["c"] = ((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 33, $this->source); })()) + 1);
                // line 34
                echo "        ";
            }
            // line 35
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </div>
    <div class=\"row mt-2\">
      <div class=\"col\">
        <button class=\"btn btn-primary btn-sm\" onclick=\"history.back()\" >Back</button>
        </div>
    </div>
  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "artist/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 36,  141 => 35,  138 => 34,  135 => 33,  132 => 32,  130 => 31,  127 => 30,  125 => 29,  119 => 26,  114 => 24,  108 => 22,  104 => 20,  101 => 19,  96 => 18,  94 => 17,  87 => 13,  77 => 8,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ artist.artistname }}{% endblock %}

{% block body %}
  <div class=\"container mt-4\">
    <div class=\"row\">
      <h1 class=\"display-4\"><b>{{ artist.artistname }} ({{ artist.records|length }})</b></h1>
    </div>
    <div class=\"row\">
      <div class=\"col-md-4 d-flex flex-row align-self-center m-1 p-1\">
        <img class=\"img-fluid img-thumbnail\"
             src=\"/img/{{ artist.artistimg }}\"
             width=\"400\"
        >
      </div>
      {% set c = 1 %}
      {% for record in artist.records %}
        {% if (c == 1) %}
        <div class=\"col-md-2 d-flex flex-column m-1 p-0\">
        {% endif %}
          <a href=\"http://localhost:8000/record/{{ record.recordid }}\">
            <img class=\"img-fluid p-1 m-0\"
                 src=\"/img/{{ record.recordpicture }}\"
                 width=\"200\"
                 title=\"{{ \"#{ record.recordtitle } (#{ record.recordyear })\" }}\"
            >
          </a>
        {% if (c == 2) %}
        </div>
          {% set c = 1 %}
        {% else %}
          {% set c = c + 1 %}
        {% endif %}
      {% endfor %}
    </div>
    <div class=\"row mt-2\">
      <div class=\"col\">
        <button class=\"btn btn-primary btn-sm\" onclick=\"history.back()\" >Back</button>
        </div>
    </div>
  </div>
{% endblock %}
", "artist/index.html.twig", "/home/stephane/projets/MSDIW22091/9_symfony/records/templates/artist/index.html.twig");
    }
}
