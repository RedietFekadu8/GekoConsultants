<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add an admin menu page
function appointment_admin_menu() {
    add_menu_page(
        'Appointments',
        'Appointments',
        'manage_options',
        'appointments',
        'appointment_admin_page',
        'dashicons-calendar-alt',
        20
    );
}
add_action('admin_menu', 'appointment_admin_menu');

// Handle Deletion
if (isset($_GET['delete_appointment'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointmentss';
    $id = intval($_GET['delete_appointment']);
    $wpdb->delete($table_name, ['id' => $id]);
    wp_redirect(admin_url('admin.php?page=appointments&deleted=1'));
    exit;
}

// Handle CSV Export
if (isset($_GET['export_csv'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointmentss';
    $appointments = $wpdb->get_results("SELECT * FROM $table_name");

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="appointments.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Full Name', 'Phone', 'Email', 'Date', 'File URL']);

    foreach ($appointments as $row) {
        fputcsv($output, [
            $row->id,
            $row->full_name,
            $row->phone,
            $row->email,
            $row->appointment_date,
            $row->file_upload
        ]);
    }
    fclose($output);
    exit;
}

// Function to display the admin page
function appointment_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointmentss';


    // Fetch all appointments
    $appointments = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");

    // Display messages
    echo '<div class="wrap"><h1>Appointments</h1>';

    
    if (isset($_GET['deleted'])) {
        echo '<div class="updated"><p>Appointment deleted successfully.</p></div>';
    }

    // Filter Form
    echo '<form method="GET">
            <input type="hidden" name="page" value="appointments">
            <input type="date" name="filter_date" value="' . esc_attr($_GET['filter_date'] ?? '') . '">
            <button type="submit" class="button">Filter</button>
            <a href="' . admin_url('admin.php?page=appointments') . '" class="button">Reset</a>
        </form>';

    // Export Button
    echo '<a href="' . admin_url('admin.php?page=appointments&export_csv=1') . '" class="button button-primary">Export to CSV</a>';

    // Display Appointments Table
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date</th>
                <th>Payment</th>
                <th>Passport</th>
                <th>Transcript</th>
                <th>Essay</th>
                <th>Duolingo</th>
                
                <th>Actions</th>
            </tr>
          </thead>';
    echo '<tbody>';

    if ($appointments) {
        foreach ($appointments as $appointment) {
            echo '<tr>
                    <td>' . esc_html($appointment->id) . '</td>
                    <td>' . esc_html($appointment->full_name) . '</td>
                    <td>' . esc_html($appointment->phone) . '</td>
                    <td>' . esc_html($appointment->email) . '</td>
                    <td>' . esc_html($appointment->appointment_date) . '</td>
                    <td>';
            if (!empty($appointment->file_upload)) {
                echo '<a href="' . esc_url($appointment->file_upload) . '" target="_blank">View Payment</a>';
            } else {
                echo 'No File';
            }
            echo '</td>
                    <td>';
            if (!empty($appointment->passport_upload)) {
                echo '<a href="' . esc_url($appointment->passport_upload) . '" target="_blank">View Passport</a>';
            } else {
                echo 'No Passport';
            }
            echo '</td>
                    <td>';
            if (!empty($appointment->transcript_upload)) {
                echo '<a href="' . esc_url($appointment->transcript_upload) . '" target="_blank">View Transcript</a>';
            } else {
                echo 'No Transcript';
            }
            echo '</td>
                    <td>';
            if (!empty($appointment->essay_upload)) {
                echo '<a href="' . esc_url($appointment->essay_upload) . '" target="_blank">View Essay</a>';
            } else {
                echo 'No Essay';
            }
            echo '</td>
                    <td>';
            if (!empty($appointment->duolingo_upload)) {
                echo '<a href="' . esc_url($appointment->duolingo_upload) . '" target="_blank">View Duolingo</a>';
            } else {
                echo 'No Duolingo';
            }
            echo '</td>
                    <td>
                        <a href="' . admin_url('admin.php?page=appointments&delete_appointment=' . $appointment->id) . '" onclick="return confirm(\'Are you sure?\')" class="button button-danger">Delete</a>
                    </td>
                </tr>';
        }
    } else {
        echo '<tr><td colspan="7">No appointments found.</td></tr>';
    }
    echo '</tbody></table></div>';
}
