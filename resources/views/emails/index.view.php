<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

<div class="container mx-auto flex-1 p-8">

    <?php if (empty($emails)) : ?>
        <p class="text-lg font-bold text-gray-800">No emails available.</p>
    <?php else : ?>
        <ol class="list-decimal list-inside">
            <?php foreach ($emails as $email) : ?>
                <li class="text-blue-500 hover:underline mb-2">
                    <a href="/email?id=<?= $email['id'] ?>"><?= $email['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>

</div>

<?php require(__DIR__ . '/../partials/footer.php') ?>
