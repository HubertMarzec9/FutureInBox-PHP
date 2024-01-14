<?php require(__DIR__ . '/../../partials/head.php') ?>

<?php require(__DIR__ . '/../../partials/nav.php') ?>

<?php require(__DIR__ . '/../../partials/banner.php') ?>

    <!-- Main Content -->
    <div class="container mx-auto flex-1 relative">
        <div class="max-w-lg mx-auto main-bg p-8 rounded shadow-md absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">

            <div class="container mx-auto flex-1 p-8 ">

                <p class="mb-2"><a href="/change-email">Change email</a></p>

                <p class="mb-2">
                <form action="/confirm-email" method="POST">
                    <button type="submit" class="submit-btn py-2 px-4 rounded bg-blue-300 text-white hover:bg-blue-400">
                        Confirm email
                    </button>
                </form>
                </p>
            </div>

        </div>
    </div>

<?php require(__DIR__ . '/../../partials/footer.php') ?>