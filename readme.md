
A standard 52-card deck is provided by default, but one can customize to build any deck needed. Create Bridge, BlackJack, Pocker and more...

## Installation

Pull in the package through Composer.

Run `composer require fust/cards`


## Usage

To start using the deck...

```php  

$d = new Deck;

$d->shuffle();

$hand1 = $d->drawHand(10);
$hand2 = $d->drawHand(10);

//to draw a single card
$card = deck->draw();

$deck->count(); 

``` 

When the game is over, you'll need to reset the deck. Simply shuffle again. The deck now has all the cards (including drawn).
```php  
New game...
$deck->shuffle();

``` 


To create a deck for say a game that has more/less cards, implement a CardProviver

```php
class MyGameDeckProvider implements CardProvider{
    
    public function getCards(){

        //return an array of card for MyGame 
	}
}

```
You may also want to look at:

- `Shuffleable` for shuffling the cards
- `CardProvider` for providig cards to the deck


**The current implementation doen't let adding  cards back to deck after drawing them.**






