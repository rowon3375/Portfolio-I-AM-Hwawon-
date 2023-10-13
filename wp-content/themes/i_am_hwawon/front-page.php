<?php 
$title = "I Am Hwawon | Portfolio";
?>
<!-- head -->
<?php include('/ilove4622/www/common/parts/head.php'); ?>
<body>
    <!-- header -->
    <?php include('/ilove4622/www/common/parts/header.php'); ?>

    <!-- main -->
    <main>
        <!-- mv -->
        <section id="mv" class="sec_padding sticky">
            <div class="container">
                <p class="main_copy en">i am <br>hwawon</p>
                <h1>portfolio</h1>
            </div>
        </section>

        <!-- work -->
        <section id="work" class="sec_padding fadeUp">
            <div class="container">
                <div class="sec_title">
                    <h2>work</h2>
                </div>

                <div class="work_content">
                    <div class="work_list flex">
                    <?php
                    //work/work_cate/top表示
                        $args = array(
                            'post_type' => 'work',
                            'posts_per_page' => 6,
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'work_cate',
                                    'field' => 'slug',
                                    'terms' => 'top',
                                )
                            )
                        ); 
                        $work = new WP_Query($args);
                    ?>
                        <?php if ($work->have_posts()) : while ($work->have_posts()) : $work->the_post(); ?>
                            <div class="one_work">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
                                            <p class="work_detail_title">期間</p>
                                            <p><?php the_field('term'); ?></p>
                                        </div>

                                        <div class="explan">
                                            <p><?php the_field('top_explain'); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; endif; ?>
                        <?php wp_reset_postdata(); ?>
                </div>
                

                    <div class="btn">
                        <a href="/work/">detail</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- skill -->
        <section id="skill" class="sec_padding flex flex-between">
            <div class="sec_title">
                <h2>skill</h2>
            </div>

            <div class="container">
                <div class="fadeUp">
                    <div class="skill_content">
                        <div class="skill_box">
                            <p class="mini_title en">front-end</p>

                            <ul class="flex">
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>WordPress</li>
                                <li>Jquery</li>
                                <li>JavaScript</li>
                            </ul>
                        </div>

                        <div class="skill_box">
                            <p class="mini_title en">back-end</p>

                            <div class="back_skill">

                            <div class="one_box">
                                <p class="en">- language/framework</p>

                                <ul class="flex">
                                    <li>PHP</li>
                                    <li>Laravel</li>
                                </ul>
                            </div>
                            <div class="one_box">
                                <p class="en">- database</p>

                                <ul class="flex">
                                    <li>MySQL</li>
                                    <li>MariaDB</li>
                                </ul>
                            </div>
                            </div>
                        </div>

                        <div class="skill_box">
                            <p class="mini_title en">software</p>

                            <ul class="flex">
                                <li>VS-Code</li>
                                <li>GitLab</li>
                                <li>SourceTree</li>
                            </ul>
                        </div>
                    </div>

                    <div class="btn">
                        <a href="/skill/">detail</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- about -->
        <section id="about" class="sec_padding flex flex-between">
            <div class="sec_title">
                <h2>about</h2>
            </div>

            <div class="container">
                <div class="about_content fadeUp">
                    <ul class="flex">
                        <!-- 挑戦・可能性・努力・経験・粘り -->
                        <li>challenge</li>
                        <li>possibility</li>
                        <li>effort</li>
                        <li>experience</li>
                    </ul>
                    
                    <div class="about_text">
                        <p>初めまして！<br>私は韓国から来た、朴 和元(パク ファウォン)と申します。</p>

                        <p>やりたいことのためなら恐れず挑戦して、<br class="pc-only1">早く慣れるように努力する強みを持って成長し続ける<br>
                        <span class="import_color">オールラウンダー</span>を目指して経験を積み重ねています！</p>

                        <p>未経験から初め、<span class="import_line_before">HTML・CSS・WordPress・PHP</span>など色な言語を携わっています。<br>
                        現在は、デザインソフトウェアーの<span class="import_line_before">PhotoShop・XD・Figma</span>を勉強しています。<br>
                        ウェブデザインからシステムまで幅広く関心を持っています。
                        </p>
                    </div>

                    <div class="btn">
                        <a href="about">about me</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- contact -->
        <section id="contact" class="sec_padding fadeUp">
            <div class="container">
                <div class="sec_title">
                    <h2>contact</h2>
                </div>

                <div class="contact_form">
                    <form action="/contact/mail.php" method="POST">
                        <dl>
                            <dt>name<span>*</span></dt>
                            <dd><input type="text" name="name" value="" placeholder="park hwa won" class="rq js-characters-change"></dd>
                        </dl>

                        <dl>
                            <dt>tel<span>*</span></dt>
                            <dd><input type="tel" name="tel" value="" placeholder="080-1234-5678" class="rq js-characters-change"></dd>
                        </dl>

                        <dl>
                            <dt>email<span>*</span></dt>
                            <dd><input type="email" name="email" value="" placeholder="yourEmail@gamil.com" class="rq js-characters-change"></dd>
                        </dl>

                        <dl>
                            <dt>message<span>*</span></dt>
                            <dd><textarea name="message" cols="30" rows="10" value="" placeholder="contact message" class="rq js-characters-change"></textarea></dd>
                        </dl>

                        <div class="btn">
                            <input type="submit" value="contact">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <?php include('/ilove4622/www/common/parts/footer.php'); ?>
</body>
<script src="/common/js/common.js"></script>
<script src="/contact/js/page.js"></script>
</html>