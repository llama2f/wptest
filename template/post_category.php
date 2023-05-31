<div class="bl_category">

  <?php
$categories = get_the_category();
if ( $categories ) {
	echo '<ul class="bl_noStyleList">';
	foreach ( $categories as $category ) {
		echo '<li class="'.$category->slug.' el_categoryItem"><a href="'.esc_url(get_category_link($category->term_id)).'">'.$category->name.'</a></li>';
	}
	echo '</ul>';
}
?>

</div>