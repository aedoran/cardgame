<?php
	class PlayerTest extends PHPUnit_Framework_TestCase {
	
		public function testPlayerConstruction() {
			$player = new Player('tony');
			$this->assertEquals('tony (Player)',$player->name());
			$player = new Player('tony',Player::DEALER);
			$this->assertEquals('tony (Dealer)',$player->name());
		}
		
	}