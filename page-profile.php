<?php get_header();//headerファイルを読み込む ?>

  <?php if ( have_posts() ) ://現在のWordPressクエリにループできる記事があるかどうかをチェックする ?>
    <?php while ( have_posts() ) : the_post();//ループ中の投稿情報をグローバル変数の$postにロードし、関連するグローバル変数を設定する ?>
      <main class="main main-lp">
        <div class="container">
          <section class="profile">
            <header class="profile__header">
              <h1 class="profile__headerTitle">プロフィール<span>PROFILE</span></h1>
            </header>

            <div class="profile__body">
              <div class="profile__inner">
                <div class="profile__content">
                  <div class="profile__mainBox">
                    <div class="profile__imageBox">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile/hiro.jpg" alt="" class="profile__image">
                    </div>
                    <h2 class="profile__mainTitle">hiromiya（宮内 裕幸）</h2>
                  </div>
                  <div class="profile__textBox">
                    <h3 class="profile__title">出身・学歴など</h3>
                    <p class="profile__text">
                      出身は鹿児島県出水市で田んぼが多い結構田舎です。（笑）<br>
                      学校は地元の工業高校を卒業しており、正直誰でも入れるような偏差値低めの学校です。<br>
                      なので学力はほぼないに等しいくらいのレベルだと思っていただければ…きっと田舎の中学校くらいのレベル感です。（笑）<br><br>
                    </p>

                    <h3 class="profile__title">経歴1</h3>
                    <p class="profile__text">
                      地元にいた頃は鹿児島では某スーパーの食品部署のサブチーフを6年間しておりました。<br>
                      この頃はITは難しくて自分には無理だと決めつけて興味はあるものの、挑戦すらしようとしてなかったですね…<br><br>
                    </p>

                    <h3 class="profile__title">経歴2</h3>
                    <p class="profile__text">
                      28歳の時に地元から上京して建築の施工管理（防災設備関係）を1年経験し、IT関係の仕事に就きたく転職。<br><br>
                    </p>

                    <h3 class="profile__title">経歴3</h3>
                    <p class="profile__text">
                      2ヶ月間、IT関連企業で研修をするも研修ばかりで実際に実務を経験できない環境で早めに切り替え転職。<br><br>
                    </p>

                    <h3 class="profile__title">経歴4</h3>
                    <p class="profile__text">
                      正社員にとらわれずまずは経験をしたいという思いから雇用形態を問わず探し、派遣社員として契約し、派遣会社にて１ヶ月間HTML・CSSの基礎的な学習およびDreamweaver・Photoshopの基本的な操作を実務形式で研修し、無事派遣先であります<a href="https://www.hitachi-document.co.jp/" target="_blank">株式会社日立ドキュメントソリューションズ様</a>の某保険会社の社内使用システムのプロジェクトに５ヶ月間参画。<br><br>
                      同じ派遣会社より今度は期間が決まった業務ではなく常駐（長期）の案件に参画したく紹介頂いた、<a href="https://www.persol-career.co.jp/" target="_blank">パーソルキャリア株式会社様（当時：インテリジェンス）</a>にて某転職サイトdodaのWEBオペレーターとしてクリエイティブ部署に就任し、主にコーディング業務を担当しdodaの様々なページの更新・新規作成などに携わっておりました。<br><br>
                    </p>

                    <h3 class="profile__title">経歴5</h3>
                    <p class="profile__text">
                      その後、上長にあたるゼネラルマネージャー（部長）に認めて頂けたのか<a href="https://www.persol-career.co.jp/" target="_blank">パーソルキャリア株式会社様</a>での直雇用のお話を頂き、1年間契約社員として同部署に就任し、１年後に正規社員として正式に雇用して頂きました。<br><br>
                      職務内容としてはdodaのガイドライン運用や派遣時も行っていたコーディング業務全般、業務効率化の為の社内向けギミックガイドライン（プラグインなど用はサイト内のアニメーションなどコピペで使えるようにしたもの）の作成やHTMLメールの業務改善の為の社内ツール（クリックしたらHTMLのパーツが追加されていくような<a href="https://hiromiyablog.com/demo/content-sakusaku-kun/" target="_blank">こちら</a>を元に提案し改良したもの）を作成して提案し、実際に業務工数を削減（1/3に削減）したり、doda転職フェアなどで使われていた<a href="https://doda.jp/fair/egogram/" target="_blank">エゴグラム適職診断</a>をバックエンドエンジニアと作成（jQueryを独学で初めて実は2作品目くらいのレベル感で作成）するなどし、所属部署内で初のフロントエンドチームというものをゼネラルマネージャーと立ち上げ１年くらい名ばかりな感じでしたが（笑）チームリーダーをしておりました。<br><br>
                      その後、初の所属部署内でのフロントエンドグループの初期立ち上げメンバーとしてフロントエンドグループに所属し、doda全般におけるフロントエンド領域の業務、グループ内の課題・工数管理、ABテストツールを使ってのABテストの作成、エンジニアグループのバックエンドエンジニアとの共同制作等をし、良い経験と実績を積ませて頂いており、<a href="https://www.persol-career.co.jp/" target="_blank">パーソルキャリア株式会社様</a>には今でも感謝しております！<br>
                      ※実際に業務工数を削減（1/3に削減）できたHTMLメール生成ツールを多少異なりますが再現したものは<a href="https://hiromiyablog.com/demo/free-creative-quickly/" target="_blank">こちら</a>です
                      <br><br>
                    </p>

                    <h3 class="profile__title">個人</h3>
                    <p class="profile__text">
                      今では、2022年1月よりフリーランス（個人事業主）として某EC企業でフロントエンドエンジニア・マークアップエンジニア・コーダーとして活躍！<br>
                      独学からはじめ、HTML、CSS、JavaScriptなどを中心にweb関連の仕事をしています。<br><br>
                      また、こちらのサイトや妻（心理学・文章等は妻が担当）と一緒にしている心理学の力であなたのお悩みを解決する<a href="https://misachisalon.com/" target="_blank">「みさちサロン」</a>、最近挑戦しはじめたペット関係（主に犬・猫）をメインとしたECサイト<a href="https://hiromiyastore.com/" target="_blank">「hiromiyastore」</a>などの個人での制作・運用等もしています。<br><br>
                      真面目で内気なオタク男子と思われたりしてた頃もあり、<br>
                      内気な心の中には宇宙より壮大な好奇心が秘められているかもしれないです！（笑）<br><br>
                      ※<a href="https://www.wantedly.com/id/h_miyauchi_0410" target="_blank" rel="noopener noreferrer">Wantedlyプロフィール</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="sec sec-bg">
            <div class="sec_inner">
              <header class="sec_header">
                <h2 class="title">お問い合わせ<span>CONTACT</span></h2>
              </header>

              <div class="sec_body contact">
                <!-- <div class="contact_icon">
                  <i class="fas fa-phone"></i>
                </div> -->
                <div class="contact_body">
                  <p>
                    お気軽にお問い合わせ、またはご相談ください
                    <!-- <span>03-1234-5678</span> -->
                  </p>
                </div>
              </div>

              <div class="sec_btn">
                <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-default">お問い合わせフォーム<i class="fas fa-angle-right"></i></a>
              </div>
            </div>
          </section>
        </div>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();//footerファイルを読み込む ?>