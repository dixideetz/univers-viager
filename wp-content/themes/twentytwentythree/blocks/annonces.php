<?php 

$args = array( 
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'annonce',
    'posts_per_page' => 3
);
    
  $the_query = new WP_Query( $args );
  if ($the_query->have_posts()) :
?>
  <div class="annonces-block"> 
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
            <div class="annonces-block__element">
                <div class="annonces-block__element-image">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('annonces-list'); ?></a>
                </div>
                <div class="annonces-block__element-text">
                    <div class="annonces-block__element-text-left">
                        <h4><?php the_title(); ?></h4>
                        <div class="localisation"><?php the_field('code_postal', get_the_ID()); ?> <strong><?php the_field('ville', get_the_ID()); ?></strong> </div>
                    </div>
                
                    <a href="<?php the_permalink(); ?>" class="plugin__button wp-block-button__link wp-element-button">
                        <?php _e('Plus d\'info'); ?>
                    </a>
                </div>
            </div>

        <?php endwhile; ?>
        <div class="annonces-block__side">
            <a href="<?php echo get_post_type_archive_link('annonce'); ?>"></a>
            <p><?php _e('Découvrir tous les biens en viager'); ?></p>
            <svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="material-symbols:arrow-forward-rounded">
            <path id="Vector" d="M22.6 39.1C22.2333 38.7333 22.0413 38.2666 22.024 37.7C22.008 37.1333 22.1833 36.6666 22.55 36.3L32.35 26.5H10C9.43333 26.5 8.958 26.308 8.574 25.924C8.19133 25.5413 8 25.0666 8 24.5C8 23.9333 8.19133 23.458 8.574 23.074C8.958 22.6913 9.43333 22.5 10 22.5H32.35L22.55 12.7C22.1833 12.3333 22.008 11.8666 22.024 11.3C22.0413 10.7333 22.2333 10.2666 22.6 9.89997C22.9667 9.53331 23.4333 9.34998 24 9.34998C24.5667 9.34998 25.0333 9.53331 25.4 9.89997L38.6 23.1C38.8 23.2666 38.942 23.4746 39.026 23.724C39.1087 23.9746 39.15 24.2333 39.15 24.5C39.15 24.7666 39.1087 25.0166 39.026 25.25C38.942 25.4833 38.8 25.7 38.6 25.9L25.4 39.1C25.0333 39.4666 24.5667 39.65 24 39.65C23.4333 39.65 22.9667 39.4666 22.6 39.1Z" fill="white"/>
            </g>
            </svg>

        </div>
    </div>
   

<?php endif; ?>