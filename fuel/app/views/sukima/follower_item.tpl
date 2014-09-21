<div class="container">
  <div class="row">
    <div class="col-xs-4">
      <a href="{$mypage_url}"><img src="{$thumbnail}" class="img-thumbnail" alt="{$thumbnail}" width="100%" /></a>
    </div>
    <div class="col-xs-8">
    <div>{$name}</div>
    <div>{$description=""}{$description}</div>
    </div>
  </div><!--row-->
  <!--経歴-->
  <table class="cheer-table">
    <tr>
      <th>達成した目標数</th>
      <th>応援された回数</th>
      <th>応援した回数</th>
    </tr>
    <tr>
      <td><strong>{$achieved_goals_num}</strong></td>
      <td><strong>{$cheered}</strong></td>
      <td><strong>{$cheering}</strong></td>
    </tr>
  </table>
  <!--経歴-->
  </div><!--media-->
</div><!--container-->
