<?php

/**
 *
 * @author jackal
 *        
 * This class and the corresponding template can be used to create a 'Tiny Editor' input.
 * @see http://www.scriptiny.com/2010/02/javascript-wysiwyg-editor/ 
 * 
 */
namespace BunyipFormBuilder;

class TextareaTinyEditorFormBuilder extends ElementFormBuilder
{
    protected $required;
    protected $autofocus;
    protected $class;
    protected $error;
    public $template = 'TextareaTinyEditorTemplate';
    
    
    /**
     * getOptions
     * Use this method to get (as HTML) the various options that are set for the Tiny Editor builder
     * 
     *    id:'input', // (required) ID of the textarea
     *    width:584, // (optional) width of the editor
     *    height:175, // (optional) heightof the editor
     *    cssclass:'te', // (optional) CSS class of the editor
     *    controlclass:'tecontrol', // (optional) CSS class of the buttons
     *    rowclass:'teheader', // (optional) CSS class of the button rows
     *    dividerclass:'tedivider', // (optional) CSS class of the button diviers
     *    controls:['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|' ,'outdent' ,'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n', 'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'], // (required) options you want available, a '|' represents a divider and an 'n' represents a new row
     *    footer:true, // (optional) show the footer
     *    fonts:['Verdana','Arial','Georgia','Trebuchet MS'],  // (optional) array of fonts to display
     *    xhtml:true, // (optional) generate XHTML vs HTML
     *    cssfile:'style.css', // (optional) attach an external CSS file to the editor
     *    content:'starting content', // (optional) set the starting content else it will default to the textarea content
     *    css:'body{background-color:#ccc}', // (optional) attach CSS to the editor
     *    bodyid:'editor', // (optional) attach an ID to the editor body
     *    footerclass:'tefooter', // (optional) CSS class of the footer
     *    toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'}, // (optional) toggle to markup view options
     *    resize:{cssclass:'resize'} // (optional) display options for the editor resize
     */
    public function getOptions() {
        $options = array('id', 'width', 'height', 'cssclass', 'controlclass', 'rowclass', 'dividerclass', 'controls', 'footer', 'fonts', 'xhtml', 'cssfile', 'content', 'css', 'bodyid', 'footerclass', 'toggle', 'resize');
        $opts = array();
        foreach ($options as $option) {
            if (isset($this->options[$option]) && !empty($this->options[$option])) {
                $opts[] .= "            ". $option .": ". $this->options[$option];
            }
        }
        $retval = implode(",\n", $opts);
        return $retval;
    }
    
    /**
     * 
     */
    public function getAttributes() {
        $attrs = array();
        $req = $this->getRequired();
        if ($req) {
            array_push($attrs, $req);
        }
        $focus = $this->getAutofocus();
        if ($focus) {
            array_push($attrs, $focus);
        }
        $css = $this->getCssClass();
        if ($css) {
            array_push($attrs, $css);
        }
        return $attrs;
    }
}
