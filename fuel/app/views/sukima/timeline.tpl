<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>すきまハック</title>
    {include file='./meta_header.tpl'}
  </head>
  <body>
    {include file='./page_header.tpl'}
    {*
    {assign var=containers value =[
                                  [ 
                                    "id"=>"33",
                                    "thumbnail"=>"https://pbs.twimg.com/profile_images/488564985199476736/tYBB--BV_bigger.png",
                                    "name" => "hino",
                                    "goal_name" =>  "本読む", 
                                    "status" => "始めました", 
                                    "cheer_num" => "32", 
                                    "cheer_users" => [ 
                                                     [
                                                        "id" => "3",
                                                        "name" => "yamagiwa", "thumbnail" => "https://pbs.twimg.com/profile_images/3623049308/feacb807df8d3e5cf8649143125a3e0d_bigger.jpeg"],
                                                     [
                                                        "id" => "4",
                                                        "name" => "たか","thumbnail" => "https://pbs.twimg.com/profile_images/420322569867104257/7mNC5dJB_bigger.jpeg" ]
                                                     ]     
                           
                                   ],
                                   
                                   [
                                     "id"=>"22",
                                     "thumbnail"=>"https://pbs.twimg.com/profile_images/449024716951404544/O8bBoM-o_bigger.jpeg",
                                     "name" => "もりもり",
                                     "goal_name" =>  "controllerを書く",
                                     "status" => "登録して初めました",
                                     "cheer_num" => "10",
                                     "cheer_users" => [
                                                       [
                                                         "id"=>"1",
                                                         "name" => "hino", "thumbnail" => "https://pbs.twimg.com/profile_images/512572564934103040/VkSJAtJe_bigger.jpeg"],
                                                       [
                                                         "id"=>"2",
                                                         "name" => "giwa","thumbnail" => "https://pbs.twimg.com/profile_images/2446689015/fjxbuni2hmaqz6xkh3n2_bigger.png" ]
                                                     ]
                                   ]
                                  ]
    }
    *}  
    <p>
    login_user_id: {$user_id}
    </p>
   <ul style="display:none;">
　　　　{foreach from=$containers item=container}
          
          {foreach from=$container.cheer_users item=user}
            <li>{$user.name}</li>
            <li>{$user.thumbnail}</li>
          {/foreach}
        <br>
        {/foreach}
   </ul>
　{foreach from=$containers item=container}　
    <div class="container">
      <!--タイムライン-->
      <div id="timeline">
        <!--やりたいことアクティビティ-->
        <div class="activity">
          <!--表明-->
          <div class="media">
            <a class="pull-left" href="#"><img class="media-object" src="{$container.thumbnail}" width="100%" alt="..."></a>
             <div class="media-body">
              <h4 class="media-heading">{$container.goal_name}を{$container.status}<span class="badge">{$container.cheer_num}</span></h4>
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
            <input type="hidden" name="type-id" value="{$container.cheer_status}" />
            <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" {$container.disabled}>
          </form>
          <!--いいねボタン-->
        </div>
        <!--やりたいことアクティビティ-->
      </div>
      <!--タイムライン-->
     </div> <!-- /container -->
   {/foreach} 
   <div id="footer">
     <!--<div id="yaruzo"><div><span class="glyphicon glyphicon-star"></span></div></div>-->
     <div id="yaruzo">
        <!--<div>★</div>-->
        <form action="#" class="hack-form">
          <input type="hidden" name="target-id" value="1" />
          <input type="hidden" name="type-id" value="2" />
          <input type="submit" name="hack" class="btn btn-xs btn-primary btn-block" value="やるぞ！！" >
        </form>
        <form id="select_goals" action="#">
          <select name="目標を選ぶ" size="">
           <!--<option value="サンプル">サンプル</option> -->
          </select>
        </form>
     </div>
   </div>
  {include file='./js_footer.tpl'}
  {Asset::js('timeline.js')}
  </body>
</html>
