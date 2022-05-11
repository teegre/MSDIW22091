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

/* artists/index.html.twig */
class __TwigTemplate_fcd3edfb86e96e61bc7051715790bd34 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "artists/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "artists/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Velvet Records - Artists";
        
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
    <div class=\"row mb-2\">
      <h1 class=\"display-4\"><b>Artists</b> (";
        // line 8
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["artists"]) || array_key_exists("artists", $context) ? $context["artists"] : (function () { throw new RuntimeError('Variable "artists" does not exist.', 8, $this->source); })())), "html", null, true);
        echo ")</h1>
    </div>
    ";
        // line 10
        $context["c"] = 1;
        // line 11
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["artists"]) || array_key_exists("artists", $context) ? $context["artists"] : (function () { throw new RuntimeError('Variable "artists" does not exist.', 11, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["artist"]) {
            // line 12
            echo "      ";
            if (((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 12, $this->source); })()) == 1)) {
                // line 13
                echo "        <div class=\"row\">
      ";
            }
            // line 15
            echo "          <div class=\"col-lg-3\">
            <p>
              <h5>ID: ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artist"], "artistid", [], "any", false, false, false, 17), "html", null, true);
            echo "</h5>
              <b>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artist"], "artistname", [], "any", false, false, false, 18), "html", null, true);
            echo "</b><br>
              <a href=\"http://localhost:8000/artist/";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artist"], "artistid", [], "any", false, false, false, 19), "html", null, true);
            echo "\">
                <button class=\"btn btn-primary btn-sm mt-2\">
                  Details
                </button>
              </a>
            </p>
          </div>
      ";
            // line 26
            if (((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 26, $this->source); })()) == 4)) {
                // line 27
                echo "        </div>
        ";
                // line 28
                $context["c"] = 1;
                // line 29
                echo "      ";
            } else {
                // line 30
                echo "        ";
                $context["c"] = ((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 30, $this->source); })()) + 1);
                // line 31
                echo "      ";
            }
            // line 32
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['artist'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "artists/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 33,  134 => 32,  131 => 31,  128 => 30,  125 => 29,  123 => 28,  120 => 27,  118 => 26,  108 => 19,  104 => 18,  100 => 17,  96 => 15,  92 => 13,  89 => 12,  84 => 11,  82 => 10,  77 => 8,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Velvet Records - Artists{% endblock %}

{% block body %}
  <div class=\"container mt-4\">
    <div class=\"row mb-2\">
      <h1 class=\"display-4\"><b>Artists</b> ({{ artists|length }})</h1>
    </div>
    {% set c = 1 %}
    {% for artist in artists %}
      {% if (c == 1) %}
        <div class=\"row\">
      {% endif %}
          <div class=\"col-lg-3\">
            <p>
              <h5>ID: {{ artist.artistid }}</h5>
              <b>{{ artist.artistname }}</b><br>
              <a href=\"http://localhost:8000/artist/{{ artist.artistid }}\">
                <button class=\"btn btn-primary btn-sm mt-2\">
                  Details
                </button>
              </a>
            </p>
          </div>
      {% if (c == 4) %}
        </div>
        {% set c = 1 %}
      {% else %}
        {% set c = c + 1 %}
      {% endif %}
    {% endfor %}
  </div>
{% endblock %}
", "artists/index.html.twig", "/home/stephane/projets/MSDIW22091/9_symfony/records/templates/artists/index.html.twig");
    }
}
