<?php


namespace MyUniTests\codility;


use PHPUnit\Framework\TestCase;
use Solution\Solutions;

class SolutionsTest extends  TestCase
{
	private $solution;

	public function setUp()
	{
		$this->solution = new Solutions();
	}
	public function dataProviderForCyclicRotation()
	{
		return [
			[
				[3, 8, 9, 7, 6],
				2,
				[7, 6, 3, 8, 9]
			]
		];
	}

	public function dataProviderForNonDuplicate()
	{
		return [
			[
				[9,3,9,3,9,7,9],
				7
			]
		];
	}

	/**
	 * @dataProvider dataProviderForCyclicRotation
	 * @param $data
	 * @param $cycle
	 * @param $expected
	 */
	public function testCyclicRotation($data, $cycle, $expected)
	{
		$this->assertEquals($expected, $this->solution->ciclycRotation($data, $cycle));
	}

	/**
	 * @dataProvider dataProviderForNonDuplicate
	 * @param $data
	 * @param $expected
	 */
	public function testNoDuplicates($data, $expected)
	{
		$this->assertEquals($expected, $this->solution->nonduplicate($data));
	}

}