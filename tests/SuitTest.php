<?php

use Fust\Cards\Suit;

class SuitTest extends PHPUnit_Framework_TestCase {

	public function setUp()
	{
	}
	
	public function testCreateSuit()
	{
		$club= Suit::club();
		$this->assertEquals(Suit::CLUB, $club->value());
		$this->assertEquals("club", $club->name());

		$diamond= Suit::diamond();
		$this->assertEquals(Suit::DIAMOND, $diamond->value());
		$this->assertEquals("diamond", $diamond->name());

		$heart= Suit::heart();
		$this->assertEquals(Suit::HEART, $heart->value());
		$this->assertEquals("heart", $heart->name());

		$spade= Suit::spade();
		$this->assertEquals(Suit::SPADE, $spade->value());
		$this->assertEquals("spade", $spade->name());


	}

	public function testSharedSuit()
	{
		//these should be shared 
		$spade= Suit::spade();
		$spade2= Suit::spade();

		$this->assertSame($spade, $spade2);

		//these should not be shared 
		$spade= Suit::spade();
		$spade3= Suit::spade(false);

		$this->assertNotSame($spade, $spade3);
	}

	public function testToString()
	{
		//
		$spade= Suit::spade();
		$this->assertEquals('spade', $spade);
		//
		$spade= Suit::diamond();
		$this->assertEquals('diamond', $spade);


	}
}

