<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>コミュニティ検索</title>
    {include file='./meta_header.tpl'}
    {Asset::css('community.css')}
  </head>
  <body>
  {include file='./page_header.tpl'}
  <p>
  login_user_id: {$user_id}
  </p>
  <div class="container">
    <form class="form-inline search-form" role="form">
      <div class="form-group">
        <label class="sr-only" for="searchQuery">検索</label>
        <input type="text" name="query" class="form-control" id="searchQuery" placeholder="検索">
      </div>
      <button type="submit" class="btn btn-default">検索</button>
    </form>
  <div id="result">
  </div>
  </div><!--container-->
  {include file='./js_footer.tpl'}
  {Asset::js('community.js')}
  <div id="footer"></div>
</body>
</html>