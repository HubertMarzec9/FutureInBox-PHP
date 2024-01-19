<?php require(__DIR__ . '/../../partials/head.php') ?>

<?php require(__DIR__ . '/../../partials/nav.php') ?>

<?php require(__DIR__ . '/../../partials/banner.php') ?>

    <div class="container mx-auto flex-1 p-8 ">

        <p class="mb-2">
        <form action="/reset-password" method="POST" id="form">
            <input type="hidden" name="_method" value="PATCH">
            <button type="submit"
                    class="g-recaptcha submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400"
                    data-sitekey="6LdOSFUpAAAAAAE_0T-ncJxUwzsmLNpg-_MM0WEM"
                    data-callback='onSubmit'
                    data-action='submit'>Reset password
            </button>
        </form>
        </p>

        <?php if (isset($msg)) : ?>
            <p class="mb-2 mt-4 text-red-500">
                <?= $msg ?>
            </p>
        <?php endif; ?>

    </div>

<?php require(__DIR__ . '/../../partials/footer.php') ?>