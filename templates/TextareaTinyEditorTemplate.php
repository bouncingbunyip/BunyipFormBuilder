<?php

/**
 *
 * @author jackal
 *        
 */
namespace FormBuilder;

class TextareaTinyEditorTemplate
{

    /**
     */
    function __construct()
    {}
    
    /**
     * getHtml
     * 
     * the code that defines this element needs to include the JS and CSS files with registerExternal()
     * Specifically (in the FormDef file):
     *   $this->registerExternal('/thirdparty/TinyEditor/tiny.editor.packed.js', 'js');
     *   $this->registerExternal('/thirdparty/TinyEditor/style.css', 'css');
     * 
     * @param TextareaTinyEditorBuilder $elem
     * @see http://www.scriptiny.com/2010/02/javascript-wysiwyg-editor/ for more documentation
     * @return string Returns the HTML with support for Tiny Editor embedded in textarea
     */
    function getHtml(TextareaTinyEditorFormBuilder $elem) {
        $html = '<label for="'. $elem->getId() .'">'. $elem->getLabel() .'</label>'. PHP_EOL;
        $attrs = $elem->getAttributes();
        if ($attrs) {
            $str = ' '. implode(' ', $attrs);
        } else {
            $str = null;
        }
        
        //$html .= '<textarea id="'. $elem->getId() .'" name="'. $elem->getName() .'"'. $str .'>'. $elem->getValue() .'</textarea>'.PHP_EOL; 
        
        $html .= '<textarea id="tinyeditor" name="'. $elem->getName() .'" style="width: 400px; height: 200px">'. $elem->getValue() .'</textarea>'.PHP_EOL;
        $html .= "
<script>
var editor = new TINY.editor.edit('editor', {
	id: 'tinyeditor',
	width: 584,
	height: 175,
	cssclass: 'tinyeditor',
	controlclass: 'tinyeditor-control',
	rowclass: 'tinyeditor-header',
	dividerclass: 'tinyeditor-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor',
	footerclass: 'tinyeditor-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
</script>".PHP_EOL;
        $error = $elem->getError();
        if (!empty($error)) {
            $html .= '    <span class="'. $elem->getCssError() .'">'. $error .'</span>'.PHP_EOL;
        }
        return $html;
    }
}
