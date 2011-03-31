This is a terminal app to run one round of (modified) Blackjack. The purpose is more of an example to show my php skills and thinking.  In this example I have used phpunit, as well as phpdocumentor

to run:
php run.php


to run the tests:
phpunit --bootstrap bootstrap_test.php .


html doc source:
docs/index.html



--- Things To Note ---
This was meant to be a simple code example. I started with five main objects. A Deck, a Card, a Player, a Game, and a game implementation (BlackJack).  All in all quite simple.  Here are some interesting thoughts I had.

1. The Game object is meant to be extended.  Some of the base methods can be used though for common games.  The main idea, is that different ruled games would extend from the base Game class.

2. The Deck object shuffles and deals.  I thought this was simpler but this could arguably be associated to a player with a type of dealer, and a dealer would act on the deck.  Allowing for game implementations that require rotating dealers.

3. The Game object decides the value of a card, not the card itself. As well as the value of a hand.

4. The Player object also includes everything about their hand.  This might not be wise becuase some games have hands that are not really associated to players.

5. The Game object has echo's in its display methods.  This is not ideal.  There should be a renderer intialized with the construction of the game.  And all display methonds in the game would use the display methods from the assigned renderer. 

