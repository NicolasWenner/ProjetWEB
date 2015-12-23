<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_f8a5367dd7df456f6f958fc1edb3cc21f4550d4d1659a2532e2f9a1bd3692a7d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_83fdb08fb37c4b036112b46a8b36438087774ea0ffd523a7aba8ef21a720ecbb = $this->env->getExtension("native_profiler");
        $__internal_83fdb08fb37c4b036112b46a8b36438087774ea0ffd523a7aba8ef21a720ecbb->enter($__internal_83fdb08fb37c4b036112b46a8b36438087774ea0ffd523a7aba8ef21a720ecbb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_83fdb08fb37c4b036112b46a8b36438087774ea0ffd523a7aba8ef21a720ecbb->leave($__internal_83fdb08fb37c4b036112b46a8b36438087774ea0ffd523a7aba8ef21a720ecbb_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_f13c6585bcf01164c8690417cfb01b07a1e5de6b06085873c879cbbf93fb07f5 = $this->env->getExtension("native_profiler");
        $__internal_f13c6585bcf01164c8690417cfb01b07a1e5de6b06085873c879cbbf93fb07f5->enter($__internal_f13c6585bcf01164c8690417cfb01b07a1e5de6b06085873c879cbbf93fb07f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_f13c6585bcf01164c8690417cfb01b07a1e5de6b06085873c879cbbf93fb07f5->leave($__internal_f13c6585bcf01164c8690417cfb01b07a1e5de6b06085873c879cbbf93fb07f5_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d6dcbfd67287b7b215addbfbbcaf56177814cd5689a13746c5489eebca740963 = $this->env->getExtension("native_profiler");
        $__internal_d6dcbfd67287b7b215addbfbbcaf56177814cd5689a13746c5489eebca740963->enter($__internal_d6dcbfd67287b7b215addbfbbcaf56177814cd5689a13746c5489eebca740963_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d6dcbfd67287b7b215addbfbbcaf56177814cd5689a13746c5489eebca740963->leave($__internal_d6dcbfd67287b7b215addbfbbcaf56177814cd5689a13746c5489eebca740963_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_176fa0484ccd37db0ad28873a7f4071d261b5d71e62030383a62417e1ab534c6 = $this->env->getExtension("native_profiler");
        $__internal_176fa0484ccd37db0ad28873a7f4071d261b5d71e62030383a62417e1ab534c6->enter($__internal_176fa0484ccd37db0ad28873a7f4071d261b5d71e62030383a62417e1ab534c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_176fa0484ccd37db0ad28873a7f4071d261b5d71e62030383a62417e1ab534c6->leave($__internal_176fa0484ccd37db0ad28873a7f4071d261b5d71e62030383a62417e1ab534c6_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'TwigBundle::layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include 'TwigBundle:Exception:exception.html.twig' %}*/
/* {% endblock %}*/
/* */
