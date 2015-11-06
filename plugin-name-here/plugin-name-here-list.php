<?php

function todo_plugin_slug_list () {

?>

<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/todo-plugin-slug/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>All TODOs</h2>
<a href="<?php echo admin_url('admin.php?page=todo_plugin_slug_create'); ?>">Add New</a>
<?php

  global $wpdb;

  $tbl_1 = $wpdb->prefix . 'todo_table_1';
  $tbl_2 = $wpdb->prefix . 'todo_table_2';
  $tbl_3 = $wpdb->prefix . 'todo_table_3';

  $results = $wpdb->get_results("SELECT a.id,a.name,
    a.start,a.end,a.num_things,
    COUNT(DISTINCT b.id) AS total_things,
    COUNT(DISTINCT c.id) AS total_other_things
    FROM $tbl_1 AS a LEFT JOIN $tbl_2 AS b
    ON a.id = b.giveaway_id
    LEFT JOIN $tbl_3 AS c
    ON a.id = c.giveaway_id
    GROUP BY a.id;");

  echo "<table class='wp-list-table widefat fixed'>";
  echo "<tr><th>Name</th><th>Start (GMT)</th><th>End (GMT)</th><th>Things</th><th>Other Things</th><th>Shortcode</th><th>&nbsp;</th></tr>";
  foreach ($results as $row ){
    $entries = $row->total_things;

    echo "<tr>";
    echo "<td>$row->name</td>";
    echo "<td>$row->start</td>";
    echo "<td>" . $entries . "</td>";
    echo "<td>" . $row->total_other_things . "</td>";
    echo "<td>[todoshortcode id='" . $row->id . "']</td>";
    echo "<td><a href='".admin_url('admin.php?page=todo_plugin_slug_edit&id='.$row->id)."'>Edit</a>";
    echo " /   <a href='".admin_url('admin.php?page=todo_plugin_slug_list_things&id='.$row->id)."'>Show Things</a>";
    }
    echo "</td>";

    echo "</tr>";
  }
  echo "</table>";
?>

</div>

<?php
}