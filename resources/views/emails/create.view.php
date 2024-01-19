<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

    <style>
        .form-input {
            resize: none;
        }
    </style>

            <h1 class="text-3xl font-bold main-text mb-6">Welcome to Future In Box</h1>

            <!-- Login Form -->
            <form class="space-y-6" action="/email" method="POST" id="form">

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium input-label">Title</label>
                    <input type="text" id="title" name="title" class="form-input mt-1 block w-full"
                           required
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium input-label">Body</label>
                    <textarea id="body" name="body" class="form-input mt-1 block w-full" rows="4" required></textarea>
                </div>


                <div class="mb-4">
                    <label for="date" class="block text-sm font-medium input-label">Date</label>
                    <input type="date" id="date" name="date" class="form-input mt-1 block w-full" required>
                </div>

                <button type="submit" class="g-recaptcha submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400"
                        data-sitekey="6LdOSFUpAAAAAAE_0T-ncJxUwzsmLNpg-_MM0WEM"
                        data-callback='onSubmit'
                        data-action='submit'>Add</button>
            </form>

            <?php if (isset($errors)) : ?>
                <?php foreach ($errors as $error) : ?>
                    <p class="text-red-500 mt-4">
                        <?= $error ?>
                    </p>
                <?php endforeach; ?>
            <?php endif ?>

</div>
<?php require(__DIR__ . '/../partials/footer.php') ?>