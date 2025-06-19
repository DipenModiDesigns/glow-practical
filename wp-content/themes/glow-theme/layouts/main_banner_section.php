<?php
    $title = get_sub_field( 'title' );
    $tagline = get_sub_field( 'tagline' );
    $model_portrait = get_sub_field( 'model_portrait' );
    $background_image = get_sub_field( 'background_image' );
    $cta_button = get_sub_field( 'cta_button' );
    $featured_product = get_sub_field( 'featured_product' );
?>

<section class="mainBannerSection" style="background-image: url('<?php echo esc_url( $background_image['url'] ); ?>');">
    <div class="container">
        <div class="innerSection">
            <img class="bg-object" src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-object-1.png" alt="bg-object-1">
            <?php if ($title) : ?>
                <div class="titlePart">
                    <h1><?php echo $title ?></h1>
                </div>
            <?php endif; ?>
            <div class="rightContent">
                <?php if( $featured_product ): ?>
                    <div class="featuredProduct">
                        <a href="<?php echo get_permalink( $featured_product->ID ); ?>" class="productLink">
                            <div class="imgContent">
                                <?php
                                    $image_url = get_the_post_thumbnail_url( $featured_product->ID, 'medium' );
                                    if ( $image_url ):
                                ?>
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $featured_product->post_title ); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="textContent">
                                <h3><?php echo esc_html( $featured_product->post_title ); ?></h3>
                                <h3>$<?php the_field( 'product_price', $featured_product->ID ); ?></h3>
                            </div>
                        </a>
                        <div class="productBase"></div>
                    </div>
                <?php endif; ?>
                <div class="bottomPart">
                    <p class="tagline">
                        <?php echo $tagline ?>
                    </p>
                    <div class="btnBox" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg-object-btn.png');">
                        <a href="<?php echo $cta_button['url']; ?>" class="cta-btn" target="<?php echo $cta_button['target']; ?>"><?php echo $cta_button['title']; ?></a>
                    </div>
                </div>
            </div>
            <div class="model_portrait">
                <img src="<?php echo esc_url( $model_portrait['url'] ); ?>" alt="">
            </div>
        </div>
    </div>
</section>