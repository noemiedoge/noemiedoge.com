<?php get_header(); ?>

<nav>
	<ul>
	<?php
	$worksQuery = new WP_Query( query: [
		'post_type' => 'works',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	] );
	while ( $worksQuery->have_posts() ):
		$worksQuery->the_post();
		?>
		<li>
			<a href="<?php the_permalink(); ?>">
			<h2><?php the_title(); ?></h2>
			<?php the_excerpt(); ?>
			<?php if ( has_post_thumbnail() ): ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			</a>
		</li>
	<?php
	endwhile;

	wp_reset_postdata();
	?>
	</ul>
</nav>



<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>

