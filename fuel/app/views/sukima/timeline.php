<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>すきまハック</title>

    <!-- Bootstrap -->
    <?php echo Asset::css('bootstrap.min.css'); ?>
    <?php echo Asset::css('custom.css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--assets/imgs/sukimaHackwithoutSub.png-->
          <a class="navbar-brand" href="#"><?php echo Asset::img("sukimaHackwithoutSub.png", ["height"=>"30"])?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top</a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <!--タイムライン-->
      <div id="timeline">
        <!--やりたいことアクティビティ-->
        <div class="activity">
          <!--表明-->
          <div class="media">
            <a class="pull-left" href="#"><?php echo Asset::img("icon1.png", ["width"=>"40"])?></a>
            <div class="media-body">
              <h4 class="media-heading">階段使うぞ！<span class="badge">0</span></h4>
              <!--応援している人リスト(アイコン)-->
              <ul class="cheerer_list">
                <li><?php echo Asset::img("icon2.png", ["width"=>"20"])?></li>
                <li><?php echo Asset::img("icon3.png", ["width"=>"20"])?></li>
                <li><?php echo Asset::img("icon4.png", ["width"=>"20"])?></li>
                <li><?php echo Asset::img("icon5.png", ["width"=>"20"])?></li>
              </ul>
              <!--応援している人リスト(アイコン)-->
            </div>
            <!--表明-->
          </div>
          <!--いいねボタン-->
          <form action="#" class="cheer-form">
            <input type="hidden" name="target-id" value="1" />
            <input type="hidden" name="type-id" value="2" />
            <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" >
          </form>
          <!--いいねボタン-->
        </div>
        <!--やりたいことアクティビティ-->
      </div>
      <!--タイムライン-->
     </div> <!-- /container -->    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo Asset::js('timeline.js'); ?>
    <?php echo Asset::js('bootstrap.min.js'); ?>
  </body>
</html>
