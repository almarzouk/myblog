<?php include 'inc/header.php'; ?>
<?php include 'inc/navbar.php' ?>
<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $stat = $conn->query($query);
    $result = $stat->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $user) {
        $user_firstname = $user['user_firstname'];
        $user_lastname = $user['user_lastname'];
        $user_role = $user['user_role'];
        $user_role = 'admin';
        $user_email = $user['user_email'];
        $user_password = $user['user_password'];
    }
}
?>

<!-- Form to add category Start-->
<div id="layoutSidenav">
    <?php include './inc/navside.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="text-center bg-light">
                <h3 class="p-5">welcome <?= strtoupper($_SESSION['username']) ?> to your dashboard</h3>
            </div>
            <!-- insert  the form -->
            <?php
            if (isset($_POST['edit_profile'])) {
                $user_id = $_SESSION['user_id'];
                $form_errors = [];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $username = $_POST['username'];
                $user_role = 'admin';
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                if (empty($user_firstname)) {
                    $form_errors[] = 'first name can not be empty';
                }
                if (empty($username)) {
                    $form_errors[] = 'username can not be empty';
                }
                if (empty($user_password)) {
                    $form_errors[] = 'password can not be empty';
                }
                if (empty($user_email)) {
                    $form_errors[] = 'Email can not be empty';
                }
                if (!empty($user_password)) {
                    $query_pass = "SELECT user_password FROM users WHERE user_id = $user_id";
                    $stat = $conn->query($query_pass);
                    $result = $stat->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        $db_user_password = $row['user_password'];
                    }
                    // make the query
                    if (empty($form_errors)) {
                        $query = $conn->prepare("UPDATE `users` SET user_firstname = :user_firstname, user_lastname = :user_lastname, user_role = :user_role, username = :username,user_password = :user_password, user_email = :user_email WHERE user_id = $user_id");
                        // Send the query to database
                        $query->bindValue(':user_firstname', $user_firstname, PDO::PARAM_STR);
                        $query->bindValue(':user_lastname', $user_lastname, PDO::PARAM_STR);
                        $query->bindValue(':user_role', 'admin', PDO::PARAM_STR);
                        $query->bindValue(':username', $username, PDO::PARAM_STR);
                        $query->bindValue(':user_email', $user_email, PDO::PARAM_STR);
                        if ($db_user_password != $user_password) {
                            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('const' => 10));
                            $query->bindValue(':user_password', $hashed_password, PDO::PARAM_STR);
                        } else {
                            $query->bindValue(':user_password', $user_password, PDO::PARAM_STR);
                        }
                        if ($query->execute()) {
                            echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
            your information has been edited
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
                        } else {
                            foreach ($form_errors as $error) {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            $error
            </div>";
                            }
                        }
                    }
                }
            }
            ?>
            <div class="card text-bg-light m-3 shadow">
                <div class="card-header">Edit Your Profile</div>
                <div class="card-body  px-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Firstname</label>
                            <input value="<?= $user_firstname ?>" type="text" class="form-control" name="user_firstname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lastname</label>
                            <input value="<?= $user_lastname ?>" type="text" class="form-control" name="user_lastname">
                        </div>
                        <!-- Select category -->
                        <div class="mb-3">
                            <label class="form-label">User role</label>
                            <div class="mb-3">
                                <input value="<?= $user_role ?>" type="text" disabled class="form-control" name="user_role">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input value="<?= $username ?>" type="text" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input value="<?= $user_email ?>" type="text" class="form-control" name="user_email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input value="<?= $user_password ?>" type="password" class="form-control" name="user_password">
                            </div>
                            <input type="submit" class="btn btn-primary" name="edit_profile" value="Edit Profile">
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Form to add category End-->
<?php include 'inc/footer.php'; ?>