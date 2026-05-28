<?php

namespace BunyipFormBuilder\templates\Bootstrap;

class DateDeleteSubFormTemplate
{
    public function getHtml($elem): string
    {
        $error   = $elem->getError();
        $invalid = !empty($error) ? ' is-invalid' : '';
        $req     = $elem->getRequired() ? ' ' . $elem->getRequired() : '';

        $action   = htmlspecialchars($elem->getAction());
        $deleteId = (int) $elem->getDeleteId();
        $formName = htmlspecialchars($elem->getFormName());

        $onclick = "var f=document.createElement('form');"
                 . "f.method='POST';"
                 . "f.action='{$action}';"
                 . "var i1=document.createElement('input');i1.name='id';i1.value='{$deleteId}';"
                 . "var i2=document.createElement('input');i2.name='form_name';i2.value='{$formName}';"
                 . "f.appendChild(i1);f.appendChild(i2);"
                 . "document.body.appendChild(f);"
                 . "f.submit();";

        $html  = '<div class="mb-3">' . PHP_EOL;
        $html .= '    <label class="form-label" for="' . $elem->getId() . '">' . $elem->getLabel() . '</label>' . PHP_EOL;
        $html .= '    <div class="input-group">' . PHP_EOL;
        $html .= '        <input type="date" id="' . $elem->getId() . '" name="' . $elem->getName()
               . '" value="' . $elem->getValue() . '" class="form-control' . $invalid . '"' . $req . '>' . PHP_EOL;
        $html .= '        <button type="button" class="btn btn-outline-secondary" onclick="' . $onclick . '">'
               . '<img src="images/icn_round_delete.png" alt="Delete" width="16" height="16">'
               . '</button>' . PHP_EOL;
        if (!empty($error)) {
            $html .= '        <div class="invalid-feedback">' . $error . '</div>' . PHP_EOL;
        }
        $html .= '    </div>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}
