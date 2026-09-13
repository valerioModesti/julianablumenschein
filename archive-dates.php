<?php
/**
 * The template for displaying the dates archive.
 *
 * @package julianablumenschein
 */

get_header();
?>
<!-- archive-dates.php -->
<div id="dates">
    <div class="section-content centered">
        <h2>Dates</h2>

        <?php
        $dates_query = new WP_Query(
            array(
                'post_type'      => 'dates',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'DESC',
            )
        );

        if ( $dates_query->have_posts() ) :
            while ( $dates_query->have_posts() ) :
                $dates_query->the_post();
                $post_id  = get_the_ID();
                $gigdate  = get_post_meta( $post_id, 'rw_date', true );
                $gigband  = get_post_meta( $post_id, 'rw_group', true );
                $gigvenue = get_post_meta( $post_id, 'rw_venue', true );
                $giglink  = get_post_meta( $post_id, 'rw_venueurl', true );
                ?>
                <div class="date">
                    <p>
                        <?php if ( ! empty( $giglink ) ) : ?>
                            <a class="giglink" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( $giglink ); ?>" title="<?php echo esc_attr( $gigdate . ' - ' . $gigband . ' - ' . $gigvenue ); ?>">
                        <?php endif; ?>

                        <span class="gigdate"><?php echo esc_html( $gigdate ); ?></span>
                        <?php echo esc_html( $gigband . ' @ ' . $gigvenue ); ?>

                        <?php if ( ! empty( $giglink ) ) : ?>
                            </a>
                        <?php endif; ?>
                    </p>
                </div>
                <?php
            endwhile;
        else :
            echo '<p>' . esc_html__( 'No dates found.', 'julianablumenschein' ) . '</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
