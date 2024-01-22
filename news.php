<?php

$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');
$connection->set_charset("utf8");

$news = 'SELECT * FROM `news`';
$news_result = mysqli_query($connection, $news);
$news_data = mysqli_fetch_all($news_result);

?>

<?php include('./components/header.php') ?>
<div class="container" style="height: 5px; background: blue; border-radius: 10px; margin-bottom: 30px"></div>

<!-- Start Schedule Area -->
<section class="m-2">
	<div class="container">
		<div class="row">
			<?php foreach ($news_data as $news) { ?>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-news">
						<div class="news-head">
							<img style="height: 200px;" src="news_images/<?php echo $news[3] ?>" alt="#" width="350px">
						</div>
						<div class="news-body">
							<div class="news-content">
								<h6 class="p-2" style="color: blue; text-align: justify; font-family:garamond">
									<a href="<?php echo $news[2] ?>" target="_blank">
										<?php echo $news[1] ?>
									</a>
								</h6>
								<p class="text p-2"></p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!--/End Start schedule Area -->

<?php include('./components/footer.php') ?>