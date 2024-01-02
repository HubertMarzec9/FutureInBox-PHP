<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

    <!-- Main Content -->
    <div class="container mx-auto flex-1">
        <div class="max-w-lg mx-auto main-bg p-8 rounded shadow-md">
            <h1 class="text-3xl font-bold main-text mb-6">Welcome to Future In Box</h1>

            <!-- Registration Form -->
            <form class="space-y-6" action="/registration" method="POST">

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium input-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium input-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input mt-1 block w-full" required>
                </div>

                <button type="submit" class="submit-btn py-2 px-4 rounded bg-lime-700 text-white hover:bg-lime-600">Register</button>
            </form>

            <?php if (isset($errors)) : ?>
                <?php foreach ($errors as $error) :?>
                    <p class="text-red-500 mt-4">
                        <?= $error ?>
                    </p>
                <?php endforeach; ?>
            <?php endif ?>

            <div class="mt-4">
                <p class="footer-text">Already have an account? <a href="/login" class="login-link">Login here</a></p>
            </div>
        </div>
    </div>

<?php require(__DIR__ . '/../partials/footer.php') ?>



