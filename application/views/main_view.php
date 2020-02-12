<a href="/authoriz/authoriz_form">Аутентификация</a> |
<a href="/">Продукты</a>

<h1><?=$data['title']?></h1>

<?php foreach ($data['objects'] as $name => $index): ?>
    <a href="/main/update_record_form?id=<?=$index['id']?>" >Обновить</a>
    <?php foreach ($index as $name => $value): ?>
    <strong><?= $name ?></strong>: <?= $value ?>
    <br>
    <?php endforeach; ?>
  <hr>
<?php endforeach; ?>
