<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    <!--メタデータのヘッダー-->
    {include file='./meta_header.tpl'}
    <!--メタデータのヘッダー-->
  </head>
  <body>
    <!--ヘッダー-->
    {include file='./page_header.tpl'}
    <!--ヘッダー-->
    <div class="container">
      <div class="user_info"><!--ユーザ情報-->
        <div class="row">
          <div class="col-xs-4"> 
            {Asset::img('dummy_icon.jpeg',['class' => 'img-thumbnail', 'width' => '100%'])} 
          </div>
          <div class="col-xs-8"><!--ユーザ紹介-->
            <div id="user-name"><!--名前-->
              {$name}
            </div>
            <div id="user-description">がんばる人を応援するスキマハックを作ってます！</div>
          </div><!--ユーザ紹介-->
        </div><!--ユーザ情報-->
        <!--チアされた数-->
        <table class="cheer-table">
          <tr>
            <th>応援された回数</th>
            <th>応援した回数</th>
          </tr>
          <tr>
            <td><strong>{$cheered}</strong></td>
            <td><strong>{$cheering}</strong></td>
          </tr>
        </table>
        <!--チアされた数-->
        <!--フォローボタン-->
        <div class="follow-btn">
        <form action="#" class="follow-form">
          <input type="hidden" name="user-id" value="1" />
          <input type="hidden" name="follow-id" value="2" />
          <input type="submit" class="btn btn-xs btn-primary btn-block" value="フォロー" />
        </form>
        </div><!--フォローボタン-->
      </div><!--ユーザ情報-->
      <div class="col-xs-12">
      <!--目標リスト-->
      <ul class="yaritai_list">
        <!--やりたいこと-->
        <li>
          <h3>たばこ我慢するぞ</h3><span class="badge">42</span>
          <!--応援してくれた人リスト-->
          <ul class="cheerer_list">
            <li>{Asset::img('icon2.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon3.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon4.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon5.png',['width'=> '100%'])}</li>  
	</ul>
        </li>
        <li>
          <h3>たばこ我慢するぞ</h3><span class="badge">42</span>
          <!--応援してくれた人リスト-->
        <ul class="cheerer_list">
            <li>{Asset::img('icon2.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon3.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon4.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon5.png',['width'=> '100%'])}</li> 
        </ul>
        </li>
        <li>
          <h3>たばこ我慢するぞ</h3><span class="badge">42</span>
          <!--応援してくれた人リスト-->
          <ul class="cheerer_list">
            <li>{Asset::img('icon2.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon3.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon4.png',['width'=> '100%'])}</li>
            <li>{Asset::img('icon5.png',['width'=> '100%'])}</li>
	  </ul>
        </li>
      </ul>
      <!--目標リスト-->
      </div>
    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {Asset::js('mypage.js')}
    {Asset::js('bootstrap.min.js')}
  </body>
</html>

