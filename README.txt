This is a terminal app to run one round of (modified) Blackjack. The purpose is more of an example to show my php skills and thinking.  In this example I have used phpunit, as well as phpdocumentor

php run.php


to run the tests:

phpunit --bootstrap bootstrap_test.php .


html docs:
docs/index.html



--- Things To Note ---
There are five main objects. A Deck, a Card, a Player, a Game, and a game implementation (BlackJack).  All in all quite simple.  Here are some interesting choices I made.

1. The Game object is meant to be extended.  Some of the base methods can be used though for common games.  The main idea, is that different ruled games would extend from the base Game class.

2. The Deck object shuffles and deals.  I thought this was simpler but this could arguably be associated to a player with a type of dealer, and a dealer would act on the deck.  Allowing for game implementations that require rotating dealers.

3. The Deck object automatically assumes that it is a 52 card deck.  And as one of the test conditions about setting up the game checks to make sure there will be enough cards to go around the game would need to have knowledge of how many cards we are playing with.  As of now the game has to assume that there is only 52 cards in the deck as well.

4. The Deck object takes advantage of php's shuffle method.  This may not be ideal for situations when trying to model real world card shuffling.  Ideally it would be nice to configure the shuffling method in the config.

5. The Game object has echo's in its display methods.  This is not ideal.  There should be a renderer intialized with the construction of the game.  And all display methonds in the game would use the display methods from the assigned renderer. 

