<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>すきまハック</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
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
    {include file='./page_header.tpl'}
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class=""><!--ユーザ情報-->
      <div class="row">
        <div class="col-xs-4"> 
       {Asset::img('dummy_icon.jpeg',['class' => 'img-thumbnail', 'width' => '100%'])} 
        </div>          
	<div class="col-xs-8">
          <div class="col-xs-6">
            {$name}
          </div>
          <div class="col-xs-6">
            <a class="btn btn-xs btn-primary btn-block" href="mypage.html">フォロー</a>
          </div>
          <div class="col-xs-12">がんばる人を応援するスキマハックを作ってます！</div>
        </div>
      </div>
      <div>
        <div class="col-xs-12">
        <div class="col-xs-6">
          <p class="text-center">応援された回数</p>
        </div>
        <div class="col-xs-6">
          <p class="text-center">応援した回数</p>
        </div>
        </div><!--12-->
        <div>
        <div class="col-xs-6">
          <p class="text-center"><strong>{$cheered}</strong></p>
        </div>
        <div class="col-xs-6">
          <p class="text-center"><strong>{$cheering}</strong></p>
        </div>
        </div>
      </div><!-- 12 -->
      </div>
      </div>
      <!--ユーザ情報-->
      <div calss="col-xs-12">
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
    {Asset::js('bootstrap.min.js')}
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

