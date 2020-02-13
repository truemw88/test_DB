
<form action="/main/update_record" method="post" >

    Форма добавления строки в БД<br>
    <input name="id" type="text" value="<?=$_GET['id']?>" /><br>
    <input name="title" type="text" value="<?=$data['title']?>" /><br>
    <input name="price" type="text" value="<?=$data['price']?>" /><br>
    <input type="submit" /><br>
</form>
