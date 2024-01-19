<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

<h1 class="text-3xl font-bold main-text mb-6">Welcome to Future In Box</h1>

<!-- Registration Form -->
<form class="space-y-6" action="/registration" method="POST" id="form">

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium input-label">Email</label>
        <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="password" class="block text-sm font-medium input-label">Password</label>
        <input type="password" id="password" name="password" class="form-input mt-1 block w-full" required>
    </div>

    <button type="submit" class="g-recaptcha submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400"
            data-sitekey="6LdOSFUpAAAAAAE_0T-ncJxUwzsmLNpg-_MM0WEM"
            data-callback='onSubmit'
            data-action='submit'>Register
    </button>
</form>

<?php if (isset($errors)) : ?>
    <?php foreach ($errors as $error) : ?>
        <p class="text-red-500 mt-4">
            <?= $error ?>
        </p>
    <?php endforeach; ?>
<?php endif ?>

<div class="mt-4">
    <p class="footer-text">Already have an account? <a href="/login" class="login-link">Login here</a></p>
</div>


<?php require(__DIR__ . '/../partials/footer.php') ?>



