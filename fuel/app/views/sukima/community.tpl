{foreach from=$communities item=community}
<div class="community list-group">
    <a class="list-group-item" href="#">
      <ul class="list-inline">
        <li>
            <img class="thumbnail" src="{$community.image_path}" width="50px" alt="..." />
        </li>
        <li>
          {$community.name}
        </li>
        <li>
            <span class="badge">{$community.cheered}</span>
        </li>
      </ul>
      <!--いいねボタン-->
      <form action="#" class="cheer-form" role="form">
        <input type="hidden" name="target-id" value="{$community.id}" />
        <input type="hidden" name="type-id" value="{$type_community}" />
        <input type="submit" name="cheer" class="btn btn-sm btn-primary btn-block" value="応援！" />
      </form>
      <form action="#" class="follow-form" role="form">
        <input type="hidden" name="target-id" value="{$community.id}" />
        <input type="hidden" name="type-id" value="{$type_community}" />
        <input type="submit" name="follow" class="btn btn-sm btn-primary btn-block" value="フォロー" />
      </form>
      <!--いいねボタン-->
    </a>
  </div>

</div>

{/foreach}