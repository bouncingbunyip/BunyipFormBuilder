<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class RangeDefaultTemplate
{

    /**
     */
    function __construct()
    {}
    
    function getHtml(RangeFormBuilder $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $html .= '<input type="range" id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'" min="'. $elem->getMin() .'" max="'. $elem->getMax() .'"'. $str .' onchange="updateTextInput(this.value);">'.PHP_EOL;
//        $html .= '<output name="'. $elem->getName() .'" for="'. $elem->getId() .'"></output>';
        $html .= '<input type="text" id="'.$elem->getName().'-output" value="'. $elem->getValue() .'">';
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        $html .="
            <script>
                function updateTextInput(val) {
                    document.getElementById('".$elem->getName()."-output').value=val; 
                }
        </script>";
        return $html;
    }
}
