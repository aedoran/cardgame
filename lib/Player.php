<?php
/**
 * Just has the Player Class.
 *
 * @package cardgame
 * @author Anthony Doran
 */



	/**
	 * Player Class. Players have a hand, which is simply an array of cards, a type (dealer or player), and a name.  This class also has the methods that manipulate the hand
	 *
	 * @package cardgame
	 * @subpackage classes
	 */
	class Player {

		
		const PLAYER = 1;
		const DEALER = 2;
		
		
		/**
		 * Used to get pretty names based on type.
		 *
		 * @var array
		 **/
		public static $type_name = array(
				self::PLAYER => 'Player',
				self::DEALER => 'Dealer'
		);
		
		/**
		 * Internal array of cards 
		 *
		 * @var array
		 **/
		protected $_hand = null;
		/**
		 * Name of the player
		 *
		 * @var string
		 **/
		protected $_name = null;
		/**
		 * Type of the player
		 *
		 * @var int
		 */
		protected $_type = null;
		
		
		/**
		 * All players have to have names, If the player type isn't specified. it defaults to player. If type is used initialize with classes constants.
		 *
		 * @param string $name 
		 * @param int $type 
		 */
		public function __construct($name,$type=self::PLAYER) {
			$this->_name = $name;
			$this->_type = $type;
		}

		/**
		 * This is set to make it easier to work with arrays of players. 
		 *
		 * @return string
		 */
		public function __toString() {
			return $this->name();
		}
		
		/**
		 * Gets the name with the type of player
		 *
		 * @return string
		 */
		public function name() {
			return $this->_name . ' ('.self::$type_name[$this->_type].')';
		}
		
		/**
		 * Simple getter for type.
		 *
		 * @return int
		 */
		public function type() {
			return $this->_type;
		}
		
		/**
		 * Adds a card to the hand
		 *
		 * @param Card $card 
		 * @return void
		 */
		public function hit($card) {
			$this->_hand[] = $card;
		}
		
		
		/**
		 * Removes the current hand. To making it easier to redeal.
		 *
		 * @return void
		 */
		public function removeHand() {
			$this->_hand[] = array();
		}
		
		
		
		/**
		 * Get the current players hand
		 *
		 * @return array
		 */
		public function getHand() {
			return $this->_hand;
		}
		
		
		
		/**
		 * returns a string representation of the current hand
		 *
		 * @return string
		 */
		public function displayHand() {
			$out = array();
			foreach ($this->_hand as $card) {
				$out[] = $card->name();
				
			}
			
			return implode(',',$out);
		}
		
		
	}