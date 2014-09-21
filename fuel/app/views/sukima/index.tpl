<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    {include file='./meta_header.tpl'}
  </head>
  <body>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

        <p>user id:{$user_id}</p>

        <h1>{Asset::img('sukimaHack.png',['width' => '100%','alt'=>'すきまハック'])}</h1>
       <form class="form-signin" role="form">
        <a class="btn btn-lg btn-primary btn-block" href="/twitterlogin">Sign in with Twitter</a>
      </form>
      </div>

    </div> <!-- /container -->    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {Asset::js('bootstrap.min.js')}
  </body>
</html>

