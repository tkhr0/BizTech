<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    {include file='./meta_header.tpl'}
    {Asset::css('timeline.css')}
  </head>
  <body>
  {include file='./page_header.tpl'}
  <div class="container">
    <!--タイムライン-->
    <div id="timeline">
    {include file='./timeline_add.tpl'}
    </div><!--タイムライン-->
  </div><!-- /container -->
  <div id="fixfooter">
    <div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">やることを選びましょう</h4>
    </div><!--modal-header-->
    <div class="modal-body">
      <div class="row">
        <div class="col-xs-12">
          <form action="#" class="hack-form">
            <input type="hidden" name="state" value="{$state}" />
	    <h4>目標を選択</h4>
            <select class="goal-select well" name="目標を選ぶ" size="5">
            </select>
            <input type="text" name="goal" class="form-control goal-input" placeholder="目標を新しく作成"/>
            <input type="submit" name="hack" class="hack-btn btn btn-lg btn-primary btn-block" value="やるぞ！！" >
          </form>
          <form class="achieve-form"><!-- achieve -->
            <input type="submit" name="achieve" class="achieve-btn btn btn-lg btn-warning btn-block" value="目標を達成！" >
          </form>
        </div><!--12-->
      </div><!--row-->
    </div><!--modal-body-->
  </div>
  <form class="state-holder">
    <input type="hidden" name="state" value="{$state}">
  </form>
  <div id="hack_btn" class="btn btn-primary btn-xs" data-toggle="modal" href="#responsive"><span class="glyphicon glyphicon-fire"></span></div>
  </div><!--footer-->
  {include file='./js_footer.tpl'}
  {Asset::js('timeline.js')}
</body>
</html>
