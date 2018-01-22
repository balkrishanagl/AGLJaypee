<?php
error_reporting(0);

global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
if ( arg(0) == 'node' && is_numeric(arg(1)) ) {
    $nid = arg(1);
}
$node_events_data = node_load($nid);
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
$event_banner_img =str_replace('public://','',$node_events_data->field_event_banner_image['und'][0]['uri']);
//print_r($node_events_data);
?>
<?php require_once('header.inc'); ?>
   
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li>Event</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Events</div>
        </div>
    </div>
    <div class="pw_section pt0">
        <div class="pw_container">
            <div class="news_detail">
                <div class="date color_blue"><?php echo $node_events_data->field_event_date['und'][0]['value']; ?></div>
                <div class="heading"><?php echo $node_events_data->title; ?></div>
                <div class="media_detail_img"><img src="<?php echo $realpath.$event_banner_img; ?>" alt=""></div>
                <?php echo $node_events_data->body['und'][0]['value']; ?>
            </div>
        </div>
    </div>

<?php require_once('footer.inc'); ?>