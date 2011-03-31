<?php
/**
 * The deck. Manages the stack of cards. 
 * @package cardgame
 * @author Anthony Doran
 */

/**
 * The deck. Manages the stack of cards.  Holds onto an array. Has the ability deal, shuffle and create the cards used in the deck.
 *
 * @package cardgame
 * @subpackage classes
 * @author Anthony Doran
 */
	class Deck {

		/**
		 * The internel deck.
		 *
		 * @var array
		 */
		protected $_deck = array();
		
		/**
		 * Simply creates the deck.  right now it just creates the cards on initialization.
		 * 
		 */		
		public function __construct() {
			$this->initDeck();
		}
		
		/**
		 * Just creates the 52 card deck. Iterates through the possible cards and sets them to the internal deck.
		 *
		 * @return void
		 */
		public function initDeck() {
			for ($i=1;$i<=4;$i++) {
				for ($j=1;$j<=13;$j++) {
					$this->_deck[] = new Card($i,$j);
				}
			}
		}
		
		
		/**
		 * Shuffles the current deck.  
		 *
		 * @return void
		 */
		public function shuffle() {
			shuffle($this->_deck);
		}
		
		/**
		 * Returns the top card and removes it from its deck.
		 *
		 * @return Card
		 **/
		public function dealCard() {
			$card = $this->_deck[0];
			$this->_deck = array_slice($this->_deck,1);
			return $card;
		}
		
		/**
		 * Simple Getter for the deck
		 *
		 * @return array
		 */		
		public function getDeck() {
			return $this->_deck;
		}
		
		
	}