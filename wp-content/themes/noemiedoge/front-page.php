<?php get_header(); ?>
<div class="container-full container-cloud">
	<div class="cloud ">
		<?php
		$worksQuery = new WP_Query( query: [
			'post_type' => 'works',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		] );
		while ( $worksQuery->have_posts() ):
			$worksQuery->the_post();
			?>
				<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				<?php if ( has_post_thumbnail() ): ?>
					<span class="cloud-thumbnail">
						<?php the_post_thumbnail(); ?>
					</span>
				<?php endif; ?>
				</a>
      	<a class="deco">·</a>
		<?php
		endwhile;
	
		wp_reset_postdata();
		?>
	</div>
</div>



<?php get_template_part( 'nav', 'below' ); ?>
<?php get_footer(); ?>

