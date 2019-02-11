<?php
    $philosohpy_fp = new WP_Query(array(
        'meta_key' => 'feature_post',
        'meta_value' => '1',
        'posts_per_page' => 3
    ));
    $post_data = array();
    while($philosohpy_fp->have_posts()){
	    $philosohpy_fp->the_post();
	    $cat_obj = get_the_category();
	    $cat_id = $cat_obj[mt_rand(0, count($cat_obj)-1)]->cat_ID;


	    $post_data[] = array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
            'author_name' => get_the_author(),
            'author_avatar' => get_avatar_url(get_the_author_meta('ID')),
            'author_link' => get_author_posts_url(get_the_author_meta('ID')),
            'date' => get_the_date(),
            'cat_name' => get_term($cat_id)->name,
            'cat_link' => get_category_link($cat_id),

        );

    }


    if($philosohpy_fp->post_count>1) :
?>

<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">

            <div class="featured__column featured__column--big">
                <div class="entry" style="background-image:url(<?php echo esc_url($post_data[0]['thumbnail']); ?>);">

                    <div class="entry__content">
                        <span class="entry__category"><a href="<?php echo esc_url($post_data[0]['cat_link']); ?>"><?php echo esc_html($post_data[0]['cat_name']); ?></a></span>

                        <h1><a href="<?php echo esc_url($post_data[0]['permalink']); ?>"><?php echo esc_html($post_data[0]['title']); ?></a></h1>

                        <div class="entry__info">
                            <a href="<?php echo esc_url($post_data[0]['author_link']); ?>" class="entry__profile-pic">
                                <img class="avatar" src="<?php echo esc_url($post_data[0]['author_avatar']); ?>">
                            </a>

                            <ul class="entry__meta">
                                <li><a class="bypostauthor" href="<?php echo esc_url($post_data[0]['author_link']); ?>"><?php echo esc_html($post_data[0]['author_name']); ?></a></li>
                                <li><?php echo esc_html($post_data[0]['date']); ?></li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->
            </div> <!-- end featured__big -->

            <div class="featured__column featured__column--small">

                <?php for ($i=1; $i<3; $i++) : ?>
                <div class="entry" style="background-image:url(<?php echo esc_url($post_data[$i]['thumbnail']); ?>);">

                    <div class="entry__content">
                        <span class="entry__category"><a href="<?php echo esc_url($post_data[$i]['cat_link']); ?>"><?php echo esc_html($post_data[$i]['cat_name']); ?></a></span>

                        <h1><a href="<?php echo esc_url($post_data[$i]['permalink']); ?>"><?php echo esc_html($post_data[$i]['title']); ?></a></h1>

                        <div class="entry__info">

                            <ul class="entry__meta">
                                <li><a href="<?php echo esc_url($post_data[$i]['author_link']); ?>"><?php echo esc_html($post_data[$i]['author_name']); ?></a></li>
                                <li><?php echo esc_html($post_data[$i]['date']); ?></li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->
                </div> <!-- end entry -->
                <?php endfor; ?>
            </div> <!-- end featured__big -->

            </div> <!-- end featured__small -->
        </div> <!-- end featured -->

    </div> <!-- end col-full -->
</div> <!-- end pageheader-content row -->
<?php endif; ?>