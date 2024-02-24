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
            // プレイヤーにカードを配る（デッキの中が空になるまでカードを引く）
            while (!$this->deck->isEmpty()) {
                foreach ($this->players as $player) {
                    if (!$this->deck->isEmpty()) {
                        $player->draw($this->deck->deal());
                    }
                }
            }
        }
        // 手札がなくなったかをチェック
        private function isGameOver() {
            foreach ($this->players as $player) {
                if (count($player->getHand()) == 0) {
                    return true;
                }
            }
            return false;
        }

        public function battle() {
            echo "戦争を開始します。" . PHP_EOL;
            $battlefield = []; // 場札を保持する配列

            while (!$this->isGameOver()) {
                $cards = [];
                foreach ($this->players as $index => $player) {
                    if ($player->isHandEmpty()) {
                        break; // 手札が空のプレイヤーがいればループを抜ける
                    }
                    $card = $player->playCard();
                    echo "プレイヤー" . ($index + 1) . "のカードは" . $card . "です。" . PHP_EOL;
                    $cards[] = $card;
                    $battlefield[] = $card; // 場札にカードを追加
                }

                // 勝敗の決定とカードの配布
                if ($cards[0]->getStrength() > $cards[1]->getStrength()) {
                    echo "プレイヤー1が勝ちました。プレイヤー1はカードを" . count($battlefield) . "枚もらいました。" . PHP_EOL;
                    $this->players[0]->addHand($battlefield);
                    $battlefield = []; // 場札をクリア
                } elseif ($cards[0]->getStrength() < $cards[1]->getStrength()) {
                    echo "プレイヤー2が勝ちました。プレイヤー2はカードを" . count($battlefield) . "枚もらいました。" . PHP_EOL;
                    $this->players[1]->addHand($battlefield);
                    $battlefield = []; // 場札をクリア
                } else {
                    echo "引き分けです。次のラウンドへ。" . PHP_EOL;
                    // 引き分けの場合、場札にカードを残し次のラウンドへ
                }
            }
            $this->displayResult(); // ゲーム終了時に結果を表示
        }

        private function displayResult() {
            // 手札の枚数でソート
            usort($this->players, function($a, $b) {
                return $b->countHand() - $a->countHand();
            });
            
            foreach ($this->players as $index => $player) {
                echo "プレイヤー" . ($index + 1) . "の手札の枚数は" . $player->countHand() . "枚です。" . PHP_EOL;
            }
            
            // 順位の表示
            foreach ($this->players as $index => $player) {
                echo "プレイヤー" . ($index + 1) . "が" . ($index + 1) . "位です。" . PHP_EOL;
            }
            echo "戦争を終了します。" . PHP_EOL;
        }



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