<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Textarea;

class TextareaFieldTest extends TestCase
{

    const CONFIG = [
        'name' => 'message',
        'label' => 'What is your message?'
    ];

    public function testTextFieldType()
    {
        $field = new Textarea(static::CONFIG);
        $this->assertStringContainsString('<textarea', $field->html());
    }

    public function testTextFieldValue()
    {
        $field = new Textarea(static::CONFIG, 'testvalue');
        $this->assertStringContainsString('testvalue</textarea>', $field->html());
    }

}
