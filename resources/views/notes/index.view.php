<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p>
                <?php /** @var TYPE_NAME $notes */
                foreach ($notes as $note) : ?>
                    <a href='/note?id=<?= $note['id'] ?>' class='text-blue-500 hover:underline'>
                        <li> <?= $note['body'] ?> </li>
                    </a>
                <?php endforeach; ?>
            </p>

            <p class="mt-10">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>
        </div>
    </main>

<?php require(__DIR__ . '/../partials/footer.php') ?>