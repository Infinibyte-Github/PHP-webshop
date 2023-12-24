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
        <input id="search" type="text" name="search" placeholder="Search...">

        <div id="response"></div>

        <!-- import ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- ajax search -->
        <script>
            $(document).ready(function() {
                $("#search").keyup(function() {
                    var search = $(this).val();
                    if (search != "") {
                        $.ajax({
                            url: '/PHP-webshop/include/header/search.php',
                            method: 'POST',
                            data: {
                                search:search
                            },
                            success: function(response) {
                                $("#response").html(response);
                            }
                        });
                    } else {
                        $("#response").html("");
                    }
                });
            });
        </script>
    </div>

    <div class="rightDivHeader">
        <?php
        if (isset($_SESSION['userID']) && $_SESSION['admin'] == 0) {
            echo '<a href="/PHP-webshop/cart/" class="btn">Shopping Cart</a>';
            echo '<a href="/PHP-webshop/profile/" class="btn">Profile</a>';
            echo '<a href="/PHP-webshop/logout/" class="btn">Logout</a>';
        } else if (isset($_SESSION['userID']) && $_SESSION['admin'] == 1) {
            echo '<a href="/PHP-webshop/admin/" class="btn">Admin</a>';
            echo '<a href="/PHP-webshop/logout/" class="btn">Logout</a>';
        } else {
            echo '<a href="/PHP-webshop/login/" class="btn">Login</a>';
            echo '<a href="/PHP-webshop/signup/" class="btn">Sign Up</a>';
        }
        ?>
    </div>
</header>