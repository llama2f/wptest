<div class="bl_postDate">
  <p>Post date: <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time></p>
  <?php if (get_the_modified_date() != get_the_date()) :?>
  <p><time datetime="">Last modified: <?php the_modified_date(); ?></time></p>
  <?php endif;?>
</div>