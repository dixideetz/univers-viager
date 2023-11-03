<?php 

$args = array( 
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'paged'          => 1
);
    
  $the_query = new WP_Query( $args );
  if ($the_query->have_posts()) :
?>

    <div class="actualites-block"> 
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
        <?php if ( $the_query->current_post == 0 ) : ?>
            <div class="actualites-block__element ">
                <div class="actualites-block__element-image">
                    <?php $categories = get_the_category();
                        foreach( $categories as $category ) : ?>
                        <div class="actualites-block__category"><?php echo $category->name; ?></div>
                    <?php endforeach; ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('actualite-main'); ?>
                    </a>
                </div>
                <div class="actualites-block__element-text">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                    <div class="date"><?php the_date('d/m/Y'); ?></div>
                
                    <a href="<?php the_permalink(); ?>" class="plugin__button wp-block-button__link wp-element-button">
                        <?php _e('Lire la suite'); ?>
                    </a>
                </div>
            </div>
        <?php else : ?>
            <div class="actualites-block__element">
                <div class="actualites-block__element-image">
                    <?php $categories = get_the_category();
                        foreach( $categories as $category ) : ?> 
                        <div class="actualites-block__category <?php echo $category->slug; ?>"><?php echo $category->name; ?></div>
                    <?php endforeach; ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('actualite-list'); ?>
                    </a>
                </div>
                <div class="actualites-block__element-text">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="date"><?php the_date('d/m/Y'); ?></div>
                </div>
            </div>
            
        <?php endif; ?>

        <?php endwhile; ?>
    </div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

<div class="btn__wrapper">
  <a href="#!" class="plugin__button wp-block-button__link wp-element-button" id="load-more"><?php _e('Charger plus d\'articles'); ?></a>
</div>