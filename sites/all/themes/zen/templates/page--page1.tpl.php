<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
if ( arg(0) == 'node' && is_numeric(arg(1)) ) {
   $nid = arg(1);
}
$node_inst_data = node_load($nid);
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
//print_r($node_inst_data);
?>
<?php require_once('header.inc'); ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="#">Institutes</a></li>
                <li>Institute of <?php echo $node_inst_data->title; ?></li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Institute of <?php echo $node_inst_data->title; ?></div>
        </div>
    </div>
    <div class="banner_inner cardiac_banner" style="background-image: url('<?php echo $realpath.'/'.$node_inst_data->field_institute_banner['und'][0]['filename'];; ?>')">
        <div class="pw_container">
            <div class="heading_xl"><?php echo $node_inst_data->field_banner_heading['und'][0]['value']; ?></div>
            <div class="banner_inner_data">
                <p class="xl light"><?php echo $node_inst_data->field_institute_banner_text_1['und'][0]['value']; ?></p>
                <p class="lg"><?php echo $node_inst_data->field_banner_institute_text_2['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <?php echo $node_inst_data->body['und'][0]['value']; ?>
            <div class="case_study_panel">
                <div id="case_study_slider" class="owl-carousel">
                    <?php
                    $query = new EntityFieldQuery();
                    $result = $query->entityCondition('entity_type', 'node')
                        ->entityCondition('bundle', 'case_studies')
                        ->execute();

                    $nodes = node_load_multiple(array_keys($result['node']));
//                    echo "<pre>";
//                    print_r($nodes);
                    foreach($nodes as $ica_data) {

                        $ics_inst_dept_data = $ica_data->field_related_institute_case[und];
                        $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                        foreach($ics_inst_dept_data as $ica_id_data){
                            $term = taxonomy_term_load($ica_id_data['tid']);

                            $ins_dept_field_data[] =$term->name;;
                        }
//            print_r($ins_dept_field_data);
                        if(in_array($node->title,$ins_dept_field_data)){

                   ?>
                            <div class="items_box">
                                <p class="lg"><?php echo $ica_data->title; ?> <a href="<?php echo $base_url.'/node/'.$ica_data->nid; ?>" class="arrow_link"> <i class="icon icon_arrow"></i></a></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
<!--                    <div class="items_box">-->
<!--                        <p class="lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget maximus lorem. Pellentesque habitant morbi. Lorem ipsum dolor sit amet, consectetur adipiscing elit <a href="#" class="arrow_link"> <i class="icon icon_arrow"></i></a></p>-->
<!--                    </div>-->
<!--                    <div class="items_box">-->
<!--                        <p class="lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget maximus lorem. Pellentesque habitant morbi. Lorem ipsum dolor sit amet, consectetur adipiscing elit <a href="#" class="arrow_link"> <i class="icon icon_arrow"></i></a></p>-->
<!--                    </div>-->
<!--                    <div class="items_box">-->
<!--                        <p class="lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget maximus lorem. Pellentesque habitant morbi. Lorem ipsum dolor sit amet, consectetur adipiscing elit <a href="#" class="arrow_link"> <i class="icon icon_arrow"></i></a></p>-->
<!--                    </div>-->
<!--                    <div class="items_box">-->
<!--                        <p class="lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget maximus lorem. Pellentesque habitant morbi. Lorem ipsum dolor sit amet, consectetur adipiscing elit <a href="#" class="arrow_link"> <i class="icon icon_arrow"></i></a></p>-->
<!--                    </div>-->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php require_once('footer.inc'); ?>