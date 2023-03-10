<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/myblog">Blogy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') {
                        echo "<li class='nav-item'><a class='nav-link' href='/myblog/admin/index.php'>Admin</a></li>";
                        if (isset($_GET['p_id'])) {
                            $the_post_id = $_GET['p_id'];
                            echo "<li class='nav-item'><a class='nav-link' href='/myblog/admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit post</a></li>";
                        }
                    }
                    if ($_SESSION['user_role'] == 'subscriber') {
                        echo "<li class='nav-item'><a class='nav-link' href='/myblog/profile.php'>Profile</a></li>";
                    } else {
                        echo "<li class='nav-item'><a href='/myblog/inc/logout.php' class='nav-link'>Logout</a></li>";
                    }
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='/myblog/registeration.php'>Register</a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>