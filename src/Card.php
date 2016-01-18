<?php

namespace Fust\Cards;

/**
 * A card
 *
 * One of the standard 52 playing cards
 * Ace,2,3,4,5,6,7,8,9,10,Jack,Queen,King
 */
class Card{

	const ACE 	= 100;
	const JACK 	= 101;
	const QUEEN = 102;
	const KING 	= 103;

	/**
	 * The suit of this card
	 * @var Suit
	 */
	protected $suit;

	/**
	 * Face value 
	 * @var int 
	 */
	protected $faceValue;
	
	/**
	 * A new playing card
	 * @param int $faceValue the face value of the card.
	 * @param Suit $suit the suit of the card.
	 *
	 * @throws \InvalidArgumentException
	 */	
	public function __construct($faceValue, Suit $suit){

		if($this->isValidFaceValue($faceValue)){

			$this->faceValue = $faceValue; 
			$this->suit= $suit; 
			
		}else{
			throw new \InvalidArgumentException("The face value in not valide: $faceValue");			
		}
	}
	

	private function isValidFaceValue($value){

			if($value >= 2 && $value <= 10){
					return true;
			}

			if($this->isFaceCardOrAce($value)){
					return true;
			}

			return false;
	}

	private function isFaceCardOrAce($value){

		return (
				$value == static::ACE 
				||
				$value == static::JACK 
				||
				$value == static::QUEEN
				||
				$value == static::KING);

	}

	/**
	 * Get the Face value of the card
	 *
	 * @return int face value
	 */
	public function value(){
		
		return $this->faceValue; 	
	}

	/**
	 * Get the Suit of the card
	 *
	 * @return Suit 
	 */
	public function suit(){
		
		return $this->suit; 	
	}

	/**
	 * Get the suit name the card
	 *
	 * @return string 
	 */
	public function suitName(){
		
		return $this->suit->name(); 	
	}

	/*
	 * Is this an Ace
	 *
	 * @return bool
	 */
	public function isAce(){

		return $this->faceValue == static::ACE;	
	}

	/**
	 * Is Face card. True if the card is King,Queen or Jack 
	 *
	 * @return bool
	 */
	public function isFaceCard(){

		$face = $this->isKing() || $this->isQueen() || $this->isJack();

		return $face; 
	}

	/**
	 * Is this a King 
	 *
	 * @return bool
	 */
	public function isKing(){

		return $this->faceValue == static::KING;	
	}

	/**
	 * Is this a Queen 
	 *
	 * @return bool
	 */
	public function isQueen(){

		return $this->faceValue == static::QUEEN;	
	}

	/**
	 * Is this a Jack 
	 *
	 * @return bool
	 */
	public function isJack(){

		return $this->faceValue == static::JACK;	
	}
}

