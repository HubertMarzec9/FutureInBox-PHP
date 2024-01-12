<?php use Core\Session; ?>

<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<!-- Main Content -->
<div class="container mx-auto flex-1 relative">
    <div class="max-w-lg mx-auto main-bg p-8 rounded shadow-md absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <h1 class="text-3xl font-bold main-text mb-6">Welcome to Future In Box</h1>

        <!-- Login Form -->
        <form class="space-y-6" action="/login" method="POST">

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium input-label">Email</label>
                <input type="email" id="email" name="email" class="form-input mt-1 block w-full"
                       required
                       autocomplete="email"
                       value="<?= old('email') ?>">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium input-label">Password</label>
                <input type="password" id="password" name="password" class="form-input mt-1 block w-full" required autocomplete="current-password">
            </div>

            <button type="submit" class="submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400">Login</button>
        </form>

        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) :?>
                <p class="text-red-500 mt-4">
                    <?= $error ?>
                </p>
            <?php endforeach; ?>
        <?php endif ?>

        <div class="mt-4">
            <p class="footer-text">New to Future In Box? <a href="/registration" class="login-link">Create an account</a></p>
        </div>
    </div>
</div>

<?php require(__DIR__ . '/../partials/footer.php') ?>

