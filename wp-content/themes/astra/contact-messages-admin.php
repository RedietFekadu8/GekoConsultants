<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Handle Deletion
if (isset($_GET['delete_message'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'messages'; // Assuming your table is named wp_messages
    $id = intval($_GET['delete_message']);
    $wpdb->delete($table_name, ['id' => $id]);
    wp_redirect(admin_url('admin.php?page=contact_messages&deleted=1'));
    exit;
}

// Handle CSV Export
if (isset($_GET['export_csv'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'messages'; // Assuming your table is named wp_messages
    $messages = $wpdb->get_results("SELECT * FROM $table_name");

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="messages.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Full Name', 'Email', 'Phone', 'Message', 'Created At']);

    foreach ($messages as $row) {
        fputcsv($output, [
            $row->id,
            $row->full_name,
            $row->email,
            $row->phone,
            $row->message,
            $row->created_at
        ]);
    }
    fclose($output);
    exit;
}

// Function to display the admin page
function contact_messages_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'messages'; // Assuming you have created a 'messages' table for storing form data

    // Date Filtering
    $where_clause = '';
    if (!empty($_GET['filter_date'])) {
        $filter_date = sanitize_text_field($_GET['filter_date']);
        $where_clause = $wpdb->prepare("WHERE submitted_at = %s", $filter_date);
    }

    // Fetch filtered messages
    $messages = $wpdb->get_results("SELECT * FROM $table_name $where_clause ORDER BY id DESC");

    echo '<div class="wrap"><h1>Contact Messages</h1>';

    // Success message
    if (isset($_GET['deleted'])) {
        echo '<div class="updated"><p>Message deleted successfully.</p></div>';
    }

    // Filter Form
    echo '<form method="GET">
            <input type="hidden" name="page" value="contact_messages">
            <input type="date" name="filter_date" value="' . esc_attr($_GET['filter_date'] ?? '') . '">
            <button type="submit" class="button">Filter</button>
            <a href="' . admin_url('admin.php?page=contact_messages') . '" class="button">Reset</a>
        </form>';

    // Export Button
    echo '<a href="' . admin_url('admin.php?page=contact_messages&export_csv=1') . '" class="button button-primary">Export to CSV</a>';

    // Display table
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
          </thead>';
    echo '<tbody>';

    if ($messages) {
        foreach ($messages as $message) {
            echo '<tr>
                    <td>' . esc_html($message->id) . '</td>
                    <td>' . esc_html($message->full_name) . '</td>
                    <td>' . esc_html($message->email) . '</td>
                    <td>' . esc_html($message->phone) . '</td>
                    <td>' . esc_html($message->message) . '</td>
                    <td>' . esc_html($message->created_at) . '</td>
                    <td>
                        <a href="' . admin_url('admin.php?page=contact_messages&delete_message=' . $message->id) . '" onclick="return confirm(\'Are you sure?\')" class="button button-danger">Delete</a>
                    </td>
                </tr>';
        }
    } else {
        echo '<tr><td colspan="7">No messages found.</td></tr>';
    }

    echo '</tbody></table></div>';
}
