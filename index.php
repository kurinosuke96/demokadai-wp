<?php get_header(); //header.phpを取得 ?>
  <div id="content" class="clearfix">
    <aside>
      <?php get_sidebar(); //sidebar.phpを取得 ?>
    </aside>
    <article>

    <?php if ( have_posts() ) : //条件分岐：投稿があるなら ?>

      <section>
        <h1 class="blog-title-category"><?php echo get_the_archive_title(); //アーカイブページのタイトルを表示 ?></h1>
      </section>

      <?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>

        <section <?php post_class(); //投稿の種類に応じたクラスを付加 ?>>
          <h2 class="blog-title-index"><a href="<?php the_permalink(); //投稿（固定ページ）のリンクを取得 ?>"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></a></h2>
          <div class="blog-wrap">
            <div class="blog-header">
              <div class="date"><?php the_time('Y.m.j');//投稿日時を表示 パラメータで書式を指定 ?></div>
              <div class="category">カテゴリー：<?php the_category(','); //投稿の属するカテゴリー名を全て表示 パラメータで区切り文字を指定 ?></div>
              <!-- ここから追加したコード -->
                  <?php if ( in_category ('products')) : ?>
                
                    この記事で紹介する製品のお値段は<?php echo get_post_meta($post->ID , '定価' , true); ?>円です。<br>
                    発売が開始されたのは<?php echo get_post_meta($post->ID , '発売年' , true); ?>年です。
                
                   <?php endif; ?>
                   <?php if ( in_category ('staff')) : ?>
                
                    この記事の所要時間は<?php echo get_post_meta($post->ID , 'この記事の所要時間' , true); ?>です。<br>
                
                   <?php endif; ?>
                <!-- 追加コード　ここまで -->
            </div>
            <div class="blog-body">
              <?php the_excerpt(); //投稿（固定ページ）の要約を表示 ?>
              <div class="blog-footer">
                <a href="<?php the_permalink(); ?>">続きを見る</a>
              </div>
            </div>
          </div>
        </section>

      <?php endwhile; // 繰り返し終了 ?>

      <section class="clearfix">
        <?php wp_pagenavi(); ?>
      </section>

    <?php else : //条件分岐：投稿が無い場合は ?>

      <h2>投稿がみつかりません。</h2>
      <p><a href="<?php echo home_url(); ?>">トップページに戻る</a></p>

    <?php endif; //条件分岐終了 ?>

    </article>
  </div>
<?php get_footer(); ?>