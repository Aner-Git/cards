<?php

namespace NoelDavies\Cards;

use NoelDavies\Cards\Contracts\Shuffleable;

/**
 * Shuffles an array of cards using php shuffle
 */
class StandardShuffle implements Shuffleable
{
    public function shuffle(array &$cards)
    {
        return shuffle($cards);
    }
}

