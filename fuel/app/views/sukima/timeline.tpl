<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    {include file='./meta_header.tpl'}
  </head>
  <body>
  {include file='./page_header.tpl'}
  <p>
  login_user_id: {$user_id}
  </p>
  <div class="container">
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
          <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" {$container.disabled}>
        </form>
        <!--いいねボタン-->
      </div>
      <!--やりたいことアクティビティ-->
      {/foreach}
    </div><!--タイムライン-->
  </div><!-- /container -->
  <div id="footer" class="container">
    <!--Btnグループ-->
    <div class="row">
      <div class="col-xs-12">
      <!--<button type="button" class="btn btn-danger col-xs-12">やるぞ</button>-->
      <div id="hack_btn"><span class="glyphicon glyphicon-fire"></span></div>
      </div><!--col-xs-12-->
    </div><!--row-->
    <!--Btnグループ-->
    <!--input-->
    <div class="input-group">
      <input type="text" class="form-control">
      <div class="input-group-btn">
        <button type="submit" class="btn btn-default">登録</button>
      </div>
    </div>
    <!--input-->
  </div><!--container-->
  <div id="footr">
     <div id="yaruzo">
        <form action="#" class="hack-form">
          <input type="hidden" name="target-id" value="1" />
          <input type="hidden" name="type-id" value="2" />
          <input type="submit" name="hack" class="btn btn-xs btn-primary btn-block" value="やるぞ！！" >
        </form>
        <ul id="select_goals" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
        </ul>
     </div><!--yaruzo-->
  </div><!--footer-->
  {include file='./js_footer.tpl'}
  {Asset::js('timeline.js')}
</body>
</html>
