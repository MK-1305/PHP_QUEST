<?php
    class Player {
        // プレイヤーの名前を決めて、手札にカードを配る処理
        public $name;
        private $hand = [];

        public function __construct($name) {
            $this->name = $name;
        }

        // プレイヤーがカードを引く処理
        public function draw($deck) {
            $this->hand[] = $deck->deal();
        }
        // プレイヤーがカードを出す処理
        public function playCard() {
            return array_shift($this->hand);
        }
    }