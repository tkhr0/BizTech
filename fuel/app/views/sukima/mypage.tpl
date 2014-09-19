<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>すきまハック</title>
    <!-- Bootstrap -->
    {Asset::css('custom.css')}
    {Asset::css('bootstrap.min.css')}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elstrongents and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--ヘッダー-->
    {include file='./page_header.tpl'}
    <!--ヘッダー-->
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
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
    </div> <!-- /container -->    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {Asset::js('mypage.js')}
    {Asset::js('bootstrap.min.js')}
  </body>
</html>

