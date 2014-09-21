{foreach from=$containers item=container}
  <!--タイムライン-->
  <div id="timeline">
    <!--やりたいことアクティビティ-->
    <div class="activity">
      <!--表明-->
      <div class="media">
         <a class="pull-left" href="#"><img class="media-object" src="{$container.thumbnail}" width="100%" alt="..."></a>
         <div class="media-body">
           <h4 class="media-heading">{$container.goal_name}を{$container.status} <span class="badge badge-anim">{$container.cheer_num}</span></h4>
           <!--応援している人リスト(アイコン)-->
           <ul class="cheerer_list">

             {foreach from=$container.cheer_users item=cheer_user}
               <li><a href="http://192.168.56.10/sukima/mypage/{$cheer_user.user_id}"><img src="{$cheer_user.thumbnail}" width="100%" alt="..."></a></li>   
             {/foreach}
           </ul>
           <!--応援している人リスト(アイコン)-->
         </div>
         <!--表明-->
      </div>
      <!--いいねボタン-->
      <form action="#" class="cheer-form">
        <input type="hidden" name="target-id" value="{$container.container_id}" />
        <input type="hidden" name="type-id" value="{$type_container}" />
        <input type="hidden" name="cheer-status" value="{$container.cheer_status}" />
        <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" />
      </form>
      <!--いいねボタン-->
    </div>
    <!--やりたいことアクティビティ-->
  </div>
  <!--タイムライン-->
{/foreach} 

