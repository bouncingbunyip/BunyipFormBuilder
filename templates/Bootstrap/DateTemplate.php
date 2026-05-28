<?php

namespace BunyipFormBuilder\templates\Bootstrap;

class DateTemplate
{
    /**
     * base example:
     * <div class="mb-3">
     * <label for="exampleDate" class="form-label">Select Date</label>
     * <input type="date" class="form-control" id="exampleDate">
     * </div>
     * @param $elem
     * @return string
     */
    public function getHtml($elem): string
    {
        $error   = $elem->getError();
        $invalid = !empty($error) ? ' is-invalid' : '';
        $req     = $elem->getRequired() ? ' ' . $elem->getRequired() : '';

        $html  = '<div class="mb-3">' . PHP_EOL;
        $html .= '    <label for="' . $elem->getId() . '" class="form-label">' . $elem->getLabel() . '</label>' . PHP_EOL;
        $html .= '    <input type="date" class="form-control' . $invalid . '" name="' . $elem->getName() . '" id="' . $elem->getId() . '" value="' . $elem->getValue() . '"' . $req . '>' . PHP_EOL;
        if (!empty($error)) {
            $html .= '    <div class="'. $elem->getCssError() .'">' . $error . '</div>' . PHP_EOL;
        }
        $html .= '</div>' . PHP_EOL;
        return $html;
    }
}