<?php
error_reporting(0);
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
                <li><a href="<?php echo $base_url; ?>/institutes">Institutes</a></li>
                <li>Institute of <?php echo $node_inst_data->title; ?></li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Institute of <?php echo $node_inst_data->title; ?></div>
        </div>
    </div>
<?php if($node_inst_data->field_institute_banner['und']){ ?>
    <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.str_replace('public://','',$node_inst_data->field_institute_banner['und'][0]['uri']); ?>);">
        <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_inst_data->field_banner_institute_text_2['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
<?php } ?>
    <div class="pw_section space_short">
        <div class="pw_container">
            <?php echo $node_inst_data->body['und'][0]['value']; ?>
              <div class="tab_container clearfix" id="tab3">
                <div class="doctors_tab_list">

        <div class="pw_row gutter40 doctor_listing">
        <?php

        $node_doc = node_load($nid);
$domain_url = 'http://aglfbapps.in';
//echo $node->body[und][0][value];

$ica_img='';
$ica_points='';
$ics_inst_dept_data='';
$ins_dept_field_data = '';
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
                    $query = new EntityFieldQuery();
                    $result = $query->entityCondition('entity_type', 'node')
                        ->entityCondition('bundle', 'doctor')
                        ->execute();

                    $nodes = node_load_multiple(array_keys($result['node']));
//                    echo "<pre>";
//                    print_r($nodes);
$doc=0;
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='director'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='chief'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='additional director'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='associate director'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='sr. consultant'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='executive consultant'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='consultant'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='associate consultant'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }

                        }
                    }}
                    foreach($nodes as $ica_data) {
                    if(strtolower(trim($ica_data->field_designation_doctor['und'][0]['value']))=='counsellor'){
                    $ics_inst_dept_data = $ica_data->field_related_institute['und'];

                        if ($ics_inst_dept_data) {
                            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                            foreach ($ics_inst_dept_data as $ica_id_data) {
                                $term = taxonomy_term_load($ica_id_data['tid']);

                                $ins_dept_field_data[] = $term->name;;
                            }
//                            print_r($ins_dept_field_data);
//                            echo $node->title;
                            if (in_array($node->title, $ins_dept_field_data)) {
?>
<div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $ica_data->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $ica_data->title; ?></div>
                                <div class="doc_subtitle"><?php echo $ica_data->field_designation_doctor['und'][0]['value']; ?></div>
                            </div>
                        </a>
                    </div>
<?php     $doc++;   }
                        }
                    }}
                    if($doc==0){ ?>
                        <p><b>No Doctor available!</b></p>
                    <?php } ?>
        </div>
                </div>
            </div>
            </div>
             <?php
                    $query = new EntityFieldQuery();
                    $result = $query->entityCondition('entity_type', 'node')
                        ->entityCondition('bundle', 'case_studies')
                        ->execute();

                    $nodes = node_load_multiple(array_keys($result['node']));
                    if($nodes){

//                    echo "<pre>";
//                    print_r($nodes);
                    $case=0;
                    foreach($nodes as $ica_data) {

                        $ics_inst_dept_data = $ica_data->field_related_institute_case['und'];
                        $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";
                        foreach($ics_inst_dept_data as $ica_id_data){
                            $term = taxonomy_term_load($ica_id_data['tid']);

                            $ins_dept_field_data[] =$term->name;;
                        }
//            print_r($ins_dept_field_data);
                        if(in_array($node->title,$ins_dept_field_data)){
                        if($case==0){
                   ?>
                   <div class="heading4">Case Studies</div>
            <div class="case_study_panel">
                <div id="case_study_slider" class="owl-carousel">
                <?php  } ?>
                            <div class="items_box">
                                <p class="lg"><?php echo $ica_data->field_short_description_case['und'][0]['value']; ?> <a href="<?php echo $base_url.'/node/'.$ica_data->nid; ?>" class="arrow_link"> <i class="icon icon_arrow"></i></a></p>
                            </div>
                            <?php
                            $case++;
                        }
                    }
                       // if($case==0){ ?>
<!--                            <p><b>No Case Studies available!</b></p>-->
                        <?php  //}
                        if($case){
                        ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php } } ?>
        </div>
    </div>
<?php require_once('footer.inc'); ?>