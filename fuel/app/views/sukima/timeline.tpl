<html>
<head>
        <title>TEST</title>
</head>
<body>
        userId: {$user_id} <br />
        cheering: {$user_cheering_num}<br />

        <p>
        読書 
                <form action="/sukima/cheer" method="post">
                        <input type="submit" value="cheer">
                        <input type="hidden" name="container_id" value="2">
                </form>
        </p>
        <p>
        階段 
                <form action="/sukima/cheer" method="post">
                        <input type="submit" value="cheer">
                        <input type="hidden" name="container_id" value="5">
                </form>
        </p>
        <p>
        英単語50こ 
                <form action="/sukima/cheer" method="post">
                        <input type="submit" value="cheer">
                        <input type="hidden" name="container_id" value="7">
                </form>
        </p>
</body>
</html>
