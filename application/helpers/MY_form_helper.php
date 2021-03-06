<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    function is_valid($name)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (form_error($name)) {
                return "is-invalid";
            } else {
                return null;
            }
        }
        return null;
    }

    function bootstrap_error($name)
    {
        if (form_error($name)) {
            return '<div class="invalid-feedback">' . form_error($name) . '</div>';
        } else {
            return;
        }
    }

    function bootstrap_input($name, $label = '', $type = 'text', $value = '')
    {
        if (empty($label)) {
            $label = str_replace("_", " ", $name);
            $label = ucwords($label);
        }
        $valid_class = is_valid($name);
        if ($type != 'password') {
            if (set_value($name)) {
                $value = set_value($name);
            }
        }
        $html = "<label for=\"$name\">$label</label>";
        if ($type == 'textarea') {
            $html .= "<textarea class=\"form-control $valid_class\" id=\"$name\" name=\"$name\" rows=\"5\">$value</textarea>";

        } else {
            $html .= "<input type=\"$type\" class=\"form-control $valid_class\" id=\"$name\" name=\"$name\" value=\"$value\">";
        }
        $html .= bootstrap_error($name);

        return $html;
    }

    function wsywig($name, $label = '', $value = '')
    {
        if (empty($label)) {
            $label = str_replace("_", " ", $name);
            $label = ucwords($label);
        }
        $valid_class = is_valid($name);
        if (set_value($name)) {
            $value = set_value($name);
        } else {
            $value = html_escape($value);
        }
        $html = "<label for=\"$name\">$label</label>";
        $html .= "<div class=\"form-control $valid_class\" id=\"wsywig\" name=\"$name\" style=\"height: 250px\"></div>";
        $html .= "<input name=\"$name\" type=\"hidden\" id=\"wsywig-contents\" value=\"$value\">";
        $html .= bootstrap_error($name);

        return $html;
    }