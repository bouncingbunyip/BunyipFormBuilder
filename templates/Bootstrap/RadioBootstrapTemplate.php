<?php
/**
 * RadioBootstrapTemplate.php
 *
 * @deprecated use Bootstrap/RadioTemplate instead
 */

/**
 * <div class="form-check form-check-inline">
 * <label class="form-check-label">
 * <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
 * </label>
 * </div>
 * <div class="form-check form-check-inline">
 * <label class="form-check-label">
 * <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
 * </label>
 * </div>
 * <div class="form-check form-check-inline disabled">
 * <label class="form-check-label">
 * <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled> 3
 * </label>
 * </div>
 */

namespace BunyipFormBuilder;

/**
 * @deprecated
 */
class RadioBootstrapTemplate
{

    function __construct()
    {
    }

    function getHtml(RadioFormBuilder $elem)
    {
        $html = '<div class="form-group">' . PHP_EOL;
        $html .= '    <label class="col-sm-4 control-label">' . $elem->getLabel() . '</label>' . PHP_EOL;
        $html .= '    <div class="col-sm-8">' . PHP_EOL;
        $css = $elem->getCssClass();
        if ($css) {
            $css = ' ' . $css;
        } else {
            $css = '';
        }

        $selected_value = $elem->getSelected();
        $options = $elem->getOptions();
        if ($options) {
            foreach ($options as $option) {
                $counter = 0;
                if ($selected_value && ($selected_value == $option['value'])) {
                    $selected = ' checked';
                } elseif (isset($option['selected']) && $option['selected'] == true) {
                    $selected = ' checked';
                } else {
                    $selected = '';
                }
                $html .= '        <label class="radio-inline' . $css . '" for="' . $elem->getName() . '-' . $counter . '">' . PHP_EOL;
                $html .= '            <input id="' . $elem->getName() . '-' . $counter . '" type="radio" name="' . $elem->getName() . '" value="' . $option['value'] . '"' . $selected . '> ' . $option['label'] . PHP_EOL;
                $html .= '        </label>' . PHP_EOL;
                $counter++;
            }
            $html .= '    </label>' . PHP_EOL;
        }
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="err_msg">' . $error . '</span>';
        }
        $html .= '    </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}