<?php
/**
 * Widget Name: Advanced Search
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 *
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 20/01/16
 * Time: 10:51 PM
 */

class HOUZEZ_advanced_search extends WP_Widget {

    /**
     * Register widget
     **/
    public function __construct() {

        parent::__construct(
            'houzez_advanced_search', // Base ID
            esc_html__( 'HOUZEZ: Advanced Search', 'houzez' ), // Name
            array( 'description' => esc_html__( 'Advanced Search', 'houzez' ), ) // Args
        );

    }


    /**
     * Front-end display of widget
     **/
    public function widget( $args, $instance ) {

        global $before_widget, $after_widget, $before_title, $after_title, $post;
        extract( $args );

        $allowed_html_array = array(
            'div' => array(
                'id' => array(),
                'class' => array()
            ),
            'h3' => array(
                'class' => array()
            )
        );

        $title = apply_filters('widget_title', $instance['title'] );

        echo wp_kses( $before_widget, $allowed_html_array );

        if ( $title ) echo wp_kses( $before_title, $allowed_html_array ) . $title . wp_kses( $after_title, $allowed_html_array );

        houzez_advanced_search_widget();

        echo wp_kses( $after_widget, $allowed_html_array );

    }


    /**
     * Sanitize widget form values as they are saved
     **/
    public function update( $new_instance, $old_instance ) {

        $instance = array();

        /* Strip tags to remove HTML. For text inputs and textarea. */
        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;

    }


    /**
     * Back-end widget form
     **/
    public function form( $instance ) {

        /* Default widget settings. */
        $defaults = array(
            'title' => 'Find Your Home'
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'houzez'); ?></label>
            <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>

        <?php
    }

}

if ( ! function_exists( 'HOUZEZ_advanced_search_loader' ) ) {
    function HOUZEZ_advanced_search_loader (){
        register_widget( 'HOUZEZ_advanced_search' );
    }
    add_action( 'widgets_init', 'HOUZEZ_advanced_search_loader' );
}

function houzez_advanced_search_widget() {

    $search_template = houzez_get_template_link('template/template-search.php');
    $adv_show_hide = houzez_option('adv_show_hide');
    $keyword_field = houzez_option('keyword_field');

    if( $keyword_field == 'prop_title' ) {
        $keyword_field_placeholder = esc_html__('Enter keyword...', 'houzez');
    } else if( $keyword_field == 'prop_city_state_county' ) {
        $keyword_field_placeholder = esc_html__('Search City, State or Area', 'houzez');

    } else {
        $keyword_field_placeholder = esc_html__('Enter an address, town, street, or zip', 'houzez');
    }
    $location = $type = $status = '';

    if( isset( $_GET['status'] ) ) {
        $status = $_GET['status'];
    }
    if( isset( $_GET['type'] ) ) {
        $type = $_GET['type'];
    }
    if( isset( $_GET['area'] ) ) {
        $type = $_GET['area'];
    }
    if( isset( $_GET['location'] ) ) {
        $location = $_GET['location'];
    }

    $keyword_field = houzez_option('keyword_field');
 ?>
    <div class="widget-range">
        <div class="widget-body">
            <form method="get" action="<?php echo esc_url( $search_template ); ?>">
                <div class="range-block rang-form-block">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 keyword_search">
                            <div class="form-group">
                                <input type="text" class="houzez_geocomplete form-control" value="<?php echo isset ( $_GET['keyword'] ) ? $_GET['keyword'] : ''; ?>" name="keyword" placeholder="<?php echo $keyword_field_placeholder; ?>">
                            </div>
                        </div>

                        <?php if( $adv_show_hide['cities'] != 1 ) { ?>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select name="location" class="selectpicker" data-live-search="true" data-live-search-style="begins">
                                    <?php
                                    // All Option
                                    echo '<option value="">'.esc_html__( 'All Cities', 'houzez' ).'</option>';

                                    $prop_city = get_terms (
                                        array(
                                            "property_city"
                                        ),
                                        array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'hide_empty' => true,
                                            'parent' => 0
                                        )
                                    );
                                    houzez_hirarchical_options('property_city', $prop_city, $location );
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if( $adv_show_hide['areas'] != 1 ) { ?>
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select name="area" class="selectpicker" data-live-search="true" data-live-search-style="begins">
                                        <?php
                                        // All Option
                                        echo '<option value="">'.esc_html__( 'All Areas', 'houzez' ).'</option>';

                                        $prop_area = get_terms (
                                            array(
                                                "property_area"
                                            ),
                                            array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'hide_empty' => true,
                                                'parent' => 0
                                            )
                                        );
                                        houzez_hirarchical_options('property_area', $prop_area, $area );
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if( $adv_show_hide['beds'] != 1 ) { ?>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                    <option value=""><?php esc_html_e( 'Beds', 'houzez' ); ?></option>
                                    <?php houzez_number_list('bedrooms'); ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if( $adv_show_hide['baths'] != 1 ) { ?>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select name="bathrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                    <option value=""><?php esc_html_e( 'Baths', 'houzez' ); ?></option>
                                    <?php houzez_number_list('bathrooms'); ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if( $adv_show_hide['type'] != 1 ) { ?>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select name="type" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                    <?php
                                    // All Option
                                    echo '<option value="">'.esc_html__( 'All Types', 'houzez' ).'</option>';

                                    $prop_type = get_terms (
                                        array(
                                            "property_type"
                                        ),
                                        array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'hide_empty' => true,
                                            'parent' => 0
                                        )
                                    );
                                    houzez_hirarchical_options('property_type', $prop_type, $type );
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if( $adv_show_hide['status'] != 1 ) { ?>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <select class="selectpicker" id="widget_status" name="status" data-live-search="false" data-live-search-style="begins">
                                    <?php
                                    // All Option
                                    echo '<option value="">'.esc_html__( 'All Status', 'houzez' ).'</option>';

                                    $prop_status = get_terms (
                                        array(
                                            "property_status"
                                        ),
                                        array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'hide_empty' => false,
                                            'parent' => 0
                                        )
                                    );
                                    houzez_hirarchical_options('property_status', $prop_status, $status );
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>

                <?php if( $adv_show_hide['price_slider'] != 1 ) { ?>
                <div class="range-block">
                    <h4><?php esc_html_e('Price range', 'houzez'); ?></h4>
                    <div id="slider-price"></div>
                    <div class="clearfix range-text">
                        <input type="text" name="min-price" class="pull-left range-input text-left" id="min-price" readonly >
                        <input type="text" name="max-price" class="pull-right range-input text-right" id="max-price" readonly >
                    </div>
                </div>
                <?php } ?>

                <?php if( $adv_show_hide['area_slider'] != 1 ) { ?>
                <div class="range-block">
                    <h4><?php esc_html_e('Area Size', 'houzez'); ?></h4>
                    <div id="slider-size"></div>
                    <div class="clearfix range-text">
                        <input type="text" name="min-area" class="pull-left range-input text-left" id="min-size" readonly >
                        <input type="text" name="max-area" class="pull-right range-input text-right" id="max-size" readonly >
                    </div>
                </div>
                <?php } ?>

                <div class="range-block rang-form-block">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-search fa-left"></i><?php esc_html_e( 'Search', 'houzez' ); ?></button>
                        </div>
                     </div>
                </div>

            </form>
        </div>
    </div>
<?php
}