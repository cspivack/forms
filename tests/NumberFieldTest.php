<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Number;

class NumberFieldTest extends TestCase
{

	const CONFIG = [
		'name' => 'age',
		'label' => 'What is your age?'
	];

	public function testNumberFieldHtml()
	{
		$field = new Number(static::CONFIG);
		$this->assertStringContainsString('type="number"', $field->html());
	}

	public function testNumberFieldWithMaxLength()
	{
		$config = static::CONFIG;
		$config['attributes'] = [
			'maxlength' => 10,
		];

		$field = new Number($config);
		$this->assertStringContainsString('maxlength="10"', $field->html());
	}
	
}