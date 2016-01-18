<?php

use Fust\Cards\StandardDeckProvider;

class StandardDeckProviderTest extends PHPUnit_Framework_TestCase {

	public function setUp()
	{
	}

	
	public function testCardCount()
	{
		$provider = new StandardDeckProvider;

		$cards = $provider->getCards();

		$this->assertCount(52, $cards);
	}

	public function testCardsCountInSuit()
	{
		$provider = new StandardDeckProvider;

		$cards = $provider->getCards();

		$suit['club'] = 0;
		$suit['diamond'] = 0;
		$suit['heart'] = 0;
		$suit['spade'] = 0;

		foreach($cards as $c){
			++$suit[$c->suitName()];	
		}
		
		$this->assertEquals(13, $suit['club']);
		$this->assertEquals(13, $suit['diamond']);
		$this->assertEquals(13, $suit['heart']);
		$this->assertEquals(13, $suit['spade']);
	}
}

