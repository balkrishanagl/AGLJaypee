<?php

global $base_url;
$node = node_load($_POST['nid']);
//print_r($node);
//echo $_POST['type'];
$domain_url = 'http://aglfbapps.in/';
//echo $node->body[und][0][value];
$html='';
$short_desc='';
$operational_hours='';
$ica_img='';
$ica_points='';
$ics_inst_dept_data='';
$ins_dept_field_data = '';
$query = new EntityFieldQuery();

if($_POST['type']=='department' || $_POST['type']=='institute' || $_POST['type']=='clinics') {

    if($_POST['type']=='department'){
        $iiccaa = "Department";
        $short_desc = $node->field_dept_short_description["und"][0]["value"];
        $operational_hours = $node->field_dept_operational_hours["und"][0]["value"];
        $result = $query->entityCondition('entity_type', 'node')
            ->entityCondition('bundle', 'department_important_condition')
            ->execute();

    }elseif($_POST['type']=='institute'){
        $iiccaa = "Institute";
        $short_desc = $node->field_inst_short_description["und"][0]["value"];
        $operational_hours = $node->field_operational_hours["und"][0]["value"];
        $result = $query->entityCondition('entity_type', 'node')
            ->entityCondition('bundle', 'important_condition_attended')
            ->execute();
    }elseif($_POST['type']=='clinics'){
        $iiccaa = "Specialized Clinic";
        $short_desc = $node->field_clinic_short_description["und"][0]["value"];
        $operational_hours = $node->field_clinic_operational_hours["und"][0]["value"];
        $result = $query->entityCondition('entity_type', 'node')
            ->entityCondition('bundle', 'clinic_important_condition')
            ->execute();
    }
    $nodes = node_load_multiple(array_keys($result['node']));
//    echo "<pre>";
//				print_r($nodes);
//echo "</pre>";
    $html = '<div class="pw_row">
    <div class="pw_grid md6">
        <div class="panel_inner space_right">
            <div class="heading medium">'.$node->title.'</div>
            <p>'.$short_desc.'</p>
            <p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> '.$operational_hours.'</span> </p>
            <a href="'.$domain_url.url('node/'. $node->nid).'" class="pw_btn">Know More <i class="icon icon_arrow"></i></a>
        </div>
    </div>
    <div class="pw_grid md6">
        <p class="lg bold">Highlights of '.$iiccaa.':</p>
        <div class="spacer"></div>
        <div class="pw_row">';
    $realpath='';
    if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
        $realpath = $wrapper->getExternalUrl();
        // ...
    }
    foreach($nodes as $ica_data) {
        if($_POST['type']=='department') {
            $ica_img = str_replace('public://','',$ica_data->field_ica_dept_logo['und'][0]['uri']);
            $ics_inst_dept_data = $ica_data->field_department_associated['und'];
            $ics_inst_dept_title = $ica_data->field_main_dept_title['und'][0]['value'];
        }elseif($_POST['type']=='institute'){
            $ica_img = str_replace('public://','',$ica_data->field_ica_logo['und'][0]['uri']);
            $ics_inst_dept_data = $ica_data->field_institute_associated['und'];
            $ics_inst_dept_title = $ica_data->field_main_inst_title['und'][0]['value'];
        }elseif($_POST['type']=='clinics'){
            $ica_img = str_replace('public://','',$ica_data->field_clinic_ica_logo['und'][0]['uri']);
            $ics_inst_dept_data = $ica_data->field_clinic_associated['und'];
            $ics_inst_dept_title = $ica_data->field_main_clinic_title['und'][0]['value'];
        }

        $ica_points = $ica_data->body['und'][0]['value'];
//           print_r($ics_inst_dept_data);
        $ins_dept_field_data = '';
        foreach($ics_inst_dept_data as $ica_id_data){
            $term = taxonomy_term_load($ica_id_data['tid']);

            $ins_dept_field_data[] =$term->name;;
        }
        if($ica_img){
            $ica_img_path = $realpath.$ica_img;
        }else{
            $ica_img_path='';
        }
        if(in_array($node->title,$ins_dept_field_data)){

            $html .= '<div class="pw_grid">
                <div class="panel_inner space_right">
                    <img src="'.$ica_img_path.'" alt="" class="panel_icon">
                    <div class="title">'.$ics_inst_dept_title.'</div>
                    <ul class="shiftRight">
                        '.$ica_points.'
                    </ul>
                </div>
            </div>';
        }
}
    $html .= '
        </div>
    </div>
</div>';
}
echo $html;

?>