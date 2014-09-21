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
    <p>login_user_id: {$user_id}</p>
    <!--タイムライン-->
    <div id="timeline">
      {foreach from=$containers item=container}
      <!--やりたいことアクティビティ-->
      <div class="activity">
        <div class="media"><!--media-->
          <a class="pull-left" href="/sukima/mypage/{$container.user_id}"><img class="media-object" src="{$container.thumbnail}" width="100%" alt="..."></a>
           <div class="media-body"><!--media body-->
            <h4 class="media-heading">{$container.goal_name}{$container.fixed_phrase}<span class="badge">{$container.cheer_num}</span></h4>
            <!--応援している人リスト(アイコン)-->
            <ul class="cheerer_list">
              {foreach from=$container.cheer_users item=cheer_user}
                <li><a href="/sukima/mypage/{$cheer_user.user_id}"><img src="{$cheer_user.thumbnail}" width="100%" alt="..."></a></li>
              {/foreach}
            </ul>
            <!--応援している人リスト(アイコン)-->
          </div><!--media body-->
        </div><!--media-->
        <!--いいねボタン-->
        <form action="#" class="cheer-form">
          <input type="hidden" name="target-id" value="{$container.container_id}" />
          <input type="hidden" name="type-id" value="{$type_container}" />
          <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" />
        </form>
        <!--いいねボタン-->
      </div>
      <!--やりたいことアクティビティ-->
      {/foreach}
    </div><!--タイムライン-->
  </div><!-- /container -->
  <div id="fixfooter">
    <div id="hack_btn_x">
      <form action="#">
        <input type="hidden" name="state" value="{$state}" />
        <select class="display-none" name="目標を選ぶ">
        </select>
        <input type="text" name="goal" class="form-control display-none" placeholder="目標を新しく作成"/>
      </form>
   <!--test-->
  <div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  <h4 class="modal-title">やる気</h4>
  </div><!--modal-header-->
  <div class="modal-body">
    <div class="row">
      <div class="col-xs-12">
        <form action="#" class="hack-form">
          <input type="hidden" name="state" value="{$state}" />
          <select class="display-none" name="目標を選ぶ">
          </select>
          <input type="text" name="goal" class="form-control display-none" placeholder="目標を新しく作成"/>
          <input type="submit" name="hack" class="btn btn-xs btn-primary btn-block" value="やるぞ！！" >
        </form>
        <form class="achieve-form"><!-- achieve -->
          <input type="submit" name="achieve" class="btn btn-xs btn-primary btn-block" value="ACHIEVE" >
        </form>
      </div><!--12-->
    </div><!--row-->
  </div><!--modal-body-->
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
  </div><!--modal-footer-->
  </div>
  <div id="hack_btn" class="btn btn-primary btn-xs" data-toggle="modal" href="#responsive"><span class="glyphicon glyphicon-fire"></span></div>
  <!--test-->
    </div>
  </div><!--footer-->
  {include file='./js_footer.tpl'}
  {Asset::js('timeline.js')}
</body>
</html>
