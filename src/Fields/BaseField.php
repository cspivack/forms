<?php

namespace Cspivack\Forms\Fields;

use Illuminate\Support\Arr;

abstract class BaseField
{

    protected $label;
    protected $name;
    protected $options;
    protected $class;
    protected $attributes;
    protected $value;

    public function __construct(array $config, $value=null)
    {
        $this->label = $config['label'];
        $this->name = $config['name'];
        $this->options = $config['options'] ?? [];
        $this->class = $config['class'] ?? null;
        $this->attributes = $config['attributes'] ?? [];
        $this->value = $value;
    }

    public function getLabel() : string
    {
        return '<label for="'.$this->name.'">'.$this->label.'</label>';
    }

    public function getOptions() : array
    {
        if($this->associative($this->options))
            return $this->options;

        $options = [];

        foreach($this->options as $value)
            $options[$value] = $value;

        return $options;
    }

    protected function associative(array $array) : bool
    {
        return array_keys($array) !== range(0, count($array) - 1);
    }

    public function getClass() : ?string
    {
        if(is_array($this->class))
            return implode(' ', $this->class);

        return $this->class;
    }

    public function getAttributes() : array
    {
        return $this->attributes;
    }

    protected function addAttributes(string $html) : string
    {
        foreach($this->getAttributes() as $k => $v)
            $html.= ' '.$k.'="'.$v.'"';

        return $html;
    }

    abstract public function html() : string;

}
