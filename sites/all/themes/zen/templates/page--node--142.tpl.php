<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();

$query = new EntityFieldQuery();
$result_institute = $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'institute')
    ->execute();
$nodes_institute = node_load_multiple(array_keys($result_institute['node']));
//				print_r($nodes_institute);
$s = 1;

//	$institute_img =$institutes_data->field_package_image['und'][0]['filename'];
?>
<?php require_once('header.inc'); ?>
<div class="page_header">
    <div class="pw_container">
        <ul class="pw_breadcrumb">
            <li><a href="#">Specialties</a></li>
            <li>Institutes</li>
        </ul>
        <div class="clearfix"></div>
        <div class="page_title">INSTITUTEs</div>
    </div>
</div>
<div class="banner_inner_full" style="background-image:url(assets/images/inner-banner.jpg);"></div>
<div class="pw_section space_short">
    <div class="pw_container">
        <div class="pw_row gutter20">
            <?php foreach($nodes_institute as $institutes_data){ ?>
            <div class="pw_grid md4 xs6">
                <a href="<?php echo $base_url.'/node/'.$institutes_data->nid; ?>" class="serv_box">
                    <div class="serv_icon"><img src="assets/images/svg/heart.svg" alt="Institute of <?php echo $institutes_data->title; ?>"></div>
                    <div class="serv_title"><?php echo $institutes_data->title; ?></div>
                    <span class="more_arrow"></span>
                </a>
            </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php require_once('footer.inc'); ?>