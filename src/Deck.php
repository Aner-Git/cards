<?php

namespace Fust\Cards;

use Fust\Cards\Contracts\CardProvider;

/**
 * A deck of cards
 */

class Deck{

		/**
		 * The current cards in the deck
		 */
		protected $cards; 

		/**
		 * The cards not in the deck
		 */
		protected $cardsDrawn; 


		/**
		 * A new deck of cards. 
		 * By default creates a standard 52 card deck.
		 *
		 * @param CardProvider $provider provider the initial cards for the deck
		 */
		public function __construct(CardProvider $provider = null ){
		
				if(is_null($provider)){
					$provider = new StandardDeckProvider;	
				}

				$this->cards = $provider->getCards();
		}
		
		/**
		 * Draw a card from the deck
		 */	
		public function draw(){}

		/**
		 * Get the number of cards in the deck
		 */
		public function count(){
			return count($this->cards);	
		}

		public function shuffle(Shuffable $shuffle = null){
		
		}
}
