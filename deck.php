<?php
    class Deck {
        private $cards = [];
    
        public function __construct() {
            $suits = ['スペード', 'ハート', 'ダイヤ', 'クラブ'];
            $ranks = ['A', 'K', 'Q', 'J', '10', '9', '8', '7', '6', '5', '4', '3', '2'];
            $strengths = range(14, 2, -1);
            foreach ($suits as $suit) {
            foreach ($ranks as $index => $rank) {
                $strength = $strengths[$index]; // 強さはranksの順番に対応
                $this->cards[] = new Card($suit, $rank, $strength);
            }
        }
            shuffle($this->cards);
        }
        public function getCardCount() {
            return count($this->cards);
        }
        public function isEmpty() {
            return empty($this->cards);
        }
        // デッキからカードを一枚引く
        public function deal() {
            return array_shift($this->cards);
        }
    }
?>