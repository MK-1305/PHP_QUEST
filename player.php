<?php
    class Player {
        // プレイヤーの名前を決めて、手札にカードを配る処理
        public $name;
        private $hand = [];

        public function __construct($name) {
            $this->name = $name;
        }

        // プレイヤーがカードを手札に追加する
        public function draw(Card $card) {
            $this->hand[] = $card; // 引数で受け取ったCardオブジェクトを手札に追加
        }
        // プレイヤーがカードを出す処理
        public function playCard() {
            return array_shift($this->hand);
        }
        // 相手のカードを手札に加える
        public function addHand($card) {
            $this->hand[] = $card;
        }
    }