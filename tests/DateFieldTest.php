<?php

namespace Cspivack\Forms\Tests;

use PHPUnit\Framework\TestCase;
use Cspivack\Forms\Fields\Date;

class DateFieldTest extends TestCase
{

	const CONFIG = [
		'name' => 'dob',
		'label' => 'What is your date of birth?'
	];

	public function testDateFieldType()
	{
		$field = new Date(static::CONFIG);
		$this->assertStringContainsString('type="date"', $field->html());
	}

	public function testDateFieldPattern()
	{
		$field = new Date(static::CONFIG);
		$this->assertStringContainsString('pattern="\d{4}-\d{2}-\d{2}"', $field->html());
	}

	public function testDateFieldTitle()
	{
		$field = new Date(static::CONFIG);
		$this->assertStringContainsString('title="YYYY-MM-DD"', $field->html());
	}

	
}