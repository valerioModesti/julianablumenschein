<div id="dates">
    <div class="section-content centered">
    <?php
        $query = new WP_Query(array(
            'post_type' => 'dates',
            'post_status' => 'publish',
            'posts_per_page'=>-1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));

    if ($query->have_posts()) { 
        echo '<h2>Dates</h2>';
        $today = new DateTimeImmutable( 'today', wp_timezone() );
        $cutoff_date = $today->modify( '-3 days' );
        $displayed_dates = 0;

        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $gigdate = get_post_meta( $post_id, 'rw_date', true );
            $gig_date_object = false;
            if ( preg_match( '/^\s*(\d{1,2}\.\d{1,2}\.\d{4})/', $gigdate, $date_match ) ) {
                $gig_date_object = DateTimeImmutable::createFromFormat( '!d.m.Y', $date_match[1], wp_timezone() );
            }

            if ( ! $gig_date_object || $gig_date_object < $cutoff_date ) {
                continue;
            }

    $gigband = get_post_meta( $post_id, 'rw_group', true );
    $gigvenue = get_post_meta( $post_id, 'rw_venue', true ); $giglink = get_post_meta( $post_id, 'rw_venueurl', true );     

    echo "<div class='date'><p>";

    if ( !empty( $giglink ) ) {        
        echo "<a class='giglink' target='_blank' href='$giglink' title='$gigdate.-.$gigband.-.$gigvenue'>";
    }
    echo "<span class='gigdate'>".$gigdate."</span> ".$gigband." @ ".$gigvenue;
    if ( !empty( $giglink ) ) {         
            echo "</a>";
    };
    echo "</p></div>";
    $displayed_dates++;

    if ( $displayed_dates >= 10 ) {
        break;
    }
        }

    echo '<div class="cta-wrap"><a class="btn cta" href="' . esc_url( home_url( '/dates' ) ) . '">' . esc_html__( 'alle Termine ansehen', 'julianablumenschein' ) . '</a></div>';

    wp_reset_query();
    };
    ?>
    </div>
</div>