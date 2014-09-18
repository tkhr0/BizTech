<!DOCTYPE html>
<html lang="ja">
<head>
　<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">　　　
  <title>すきまハック</title>
    
  <!-- Bootstrap -->

   {Asset::css('custom.css')}  
   {Asset::css('bootstrap.min.css')}

</head>

<body>
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
                                                       ["name" => "yamagiwa", "thumbnail" => "https://pbs.twimg.com/profile_images/3623049308/feacb807df8d3e5cf8649143125a3e0d_bigger.jpeg"],
                                                       ["name" => "たか","thumbnail" => "https://pbs.twimg.com/profile_images/420322569867104257/7mNC5dJB_bigger.jpeg" ]
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
                                                       ["name" => "hino", "thumbnail" => "https://pbs.twimg.com/profile_images/512572564934103040/VkSJAtJe_bigger.jpeg"],
                                                       ["name" => "giwa","thumbnail" => "https://pbs.twimg.com/profile_images/2446689015/fjxbuni2hmaqz6xkh3n2_bigger.png" ]
                                                     ]
                                   ]
                                  ]
    }
    *}  
   <ul>
　　　　{foreach from=$containers item=container}
          
          {foreach from=$container.cheer_users item=bar}
            <li>{$bar.name}</li>
            <li>{$bar.thumbnail}</li>
          {/foreach}
        <br>
        {/foreach}
   </ul>
   
   
　{foreach from=$containers item=container}　
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
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
                  <li><img class="media-object" src="{$cheer_user.thumbnail}" width="100%" alt="..."></li>   
                {/foreach}
 
              </ul>
              <!--応援している人リスト(アイコン)-->
            </div>
            <!--表明-->
          </div>
          <!--いいねボタン-->
          <form action="#" class="cheer-form">
            <input type="hidden" name="target-id" value="1" />
            <input type="hidden" name="type-id" value="2" />
            <input type="submit" name="cheer" class="btn btn-xs btn-primary btn-block" value="応援！" >
          </form>
          <!--いいねボタン-->
        </div>
        <!--やりたいことアクティビティ-->
      </div>
      <!--タイムライン-->
     </div> <!-- /container -->    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   {/foreach}  
  

 
</body>
</html>
