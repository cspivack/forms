<?php

namespace Cspivack\Forms\Fields;

class Select extends BaseField
{

    public function html() : string
    {
        $label = $this->getLabel();

        $html = $label;
        $html.= '<select id="'.$this->name.'" name="'.$this->name.'"';

        $html = $this->addAttributes($html);

        $html.= '>';

        $html.= '<option value="">'.'Please select a value'.'</option>';

        foreach($this->getOptions() as $value => $text)
            $html.= '<option value="'.$value.'"'.($value===$this->value ? ' selected="selected"' : '').'>'.$text.'</option>';

        $html.= '</select>';

        return $html;
    }

}
