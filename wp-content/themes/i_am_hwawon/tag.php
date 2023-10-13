<?php get_header(); 
$postno = 1; ?>

<!-- main -->
<main>


<!-- tag list -->
<div class="tag">
<ul class="flex">
<?php $args = array(
	'orderby' => 'count',
	'order' => 'desc',
	'number' => 4
	);
	$tags = get_terms('post_tag', $args);
	if(empty($tags)): ?>
	<li class="no-tag">タグがありません。</li>
	<?php else:
		foreach($tags as $value) {
		echo '<li><a href="'. get_tag_link($value->term_id) .'" title="'.$value->name.'">'. $value->name .'</a></li>'; }
		?>
	<?php endif; ?>
</ul>
</div>
<div class="page_info">
	<span class="en">tag</span>
	<p>タグ</p>
</div>
<h2><?php single_cat_title(); ?></h2>

<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<figure>
	<!-- アイキャッチがない場合ロゴイメージに対処 -->
	<?php if(has_post_thumbnail()) : ?>
		<?php the_post_thumbnail(); ?>
	<?php else : ?>
		<img src="wp-content/uploads/ogp.png" alt="<?php the_title(); ?>">
	<?php endif;  ?>
</figure>
<?php $postno = $postno + 1; ?>
<?php endwhile; ?>
<?php else: ?>
<div class="no-list">
	<p>該当する記事は見つかりませんでした。</p>
	
	<div class="btn">
		<a href="/blog/" title="Webデザイナーの教科書">全体記事を見る</a>
	</div>
</div>
<?php endif; ?>
<!-- pager -->
<div class="pager container">
	<?php $args = array(
			'mid_size' => 1,
			'prev_text' => '',
			'next_text' => '',
			'screen_reader_text' => ' ',
		);
	$paginationhtml = get_the_posts_pagination($args);
	echo preg_replace('/\<h2 class=\"screen-reader-text\"\>(.*?)\<\/h2\>/ui', '', $paginationhtml); ?>
</div>
</main>

<?php get_footer(); ?>
