<?php require(__DIR__ . '/../partials/head.php') ?>

<?php require(__DIR__ . '/../partials/nav.php') ?>

<?php require(__DIR__ . '/../partials/banner.php') ?>

<div class="container mx-auto flex-1 p-8">

    <p class="mb-4">
        <a href="/reset-password" class="text-blue-500 hover:underline">Change password</a>
    </p>

    <p class="mb-4">
        <a href="/change-email" class="text-blue-500 hover:underline">Change email</a>
    </p>

    <?php if (!$_SESSION['user']['is_verified'] ?? false) : ?>
        <p class="mb-4">
            <a href="/confirm-email" class="text-blue-500 hover:underline">Confirm email</a>
        </p>
    <?php endif; ?>

</div>

<?php require(__DIR__ . '/../partials/footer.php') ?>
