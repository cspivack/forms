<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Text;

class TextFieldTest extends TestCase
{

	const CONFIG = [
		'name' => 'name',
		'label' => 'What is your name?'
	];

	public function testTextFieldType()
	{
		$field = new Text(static::CONFIG);
		$this->assertStringContainsString('type="text"', $field->html());
	}

	public function testTextFieldValue()
	{
		$field = new Text(static::CONFIG, 'testvalue');
		$this->assertStringContainsString('value="testvalue"', $field->html());
	}
	
}