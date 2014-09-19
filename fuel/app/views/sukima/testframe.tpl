<html>
<head>
</head>
<body>
        {$datas|var_dump}
        
        <form action="/sukima/cheer/{$datas.target}/1" method="post">
          goal
          <input type="submit"/>
        </form>

        <form action="/sukima/cheer/{$datas.target}/2" method="post">
          container
          <input type="submit"/>
        </form>
</body>
</html>
