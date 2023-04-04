<?php
require_once "inc/connection.php";
if (!$conn) {
	die("Can't connect to the Database.");
}else{
	$post_id = isset($_GET['id']) ? $_GET['id'] : "";
	if( $_GET['id'] == ""){
		die("The post ID has not been passed through the URL parameter.");
	}
	$sql = "SELECT * FROM blog_posts WHERE id = $post_id";
	$result = mysqli_query($conn, $sql);
	$post = mysqli_fetch_assoc($result);
}
require_once 'header.php';
$url = 'http';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$currentUrl .= "s";
}
$url .= "://".$_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
?>
<article class="blog-contents py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="thumbnail mb-4">
					<img src="<?php echo $post['thumbnail'] ?>" class="img-fluid w-100" alt="...">
				</div>
				<h1 class="h1"><?php echo $post['title']; ?></h1>
				<div class="row justify-content-between">
					<div class="col col-auto">
						<div class="opacity-75 fs-3">Author : <?php echo $post['author']; ?></div>
					</div>
					<div class="col col-auto">
						<ul class="list-inline fs-3">
							<li class="list-inline-item">Share : </li>
							<li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="bi bi-facebook"></i></a></li>
							<li class="list-inline-item"><a target="_blank"  href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $url; ?>"><i class="bi bi-linkedin"></i></a></li>
							<li class="list-inline-item"><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo urlencode($post['title']); ?>"><i class="bi bi-twitter"></i></i></a></li>
						</ul>
					</div>
				</div>
				<div class="py-4 border-top fs-5">
					<?php echo $post['content']; ?>
				</div>
			</div>
			<div class="col-lg-4">
				<aside>
					<div class="">
						<form class="d-flex" role="search">
							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Search</button>
						</form>
					</div>
					<div class="border-top mt-5 p-3">
						<h6>Category</h6>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="">Fasion</a></li>
							<li class="list-group-item"><a href="">Movie</a></li>
							<li class="list-group-item"><a href="">Travel</a></li>
							<li class="list-group-item"><a href="">Fishing</a></li>
							<li class="list-group-item"><a href="">Business</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</article>
<?php
require_once 'footer.php';
?>