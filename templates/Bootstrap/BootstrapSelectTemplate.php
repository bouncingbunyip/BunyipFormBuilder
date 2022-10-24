<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder;

class BootstrapSelectTemplate
{

    /**
     * <div class="form-group col-md-4">
    <label for="inputState">State</label>
    <select id="inputState" class="form-control">
    <option selected>Choose...</option>
    <option>...</option>
    </select>
    </div>
     * <div class="form-group col">
    <label for="inputState">State</label>
    <select id="inputState" class="form-control">
    <option selected>Choose...</option>
    <option>...</option>
    </select>
    </div>
     * @param SelectFormBuilder $elem
     * @return string
     */
    function getHtml(ElementFormBuilder $elem) {
        //$html = '<div class="form-group"><div class="input-group"'. PHP_EOL;
        $html = '';
        if($elem->getLabelSize()) { $label_size = $elem->getLabelSize(); } else { $label_size = 'col-sm-2';}
        if($elem->getElementSize()) { $element_size = $elem->getElementSize(); } else { $element_size = 'col-sm-10';}
        $html .= '  <label for="'. $elem->getId() .'" class="'. $label_size.' control-label">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $html .= '  <div class="'. $element_size.'">' .PHP_EOL;
        $class = $elem->getCssClass();
        if (!empty($elem->multiple)) {
            $multi = ' multiple';
        } else {
            $multi = '';
        }
        $html .= '    <select'. $multi .' name="'. $elem->getName() .'" id="'. $elem->getId().'" '. $elem->getRequired() . $class .'>'.PHP_EOL;
        $this->selected_value = $elem->getSelected();
        $optGroup = $elem->getOptGroup();
        if ($optGroup) {
            foreach($optGroup as $label=>$options) {
                $html .= '    <optgroup label="'. $label .'">'.PHP_EOL;
                $html .= $this->renderOptions($options);
                $html .= '    </optgroup>'.PHP_EOL;
            }
        } else {
            $options = $elem->getOptions();
            $html .= $this->renderOptions($options);
        }
        
        $html .= '    </select>'.PHP_EOL;
        $html .= '  </div>'.PHP_EOL;
//        $error = $elem->getError();
//        if (!empty($error)) {
//            $html .= '<span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
//        }
//        $html .= '</div></div>' . PHP_EOL;
        return $html;        
    }
    
    public function renderOptions($options) {
        $retval = '';
        if ($options) {
            foreach ($options as $option) {
                if ($this->selected_value && ($this->selected_value == $option['value'])) {
                    $selected = ' selected';
                } elseif (isset($option['selected']) && $option['selected'] == true) {
                    $selected = ' selected';
                } else {
                    $selected = '';
                }
                $retval .=  '      <option value="'. $option['value'] .'"'. $selected.'>'. _e($option['label']) .'</option>'.PHP_EOL;
            }
        } else {
            // @todo handle this edge case
        }
        return $retval;
    }
}