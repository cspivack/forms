<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Form;

class FormTest extends TestCase
{

    const CONFIG = [
        'fields' => [
            [
                'label' => 'Name',
                'name' => 'name',
                'type' => Fields\Text::class,
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'type' => Fields\Email::class,
                'class' => ['half'],
            ],
            [
                'label' => 'Phone',
                'name' => 'phone',
                'type' => Fields\Phone::class,
                'class' => ['half'],
            ],
            [
                'label' => 'Your Message',
                'name' => 'text',
                'type' => Fields\Textarea::class,
            ],
        ],
        'rules' => [
            'name'  => ['required'],
            'email' => ['email', 'nullable', 'required_without:phone'],
            'phone' => ['required_without:email'],
            'text'  => ['required'],
        ],
    ];

    public function testContainsNameField()
    {
        $form = new Form(static::CONFIG);
        $this->assertStringContainsString('<input type="text" id="name" name="name" />', $form->html());
    }

}
