<?php

/* components/panel-system.twig */
class __TwigTemplate_717232a0686432540cacd5aa525cea39c4e153251997c3e4b2fc19ddf06efce6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'panel_class' => array($this, 'block_panel_class'),
            'panel_icon' => array($this, 'block_panel_icon'),
            'panel_head' => array($this, 'block_panel_head'),
            'panel_body' => array($this, 'block_panel_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 5
        return $this->loadTemplate((($this->env->getExtension('Bolt')->isAllowed("systemlog")) ? ("_base/_panel.twig") : ("_base/_nothing.twig")), "components/panel-system.twig", 5);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_panel_class($context, array $blocks = array())
    {
        echo "panel-activity";
    }

    // line 9
    public function block_panel_icon($context, array $blocks = array())
    {
        echo "fa-clock-o";
    }

    // line 11
    public function block_panel_head($context, array $blocks = array())
    {
        echo $this->env->getExtension('Bolt')->trans("panel.latest-activity.system");
    }

    // line 13
    public function block_panel_body($context, array $blocks = array())
    {
        // line 14
        echo "
    ";
        // line 15
        $context["macro"] = $this->loadTemplate("_macro/_macro.twig", "components/panel-system.twig", 15);
        // line 16
        echo "
    <ul class=\"activity\">
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["activity"]) ? $context["activity"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 19
            echo "            ";
            $context["user"] = $this->env->getExtension('Bolt')->getUser((($this->getAttribute($context["log"], "ownerid", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["log"], "ownerid", array()), "")) : ("")));
            // line 20
            echo "            ";
            if ( !twig_test_empty((isset($context["user"]) ? $context["user"] : null))) {
                // line 21
                echo "                ";
                $context["userlink"] = $context["macro"]->getuserlink((isset($context["user"]) ? $context["user"] : null));
                // line 22
                echo "            ";
            } else {
                // line 23
                echo "                ";
                $context["userlink"] = $this->env->getExtension('Bolt')->trans("panel.latest-activity.unknown");
                // line 24
                echo "            ";
            }
            // line 25
            echo "            <li>
                ";
            // line 26
            if (($this->getAttribute($context["log"], "route", array()) == "postLogin")) {
                // line 27
                echo "                    <em>";
                echo twig_escape_filter($this->env, (isset($context["userlink"]) ? $context["userlink"] : null), "html", null, true);
                echo "</em> ";
                echo $this->env->getExtension('Bolt')->trans("panel.latest-activity.logged-in");
                echo "
                ";
            } elseif (($this->getAttribute(            // line 28
$context["log"], "route", array()) == "logout")) {
                // line 29
                echo "                    <em>";
                echo twig_escape_filter($this->env, (isset($context["userlink"]) ? $context["userlink"] : null), "html", null, true);
                echo "</em> ";
                echo $this->env->getExtension('Bolt')->trans("panel.latest-activity.logged-out");
                echo "
                ";
            } else {
                // line 31
                echo "                    <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "message", array()), "html", null, true);
                echo "</em>
                ";
            }
            // line 33
            echo "                <small>
                    (<time class=\"moment\" datetime=\"";
            // line 34
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["log"], "date", array()), "c"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "date", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "date", array()), "html", null, true);
            echo "</time>)
                </small>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    </ul>

    <p><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("systemlog");
        echo "\" class=\"btn btn-default btn-block\">";
        echo $this->env->getExtension('Bolt')->trans("panel.latest-activity.button.more");
        echo " »</a></p>

";
    }

    public function getTemplateName()
    {
        return "components/panel-system.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 40,  127 => 38,  113 => 34,  110 => 33,  104 => 31,  96 => 29,  94 => 28,  87 => 27,  85 => 26,  82 => 25,  79 => 24,  76 => 23,  73 => 22,  70 => 21,  67 => 20,  64 => 19,  60 => 18,  56 => 16,  54 => 15,  51 => 14,  48 => 13,  42 => 11,  36 => 9,  30 => 7,  21 => 5,);
    }
}
/* {##*/
/*  # Sidebar-Panel: Displays the latest activity*/
/*  # (Usage Example: Dashboards sidebar)*/
/*  #}*/
/* {% extends (isallowed('systemlog')) ? '_base/_panel.twig' : '_base/_nothing.twig' %}*/
/* */
/* {% block panel_class 'panel-activity' %}*/
/* */
/* {% block panel_icon 'fa-clock-o' %}*/
/* */
/* {% block panel_head __('panel.latest-activity.system') %}*/
/* */
/* {% block panel_body %}*/
/* */
/*     {% import '_macro/_macro.twig' as macro %}*/
/* */
/*     <ul class="activity">*/
/*         {% for log in activity %}*/
/*             {% set user = getuser( log.ownerid|default('') ) %}*/
/*             {% if user is not empty %}*/
/*                 {% set userlink = macro.userlink(user) %}*/
/*             {% else %}*/
/*                 {% set userlink = __('panel.latest-activity.unknown') %}*/
/*             {% endif %}*/
/*             <li>*/
/*                 {% if log.route == 'postLogin' %}*/
/*                     <em>{{ userlink }}</em> {{ __('panel.latest-activity.logged-in') }}*/
/*                 {% elseif log.route == 'logout' %}*/
/*                     <em>{{ userlink }}</em> {{ __('panel.latest-activity.logged-out') }}*/
/*                 {% else %}*/
/*                     <em>{{ log.message }}</em>*/
/*                 {% endif %}*/
/*                 <small>*/
/*                     (<time class="moment" datetime="{{ log.date|date("c") }}" title="{{ log.date }}">{{ log.date }}</time>)*/
/*                 </small>*/
/*             </li>*/
/*         {% endfor %}*/
/*     </ul>*/
/* */
/*     <p><a href="{{ path('systemlog') }}" class="btn btn-default btn-block">{{ __('panel.latest-activity.button.more') }} »</a></p>*/
/* */
/* {% endblock panel_body %}*/
/* */
