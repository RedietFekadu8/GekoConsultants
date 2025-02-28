<?php

function handle_file_upload($file) {
    if (isset($file) && !empty($file['name'])) {
        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['path'] . '/';
        $target_file = $target_dir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            return $upload_dir['url'] . '/' . basename($file['name']);
        }
    }
    return false;
}

function save_appointment() {
    if (!isset($_POST['full_name']) || !isset($_POST['appointment_date'])) {
        wp_redirect(home_url('/appointment?error=missing_fields'));
        exit;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'appointmentss';

    // Sanitize input fields
    $name = esc_sql(sanitize_text_field($_POST['full_name']));
    $phone = esc_sql(sanitize_text_field($_POST['phone']));
    $email = esc_sql(sanitize_email($_POST['email']));
    $telegram_username = esc_sql(sanitize_text_field($_POST['telegram_username']));
    $required_field = esc_sql(sanitize_text_field($_POST['required_field']));
    $current_education = esc_sql(sanitize_text_field($_POST['current_education']));
    $current_field = esc_sql(sanitize_text_field($_POST['current_field']));
    $state = esc_sql(sanitize_text_field($_POST['state']));
    $remark = esc_sql(sanitize_text_field($_POST['remark']));
    $date = esc_sql(sanitize_text_field($_POST['appointment_date']));
    
    // Upload each file separately
    $file_upload = handle_file_upload($_FILES['file_upload']);
    $passport_upload = handle_file_upload($_FILES['passport_upload']);
    $transcript_upload = handle_file_upload($_FILES['transcript_upload']);
    $essay_upload = handle_file_upload($_FILES['essay_upload']);
    $duolingo_upload = handle_file_upload($_FILES['duolingo_upload']);

    // Insert data into the database
    $inserted = $wpdb->insert($table_name, [
        'full_name' => $name,
        'phone' => $phone,
        'email' => $email,
        'telegram_username' => $telegram_username,
        'required_field' => $required_field,
        'current_education' => $current_education,
        'current_field' => $current_field,
        'state' => $state,
        'remark' => $remark,
        'appointment_date' => $date,
        'file_upload' => $file_upload,
        'passport_upload' => $passport_upload,
        'transcript_upload' => $transcript_upload,
        'essay_upload' => $essay_upload,
        'duolingo_upload' => $duolingo_upload,
		
    ]);

    if ($inserted === false) {
        wp_redirect(home_url('/appointment?error=db_error'));
        exit;
    }

	// Retrieve last inserted ID
    $appointment_id = $wpdb->insert_id;
    // Redirect after successful submission
//      wp_redirect(add_query_arg('success', 'true', get_permalink()));
//        exit;
// 	 wp_redirect(add_query_arg('success', 'true', wp_get_referer()));
//         exit;
	
	    wp_redirect(add_query_arg(['success' => 'true', 'appointment_id' => $appointment_id], wp_get_referer()));
    exit;
}

//     wp_redirect(home_url('/appointment?success=1'));
//     exit;


// Handle form submissions for both logged-in and guest users

// AJAX Handler to Fetch Appointment Data
function fetch_appointment_details() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointmentss';

    if (!isset($_GET['appointment_id'])) {
        wp_send_json_error(['message' => 'No appointment ID provided']);
    }

    $appointment_id = intval($_GET['appointment_id']);
    $appointment = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $appointment_id), ARRAY_A);

    if ($appointment) {
        wp_send_json_success($appointment);
    } else {
        wp_send_json_error(['message' => 'No data found']);
    }
}
add_action('wp_ajax_fetch_appointment_details', 'fetch_appointment_details');
add_action('wp_ajax_nopriv_fetch_appointment_details', 'fetch_appointment_details');

add_action('admin_post_nopriv_save_appointment', 'save_appointment');
add_action('admin_post_save_appointment', 'save_appointment');



function contact_form_shortcode() {
    ob_start(); // Start output buffering
	if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo '<div class="thank-you-message" style="background-color: #e7f4e8; padding: 10px; border-radius: 5px; color: #4CAF50; text-align: center; margin-bottom: 20px;">
                Thank you for contacting us! We will get back to you shortly.
              </div>';
    }
    
    ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" style="max-width: 500px; margin: 0 auto;">
        <div style="margin-bottom: 15px;">
            <input type="text" name="full_name" placeholder="Full Name" required style="width: 100%; padding: 10px; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 10px; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="text" name="phone" placeholder="Phone" required style="width: 100%; padding: 10px; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <textarea name="message" placeholder="Your Message" required style="width: 100%; padding: 10px; border-radius: 5px;"></textarea>
        </div>

        <input type="hidden" name="action" value="save_contact_message">
         <div style="text-align: center; margin-top: 20px;">
    <button type="submit" >
        Submit
    </button>
</div>
    </form>
    
    <?php
    return ob_get_clean(); // Return the output buffer
}
add_shortcode('contact_form', 'contact_form_shortcode');


// Add an admin menu page for Contact Messages
function contact_messages_admin_menu() {
    add_menu_page(
        'Contact Messages', // Page Title
        'Messages',         // Menu Title
        'manage_options',   // Capability
        'contact_messages', // Menu Slug
        'contact_messages_admin_page', // Callback function
        'dashicons-email',  // Icon
        30                  // Position
    );
}
add_action('admin_menu', 'contact_messages_admin_menu');

// Include the Contact Messages Admin Page
// function contact_messages_admin_page() {
//     include_once( get_template_directory() . '/contact-messages-admin.php' );
// }


/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.8.11' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.8.9' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * ToDo: Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * UTM Analytics lib file.
 */
require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-utm-analytics.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

include_once('appointment-admin.php');
include_once( get_template_directory() . '/contact-messages-admin.php' );
//include_once get_template_directory() . '/messages-admin.php';
//include_once('messages-admin.php');

function save_contact_message() {
    if (isset($_POST['full_name']) && isset($_POST['message'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'messages';

        // Sanitize input fields
        $name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_textarea_field($_POST['message']);

        // Insert into database
        $wpdb->insert($table_name, [
            'full_name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message
        ]);

        // Redirect after submission
        wp_redirect(add_query_arg('success', '1', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_nopriv_save_contact_message', 'save_contact_message');
add_action('admin_post_save_contact_message', 'save_contact_message');