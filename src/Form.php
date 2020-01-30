<?php

namespace Cspivack\Forms;

use Illuminate\Support\Arr;

class Form
{

    protected $data;
    protected $fields;
    protected $rules;
    protected $messages;
    protected $exclude;
    protected $mapped = false;

    public function __construct(array $formConfig, $data=[])
    {
        $this->data = $data;
        $this->fields = $formConfig['fields'];
        $this->rules = $formConfig['rules'] ?? [];
        $this->messages = $formConfig['messages'] ?? [];
        $this->exclude = $formConfig['exclude'] ?? [];
    }

    protected function printField(Fields\BaseField $field) : string
    {
        if($class = $field->getClass())
            $html = '<div class="'.$class.'">';
        else
            $html = '<div>';

        $html.= $field->html();
        $html.= '</div>';

        return $html;
    }

    protected static function getArray(object $object) : array
    {
        if(method_exists($object, 'toArray'))
            return $object->toArray();

        return (array) $object;
    }

    protected function formatData() : void
    {
        $data = (is_object($this->data)) ? $this->getArray($this->data) : $this->data;

        foreach(old() as $key => $value)
            $data[$key] = old($key);

        $this->data = $data;
    }

    public function validate($request)
    {
        $request->validate($this->rules, $this->messages);
    }

    public function getRules() : array
    {
        return $this->rules;
    }

    public function getMessages() : array
    {
        return $this->messages;
    }

    public function mapFields() : void
    {
        if($this->mapped)
            return;

        $this->formatData();

        $this->fields = array_filter(array_map(function ($config) {

            if(in_array($config['name'], $this->exclude))
                return null;

            $type = Arr::pull($config, 'type');
            $value = $this->data[$config['name']] ?? null;

            return new $type($config, $value);

        }, $this->fields));
    }

    public function html() : string
    {
        $this->mapFields();

        $html = '';

        foreach($this->fields as $field)
            $html.= $this->printField($field);

        return $html;
    }

}
