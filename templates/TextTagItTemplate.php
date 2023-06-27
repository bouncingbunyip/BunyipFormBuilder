<?php

/**
 *
 * @author Chris Hubbard <chris@ibunyip.com>
 *        
 */
namespace BunyipFormBuilder\templates;

class TextTagItTemplate
{

    /**
     */
    function __construct()
    {}
    
    /**
     * getHtml
     * @param object $elem
     * 
     * the code that defines this element needs to include the JS and CSS files with registerExternal()
     * Specifically (in the FormDef file):
     *   $this->registerExternal('/thirdparty/tag-it/js/tag-it.js', 'js');
     *   $this->registerExternal('/thirdparty/tag-it/css/jquery.tagit.css', 'css');
     *   $this->registerExternal('/thirdparty/tag-it/css/tagit.ui-zendesk.css', 'css');
     * 
     * @see https://github.com/aehlke/tag-it/blob/master/README.markdown for more documentation
     * @return string Returns the HTML corresponding to TagIt input
     */
    function getHtml($elem) {
//vd($elem);        
        $html = "<script>
    $(function(){
        $('#".$elem->getId()."').tagit({
".$elem->getOptions() ."
        });
    });
</script>". PHP_EOL;
        $label = $elem->getLabel();
        if ($label) {
            $html .= '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        }
        
        // <input name="tags" id="singleFieldTags2" value="Apple, Orange">
        $html .= '<input id="'. $elem->getId() .'" name="'. $elem->getName() .'" value="'. $elem->getValue() .'">'.PHP_EOL;
        
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '<span class="'. $elem->getCssError() .'">'. $elem->getError() .'</span>';
        }
        if (isset($elem->tooltip)) {
            $html .= $elem->tooltip->render();
        }
        return $html;
    }
}
