# トランプゲームの戦争

トランプゲームの戦争をオブジェクト指向を使って実装しましょう。オブジェクト指向でプログラムを作成した実績を作るのが目的です。

戦争は、プレイヤーがカードを出し合って、カードの数の大小を比べて、強いカードを出したほうが勝ちとなり、カードをもらいます。このようにして続けていき、誰かの手札がなくなったら終了します。最後に多くカードを持っていた人が勝ちになります。ルールは次の通りです。

- 52枚のカードを使います。ジョーカーは使用しません。
- プレイヤーの人数は2〜5人です。
- 開始時、親になった人は、カードをよく切り、各プレイヤーに裏向きで均等に配ります。配られたカードを手札といいます。手札は裏向きのままにしておきます。
- 「戦争！」の掛け声とともに、各プレイヤーは裏向きの手札束の一番上のカードを、場にオモテ向きに置きます。
- 出したカードの強さの大小を比べて、一番強いカードを出した人が勝ちとなり、場札（手札からめくられ場にオモテ向きに出されたカード）をもらいます。カードは強い方から、A、K、Q、J、10、9、8、7、6、5、4、3、2 の順番になります。勝者がとった場札は手元に置いておき、手札が0枚になった際によく切って手札に加えます。
- 一番強い数値が複数出た場合、もう一度手札からカードを出します。そして、勝ったプレイヤーが場札をもらいます。同じ数字が続いたら、勝ち負けが決まるまでカードを出します。
- 誰かの手札がなくなったらゲーム終了です。この時点での手札の枚数が多い順に1位、2位、・・・という順位になります。

## ステップ1

プレイヤー2人の簡易的な戦争のコンソールゲームを作成しましょう。以下のルールの元、コンソール（ターミナル）上で動作するようにします。

- 52枚のカードを使います。ジョーカーは使用しません。
- プレイヤーの人数は2人です。
- 開始時、親になった人は、カードをよく切り、各プレイヤーに裏向きで均等に配ります。配られたカードを手札といいます。手札は裏向きのままにしておきます。
- 「戦争！」の掛け声とともに、各プレイヤーは裏向きの手札束の一番上のカードを、場にオモテ向きに置きます。
- 出したカードの強さの大小を比べて、一番強いカードを出した人が勝ちとなり、場札（手札からめくられ場にオモテ向きに出されたカード）をもらいます。カードは強い方から、A、K、Q、J、10、9、8、7、6、5、4、3、2 の順番になります。
- 一番強い数値が複数出た場合、もう一度手札からカードを出します。そして、勝ったプレイヤーが場札をもらいます。同じ数字が続いたら、勝ち負けが決まるまでカードを出します。
- 勝ち負けが決まったら、勝ったプレイヤーの名前を表示してください。今回は誰かの手札がなくなるまで続ける必要はありません。

コンソール画面のイメージは次の通りです。

```bash
戦争を開始します。
カードが配られました。
戦争！
プレイヤー1のカードはハートの7です。
プレイヤー2のカードはクラブの7です。
引き分けです。
戦争！
プレイヤー1のカードはダイヤのQです。
プレイヤー2のカードはスペードの7です。
プレイヤー1が勝ちました。
戦争を終了します。
```

## ステップ2

誰かの手札がなくなったらゲーム終了し、順位を表示するようにしましょう。この時点での手札の枚数が多い順に1位、2位、・・・という順位になります。

コンソール画面のイメージは次の通りです。

```bash
戦争を開始します。
カードが配られました。
戦争！
プレイヤー1のカードはハートの7です。
プレイヤー2のカードはクラブの8です。
引き分けです。
戦争！
プレイヤー1のカードはダイヤのQです。
プレイヤー2のカードはスペードの7です。
プレイヤー1が勝ちました。プレイヤー1はカードを2枚もらいました。
戦争！
...（省略）
プレイヤー2の手札がなくなりました。
プレイヤー1の手札の枚数は52枚です。プレイヤー2の手札の枚数は0枚です。
プレイヤー1が1位、プレイヤー2が2位です。
戦争を終了します。
```

## ステップ3(advanced)

以下のルールを追加しましょう。

- プレイヤーの人数を2〜5人で選択できるようにします。
- プレイヤーごとに名前を設定できるようにします。

コンソール画面のイメージは次の通りです。

```bash
戦争を開始します。
プレイヤーの人数を入力してください（2〜5）: 3
プレイヤー1の名前を入力してください: たろう
プレイヤー2の名前を入力してください: じろう
プレイヤー3の名前を入力してください: さぶろう
カードが配られました。
戦争！
たろうのカードはハートの7です。
...（省略）
```

## ステップ4(advanced)

以下のルールを追加しましょう。

- ジョーカー1枚を最強のカードとして加ます。
- 出された一番強いカードがAで複数あった場合、「スペードの A」は「世界一」と呼ばれ、無条件で場札をとることができます。

## 実行方法

以下のコマンドを実行するとゲームが開始されます
```bash
php game.php
```
