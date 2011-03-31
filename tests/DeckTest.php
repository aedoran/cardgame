<?php
	class DeckTest extends PHPUnit_Framework_TestCase {

		public function testSuccessfulConstruction() {
			$d = new Deck();
			$this->assertEquals(52,count($d->getDeck()));
		}

		public function testDealCard() {
			#test we get a card when we deal a card
			#test we have one card missing when we deal a card
			$d = new Deck();
			$this->assertEquals(True,is_object($d->dealCard()));
			$this->assertEquals(51,count($d->getDeck()));
		}
	}