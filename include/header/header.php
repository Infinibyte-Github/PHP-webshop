<style>
    <?php include 'header.css'; ?>
</style>

<header>
    <div class="leftDivHeader">
        <h1>Electronics Superstore</h1>
        <nav>
            <ul>
                <li><a href="/webshop/">Home</a></li>
                <li><a href="/webshop/products/">Products</a></li>
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
        if (isset($_SESSION['userID'])) {
            echo '<a href="/webshop/cart/" class="btn">Shopping Cart</a>';
            echo '<a href="/webshop/logout/" class="btn">Logout</a>';
        }
        else {
            echo '<a href="/webshop/login/" class="btn">Login</a>';
            echo '<a href="/webshop/signup/" class="btn">Sign Up</a>';
        }
        ?>
    </div>
</header>