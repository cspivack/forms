<?php

namespace Cspivack\Forms\Fields;

class Checkbox extends BaseField
{

    public function html() : string
    {
        $html = '<input type="hidden" name="'.$this->name.'" value="0" />';
        $html.= '<input type="checkbox" id="'.$this->name.'" name="'.$this->name.'" value="1"';

        $html = $this->addAttributes($html);

        if($this->value)
            $html.= ' checked';

        $html.= ' />';

        $html.= $this->getLabel();

        return $html;
    }

}
