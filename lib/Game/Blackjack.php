<?php
/**
 * The Concrete game.  This will have all the logic that is specific for the actual game of blackjack.  I.e. How this game values cards.  How this game deals.   
 * @package cardgame
 * @author Anthony Doran
 */
/**
 * The Concrete game.  This will have all the logic that is specific for the actual game of blackjack.  I.e. How this game values cards.  How this game deals.   
 *
 * @package cardgame
 * @subpackage classes
 * @author Anthony Doran
 */
	class Game_Blackjack extends Game {

		/**
		 * The construct got overridden because this game will have limitations on the number of people playing it.
		 *
		 * @param array $players 
		 * @param string $dealer 
		 */
		public function __construct($players,$dealer='Tony') {

			if (count($players) > 25) {
				throw new Exception('Too many players for this game');
			}

			#init the deck
			$this->_deck = new Deck();

			#init the players 
			foreach ($players as $player_name) {
				$this->_players[] = new Player($player_name);
			}
			$this->_players[] = new Player($dealer, Player::DEALER);
			
		}		
		
		/**
		 * shuffles the deck, deals two cards to each player, then two deals to the dealer
		 *
		 * @return void
		 */
		public function runRound() {
		
			#shuffle the deck
			$this->_deck->shuffle();
			
			#deal two cards to each player
			foreach ($this->_players as $player) {
			
				#make sure we are dealing to a player
				if ($player->type() == Player::PLAYER) {
					
					#deal two cards
					$player->hit($this->_deck->dealCard());
					$player->hit($this->_deck->dealCard());
										
				} else if ($player->type() == Player::DEALER) { 
					#save the dealer to be dealt after all the players
					$dealer = $player;
				}
				
			}
			
			#deal two cards to the dealer
			$dealer->hit($this->_deck->dealCard());
			$dealer->hit($this->_deck->dealCard());
			
		}
		
		/**
		 * This is overridden because this game values cards in its own way.  All aces are 11, and Jack, Queen, and Kings, are 10
		 *
		 * @param Card $card 
		 * @return int
		 */
		public function getCardValue($card) {
			$face_id = $card->getFaceId();
			switch ($face_id) {
				case Card::ACE:
					return 11;
					break;
				case Card::JACK:
				case Card::QUEEN:
				case Card::KING:
					return 10;
					break;
				default:
					return $face_id;
			}
		}
				
	}

