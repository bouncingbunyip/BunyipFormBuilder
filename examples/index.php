<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        FormBuilder Tests
    </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#accordion" ).accordion({
                heightStyle: "content",
                collapsible: true
            });
        });
    </script>
    <style>
        div a.incomplete {
            color: grey;
        }
        .complete {

        }
    </style>
</head>
<body>
<?php
if (!empty($_GET)) {
    echo 'GET<pre>';
    var_dump($_GET);
    echo '</pre>';
}
if (!empty($_POST)) {
    echo 'POST<pre>';
    var_dump($_POST);
    echo '</pre>';
}

?>
<h1>
    BunyipFormBuilder Sanity Tests
</h1>
<div id="accordion">
    <h2>
        Example Forms
    </h2>
    <div>
        <a href="form-no-fields.php">Empty form to test form attributes</a><br>
        <a href="form-no-fieldset.php">Simple form with no fieldsets</a><br>
        <a href="form-one-fieldset.php">Form with one fieldset</a><br>
        <a href="form-two-fieldsets.php">Form with two fieldsets</a><br>
        <a href="form-nested-fieldsets.php">Form with nested fieldsets</a><br>
        <a href="form-reset.php">Form with reset button</a><br>
        <a href="login-html-deco.php">Form with HTML decorator</a><br>
        <hr>
        <a href="form-login.php">Login Form</a><br>
    </div>
    <h2>
        Examples of HTML Elements:
    </h2>
    <div>
        <a href="button.php" class="complete">button</a><br>
        <a href="checkbox.php" class="complete">checkbox</a><br>
        <a href="color.php" class="complete">color</a><br>
        <a href="date.php" class="complete">date</a><br>
        <a href="email.php" class="complete">email</a><br>
        <a href="file.php" class="complete">file</a><br>
        <a href="hidden.php" class="complete">hidden</a><br>
        <a href="number.php" class="complete">number</a><br>
        <a href="password.php" class="complete">password</a><br>
        <a href="radio.php" class="complete">radio</a><br>
        <a href="range.php" class="complete">range</a><br>
        <a href="reset.php" class="complete">reset</a><br>
        <a href="select.php" class="complete">select</a><br>
        <a href="select-optgroup.php" class="complete">select with optgroup</a><br>
        <a href="submit.php" class="complete">submit</a><br>
        <a href="text.php">text aka input</a><br>
        (<a href="text-alternate-template.php">text alternate template</a>)<br>
        (<a href="text-opentip-template.php">text opentip template</a>)<br>
        (<a href="text-tooltip-template.php">text tooltip template</a>)<br>
        <a href="textarea.php" class="complete">textarea</a><br>
    </div>
    <h2>
        Unsupported HTML Elements:
    </h2>
    <div>
        <a href="" class="incomplete">datalist</a><br>
        <a href="" class="incomplete">datetime</a><br>
        <a href="" class="incomplete">datetime-local</a><br>
        <a href="" class="incomplete">image</a><br>
        <a href="" class="incomplete">month</a><br>
        <a href="" class="incomplete">search</a><br>
        <a href="" class="incomplete">tel</a><br>
        <a href="" class="incomplete">time</a><br>
        <a href="" class="incomplete">url</a><br>
        <a href="" class="incomplete">week</a><br>
    </div>
    <h2>
        Examples of Customized Elements:
    </h2>
    <div>
        <a href="hiddencsrf.php" class="complete">csrf</a><br>
        <a href="datepicker.php" class="complete">date select</a><br>
        <a href="select-chosen.php" class="complete">select - Chosen</a> - Deprecated<br>
        <a href="textblock.php" class="complete">text block</a><br>
        <a href="text-autocomplete.php" class="complete">text with jQuery UI Autocomplete</a><br>
        <a href="text-autocomplete-remote.php" class="incomplete">text with</a> <a href="https://jqueryui.com/autocomplete/#remote">jQuery UI Autocomplete Remote</a> - not working<br>
        <a href="text-DevBridgeAutocomplete.php" class="incomplete">text with DevBridge autocomplete - not working</a><br>
        <a href="text-typeahead.php" class="complete">text with typeahead</a><br>
        <a href="text-hint.php" class="complete">text with</a> <a href="https://kushagragour.in/lab/hint/">Hint</a><br>
        <a href="textdelete.php" class="complete">text with delete</a><br>
        (<a href="textdelete-post.php" class="complete">text with POST delete</a>)<br>
        <a href="text-tagit.php" class="complete">text with Tag-It</a><br>
        <a href="text-tinyeditor.php" class="complete">textarea with Tiny Editor</a><br>
    </div>
    <h2>
        Other Testing Stuff:
    </h2>
    <div>
        <a href="adhoc-test.php" class="incomplete">Adhoc</a><br>
        <a href="twoforminputsonrow-test.php" class="incomplete">Two inputs on a row</a><br>
        <a href="twoforminputsonrowgrid-test.php" class="incomplete">Two inputs on a row using grid</a><br>
    </div>
</div>
</body>
</html>