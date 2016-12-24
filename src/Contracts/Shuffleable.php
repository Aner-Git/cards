<?php

namespace Fust\Cards\Contracts;

/**
 * Shuffles the cards for the deck.
 *
 */
interface Shuffleable
{
     
    /**
     * Shuffles the deck of cards 
     *
     * @return bool  
     */
    public function shuffle(array &$cards);
}
