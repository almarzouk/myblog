<?php include './inc/header.php';
include './admin/inc/functions.php';
include './inc/db.php' ?>
<!-- Responsive navbar-->
<?php include './inc/navbar.php' ?>
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <?php
                if (isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                    $post_author = $_GET['author'];
                }
                $query = "SELECT * FROM posts WHERE post_user = '$post_author'";
                $stat = $conn->query($query);
                $result = $stat->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php if (empty($result)) : ?>
                    <h2 class="text-center">there is no article !</h2>
                <?php else : ?>
                    <?php foreach ($result as $post) : ?>
                        <?php
                        $post_id = $post['post_id'];
                        $post_title = $post['post_title'];
                        $post_user = $post['post_author'];
                        $post_date = $post['post_date'];
                        $post_image = $post['post_image'];
                        $post_content = $post['post_content'];
                        $post_cat_id = $post['post_cat_id'];
                        $post_tags = $post['post_tags'];
                        $post_comment_count = $post['post_comment_count'];
                        $post_status = $post['post_status'];
                        $post_view_count = $post['post_view_count'];
                        ?>
                        <div class="card mb-4 bordered">
                            <a href="post.php?p_id=<?= $post_id ?>"><img class="card-img-top" src="./images/<?= $post_image ?>" alt="..." /></a>
                            <div class="card-body">
                                <a href="post.php?p_id=<?= $post_id ?>" class="card-title h2 mb-3 text-decoration-none"><?= $post_title ?></a>
                                <div class="small text-muted mb-3 mt-3">by: <a href="author_posts.php?author=<?= $post_user ?>&p_id=<?= $post_id ?>"><?= $post_user ?></a></div>
                                <p class="card-text">date: <?= $post_date ?></p>
                                <p class="card-text text-secondary">status: <?= $post_status ?></p>
                                <p href="#" class="card-text p d-block mb-3 text-decoration-none"><?= $post_content ?></p>
                                <a class="btn btn-primary" href="post.php?p_id=<?= $post_id ?>">Read more →</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </article>
            <!-- Comments section-->
        </div>
        <!-- Side widgets-->
        <?php include './inc/sidebar.php' ?>
    </div>
</div>

<?php include './inc/footer.php' ?>