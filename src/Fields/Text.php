<?php

namespace Cspivack\Forms\Fields;

class Text extends BaseField
{

    protected $type = 'text';

    public function html() : string
    {
        $html = $this->getLabel();
        $html.= '<input type="'.$this->type.'" id="'.$this->name.'" name="'.$this->name.'"';

        $html = $this->addAttributes($html);

        $html.= ' />';

        return $html;
    }

    public function getAttributes() : array
    {
        $attributes = parent::getAttributes();

        if($this->value)
            $attributes['value'] = $this->value;

        return $attributes;
    }

}
