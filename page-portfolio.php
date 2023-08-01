<?php
	// Template Name: Portfolio
	get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php include(TEMPLATEPATH . "/inc/introducao.php"); ?>

	<section class="container animar-interno">
		<ul class="rslides">
			<?php 
				$quotes_portfolio = get_field('quotes_portfolio');
				if(isset($quotes_portfolio)) { foreach($quotes_portfolio as $quote_portfolio) {
			?>
				<li>
					<blockquote class="quote_clientes">
						<p><?php echo $quote_portfolio['quote'];?></p>
						<cite><?php echo $quote_portfolio['nome_quote'];?></cite>
					</blockquote>
				</li>
			<?php } } ?>
		</ul>
	</section>

	<section class="portfolio">
		<div class="container">
			<?php include(TEMPLATEPATH . "/inc/clientes-portolio.php"); ?>
		</div>
	</section>
<?php endwhile; else: endif; ?>
<?php get_footer(); ?>