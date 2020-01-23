<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Select;

class SelectFieldTest extends TestCase
{

	const CONFIG = [
		'name' => 'how_hear',
		'label' => 'How did you hear about us?',
        'options' => ['Facebook', 'Twitter', 'Instagram']
	];

	public function testSelectFieldType()
	{
		$field = new Select(static::CONFIG);
		$this->assertStringContainsString('<select', $field->html());
	}

	public function testSelectFieldOptionUnselected()
	{
		$field = new Select(static::CONFIG);
		$this->assertStringContainsString('<option value="Facebook">Facebook</option>', $field->html());
	}

    public function testSelectFieldOptionSelected()
    {
        $field = new Select(static::CONFIG, 'Facebook');
        $this->assertStringContainsString('<option value="Facebook" selected="selected">Facebook</option>', $field->html());
    }

    public function testSelectFieldOptionAssociative()
    {
        $config = static::CONFIG;
        $config['options'] = [
            'fbvalue' => 'Facebook',
            'twvalue' => 'Twitter',
            'igvalue' => 'Instagram',
        ];
        $field = new Select($config);
        $this->assertStringContainsString('<option value="fbvalue">Facebook</option>', $field->html());
    }

}
