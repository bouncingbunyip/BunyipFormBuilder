<?php

/**
 *
 * @author jackal
 *        
 * @todo add in support for DatePicker options: https://jqueryui.com/datepicker/
 */
namespace FormBuilder;

class DatePickerDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    /**
     * getHtml
     * Note the datepicker selector is using the element id to attach the datepicker.  
     * If you need or want a different behavior, create a new template.
     * @param DatePickerFormBuilder $elem
     * @return string
     */
    function getHtml(DatePickerFormBuilder $elem) {
        $html = '<script>
	$(function() {
		$( "#datepicker_'. $elem->getId() .'" ).datepicker();
	});
	</script>'.PHP_EOL;
        $html .= '<label>'. $elem->getLabel() .'</label>'. PHP_EOL;
        $html .= '    <input type="text" name="'. $elem->getName() .'" id="datepicker_'. $elem->getId() .'" value="'.$elem->getValue().'" class="datepicker" />'.PHP_EOL;

        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '    <span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
        }
        return $html;
    }
}
