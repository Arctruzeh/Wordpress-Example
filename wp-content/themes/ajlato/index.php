<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="container">

		<!-- Products -->
		<h2>Get started with SimilarWeb products</h2>
		<div class='products'>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php if (get_post_type() == 'products') : ?>
						<?php $product_color = get_post_meta($post->ID, 'product-color', true); ?>
						<?php $product_link = get_post_meta($post->ID, 'product-link', true); ?>
						<a href="<?php echo $product_link ?>">
							<div class="product">
								<div class='product-image' style='background-color:<?php echo $product_color ?>;'><?php the_post_thumbnail(); ?></div>
								<div class='product-title'><?php the_title(); ?></div>
							</div>
						</a>
					<?php endif ?>
			<?php endwhile;
			else : echo '<p>No content found</p>';
			endif; ?>
		</div>

		<br />

		<!-- Videos -->
		<h2>Get started Videos</h2>

		<div class='videos'>
			<!-- Content -->
			<div class='video-content'>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php if (get_post_type() == 'videos') : ?>
							<?php $videos_link = get_post_meta($post->ID, 'videos-link', true); ?>
							<?php if (get_the_ID() == '21') {
								$styleDisplay = 'style="display: block"';
							} else {
								$styleDisplay = 'style="display: none"';
							} ?>
							<div id="<?php echo get_the_ID() ?>" class="videos-iframe-container w3-container city" <?php echo $styleDisplay ?>>
								<iframe class='videos-iframe' src=" https://www.youtube.com/embed/<?php echo $videos_link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						<?php endif ?>
				<?php endwhile;
				else : echo '<p>No content found</p>';
				endif; ?>

			</div>
			<!-- Menu -->
			<div class="videos-menu">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php if (get_post_type() == 'videos') : ?>
							<div class="w3-bar-item w3-button tablink" onclick="openCity(event, '<?php echo get_the_ID() ?>')"><?php the_title(); ?></div>
							<br />
							<hr />
						<?php endif ?>
				<?php endwhile;
				else : echo '<p>No content found</p>';
				endif; ?>

			</div>

		</div>
		<!-- End Videos -->

		<script>
			function openCity(evt, cityName) {
				var i, x, tablinks;
				x = document.getElementsByClassName("city");
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablink");
				for (i = 0; i < x.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " w3-red";
			}
		</script>

	</div><!-- container -->

	<?php wp_footer(); ?>
</body>

</html>