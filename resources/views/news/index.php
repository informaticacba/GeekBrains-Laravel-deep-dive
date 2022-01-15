<?php foreach ($newsList as $news): ?>
    <div>
        <h2>
            <a href="<?= route('news.show', ['id' => $news['id']]) ?>"><?= $news['title'] ?></a>
        </h2>
        <p>Автор: <?= $news['author'] ?>&nbsp; Дата добавления: <?= $news['created_at'] ?></p>
        <p>Номер категории: <?= $news['id_category'] ?></p>

        <p><?= $news['description'] ?></p>
    </div>
    <hr>
<?php endforeach; ?>
