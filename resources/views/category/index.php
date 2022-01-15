<?php foreach ($categories as $category): ?>
    <div>
        <h2>
            <a href="<?= route('categories.show', ['id' => $category['id']]); ?>"><?= $category['title'] ?></a>
        </h2>
        <a href="<?= route('news.index', ['category' => $category['id']]); ?>">Новости данной категории</a>
    </div>
    <hr>
<?php endforeach; ?>
