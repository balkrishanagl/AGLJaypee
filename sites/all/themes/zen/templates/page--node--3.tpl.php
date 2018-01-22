<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();

$node_page_data = node_load(3);
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
echo "<pre>";
print_r($node_page_data);
echo "</pre>";
?>
<?php require_once('header.inc'); ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><?php echo $node_page_data->title; ?></li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title"><?php echo $node_page_data->title; ?></div>
        </div>
    </div>
<?php if(isset($node_page_data->field_page_banner[und][0][filename])){  ?>
    <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.$node_page_data->field_page_banner[und][0][filename] ; ?>);"></div>
<?php } ?>
    <div class="pw_section section_with_left">
    <div class="pw_container <?php if(isset($node_page_data->field_add_class[und][0][value])){ echo $node_page_data->field_add_class[und][0][value]; } ?>">
        <div class="left_panel">
            <ul class="left_nav">
                <li><a href="career.php">Life at <br>Jaypee Hospital</a></li>
                <li><a href="#">Frequently <br>Asked Questions</a></li>
                <li><a href="current-opening.php">Current <br>Opening</a></li>
                <li><a href="#">Apply <br>Now</a></li>
            </ul>
        </div>
            <?php echo $node_page_data->body['und'][0]['value']; ?>

        </div>
    </div>
<?php require_once('footer.inc'); ?>