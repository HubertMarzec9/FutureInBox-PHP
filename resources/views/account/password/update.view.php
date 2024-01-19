<?php require(__DIR__ . '/../../partials/head.php') ?>

<?php require(__DIR__ . '/../../partials/nav.php') ?>

<?php require(__DIR__ . '/../../partials/banner.php') ?>

    <div class="container mx-auto flex-1 p-8 ">

        <p class="mb-2">
        <form action="/reset" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="token" value="<?= $_GET['token'] ?? $token ?>">

            <label>
                <input type="password" name="password">
                <br>
                <input type="password" name="password2">
            </label>

            <button type="submit" class="submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400">
                Reset password
            </button>
        </form>
        </p>

        <?php if (isset($msg)) : ?>
            <p class="mb-2 mt-4 text-red-500">
                <?= $msg ?>
            </p>
        <?php endif; ?>
        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <p class="text-red-500 mt-4">
                    <?= $error ?>
                </p>
            <?php endforeach; ?>
        <?php endif ?>
    </div>

<?php require(__DIR__ . '/../../partials/footer.php') ?>