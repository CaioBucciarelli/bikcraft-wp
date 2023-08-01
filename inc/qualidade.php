<?php $sobre = get_page_by_title('sobre')->ID; ?>
<section class="qualidade container">
	<h2 class="subtitulo"><?php the_field('titulo_qualidade', $sobre); ?></h2>
	<img src="<?php the_field('logo_bikcraft', $sobre); ?>" alt="Bikcraft">
	<ul class="qualidade_lista">
    <?php 
			$itens_qualidade = get_field('itens_qualidade', $sobre);
			if(isset($itens_qualidade)) { foreach($itens_qualidade as $item_qualidade) {
		?>
		<li class="grid-1-3">
			<h3><?php echo $item_qualidade['titulo_item_qualidade'];?></h3>
			<p><?php echo $item_qualidade['descricao_item_qualidade'];?></p>
		</li>
    <?php } } ?>
	</ul>
  <?php if (!is_page('sobre')) { ?>
	<div class="call">
		<p><?php the_field('chamada_sobre', $sobre); ?></p>
		<a href="<?php bloginfo('url') ?>/sobre/" class="btn btn-preto">Sobre</a>
	</div>
  <?php } ?>
</section>