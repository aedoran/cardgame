<?php
	class CardTest extends PHPUnit_Framework_TestCase {
		
		
		public function testSuccessfulConstruction() {
			$card = new Card(1,2);
			$this->assertEquals(2,$card->getFaceId());
			$this->assertEquals(1,$card->getSuitId());
		}
		
		public function testExceptionConstruction() {
			try {
				$card = new Card(10000, 10000); 
			} catch (Exception $e) {
				$this->assertEquals($e->getMessage(),'InvalidCard');
				return;
			}
			$this->fail('Invalid Card exception was not thrown.');

		}
	}