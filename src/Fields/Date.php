<?php

namespace Cspivack\Forms\Fields;

class Date extends Text
{

    protected $type = 'date';

    public function getAttributes() : array
    {
        $attributes = parent::getAttributes();

        if(!isset($attributes['pattern']))
            $attributes['pattern'] = '\d{4}-\d{2}-\d{2}';

        if(!isset($attributes['title']))
            $attributes['title'] = 'YYYY-MM-DD';

        return $attributes;
    }

}
