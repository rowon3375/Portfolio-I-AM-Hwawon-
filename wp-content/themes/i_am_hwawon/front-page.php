<?php get_header(); ?>
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
        <div class="work_wrap">
          <h3 class="work_sub">coding</h3>
          <ul class="work_list coding_list flex">
            <?php
            $args = array(
              'post_type' => 'work',
              'post_status' => 'publish',
              'tax_query' => array(
                array(
                  'taxonomy' => 'work_cate',
                  'field'    => 'slug',
                  'terms'    => 'coding',
                )
              )
            );

            $work = new WP_Query($args);

            if ($work->have_posts()) :
              while ($work->have_posts()) : $work->the_post();
            ?>
              <li class="one_work">
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
                        if (get_field('envi')) {
                          foreach (get_field('envi') as $envi) {
                            echo '<li>';
                            echo is_array($envi) ? $envi['label'] : $envi;
                            echo '</li>';
                          }
                        }
                        ?>
                      </ul>
                    </div>

                    <div class="explan">
                      <p><?php the_field('outline'); ?></p>
                    </div>
                  </div>
                </a>
              </li>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
        </div>
        <div class="work_wrap">
          <h3 class="work_sub">design</h3>
          <ul class="work_list design_list flex">
            <?php
            $args = array(
              'post_type' => 'work',
              'post_status' => 'publish',
              'tax_query' => array(
                array(
                  'taxonomy' => 'work_cate',
                  'field'    => 'slug',
                  'terms'    => 'design',
                )
              )
            );

            $work = new WP_Query($args);

            if ($work->have_posts()) :
              while ($work->have_posts()) : $work->the_post();
            ?>
              <li class="one_work">
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
                        if (get_field('envi')) {
                          foreach (get_field('envi') as $envi) {
                            echo '<li>';
                            echo is_array($envi) ? $envi['label'] : $envi;
                            echo '</li>';
                          }
                        }
                        ?>
                      </ul>
                    </div>

                    <div class="explan">
                      <p><?php the_field('outline'); ?></p>
                    </div>
                  </div>
                </a>
              </li>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
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
            <p class="mini_title en">tech stack</p>

            <ul class="flex">
              <li>HTML5</li>
              <li>CSS/SCSS</li>
              <li>Jquery</li>
              <li>JavaScript</li>
              <li>WordPress</li>
              <li>PHP</li>
              <li>MySQL(MariaDB)</li>
            </ul>
          </div>

          <div class="skill_box">
            <p class="mini_title en">tools</p>

            <ul class="flex">
              <li>VS-Code</li>
              <li>Git/GitHub</li>
              <li>Git/GitHub</li>
              <li>SourceTree</li>
              <li>Figma</li>
              <li>Photoshop</li>
              <li>XD</li>          
            </ul>
          </div>
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
          <p>
            はじめまして！<br>「学び」と「挑戦」を価値に変えるWebコーダー、朴 和元（パク・ファウォン）です。
          </p>
          <p>
            <span class="import_color">Webコーダー</span>として4年間、コーポレートサイトやLP、コラムサイトなど、さまざまなWebサイト制作に携わってきました。<br>WordPressのオリジナルテーマ開発や運用をはじめ、コーディングを中心に、バナー制作やページ構成の作成などにも携わっています。
          </p>
          <p>
            また、任された仕事には責任を持って向き合い、自分の役割の中で価値を生み出すことを意識しています。<br>技術だけでなく、<span class="import_color">ビジネスの成果にも貢献</span>できるWebコーダーを目指しています。
          </p>          
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>