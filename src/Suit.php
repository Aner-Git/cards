<?php

namespace Fust\Cards;

/**
 * A suit of cards
 */
final class Suit{

	const CLUB 		= 100;
	const DIAMOND 	= 101;
	const HEART 	= 102;
	const SPADE 	= 103;
	
	/**
	 * The suits the were instatiated. 
	 * Since suits are imutable we save some space
	 */
	private static $suits = array();

	private function __construct($suit){

		$this->suit= $suit;
		
	}
	
	/**
	 * Make a Club suit
	 * 
	 * @param bool $shareable share an instance of the suit
	 * @return Suit
	 */
	public static function club($shareable = true)	{

			if(!$shareable){
				return new Suit(static::CLUB);
			}

			return static::makeSuit(static::CLUB);
	}

	/**
	 * Make a Diamnod suit
	 * 
	 * @param bool $shareable share an instance of the suit
	 * @return Suit
	 */
	public static function diamond($shareable = true)	{

			if(!$shareable){
				return new Suit(static::DIAMOND);
			}

			return static::makeSuit(static::DIAMOND);
	}

	/**
	 * Make a Heart suit
	 * 
	 * @param bool $shareable share an instance of the suit
	 * @return Suit
	 */
	public static function heart($shareable = true)	{

			if(!$shareable){
				return new Suit(static::HEART);
			}

			return static::makeSuit(static::HEART);
	}

	/**
	 * Make a Spade suit
	 * 
	 * @param bool $shareable share an instance of the suit
	 * @return Suit
	 */
	public static function spade($shareable = true)	{

			if(!$shareable){
				return new Suit(static::SPADE);
			}

			return static::makeSuit(static::SPADE);
	}

	
	private static function makeSuit($suit){

		if(array_key_exists($suit, static::$suits)){
			//do nothing
		}else{

			static::$suits[$suit] = new static($suit);		
		}	

		return static::$suits[$suit];
	}

	/**
	 * Get the suit unique Id
	 *
	 * @return integer
	 */
	public function value(){

		return $this->suit;	

	}

	/**
	 * Get the suit name 
	 *
	 * @return string 
	 */
	public function name(){
	
			switch($this->suit){
				case 100: return 'club';	
				case 101: return 'diamond';	
				case 102: return 'heart';	
				case 103: return 'spade';	
			}	
	}

	public function __toString(){

		return $this->name();
	}
}
