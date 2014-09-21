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
  <a class="navbar-brand" href="/sukima/">{Asset::img('sukimaHackwithoutSub.png',['width' => '100%','alt'=>"すきまハック"])}</a>
</div>
<div id="register_goal" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">やる気</h4>
</div><!--modal-header-->
<div class="modal-body">
<div class="row">
<div class="col-xs-12">
<form action="#" class="hack-form">
  <input type="hidden" name="state" value="1" />
  <input type="text" name="goal" class="form-control" placeholder="目標を新しく作成"/>
  <input type="submit" name="hack" class="btn btn-xs btn-primary btn-block" value="やるぞ！！" >
</form>
</div><!--12-->
</div><!--row-->
</div><!--modal-body-->
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
</div><!--modal-footer-->
</div>
<div class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
    <li><a href="{$header_mypage_url}">マイページ</a></li>
    <li><a href="/sukima/follower">フォロワー</a></li>
    <li><a href="#register_goal" data-toggle="modal">目標を登録</a></li>
    <!--modal-->
    <li><a href="">ログアウト</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>
</div>

