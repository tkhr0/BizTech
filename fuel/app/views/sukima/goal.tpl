{*
  $mypage_url : このユーザのマイページURL
  $thumbnail :
*}
        <li>
          <h3>{$name}</h3><span class="badge">{$cheered}</span>
          <!--応援してくれた人リスト-->
          <ul class="cheerer_list">
            {foreach $cheering_users as $cheer_user}
            <li><a href="{$cheer_user.mypage_url}"><img src="{$cheer_user.thumbnail}" alt="{$cheer_user.name}" width="100%"></a></li>  
            {/foreach}
	        </ul>
        </li>
