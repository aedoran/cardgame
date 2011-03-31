<?php
/**
 * Base class for all cardgames to extend.
 * @package cardgame
 * @author Anthony Doran
 */

	/**
	 * Base class for all cardgames to extend.  All games will have a deck, a group of players, a round, a way to find value for a hand, and a way to find a value for a card.  This also has the display methods.
	 *
	 * @package cardgame
	 * @subpackage classes
	 * @author Anthony Doran
	 */
	abstract class Game {
		
		/**
		 * A deck instance.
		 *
		 * @var Deck
		 **/
		protected $_deck = null;
		
		/**
		 * An array of Players 
		 *
		 * @var array
		 **/
		protected $_players = null;
		
		
		
		/**
		 * This is the main entry point.  $players are on array of player names, and $dealer is just a dealer name.  The construct simply creates the deck, and the players. 
		 *
		 * @param array $players 
		 * @param string $dealer 
		 */
		public function __construct($players,$dealer) {

			#init the deck
			$this->_deck = new Deck();

			#init the players 
			foreach ($players as $player_name) {
				$this->_players[] = new Player($player_name);
			}
			$this->_players[] = new Player($dealer, Player::DEALER);
			
		}
		
		
		/**
		 * This ouptputs the players name, their hand, the players hand value and displays who won.
		 *
		 * @return void
		 */
		public function displayRound() {
			foreach ($this->_players as $player) {
				echo $player->name() . " has:\n";
				echo " ".$player->displayHand()."\n";
				echo " score:".$this->getPlayersHandValue($player)."\n";
			}
			$this->displayWinner();
		}
		
		/**
		 * This figures out how a players hand is valued. 
		 *
		 * @param Player $player 
		 * @return int
		 */
		public function getPlayersHandValue($player) {
			$value = 0;
			foreach ($player->getHand() as $card) {
				$value = $value + $this->getCardValue($card);
			}
			return $value;
		}
		
		/**
		 * This determines a cards value.  It is up to the game being played that figures how valuable a card is.
		 *
		 * @param Card $card 
		 * @return int
		 */
		public function getCardValue($card) {
			return $card->getFaceId();
		}
		
		/**
		 * This goes through the list of players in the game, and determines their hand values, and returns an array of people who have the top valued hand.
		 *
		 * @return array
		 */
		public function getWinners() {
			$players_with_high_hand = array();
			$high_hand_value = 0;
			
			foreach ($this->_players as $player) {
				$hand_value = $this->getPlayersHandValue($player);
				if ($hand_value > $high_hand_value) {
					$players_with_high_hand = array($player);
					$high_hand_value = $hand_value;
				} elseif ($hand_value == $high_hand_value) {
					$players_with_high_hand[] = $player;
				}
			}
			
			return $players_with_high_hand;
		}
		
		/**
		 * This gets a pretty display for who won
		 *
		 * @return void
		 * @author Anthony Doran
		 */
		public function displayWinner() {
			$winners = $this->getWinners();
			if (count($winners) == 1) {
				echo $winners[0]->name(). " has won.\n";
			} else {
				echo implode(',',$winners). " have tied for first.\n";
			}
		}
		
		
		/**
		 * Getter. gets an array of Players.
		 *
		 * @return array
		 * @author Anthony Doran
		 */
		public function getPlayers() {
			return $this->_players;
		}
		
		/**
		 * Getter. 
		 *
		 * @return Deck
		 * @author Anthony Doran
		 */
		public function getDeck() {
			return $this->_deck->getDeck();
		}
		
	}