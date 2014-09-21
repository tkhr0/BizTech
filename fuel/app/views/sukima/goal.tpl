{*
  $mypage_url : このユーザのマイページURL
  $thumbnail :
*}
<li class="row">
  <h3>{$name}</h3>
  <!--応援してくれた人リスト-->
  <!--<div class="col-xs-4 btn btn-xs btn-primary btn-block">応援!</div>-->
  <!--いいねボタン-->
  <form action="#" class="cheer-form">
    <input type="hidden" name="target-id" value="{$id}" />
    <input type="hidden" name="type-id" value="1" />
    <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" {$disable}>
  </form>
  <!--いいねボタン-->
  <!--cheerボタン-->
  <span class="badge">{$cheered}</span>
  <ul class="cheerer_list">
    {foreach $cheering_users as $cheer_user}
      <li><a href="{$cheer_user.mypage_url}"><img src="{$cheer_user.thumbnail}" alt="{$cheer_user.name}" width="100%"></a></li>
    {/foreach}
  </ul>
</li>
