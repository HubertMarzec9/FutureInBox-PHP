<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

    <a href="/scheduled-emails" class=""><b>Back</b></a>
    <div class="container mx-auto flex-1 p-8 ">
        <p class="text-3xl pb-2 underline"><?= $email['title'] ?></p>
        <p><?= $email['body'] ?></p>
        <p class="text-sm text-gray-400 text-right">Date: <?= substr($email['sent_date'], 0, 10) ?></p>
    </div>

<?php require(__DIR__ . '/../partials/footer.php') ?>