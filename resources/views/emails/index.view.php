<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

    <!-- Main Content -->
    <div class="container mx-auto flex-1 relative">
        <div class="max-w-lg mx-auto main-bg p-8 rounded shadow-md absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">

            <div class="container mx-auto flex-1 p-8 ">

                <?php foreach ($emails as $email) :?>
                    <p>
                        <a href="/email?id=<?=$email['id'] ?>" ><?= $email['title']?></a>
                    </p>
                <?php endforeach; ?>

            </div>

        </div>
    </div>

<?php require(__DIR__ . '/../partials/footer.php') ?>