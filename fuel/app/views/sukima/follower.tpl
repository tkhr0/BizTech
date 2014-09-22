<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    {include file='./meta_header.tpl'}
  </head>
  <body>
  {include file='./page_header.tpl'}
  <div class="container">
    <!--タイムライン-->
    <div id="timeline">

    {foreach $followers_data as $follower}
    {include file='./follower_item.tpl' achieved_goals_num=$follower.achieve_num cheered=$follower.cheered cheering=$follower.cheering thumbnail=$follower.thumbnail name=$follower.name mypage_url=$follower.mypage_url description=$follower.description user_id=$follower.user_id}
    {/foreach}

    </div><!--タイムライン-->
  </div><!-- /container -->
  {include file='./js_footer.tpl'}
</body>
</html>
