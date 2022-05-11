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

/* record/index.html.twig */
class __TwigTemplate_7cff4009270c1454d51b76b2613cd52e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "record/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "record/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 3, $this->source); })()), "artistid", [], "any", false, false, false, 3), "artistname", [], "any", false, false, false, 3) . ": ") . twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 3, $this->source); })()), "recordtitle", [], "any", false, false, false, 3)), "html", null, true);
        
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
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 8, $this->source); })()), "artistid", [], "any", false, false, false, 8), "artistname", [], "any", false, false, false, 8) . ": ") . twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 8, $this->source); })()), "recordtitle", [], "any", false, false, false, 8)), "html", null, true);
        echo "</b></h1>
    </div>
    <div class=\"row\">
      <div class=\"col-md-4 d-flex flex-row align-self-start mb-1 mr-2 p-0\">
        <div class=\"mb-auto\">
          <img class=\"img-fluid img-thumbnail p-1\"
               src=\"/img/";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 14, $this->source); })()), "recordpicture", [], "any", false, false, false, 14), "html", null, true);
        echo "\"
          >
        </div>
      </div>
      <div class=\"col-md-5 d-flex flex-column ml-3 mr-1 p-1\">
        <div class=\"small\">
          <b>Year:</b> ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 20, $this->source); })()), "recordyear", [], "any", false, false, false, 20), "html", null, true);
        echo "<br>
          <b>Label:</b> ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 21, $this->source); })()), "recordlabel", [], "any", false, false, false, 21), "html", null, true);
        echo "<br>
          <b>Genre: </b>";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 22, $this->source); })()), "recordgenre", [], "any", false, false, false, 22), "html", null, true);
        echo "<br><br>
          <b>Track list:</b>
          <table class=\"table table-hover table-sm\">
            <tbody>
            ";
        // line 26
        $context["songs"] = [];
        // line 27
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["record"]) || array_key_exists("record", $context) ? $context["record"] : (function () { throw new RuntimeError('Variable "record" does not exist.', 27, $this->source); })()), "songs", [], "any", false, false, false, 27));
        foreach ($context['_seq'] as $context["_key"] => $context["song"]) {
            // line 28
            echo "              <tr><td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["song"], "songtitle", [], "any", false, false, false, 28), "html", null, true);
            echo "</td></tr>
              ";
            // line 29
            $context["songs"] = twig_array_merge((isset($context["songs"]) || array_key_exists("songs", $context) ? $context["songs"] : (function () { throw new RuntimeError('Variable "songs" does not exist.', 29, $this->source); })()), [0 => twig_get_attribute($this->env, $this->source, $context["song"], "songtitle", [], "any", false, false, false, 29)]);
            // line 30
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['song'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "            </tbody>
          </table>
        </div>
        ";
        // line 42
        echo "    <div class=\"row mt-2\">
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
        return "record/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 42,  130 => 31,  124 => 30,  122 => 29,  117 => 28,  112 => 27,  110 => 26,  103 => 22,  99 => 21,  95 => 20,  86 => 14,  77 => 8,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ \"#{record.artistid.artistname}: #{record.recordtitle}\" }}{% endblock %}

{% block body %}
  <div class=\"container mt-4\">
    <div class=\"row\">
      <h1 class=\"display-4\"><b>{{ \"#{record.artistid.artistname}: #{record.recordtitle}\" }}</b></h1>
    </div>
    <div class=\"row\">
      <div class=\"col-md-4 d-flex flex-row align-self-start mb-1 mr-2 p-0\">
        <div class=\"mb-auto\">
          <img class=\"img-fluid img-thumbnail p-1\"
               src=\"/img/{{ record.recordpicture }}\"
          >
        </div>
      </div>
      <div class=\"col-md-5 d-flex flex-column ml-3 mr-1 p-1\">
        <div class=\"small\">
          <b>Year:</b> {{ record.recordyear }}<br>
          <b>Label:</b> {{ record.recordlabel }}<br>
          <b>Genre: </b>{{ record.recordgenre }}<br><br>
          <b>Track list:</b>
          <table class=\"table table-hover table-sm\">
            <tbody>
            {% set songs = [] %}
            {% for song in record.songs %}
              <tr><td>{{song.songtitle}}</td></tr>
              {% set songs = songs|merge([song.songtitle]) %}
            {% endfor %}
            </tbody>
          </table>
        </div>
        {#}        <div class=\"mt-auto pb-2\">
          <a href=\"#\">
            <button class=\"btn btn-primary btn-sm\">Add songs</button>
            <t class=\"form-control control-sm\" type=\"textarea\" value=\"\">
          </a>
        </div>
      </div>
    </div> #}
    <div class=\"row mt-2\">
      <div class=\"col\">
        <button class=\"btn btn-primary btn-sm\" onclick=\"history.back()\" >Back</button>
        </div>
    </div>
  </div>
{% endblock %}
", "record/index.html.twig", "/home/stephane/projets/MSDIW22091/9_symfony/records/templates/record/index.html.twig");
    }
}
