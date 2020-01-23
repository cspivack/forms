<?php

namespace Cspivack\Forms\Fields;

class Textarea extends BaseField
{

    public function html() : string
    {
        $label = $this->getLabel();

        $html = $label;
        $html.= '<textarea id="'.$this->name.'" name="'.$this->name.'"';

        $html = $this->addAttributes($html);

        $html.= '>'.($this->value ?? '').'</textarea>';

        return $html;
    }

}
