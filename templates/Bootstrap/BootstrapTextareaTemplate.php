<?php

/**
 *
 * @author jackal
 *        
 */
namespace BunyipFormBuilder;

class BootstrapTextareaTemplate
{

    /**
     */
    function __construct()
    {}

    /**
     * <div class="form-group">
    <label for="exampleTextarea">Example textarea</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
     * @param TextareaFormBuilder $elem
     * @return string
     */
    function getHtml(TextareaFormBuilder $elem) {
        $html = '<div class="form-group">'. PHP_EOL;
        $html .= '  <label for="'. $elem->getId() .'" class="col-sm-2 control-label">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        $rows = $elem->getRows();
        if (!$rows) {
            $count = count(explode(PHP_EOL, $elem->getValue()));

            if ($count) {
                $rows = ' rows="'. $count .'"';
            } else {
                $rows = '';
            }
        } else {
            $rows = ' rows="'. $elem->getRows() .'"';
        }

        $html .= '  <textarea '. $rows .' id="'. $elem->getId() .'" name="'. $elem->getName() .'"'. $str .' aria-describedby="'. $elem->getId() .'HelpBlock">'. $elem->getValue() .'</textarea>'.PHP_EOL;
        if (!empty($elem->helptext)) {
            $html .= '  <small id="'. $elem->getId() .'HelpBlock" class="form-text text-muted">'. $elem->helptext .'</small>'. PHP_EOL;
        }

        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '    <span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
        }
        $html .= '</div>'. PHP_EOL;
        return $html;
    }
}
