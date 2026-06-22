<?php get_header(); ?>

<main>
  <?php if (have_posts()) : ?>
  <section id="one_work_detail" class="sec_padding">
    <div class="container">
      <h3 class="site_name"><?php the_title(); ?></h3>

      <div class="main_detail flex flex-between">
        <div class="one_work_detail_content">
          <dl>
            <dt>サイトURL</dt>
            <dd>
              <a href="<?php the_field('site_url'); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_field('site_url'); ?></a>
              <?php if(!empty(get_field('site_url02'))): ?>
                <a href="<?php the_field('site_url02'); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_field('site_url02'); ?></a>
              <?php endif; ?>
            </dd>
          </dl>
          <?php if(!empty(get_field('envi'))) : ?>
          <dl>
            <dt>使用技術</dt>
            <dd>
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
            </dd>
          </dl>
          <?php endif; ?>

          <?php if(!empty(get_field('in_charge'))) : ?>
          <dl>
            <dt>担当業務</dt>
            <dd>
              <?php echo get_field('in_charge'); ?>
            </dd>
          </dl>
          <?php endif; ?>
        </div>

        <figure>
          <img src="<?php the_field('main_img'); ?>" alt="<?php the_title(); ?>">
        </figure>
      </div>

      <?php if(!empty(get_field('outline'))) : ?>
      <dl class="work_explain fadeUp">
        <dt>制作概要</dt>
        <dd><?php the_field('outline'); ?></dd>
      </dl>
      <?php endif; ?>

      <div class="work_img flex fadeUp">
        <?php if(!empty(get_field('pc_img'))) : ?>
        <div class="pc_img">
          <p class="en">pc</p>
          <figure>
            <img src="<?php the_field('pc_img'); ?>" alt="<?php the_title(); ?>">
          </figure>
        </div>
        <?php endif; ?>

        <?php if(!empty(get_field('sp_img'))) : ?>
        <div class="sp_img">
          <p class="en">sp</p>
          <figure>
            <img src="<?php the_field('sp_img'); ?>" alt="<?php the_title(); ?>">
          </figure>
        </div>
        <?php endif; ?>
      </div>

      <?php if(!empty(get_field('banner_img'))): ?>
      <div class="work_banner_img fadeUp">
        <?php if(!empty(get_field('banner_img'))): ?>
        <div class="pc_img">
          <figure>
            <img src="<?php the_field('banner_img'); ?>" alt="<?php the_title(); ?>">
          </figure>
        </div>
        <?php endif; ?>

        <?php if(!empty(get_field('banner_img02'))): ?>
        <div class="pc_img">
          <figure>
            <img src="<?php the_field('banner_img02'); ?>" alt="<?php the_title(); ?>">
          </figure>
        </div>
        <?php endif; ?>

        <?php if(!empty(get_field('banner_img03'))): ?>
        <div class="pc_img">
          <figure>
            <img src="<?php the_field('banner_img03'); ?>" alt="<?php the_title(); ?>">
          </figure>
        </div>
        <?php endif; ?>

        <?php if(!empty(get_field('banner_img04'))): ?>
        <div class="pc_img">
          <figure>
            <img src="<?php the_field('banner_img04'); ?>" alt="<?php the_title(); ?>">
          </figure>
        </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>

      <div class="work_page flex flex-between">
        <?php if (get_previous_post()):?>
        <div class="prev">
          <?php previous_post_link('%link', 'prev'); ?>
        </div>
        <?php endif; ?>

        <?php if (!(get_next_post())):?>
        <div class="back_work next last">
          <?php elseif(!(get_previous_post())) : ?>
          <div class="back_work prev last">
            <?php else : ?>
            <div class="back_work">
              <?php endif; ?>
              <a href="/work/">作業一覧を見る</a>
            </div>

            <?php if(get_next_post()):?>
            <div class="next">
              <?php next_post_link('%link', 'next'); ?>
            </div>
            <?php endif; ?>
          </div>
      </div>
  </section>
  <?php endif; ?>
</main>

<?php get_footer(); ?>