<?php get_header(); ?>
			<div class="span8" id="content">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>	
							<div class="page-header"><h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php the_content( __("Read more &raquo;","aws-bootstrap") ); ?>
						</section> <!-- end article section -->
						<footer>
			
							<p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","aws-bootstrap") . ':</span> ', ' ', ''); ?></p>	
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
						
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "aws-bootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "aws-bootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
			</div>
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>