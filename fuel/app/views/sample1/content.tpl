<div>
  <ul>
  
  {foreach from=$query item=foo}
  <li>
     {$foo.id},
     {$foo.twitter_id},
     {$foo.name},
     {$foo.thumbnail_path},
     {$foo.cheering},
     {$foo.cheered},
     {$foo.created_at},
     {$foo.modified_at}
  </li> 
 {/foreach}
 
</ul>
</dvi> 

