#Cards. Build a Card game in minutes. 

A standard 52-card deck is provided by default, but one can customize to build any deck needed. Create Bridge, BlackJack, Pocker and more...

## Installation

Pull in the package through Composer.

Run `composer require noeldavies/cards`


## Usage

To start using the deck...

```php  

$d = new Deck;

$d->shuffle();

//deal... an array of cards
$hand1 = $d->drawHand(10);
$hand2 = $d->drawHand(10);

//draw a single card
$card = deck->draw();

//do something with card
$value = $card->value();
$suit = $card->suit();

//special card?
if($card->isFaceCard()){...}

//cards left in the deck
$deck->count(); 

``` 

When the game is over, simply reset the deck by shuffle(ing). The deck now has all the cards (including drawn).
```php  
//start a new game...
$deck->shuffle();

``` 


To customise the deck of cards (i.e. which cards are part of the deck) one can implement the CardProvider interface

```php
class MyGameDeckProvider implements CardProvider{
    
    public function getCards(){

        //return an array of card for MyGame 
	}
}
//...
$deck = new Deck(new MyGameDeckProvider);
```
You may also want to look at:

- `Shuffleable` for shuffling the cards
- `CardProvider` for providig cards to the deck


**The current implementation doen't let putting cards back into the deck after drawing them. Shuffle resets the deck**






