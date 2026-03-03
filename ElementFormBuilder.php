<?php
/**
 * ElementFormBuilder.php
 *
 * @package BunyipFormBuilder
 * @copyright 2011-2022 Chris Hubbard
 */

/**
 * Description of Element
 * This is the parent class that all the 'element' classes extend
 * 
 * @author Chris Hubbard <chris@ibunyip.com>
 */
namespace BunyipFormBuilder;

class ElementFormBuilder
{
    /**
     * @var string|null This the label that will be used with the form element
     */
    protected ?string $label = null;

    /**
     * @var string|null This is the id of the form element, for example id="foo"
     */
    protected ?string $id = null;

    /**
     * @var string|null This is the name of the form element, for example name="foo"
     */
    protected ?string $name = null;
    /**
     * @var string|null This is the value of the form element, for example value="foo"
     */
    protected ?string $value = null;
    protected ?string $placeholder = null;
	protected $labelCss;
    protected $class;
    public $required = false;
    protected $autocomplete;
    protected $error;
    protected $csserror = 'err-msg';
    protected $theme;
	public $selected;
	public $source;
	public $options;
    /**
     * @var  name of the template to use for this element.  Templates are found in the templates/ folder
     */
    public $template;

    /**
     * __construct
     * In general usage, this class will never be called directly.  It should be called through its
     * child classes.
     * @param array $attrs An array of the attributes to pass to the Element class
     */
    function __construct(array $attrs = []) {
        if (is_array($attrs)) {
            foreach ($attrs as $key => $value) {
                $this->$key = $value;
            }
        }
    }
        
    public function getLabel() {
        return $this->label;
    }
    
    public function getId() {
        if (empty($this->id)) {
            return $this->name;
        } else {
            return $this->id;
        }
    }

    public function getName() {
        return $this->name;
    }
    
    public function getValue() {
        return $this->value;
    }    

    public function render($theme = null) {
        $this->theme = $theme;
        $template = $this->getTemplate();

        $tpl = new $template;
        $html = $tpl->getHtml($this);
        return $html;
    }

    public function getTemplate() {
        if (isset($this->theme) && !empty($this->theme)) {
            $theme = $this->theme . '\\';
        } else {
            $theme = '';
        }
        $template = 'BunyipFormBuilder\templates\\'. $theme . $this->template;
        return $template;
    }
    
    public function setRequired($required) {
        $this->required = $required;
    }
    
    public function getRequired() {
        if (isset($this->required) && ($this->required === true)) {
            $required = 'required="required"';
        } else {
            $required = false;
        }
        return $required;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function getClass() {
        return $this->class;
    }
	
    public function setLabelCss($labelCss) {
        $this->labelCss = $labelCss;
    }

	public function getLabelClass() {
		return $this->labelCss;
	}

    public function getCssClass($key = 'class') {
        $classes = null;
        if (isset($this->$key)) {
            $classes[] = $this->$key;
        }
        if (!empty($this->error)) {
            $classes[] = 'error';
        }
        $retval = is_null($classes) ? false : 'class="'. implode(' ', $classes) .'"';
        return $retval;
    }
    
    public function getError() {
        if (!empty($this->error)) {
            return $this->error;
        } else {
            return false;
        }
    }
    public function getHelpText()
    {
        if (!empty($this->help_text)) {
            return $this->help_text;
        } else {
            return false;
        }
    }
    
    public function getAutofocus() {
        if (!empty($this->autofocus) && ($this->autofocus == $this->name)) {
            return 'autofocus';
        }    
        return false;
    }

    public function getPlaceholder()
    {
        if (!empty($this->placeholder)) {
            return 'placeholder = "'. $this->placeholder .'"';
        }
        return false;
    }
    public function setTemplate($name) {
        $this->template = $name;
    }

    public function setCssError($css) {
        $this->csserror = $css;
    }

    public function getCssError() {
        return $this->csserror;
    }

    public function setTheme($theme) {
        $this->theme = $theme;
    }
}
