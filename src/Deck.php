<?php

namespace Fust\Cards;

use Fust\Cards\Contracts\CardProvider;
use Fust\Cards\Contracts\Shuffleable;

/**
 * A deck of cards
 */
class Deck
{
    /**
     * The current cards in the deck
     */
    protected $cards;

    /**
     * The cards drawn. i.e. not in the deck
     */
    protected $cardsDrawn = [];

    /**
     * The shuffler for the deck
     */
    protected $shuffler = null;

    /**
     * A new deck of cards.
     * By default creates a standard 52 card deck.
     *
     * @param CardProvider $provider provider the initial cards for the deck
     */
    public function __construct(CardProvider $provider = null)
    {
        if (is_null($provider)) {
            $provider = new StandardDeckProvider;
        }

        $this->cards = $provider->getCards();
    }

    /**
     * Draw a card from the deck
     *
     * @return Card
     *
     * @throws UnderflowException
     */
    public function draw()
    {
        if ($this->count() == 0) {
            throw new \UnderflowException('No more cards in the deck!');
        }

        $card               = array_pop($this->cards);
        $this->cardsDrawn[] = $card;

        return $card;
    }

    /**
     * Draw a hand of cards from the deck
     *
     * @param integet the number of cards to draw
     *
     * @return array return array of Card
     *
     * @throws UnderflowException
     */
    public function drawHand($size = 1)
    {
        $hand = [];

        for ($i = 0; $i < $size; ++$i) {
            $hand[] = $this->draw();
        }

        return $hand;
    }

    /**
     * Get the cards in the deck
     *
     * @return array array of Cards
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Get the cards in the deck
     *
     * @return array array of Cards
     */

    public function getDrawnCards()
    {
        return $this->cardsDrawn;
    }

    /**
     * Get the number of cards in the deck
     *
     * @return integer
     */
    public function count()
    {
        return count($this->cards);
    }

    /**
     * Get the number of cards drawn
     *
     * @return integer
     */
    public function countDrawn()
    {
        return count($this->cardsDrawn);
    }

    /**
     * Reset the deck (all drawn cards are 'inserted back'), and Shuffles all the cards.
     *
     * @return bool shuffle was successful
     */
    public function shuffle()
    {
        if (is_null($this->shuffler)) {
            $this->setShuffler(new StandardShuffle);
        }

        $this->reset();

        return $this->shuffler->shuffle($this->cards);
    }

    /**
     * Set a new Shuffle algorithm
     */
    public function setShuffler(Shuffleable $s)
    {
        $this->shuffler = $s;
    }

    protected function reset()
    {
        while (count($this->cardsDrawn)) {
            $c = array_pop($this->cardsDrawn);
            array_push($this->cards, $c);
        }
    }
}
