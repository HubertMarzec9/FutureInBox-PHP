<!-- Navigation -->
<nav class="nav-bg p-4">
    <div class="container mx-auto flex justify-between items-center relative">
        <div id="logo-container">
            <img class="h-8 w-8" src="logo.png" alt="FutureInBox">
            <a href="#" class="text-2xl font-bold nav-link">Future In Box</a>
        </div>
        <div class="md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <!-- Dodane mobilne menu -->
            <div id="mobile-menu">
                <a href="/"
                   class="<?php echo urlIs('/') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <a href="/login"
                       class="<?php echo urlIs('/login') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                    <a href="/registration"
                       class="<?php echo urlIs('/registration') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                <?php else : ?>

                    <a href="/create-email"
                       class="<?php echo urlIs('/create-email') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Create
                        email</a>
                    <a href="/scheduled-emails"
                       class="<?php echo urlIs('/scheduled-emails') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Scheduled
                        emails</a>
                    <a href="/account-settings"
                       class="<?php echo urlIs('/account-settings') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Account
                        settings</a>


                    <form method="POST" action="/login">
                        <input type="hidden" name="_method" value="DELETE">
                        <button
                                class="<?php echo urlIs('/registration') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Log out
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <div class="hidden md:flex">

            <a href="/"
               class="<?php echo urlIs('/') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
            <?php if (!isset($_SESSION['user'])) : ?>
                <a href="/login"
                   class="<?php echo urlIs('/login') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                <a href="/registration"
                   class="<?php echo urlIs('/registration') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
            <?php else : ?>

                <a href="/create-email"
                   class="<?php echo urlIs('/create-email') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Create
                    email</a>
                <a href="/scheduled-emails"
                   class="<?php echo urlIs('/scheduled-emails') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Scheduled
                    emails</a>
                <a href="/account-settings"
                   class="<?php echo urlIs('/account-settings') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Account
                    settings</a>


                <form method="POST" action="/login">
                    <input type="hidden" name="_method" value="DELETE">
                    <button
                            class="<?php echo urlIs('/registration') ? "bg-blue-300 text-white" : "text-gray-300 " ?>  hover:bg-blue-400 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                        Log out
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</nav>
