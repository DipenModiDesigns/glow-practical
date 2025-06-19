<?php
    $title = get_sub_field( 'title' );
    $link = get_sub_field( 'link' );
    $product_list = get_sub_field( 'product_list' );
?>
<section class="productSliderSection">
    <div class="innerSection">
        <div class="container">
            <div class="titlePart">
                <?php if ( $title ) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ( $link ) : ?>
                    <div class="btnBox">
                        <a href="<?php echo $link['url']; ?>" class="link link-icon" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
                            <?php echo $link['title']; ?>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                    <g clip-path="url(#clip0_38_162)">
                                        <path d="M-0.226667 19L-2 17.2267L12.6933 2.53333H4.33333V0H17V12.6667H14.4667V4.30667L-0.226667 19Z" fill="currentColor"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_38_162">
                                            <rect width="17" height="17" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if( $product_list ): ?>
            <?php $count = count( $product_list ); ?>
            <div id="productSlider" class="contentPart <?php echo ( $count > 4 ) ? 'splide' : ''; ?>">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach( $product_list as $post ):
                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>

                            <li class="splide__slide">
                                <a href="<?php the_permalink(); ?>" class="productLink" title="<?php the_title(); ?>">
                                    <?php
                                        $image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                                        if ( $image_url ):
                                    ?>
                                        <div class="imgContent">
                                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
                                        </div>
                                    <?php endif; ?>
                                    <div class="textContent">
                                        <h3><?php the_title(); ?></h3>
                                        <span class="tagline"><?php the_field( 'product_tagline' ); ?></span>
                                    </div>
                                </a>
                            </li>

                            <?php endforeach; ?>
                    </ul>
                </div>
                <?php if ( $count > 4 ): ?>
                    <div class="container">
                        <div class="productSlider-progress">
                            <div class="productSlider-progress-bar"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php
                wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>