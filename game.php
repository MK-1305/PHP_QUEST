<?php
    // デッキを配る,手札で勝負させる
    require_once 'card.php';
    require_once 'deck.php';
    require_once 'player.php';

    class Game {
        private $players = [];
        private $deck;
        // private $playerCount = 2;

        public function __construct() {
            $this->deck = new Deck();
        }

        public function addPlayer($name) {
            // インスタンスを作った時
            $this->players[] = new Player($name);
        }
        
        public function start() {
            $playerCount = 2;
            echo "戦争を開始します。" . PHP_EOL;
            // playerCount分だけaddPlayerする
            for ($i = 0; $i < $this->$playerCount; $i++) {
                $this->addPlayer("プレイヤー");
            }
            // 52枚のカードをプレイヤーの数で割る
            $playCards = count($this->deck->cards) / count($this->players);
            // floor関数で小数点を意識する(int)
            // プレイヤーにカードを配る
            foreach ($this->players as $player) {
                for ($i = 0; $i < $playCards; $i++) {
                    $player->draw($this->deck->deal());
                }
            }
        }
        private function battle() {
            $cards = [];
            foreach ($this->players as $index => $player) {
                // 各プレイヤーが一枚カードを出す
                $card = $player->playCard();
                echo "プレイヤー" . ($index + 1) . "のカードは" . $card . "です。" . PHP_EOL;
                $cards [] = $card;
                var_dump($cards);
            }
        }
        // カードの比較、引き分けの処理
        // 勝者の決定
    }
    $game = new Game();
    var_dump($game);
    // $game->start();