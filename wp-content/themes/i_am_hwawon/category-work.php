<?php 
$title = "Work | I Am Hwawon";
?>
<?php get_header(); ?>
    <!-- main -->
    <main>
       <!-- work -->
       <section id="work_detail" class="sec_padding">
        <div class="container">
            <div class="detail_title">
                <h2>work</h2>           
            </div>

            <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <div class="work_cate">
                <ul class="flex">
                    <?php
                        wp_list_categories(array(
                            'show_option_all' => 'all',
                            'taxonomy' => 'work_cate',
                            'title_li' => '',
                            'hide_empty' => false,
                            'show_count' => 0,
                            'object_type' => 'work'
                        ));
                    ?>
                </ul>
            </div>

            <div class="work_content flex flex-between fadeUp">
                
                <div class="one_work">
                    <a href="<?php the_permalink(); ?>">
                        <figure>
                            <img src="<?php the_field('main_img'); ?>" alt="<?php the_title(); ?>">
                        </figure>

                        <div class="work_detail">
                            <h3 class="title"><?php the_title(); ?></h3>

                            <div class="work_detail_content">
                                <p class="work_detail_title">環境</p>

                                <?php
                                if(get_field('envi')){
                                    echo '<ul class="envi">';
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
                                    echo '</ul>';
                                }
                                ?>
                            </div>

                            <div class="work_detail_content">
                                <p class="work_detail_title">担当</p>

                                <?php
                                if(get_field('in_charge')){
                                    echo '<ul class="in_charge flex">';
                                    foreach(get_field('in_charge') as $charge){
                                        echo '<li>';
                                        if(is_array($charge)){
                                            //bothの場合、ラベルを出力
                                            echo $charge['label'];
                                        }else{
                                            //単独の返り値の場合の出力
                                            echo $charge;
                                        }
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>
                            </div>

                            <div class="work_detail_content">
                                <p class="work_detail_title">期間</p>
                                <p><?php the_field('term'); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php endwhile; endif; ?>
        </div>
       </section>
    </main>

    <!-- footer -->
    <?php include('/ilove4622/www/common/parts/footer.php'); ?>
</body>
<script src="/common/js/common.js"></script>
</html>