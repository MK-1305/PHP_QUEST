<?php
    class Deck {
        private $cards = [];
    
        public function __construct() {
            $suits = ['スペード','ハート','ダイヤ','クラブ'];
            $ranks = ['A' => 14,'K' => 13,'Q' => 12,'J' => 11,'10' => 10,'9' => 9,'8' => 8,'7' => 7,'6' => 6,'5' => 5,'4' => 4,'3' => 3,'2' => 2];
            // 内容をcardsに入れていく
            foreach ($suits as $suit) {
                // Cardクラスのメンバ変数にsuitsとranksを振り分ける
                foreach ($ranks as $rank => $strength) {
                    $this->cards[] = new Card($suit, $rank, $strength);
                }
            }
            shuffle($this->cards);
        }
        // 初期化されるので違う処理で一枚ずつ出力できるようにする
        public function deal() {
            return array_shift($this->cards);
        }
    }
?>