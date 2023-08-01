<?php $contato = get_page_by_title('contato')->ID; ?>

  <ul>
    <?php 
      $redes_sociais = get_field('redes_sociais', $contato);
      if(isset($redes_sociais)) { foreach($redes_sociais as $rede_social) {
    ?>
      <li><a href="<?php echo $rede_social['link_social'];?>" target="_blank"><img src="<?php echo $rede_social['imagem_social'];?>" alt="<?php echo $rede_social['nome_social'];?>"></a></li>
    <?php } } ?>
  </ul>