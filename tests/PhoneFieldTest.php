<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Phone;

class PhoneFieldTest extends TestCase
{

	const CONFIG = [
		'name' => 'phone',
		'label' => 'What is your phone number?'
	];

	public function testPhoneFieldHtml()
	{
		$field = new Phone(static::CONFIG);
		$this->assertStringContainsString('type="tel"', $field->html());
	}
	
}