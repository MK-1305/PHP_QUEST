<?php
    // デッキを配る,手札で勝負させる
    require_once 'card.php';
    require_once 'deck.php';
    require_once 'player.php';

    class Game {
        private $players = [];
        private $deck;
        private $playerCount = 2;

        public function __construct() {
            $this->deck = new Deck();
        }

        public function addPlayer($name) {
            // インスタンスを作った時
            $this->players[] = new Player($name);
        }
        
        public function start() {
            echo "戦争を開始します。" . PHP_EOL;
            // playerCount分だけaddPlayerする
            for ($i = 0; $i < $this->playerCount; $i++) {
                $this->addPlayer("プレイヤー" . ($i + 1));
            }
            // 52枚のカードをプレイヤーの数で割る
            // $totalCards = $this->deck->getCardCount();
            // $playCards = floor($totalCards / count($this->players));
            // var_dump($playCards[0]);
            // プレイヤーにカードを配る（デッキの中が空になるまでカードを引く）
            while (!$this->deck->isEmpty()) {
                foreach ($this->players as $player) {
                    if (!$this->deck->isEmpty()) {
                        $player->draw($this->deck->deal());
                        // var_dump($player);
                    }
                }
            }
        }
        public function battle() {
            $cards = [];
            // while (!$this->player->hand == 0) {
                echo "戦争！" . PHP_EOL;
                foreach ($this->players as $index => $player) {
                    // 各プレイヤーが一枚カードを出す
                    $card = $player->playCard();
                    echo "プレイヤー" . ($index + 1) . "のカードは" . $card . "です。" . PHP_EOL;
                    $cards [] = $card;
                }
                if ($cards[0]->getStrength() > $cards[1]->getStrength()) {
                    echo "プレイヤー１が勝ちました";
                } elseif ($cards[0]->getStrength() == $cards[1]->getStrength()) {
                    echo "引き分けです。" . PHP_EOL;
                    $this->battle();
                } else {
                    echo "プレイヤー２が勝ちました。";
                }
            }
        // }

            // player1とplayer2のカードを出力（配列ではなく変数で）
            // 勝ったプレイヤーの手元に負けたプレイヤーのカードと自分のカードを入れる
            // それをデッキが0になるまで繰り返す
            // プレイヤーの手元のカードが多い方が一位、少ない方が
        // 「playCardとplayerHandのカードが違う」
        // カードの比較、引き分け処理、勝敗
        //     $player1Hand = $this->players[0]->getHand();
        //     $player2Hand = $this->players[1]->getHand();
        //     var_dump($player1Hand[0]);
        //     var_dump($player2Hand[0]);
        //     if ($player1Hand[0]->getStrength() > $player2Hand[0]->getStrength()) {
        //         echo "プレイヤー1が勝ちました。";
        //     } elseif ($player1Hand[0]->getStrength() == $player2Hand[0]->getStrength()) {
        //         echo "引き分けです。" . PHP_EOL;
        //         $this->battle();
        //     } else {
        //         echo "プレイヤー2が勝ちました。";
        //     }
        // }

        // カードの比較、引き分けの処理
        // 勝者の決定
    }
    // var_dump($cards);
    $game = new Game();
    $game->start();
    $game->battle();