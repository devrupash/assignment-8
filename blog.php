<?php
require_once "inc/connection.php";
if (!$conn) {
	die("Can't connect to the Database.");
}else{
	$sql = "SELECT * FROM blog_posts ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);
}
require_once 'header.php';
?>
<section class="featured-posts py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-5">Latest Posts</h1>
            </div>
        </div>
        <?php
        if(mysqli_num_rows($result) > 0):
        ?>
        <div class="row g-4">
            <?php
            while($data = mysqli_fetch_assoc($result)):
            ?>
            <div class="col-lg-4">
                <div class="card">
                    <img src="<?php echo $data['thumbnail']; ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['title']; ?></h5>
                        <p class="card-text"><?php echo $data['excerpt']; ?></p>
                        <a href="http://localhost/assignment-8/single-post.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-info" role="alert">No posts available in the database.</div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php
require_once 'footer.php';
?>
