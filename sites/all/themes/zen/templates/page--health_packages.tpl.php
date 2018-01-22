<?php
error_reporting(0);

global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
if ( arg(0) == 'node' && is_numeric(arg(1)) ) {
    $nid = arg(1);
}
$node_health_package_data = node_load($nid);
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
//print_r($node_events_data);
$pack_banner_img =str_replace('public://','',$node_health_package_data->field_package_banner['und'][0]['uri']);
?>
<?php require_once('header.inc'); ?>


    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="<?php echo $base_url; ?>/packages">Preventive Health Plans</a></li>
                <li><?php echo $node_health_package_data->title; ?></li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title"><?php echo $node_health_package_data->title; ?></div>
        </div>
    </div>

    <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.$pack_banner_img; ?>);">
        <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_package_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <?php echo $node_health_package_data->body['und'][0]['value']; ?>
        </div>
    </div>

<?php require_once('footer.inc'); ?>