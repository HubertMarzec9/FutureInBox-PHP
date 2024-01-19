<?php require(__DIR__ . '/../../../partials/head.php') ?>

<?php require(__DIR__ . '/../../../partials/nav.php') ?>

<?php require(__DIR__ . '/../../../partials/banner.php') ?>


    <p class="mb-2">
    <form action="/change-email" method="POST" id="form">
        <input type="hidden" name="_method" value="PATCH">
        <label class="block text-sm font-medium input-label" for="email">New email:<br>
            <input class="mb-1" type="email" name="email">
        </label><br>
        <label class="block text-sm font-medium input-label">Password:<br>
            <input type="password" name="password">
        </label>
        <br>

        <button type="submit"
                class="g-recaptcha submit-btn mt-2 py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400"
                data-sitekey="6LdOSFUpAAAAAAE_0T-ncJxUwzsmLNpg-_MM0WEM"
                data-callback='onSubmit'
                data-action='submit'>Change email
        </button>
    </form>
    </p>

<?php if (isset($msg)) : ?>
    <p class="mb-2 mt-4 text-red-500">
        <?= $msg ?>
    </p>
<?php endif; ?>


<?php require(__DIR__ . '/../../../partials/footer.php') ?>