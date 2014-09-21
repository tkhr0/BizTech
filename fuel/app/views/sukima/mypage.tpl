<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    <!--メタデータのヘッダー-->
    {include file='./meta_header.tpl'}
    <!--メタデータのヘッダー-->
  </head>
  <body>
    <!--ヘッダー-->
    {include file='./page_header.tpl'}
    <!--ヘッダー-->
    <!--user-->
    <div class="container">
      <div class="user_info"><!--ユーザ情報-->
        <div class="row">
          <div class="col-xs-4"> 
            <img src="{$user.thumbnail_path}" class="img-thumbnail" alt="{$user.name}" width="100%" />
          </div>
          <div class="col-xs-8"><!--ユーザ紹介-->
            <div id="user-name"><!--名前-->
              {$user.name}
            </div>
            <div id="user-description">がんばる人を応援するスキマハックを作ってます！</div>
          </div><!--ユーザ紹介-->
        </div><!--ユーザ情報-->
        <!--チアされた数-->
        <table class="cheer-table">
          <tr>
            <th>tasseisitamokuhyou</th>
            <th>応援された回数</th>
            <th>応援した回数</th>
          </tr>
          <tr>
            <td><strong>{$achieved_goals_num}</strong></td>
            <td><strong>{$user.cheered}</strong></td>
            <td><strong>{$user.cheering}</strong></td>
          </tr>
        </table>
        <!--チアされた数-->
        <!--フォローボタン-->
        <div class="follow-btn">
        <input type="hidden" name="followable" value="{$followable}" />
        {if ($visited_user_id != $user.id)}
        <form action="/sukima/follower" class="follow-form" action="post">
          <input type="hidden" name="user-id" value="{$visited_user_id}" />
          <input type="hidden" name="follow-id" value="{$user.id}" />
          <input type="submit" class="btn btn-xs btn-primary btn-block" value="フォロー" />
        </form>
        {/if}
        </div><!--フォローボタン-->
      </div><!--ユーザ情報-->
      <div class="col-xs-12">
      <!--目標リスト-->
      <!-- goals -->
      <ul class="yaritai_list">
        <!--やりたいこと-->
        {foreach $goals as $goal}
          {include file='./goal.tpl' name=$goal.name cheered=$goal.cheered cheering_users=$goal.cheering_users}
        {/foreach}
      </ul>
      <!--目標リスト-->
      </div>
    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {Asset::js('mypage.js')}
    {Asset::js('bootstrap.min.js')}
  </body>
</html>

