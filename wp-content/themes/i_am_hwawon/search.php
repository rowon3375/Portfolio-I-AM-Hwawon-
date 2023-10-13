<?php get_header(); 
$postno = 1;
?>

<!-- main -->
<main>

<!-- search bar -->
<div class="search">
	<form action="<?php echo home_url('/')?>" method="get">
		<input type="text" name="s" placeholder="検索キーワード">
		<input type="image" src="<?= wp_upload_dir()['baseurl'] ?>/common/icon_search.svg">
	</form>
</div>


<div class="page_info">
	<span class="en">serarch</span>
	<p>検索結果</p>
</div>
<h2><?php the_search_query (); ?></h2>
<?php if (have_posts()) : ?>
<?php if (have_posts() && get_search_query()) : 
	while (have_posts()) : the_post(); ?>

<!-- アイキャッチがない場合ロゴイメージに対処 -->
<?php if(has_post_thumbnail()) : ?>
	<?php the_post_thumbnail(); ?>
<?php else : ?>
	<img src="wp-content/uploads/ogp.png" alt="<?php the_title(); ?>">
<?php endif;  ?>
<?php $postno = $postno + 1; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php else: ?>
<div class="no-list">
	<p>検索キーワードに当たる記事を<br class="sp-only1">見つかりませんでした。</p>
	
	<div class="btn">
		<a href="/blog/" title="Webデザイナーの教科書">全体記事を見る</a>
	</div>
</div>
<?php endif; ?>
</main>

<?php get_footer(); ?>