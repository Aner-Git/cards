<?php

namespace Fust\Cards;

use Fust\Cards\Contracts\CardProvider;

/**
 * The standards cards in a 52 card deck
 */
class StandardDeckProvider implements CardProvider
{
    public function getCards()
    {
        $cards = [];

        $suits = [Suit::club(), Suit::diamond(), Suit::heart(), Suit::spade()];

        foreach ($suits as $suit) {

            $this->addCards($cards, $suit);
        }

        return $cards;
    }

    private function addCards(&$cards, $suit)
    {
        $values   = range(2, 10);
        $values[] = Card::ACE;
        $values[] = Card::JACK;
        $values[] = Card::QUEEN;
        $values[] = Card::KING;

        foreach ($values as $v) {
            $cards[] = new Card($v, $suit);
        }
    }
}
