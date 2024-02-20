<?php
    // バトルするカードについての処理
    class Card {
        public $suit;
        public $rank;
        public $strength;
        // 一回ずつ勝負させるので上書きする
        public function __construct($suit, $rank, $strength) {
            $this->suit = $suit;
            $this->rank = $suit;
            $this->strength = $strength;
        }
    }
?>
