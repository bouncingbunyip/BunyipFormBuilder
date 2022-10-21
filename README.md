# FormBuilder
PHP project that standardizes and maybe simplifies the process of creating HTML forms

## Example ##
The following code with create a normal login form.

```php
use \FormBuilder\FormBuilder;
use \FormBuilder\HintDecorator;
use \FormBuilder\TextFormBuilder;
use \FormBuilder\PasswordFormBuilder;
use \FormBuilder\HiddenCsrfFormBuilder;
use \FormBuilder\SubmitFormBuilder;

$attr = array(
    'action'=>'echo.php',
    'method'=>'post',
    'id'=>'name-id',
    'name'=>'name'
);

$form = new FormBuilder($attr);
$attributes = array('class'=>'hint--right', 'trigger'=>'Hint', 'text'=> 'This is the tooltip text');
$tooltip = new HintDecorator($attributes);

$fieldset = $form->addFieldset('Log In', 'id', 'name');

$attr = array(
    'label'=>'Username',
    'id'=>'username',
    'name'=>'username',
    'tooltip'=>$tooltip
);
$form->addElem(new TextFormBuilder($attr), $fieldset);

$attr = array(
    'label'=>'Password',
    'id'=>'password',
    'name'=>'password'
);
$form->addElem(new PasswordFormBuilder($attr), $fieldset);

$attr = array(
    'value'=>FormBuilder::getCsrf(),
    'id'=>FormBuilder::BUNYIPCSRF,
    'name'=>FormBuilder::BUNYIPCSRF
);
$form->addElem(new HiddenCsrfFormBuilder($attr));

$attr = array(
    'value'=>'Submit',
    'id'=>'name-id',
    'name'=>'name'
);
$form->addElem(new SubmitFormBuilder($attr));

$form->setFieldset($fieldset);
echo $form->render();
```
Take a look in the `examples/` folder for more examples.

## Why? ##
Why does this exist?  I got tired of frequently rebuilding my forms over and over again.  I have a fair number of projects that I've built and maintain.

One of the things I dislike doing is rebuilding HTML forms.

This code allows me to separate the logic of the form from it's presentation.  I can also create interesting inputs, like type-ahead and have that functionality immediately available to the rest of my projects.

I'm not using any of the much more mature/seasoned frameworks, which is why I've got my own FormBuilder.

This code is very much a work in progress.  It does not have comprehensive or even representative unit tests.

