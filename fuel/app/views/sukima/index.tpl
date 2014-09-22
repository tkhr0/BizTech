<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    {include file='./meta_header.tpl'}
  </head>
  <body>
    {*user_id: {$user_id}*}
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>{Asset::img('sukimaHack.png',['width' => '100%','alt'=>'すきまハック'])}</h1>
       <form class="form-signin" role="form">
        <a class="btn btn-lg btn-primary btn-block" href="/twitterlogin">Sign in with Twitter</a>
      </form>
      </div>

    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {Asset::js('bootstrap.min.js')}
  </body>
</html>

