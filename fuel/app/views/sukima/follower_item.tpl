{assign var=foo value=[1,2,3]}
<div class="media"><!--media-->
<a class="pull-left" href="#"><img class="media-object" src="{$container.thumbnail}" width="100%" alt="..."></a>
<div class="media-body"><!--media body-->
<h4 class="media-heading">{$container.goal_name}を{$container.status}<span class="badge">{$container.cheer_num}</span></h4>
</ul>
<!--経歴-->
<table class="cheer-table">
  <tr>
    <th>達成した目標数</th>
    <th>目標数</th>
    <th>応援された回数</th>
    <th>応援した回数</th>
  </tr>
  <tr>
    <td><strong>{$achieved_goals_num}</strong></td>
    <td><strong>{$num}</strong></td>
    <td><strong>{$user.cheered}</strong></td>
    <td><strong>{$user.cheering}</strong></td>
  </tr>
</table>
<!--経歴-->
</div><!--media body-->
</div><!--media-->

