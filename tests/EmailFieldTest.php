<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Email;

class EmailFieldTest extends TestCase
{

	const CONFIG = [
		'name' => 'email_address',
		'label' => 'What is your email address?'
	];

	public function testEmailFieldHtml()
	{
		$field = new Email(static::CONFIG);
		$this->assertStringContainsString('type="email"', $field->html());
	}

}
