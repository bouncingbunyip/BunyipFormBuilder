<?php

/**
 * TextAutocompleteTemplate.php (Bootstrap)
 *
 * Bootstrap-themed version of TextAutocompleteTemplate.
 * Uses jQuery UI autocomplete with Bootstrap form-control styling.
 * Also properly renders validation errors (the Basic template does not).
 *
 * @see https://getbootstrap.com/docs/5.3/forms/form-control/
 * @see https://jqueryui.com/autocomplete/
 * @package BunyipFormBuilder
 */

namespace BunyipFormBuilder\templates\Bootstrap;

class TextAutocompleteTemplate
{
    public function getHtml($elem): string
    {
        $error   = $elem->getError();
        $invalid = !empty($error) ? ' is-invalid' : '';

        $html = '<div class="mb-3">' . PHP_EOL;

        $label = $elem->getLabel();
        if ($label) {
            $html .= '    <label class="form-label" for="' . $elem->getId() . '">' . $label . '</label>' . PHP_EOL;
        }

        $html .= '    <input type="text" id="' . $elem->getId() . '" name="' . $elem->getName()
               . '" class="form-control' . $invalid . '">' . PHP_EOL;

        if (!empty($error)) {
            $html .= '    <div class="invalid-feedback">' . $error . '</div>' . PHP_EOL;
        }

        $html .= '</div>' . PHP_EOL;

        $html .= '<input type="hidden" id="' . $elem->getId() . '_id" name="' . $elem->getId() . '_id" value="">' . PHP_EOL;

        $html .= '<script>' . PHP_EOL;
        $html .= '$( function() {' . PHP_EOL;
        $html .= '    $( "#' . $elem->getId() . '" ).autocomplete({' . PHP_EOL;
        $html .= '        source: "' . $elem->getSource() . '",' . PHP_EOL;
        $html .= '        minLength: 2,' . PHP_EOL;
        $html .= '        select: function( event, ui ) {' . PHP_EOL;
        $html .= '            $( "#' . $elem->getId() . '_id" ).val( ui.item.id );' . PHP_EOL;
        $html .= '        }' . PHP_EOL;
        $html .= '    });' . PHP_EOL;
        $html .= '} );' . PHP_EOL;
        $html .= '</script>' . PHP_EOL;

        return $html;
    }
}
