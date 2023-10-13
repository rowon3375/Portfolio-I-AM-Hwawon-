<?php get_header(); ?>
    <!-- main -->
    <main>
       <!-- work -->
       <section id="work_detail" class="sec_padding">
        <div class="container">
            <div class="detail_title">
                <h2>work</h2>           
            </div>

            <div class="work_cate">
                <ul class="flex">
                    <?php
                        wp_list_categories(array(
                            'show_option_all' => 'all',
                            'taxonomy' => 'work_cate',
                            'title_li' => '',
                            'hide_empty' => false,
                            'show_count' => 0,
                            'object_type' => 'work',
                            'exclude' => 8 //topカテゴリー除外
                        ));
                    ?>
                </ul>
            </div>
            <div class="fadeUp">
                <div class="work_content flex flex-between">
                <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
                    <div class="one_work">
                        <a href="<?php the_permalink(); ?>">
                            <figure>
                                <img src="<?php the_field('main_img'); ?>" alt="<?php the_title(); ?>">
                            </figure>

                            <div class="work_detail">
                                <h3 class="title"><?php the_title(); ?></h3>

                                <div class="work_detail_content">
                                    <p class="work_detail_title">環境</p>

                                    <ul class="envi">
                                        <?php
                                        foreach(get_field('envi') as $envi){
                                            echo '<li>';
                                            if(is_array($envi)){
                                                //bothの場合、ラベルを出力
                                                echo $envi['label'];
                                            }else{
                                                //単独の返り値の場合の出力
                                                echo $envi;
                                            }
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="work_detail_content">
                                    <p class="work_detail_title">担当</p>

                                    <p>
                                        <?php
                                        $charge = get_field('in_charge');

                                        if($charge){
                                            echo implode(' / ', $charge);
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="work_detail_content">
                                    <p class="work_detail_title">期間</p>
                                    <p><?php the_field('term'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
                </div>

                <!-- pager -->
                <div class="pager">
                    <?php $args = array(
                            'mid_size' => 1,
                            'prev_text' => '',
                            'next_text' => '',
                            'screen_reader_text' => ' ',
                        );
                    $paginationhtml = get_the_posts_pagination($args);
                    echo preg_replace('/\<h2 class=\"screen-reader-text\"\>(.*?)\<\/h2\>/ui', '', $paginationhtml); ?>
                </div>
            </div>
        </div>
       </section>
    </main>

    <!-- footer -->
    <?php include('/ilove4622/www/common/parts/footer.php'); ?>
</body>
<script src="/common/js/common.js"></script>
</html>