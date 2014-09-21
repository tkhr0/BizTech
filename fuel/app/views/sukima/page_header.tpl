<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container">
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">{Asset::img('sukimaHackwithoutSub.png',['width' => '100%','alt'=>"すきまハック"])}</a>
</div>
<div class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
    <li class="active"><a href="{$header_home_url}">Home</a></li>
    <li><a href="#about">About</a></li>
    {*{if $smarty.session.user_id}<li><a href="">logout</a></li>{/if}*}
    <li><a href="{$header_mypage_url}">Mypage</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">Nav header</li>
        <li><a href="#">Separated link</a></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="../navbar/">Default</a></li>
    <li class="active"><a href="./">Static top</a></li>
    <li><a href="../navbar-fixed-top/">Fixed top</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>
</div>