<?php
	class BlackjackTest extends PHPUnit_Framework_TestCase {
		
		public function testConstruction() {
			$players = array('Gauss', 'Riemann', 'Feynman', 'Ramanujan');
			$dealer_name = 'Tony';

			$g = new Game_Blackjack($players,$dealer_name);
			$this->assertEquals(52,count($g->getDeck()));
			
			$players = $g->getPlayers();
			$this->assertEquals(5,count($players));
			
			foreach ($players as $player) {
				if ($player->type() == Player::DEALER) {
					$this->assertEquals('Tony (Dealer)',$player->name());
					return;
				}
			}
			$this->fail('Dealer Was not Found');	
		}
		
		
		public function testTooManyPlayersException() {
			$dealer_name = 'Tony';
			for ($i = 0; $i < 26;$i++) {
				$players[] = 'p'.$i;
			}
			try {
				$g = new Game_Blackjack($players,$dealer_name); 
			} catch (Exception $e) {
				$this->assertEquals($e->getMessage(),'Too many players for this game');
				return;
			}
			$this->fail('Too Many Players exception was not thrown.');
		}
		

		public function testRunRound() {
			$players = array('Gauss', 'Riemann', 'Feynman', 'Ramanujan');
			$dealer_name = 'Tony';
			$g = new Game_Blackjack($players,$dealer_name);
			$g->runRound();
			foreach ($g->getPlayers() as $player) {
				$this->assertEquals(2, count($player->getHand()));
				$this->assertGreaterThan(3,$g->getPlayersHandValue($player));
				$this->assertLessThan(23,$g->getPlayersHandValue($player));
			}
		}
	}
	
?>