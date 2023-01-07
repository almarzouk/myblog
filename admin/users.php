<?php include 'inc/header.php';?>
<?php include 'inc/navbar.php' ?>
<div id="layoutSidenav">
    <?php include './inc/navside.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="text-center bg-light">
                <h3 class="p-5">welcome <?= strtoupper($_SESSION['username']) ?> to your dashboard</h3>
            </div>
            <div class="card text-bg-light m-3 shadow">
                <div class="card-header">users</div>
                <div class="card-body px-4">
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'add_user';
                            include './inc/add_user.php';
                            break;
                        default:
                            include './inc/view_all_users.php';
                            break;
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include 'inc/footer.php'; ?>