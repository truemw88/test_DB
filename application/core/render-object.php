<h1><?=$data['title']?></h1>

<?php foreach ($data['objects'] as $name => $index): ?>
    <?php foreach ($index as $name => $value): ?>
        <strong><?= $name ?></strong>: <?= $value ?>
        <br>
    <?php endforeach; ?>
    <hr>
<?php endforeach; ?>

