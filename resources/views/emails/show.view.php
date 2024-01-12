<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

    <!-- Main Content -->
    <div class="container mx-auto flex-1 relative">
        <div class="max-w-lg mx-auto main-bg p-8 rounded shadow-md absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <a href="/scheduled-emails" class=""><b>Back</b></a>
            <div class="container mx-auto flex-1 p-8 ">
                    <p class="text-3xl pb-2 underline"><?= $email['title']?></p>
                    <p><?= $email['body']?></p>
                    <p class="text-sm text-gray-400 text-right">Date: <?= substr($email['sent_date'],0,10) ?></p>
            </div>

        </div>
    </div>

<?php require(__DIR__ . '/../partials/footer.php') ?>