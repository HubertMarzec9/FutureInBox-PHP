<?php require(__DIR__ . '/../../../partials/head.php') ?>

<?php require(__DIR__ . '/../../../partials/nav.php') ?>

<?php require(__DIR__ . '/../../../partials/banner.php') ?>

    <!-- Main Content -->
    <div class="mx-auto flex-1 relative flex justify-center items-center">
        <div class="max-w-lg mx-auto main-bg p-8 rounded shadow-md">

            <div class="mx-auto flex-1 p-8">

                <p class="mb-2">
                <form action="/confirm-email" method="POST" id="form">
                    <button type="submit" class="g-recaptcha submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400"
                            data-sitekey="6LdOSFUpAAAAAAE_0T-ncJxUwzsmLNpg-_MM0WEM"
                            data-callback='onSubmit'
                            data-action='submit'>Confirm email</button>
                </form>
                </p>

                <?php if (isset($msg)) : ?>
                    <p class="mb-2 mt-4 text-red-500">
                        <?= $msg ?>
                    </p>
                <?php endif; ?>
            </div>

        </div>
    </div>

<?php require(__DIR__ . '/../../../partials/footer.php') ?>