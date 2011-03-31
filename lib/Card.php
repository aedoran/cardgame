<?php
/**
 * Simple Card Class
 * @package cardgame
 * @author Anthony Doran
 */
/**
 * Simple Card class.
 *
 * Note the cards are constructed with the suit_ids and face_ids just out of convinience.     
 * After that suits shouldn't be refered to by number, but by the class constants.  The same applies for Ace, Kings, Queens, and Jacks.
 * <code>
 * $c = new Card(1,2);
 * if ($c->getFaceId() == Card::Hearts) {
 * ....
 * </code>
 * @package cardgame
 * @subpackage classes
 */
class Card {


	const HEARTS = 1;
	const CLUBS = 2;
	const DAIMONDS = 3;
	const SPADES = 4;

	const ACE = 1;
	const JACK = 11;
	const QUEEN = 12;
	const KING = 13;

	/**
	 * How to get readable names of suits from cards suit_id
	 *
	 * @var array
	 **/
	public static $suit_names = array(
			self::HEARTS => 'Hearts',
			self::CLUBS => 'Clubs',
			self::DAIMONDS => 'Daimonds',
			self::SPADES => 'Spades'
	);

	/**
	 * How to get readable names from the face_id
	 *
	 * @var array
	 */
	public static $face_names = array(
		self::ACE => 'Ace',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		self::JACK => 'Jack',
		self::QUEEN => 'Queen',
		self::KING => 'King'
	);

	/**
	 * @var int
	 */
	protected $_face = null;
	/**
	 * @var int
	 */
	protected $_suit = null;

	/**
	 * suit_id must be in 1 through 4, and face_id must be 1 through 13. 
	 * Done this way to make it easy to create all the cards in the deck
	 *
	 * @param int $suit_id 
	 * @param int $face_id 
	 */
	public function __construct($suit_id,$face_id) {
		if (	$suit_id > 0 
				AND $suit_id < 5 
				AND $face_id > 0
				AND $face_id < 14 
			) {
				$this->_suit = $suit_id;
				$this->_face = $face_id;
		} else {
			throw new Exception('InvalidCard');
		}
	}


	/**
	 * Handy way to get a pretty name for the card.
	 *
	 * @return string
	 * @author Anthony Doran
	 */
	public function name() {
		return self::$face_names[$this->_face] . " of " . self::$suit_names[$this->_suit];
	}


	/**
	 * Gets the face id of the card
	 *
	 * @return string
	 * @author Anthony Doran
	 */
	public function getFaceId() {
		return $this->_face;
	}


	/**
	 * Gets the suit id of the card
	 *
	 * @return void
	 * @author Anthony Doran
	 */
	public function getSuitId() {
		return $this->_suit;
	}
}