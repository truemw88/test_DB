<?php //foreach (Page::GetInfo() AS $index): ?>
<!--    id: --><?//=$index['id']?>
<!--    name: --><?//=$index['name']?>
<?php //endforeach; ?>

<form action="" method="post" >
    Форма добавления строки в БД
    <input name="name" type="text" value="" /><br>
    <input name="submitadd" type="submit" /><br>
</form>

<form action="" method="post" >
    Форма редактирования строки БД
    <input name="id" type="text" value="" /><br>
    <input name="name" type="text" value="" /><br>
    <input name="submitupd" type="submit" /><br>
</form>
