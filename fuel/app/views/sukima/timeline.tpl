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
          <a class="pull-left" href="#"><img class="media-object" src="{$container.thumbnail}" width="100%" alt="..."></a>
           <div class="media-body"><!--media body-->
            <h4 class="media-heading">{$container.goal_name}を{$container.status}<span class="badge">{$container.cheer_num}</span></h4>
            <!--応援している人リスト(アイコン)-->
            <ul class="cheerer_list">
              {foreach from=$container.cheer_users item=cheer_user}
                <li><a href="http://192.168.56.10/sukima/mypage/{$cheer_user.user_id}"><img src="{$cheer_user.thumbnail}" width="100%" alt="..."></a></li>
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
    <div id="hack_btn"><span class="glyphicon glyphicon-fire"></span></div>
    <div id="yaruzo">
      <form action="#" class="hack-form">
        <input type="hidden" name="state" value="{$state}" />
        <select class="display-none" name="目標を選ぶ" multiple="multiple">
        </select>
        <input type="text" name="goal" class="form-control display-none" placeholder="目標を新しく作成"/>
        <input type="submit" name="hack" class="btn btn-xs btn-primary btn-block" value="やるぞ！！" >
      </form>
      <form class="reload-form">
        <input type="submit" name="reload" class="btn btn-xs btn-primary btn-block" value="リロード" >
      </form>
    </div><!--yaruzo-->
  </div><!--footer-->
  {include file='./js_footer.tpl'}
</body>
</html>
