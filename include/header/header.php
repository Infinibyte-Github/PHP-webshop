<style>
    <?php include 'header.css'; ?>
</style>

<header>
    <div class="leftDivHeader">
        <h1>Electronics Superstore</h1>
        <nav>
            <ul>
                <li><a href="/PHP-webshop/">Home</a></li>
                <li><a href="/PHP-webshop/products/">Products</a></li>
            </ul>
        </nav>
    </div>

    <div class="middleDivHeader">
        <form action="#" method="get">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="rightDivHeader">
        <?php
        if (isset($_SESSION['userID']) && $_SESSION['admin'] == 0) {
            echo '<a href="/PHP-webshop/cart/" class="btn">Shopping Cart</a>';
            echo '<a href="/PHP-webshop/profile/" class="btn">Profile</a>';
            echo '<a href="/PHP-webshop/logout/" class="btn">Logout</a>';
        }
        else if (isset($_SESSION['userID']) && $_SESSION['admin'] == 1) {
            echo '<a href="/PHP-webshop/admin/" class="btn">Admin</a>';
            echo '<a href="/PHP-webshop/logout/" class="btn">Logout</a>';
        }
        else {
            echo '<a href="/PHP-webshop/login/" class="btn">Login</a>';
            echo '<a href="/PHP-webshop/signup/" class="btn">Sign Up</a>';
        }
        ?>
    </div>
</header>