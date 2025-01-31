<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';

} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['name'];
	$email = $_POST['email'];
	$subject = '【自動送信】問い合わせ';
    $message = $_POST['message'];

    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';

    // 空チェック
    if ($name == '' || $email == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }

    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = 'info@en-gei.co.jp'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email;

        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;

        // メール送信
        mb_send_mail($to, $subject, $message, $headers);

        // 完了メッセージ
        $complete_msg = '送信されました！';

        // 全てクリア
        $name = '';
        $email = '';
        $message = '';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="ENGEI">
    <meta property="og:description" content="未経験からエンジニアを目指したい">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://en-gei.co.jp/">
    <meta property="og:image" content="https://en-gei.co.jp/assets/images/thumbnail.png">
    <meta property="og:site_name" content="ENGEI">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@engei_engineers">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/stylesheets/style.css" />
    <title>ENGEI</title>
  </head>
  <body>
    <div id="container">
      <header class="l-header">
        <a href="#container">
          <img
            class="l-header__logo"
            src="./assets/images/logo.svg"
            alt="ENGEI"
          />
        </a>
        <!-- 折り畳み展開ポインタ -->
        <a>
          <img
            src="./assets/images/sun.png"
            alt="太陽"
            class="l-header__icon"
          />
        </a>
        <div class="l-header__sunBorder">
          <span></span>
          <span></span>
        </div>
        <!--// 折り畳み展開ポインタ -->
        <!-- 折り畳まれ部分 -->
        <div id="open" style="display: none; clear: both">
          <nav>
            <ul class="l-header__menu">
              <li>
                <a href="#container"
                  ><img
                    src="./assets/images/top.svg"
                    alt="TOP"
                    class="l-header__menu--top"
                /></a>
              </li>
              <li>
                <a href="#ourVision"
                  ><img
                    src="./assets/images/ourVision.svg"
                    alt="OUR VISION"
                    class="l-header__menu--vision"
                /></a>
              </li>
              <li>
                <a href="#whatWeDo"
                  ><img
                    src="./assets/images/whatWeDo-text.svg"
                    alt="WHAT WE DO"
                    class="l-header__menu--whatWeDo"
                /></a>
              </li>
              <li>
                <a href="#company"
                  ><img
                    src="./assets/images/company-logo.svg"
                    alt="COMPANY"
                    class="l-header__menu--company"
                /></a>
              </li>
              <li>
                <a href="#contact"
                  ><img
                    src="./assets/images/contact.svg"
                    alt="CONTACT"
                    class="l-header__menu--contact"
                /></a>
              </li>
            </ul>
          </nav>
        </div>
        <!--// 折り畳まれ部分 -->
      </header>
      <div class="l-hero">
        <img src="./assets/images/hero.svg" alt="ENGEI" class="l-hero__logo" />
      </div>
      <main class="l-main">
        <section class="p-enthusiasm">
          <!-- スクロールで左から挿入 -->
          <div class="p-sliderTopLeft show"></div>
          <img
            src="./assets/images/enthusiasm.svg"
            alt="種から花咲くまでエンジニアを育てる園芸店"
            class="p-enthusiasm__image"
          />
        </section>
        <section class="p-person">
          <img
            src="./assets/images/person-title.svg"
            alt="こんな人にピッタリ"
            class="p-person__title"
          />
          <ul class="p-person__box">
            <li>
              <img
                src="./assets/images/unexperienced.png"
                alt="未経験からエンジニアを目指したい"
                class="p-person__box--image"
              />
              <p class="p-person__box--unexperiencedText">
                <span>未経験</span>からエンジニアを<br />目指したい
              </p>
            </li>
            <li>
              <img
                src="./assets/images/freelance.png"
                alt="将来フリーランスで自由な働き方をしたい"
                class="p-person__box--image"
              />
              <p class="p-person__box--freelanceText">
                将来<span>フリーランス</span>で<br />自由な働き方をしたい
              </p>
            </li>
            <li>
              <img
                src="./assets/images/engineer.png"
                alt="大手企業でエンジニアとして活躍したい"
                class="p-person__box--image"
              />
              <p class="p-person__box--engineerText">
                <span>大手企業</span>で<br />エンジニアとして活躍したい
              </p>
            </li>
          </ul>
          <!-- スクロールで左から挿入 -->
          <div class="p-sliderBottomLeft show"></div>
          <!-- スクロールで右から挿入 -->
          <div class="p-sliderBottomRight show"></div>
          <div class="p-person__introduction"></div>  
        </section>
        <!-- OUR VISION -->
        <div id="ourVision">
          <section class="p-vision">
            <img
              src="./assets/images/ourVision.svg"
              alt="OUR VISION"
              class="p-vision__title"
            />
            <ul class="p-vision__box">
              <li>
                <div class="p-vision__plant">
                  <div class="p-vision__plant--passion"></div>
                  <p class="p-vision__plant--passionText">
                    「将来こうなりたい」「こういうことがしたい」など<br />
                    あなたの情熱を是非聞かせてください！<br />
                    あなたの人生をワクワクさせることに本気で向き合います。
                  </p>
                </div>
              </li>
              <li>
                <div class="p-vision__plant">
                  <div class="p-vision__plant--clever"></div>
                  <p class="p-vision__plant--cleverText">
                    しっかり仕事をしてチャチャっと帰る！<br />
                    メリハリをつけてプライベートを充実させてください。<br />
                    ENGEIはエンジニアリングだけでなく、<br />
                    仕事の取り組み方もサポートします。
                  </p>
                </div>
              </li>
              <li>
                <div class="p-vision__plant">
                  <div class="p-vision__plant--realistic"></div>
                  <p class="p-vision__plant--realisticText">
                    「Realistic(現実的)」に考えたときに、<br />
                    ある程度の経験をENGEIで培ったら次の挑戦をするべきだと考えております。<br />
                    ENGEIメンバーになったら３〜５年のキャリアプランを<br />
                    共に組み立て、共に走り抜きましょう！<br />
                  </p>
                </div>
              </li>

              <button id="wantedly-btn" class="wantedly-btn">採用ページへ</button>

            </ul>
            </a>
          </section>
          <!-- WHAT WE DO -->
          <div id="whatWeDo">
            <section class="p-businessContent">
              <img
                src="./assets/images/whatWeDo-text.svg"
                alt="WHAT WE DO"
                class="p-businessContent__title"
              />
              <ul class="p-businessContent__box">
                <li>
                  <div class="p-businessContent__engineerImage"></div>
                  <p class="p-businessContent__engineerText">
                    熟練エンジニアとの対話式カリキュラムで
                    <span>最速で技術の工場をサポート。</span><br />
                    代表と１対１でキャリアプラン相談も実施します。
                  </p>
                </li>
                <li>
                  <div class="p-businessContent__systemImage"></div>
                  <p class="p-businessContent__systemText">
                    様々なクライアントのもとで様々な業務を経験し、<br />
                    効率良く経験を積んで次のステージを目指しましょう。
                  </p>
                </li>
                <li>
                  <div class="p-businessContent__devImage"></div>
                  <p class="p-businessContent__devText">
                    広告代理店、WEB開発、EC運営、翻訳業を経た代表と<br />
                    ENGEIメンバーによる多様かつ独自のサービス展開も視野に。
                  </p>
                </li>
              </ul>
              <div class="p-businessContent__cactus">
                <div class="p-businessContent__cactus--small"></div>
                <div class="p-businessContent__cactus--large"></div>
              </div>
            </section>
          </div>
          <!-- COMPANY -->
          <div id="company">
            <section class="p-company">
              <img
                src="./assets/images/company-logo.svg"
                alt="COMPANY"
                class="p-company__title"
              />
              <div class="p-company__contents">
                <img
                  src="./assets/images/companyProfile.svg"
                  alt="会社概要"
                  class="p-company__profile"
                />
                <table class="p-company__detail">
                  <tr>
                    <th class="p-company__detail--header">会社名</th>
                    <td class="p-company__detail--data">株式会社 ENGEI</td>
                  </tr>
                  <tr>
                    <th class="p-company__detail--header">事業内容</th>
                    <td class="p-company__detail--data">
                      エンジニア育成事業<br />
                      システムエンジニアリングサービス事業<br />
                      Web制作/システム受託開発
                    </td>
                  </tr>
                  <tr>
                    <th class="p-company__detail--header">代表取締役</th>
                    <td class="p-company__detail--data">須藤 ジョージ 竜一</td>
                  </tr>
                  <tr>
                    <th class="p-company__detail--header">設立</th>
                    <td class="p-company__detail--data">2022年7月1日</td>
                  </tr>
                  <tr>
                    <th class="p-company__detail--header">所在地</th>
                    <td class="p-company__detail--data">
                      〒103-0073<br />
                      東京都中央区日本橋浜町2-55-2<br />
                      BESPOKE APARTMENTS 日本橋浜町3F<br />
                      都営新宿線「浜町」駅 A2出口より徒歩5分<br />
                      東京メトロ半蔵門線「水天宮前」駅<br />
                      5番出口より徒歩10分<br />
                    </td>
                  </tr>
                  <div class="p-company__map">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.6016341280665!2d139.78785111498914!3d35.686809780193066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601889489ae2086d%3A0x7336715ba10b0fca!2z44CSMTAzLTAwMDcg5p2x5Lqs6YO95Lit5aSu5Yy65pel5pys5qmL5rWc55S677yS5LiB55uu77yV77yV4oiS77yS!5e0!3m2!1sja!2sjp!4v1656070620440!5m2!1sja!2sjp"
                      width="280"
                      height="280"
                      style="border: 0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
                </table>
                <div class="p-company__representative">
                  <img
                    src="./assets/images/representativeProfile.svg"
                    alt="代表プロフィール"
                    class="p-company__representativeProfile"
                  />
                  <img
                    src="./assets/images/representative.jpg"
                    alt="代表写真"
                    class="p-company__representativeImage"
                  />
                  <table class="p-company__introduction">
                    <tr>
                      <th class="p-company__introduction--header">出身地</th>
                      <td class="p-company__introduction--data">
                        アメリカ合衆国ハワイ州
                      </td>
                    </tr>
                    <tr>
                      <th class="p-company__introduction--header">趣味</th>
                      <td class="p-company__introduction--data">
                        園芸、テニス、B級映画鑑賞、etc.
                      </td>
                    </tr>
                    <tr>
                      <th class="p-company__introduction--header">経歴</th>
                      <td class="p-company__introduction--data">
                        コーヒー屋店長→アパレル広報→外資系広告代理店営業、<br />
                        副業でブログ、EC、翻訳も行う
                      </td>
                    </tr>
                    <tr>
                      <th class="p-company__introduction--header">一言</th>
                      <td class="p-company__introduction--data">
                        こんにちは、ジョージです！コーヒー片手に<br />
                        お散歩することが大好きで、天気がいい日の朝は<br />
                        早く外に出たくてソワソワしています。<br />
                        おすすめの散歩コースを教えてください。笑<br />
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
                <button id="wantedly-btn" class="wantedly-btn">採用ページへ</button>
            </section>
          </div>
          <!-- CONTACT -->
          <div id="contact">
            <section class="p-form">
              <img
                src="./assets/images/contact.svg"
                alt="CONTACT"
                class="p-form__title"
              />
              <p id="message"></p>
              <form action="" method="post" name="form" class="p-form__wrap">
                <img
                  src="./assets/images/name.svg"
                  alt="NAME"
                  class="p-form__nameImage"
                />
                <input
                  class="p-form__name"
                  type="text"
                  name="name"
                  value=""
                  required="required"
                />
                <img
                  src="./assets/images/mail.svg"
                  alt="EMAIL"
                  class="p-form__mailImage"
                />
                <input
                  class="p-form__mail"
                  type="email"
                  name="email"
                  value=""
                  required="required"
                />
                <img
                  src="./assets/images/message.svg"
                  alt="MESSAGE"
                  class="p-form__messageImage"
                />
                <textarea
                  class="p-form__message"
                  name="message"
                  rows="10"
                  required="required"
                ></textarea>
                <button type="button" class="c-btn">送信</button>
              </form>
            </section>
          </div>
        </div>
      </main>
      <footer class="l-footer">
        <p class="l-footer__text">&copy; ENGEI All right reserved.</p>
        <a class="l-footer__contact" href="#contact"
          ><img
            class="l-footer__icon"
            src="./assets/images/mail_blue.png"
            alt="お問合せ"
        /></a>
      </footer>
    </div>
    <script
      src="https://code.jquery.com/jquery-2.2.4.js"
      integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
      crossorigin="anonymous"
    ></script>
    <script src="main.js"></script>
  </body>
</html>
