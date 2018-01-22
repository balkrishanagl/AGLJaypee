<?php
global $base_url;
$node = node_load($_POST['nid']);
$domain_url = 'http://aglfbapps.in';
//echo $node->body[und][0][value];
$html='';
$short_desc='';
$operational_hours='';
$ica_img='';
$ica_points='';
$ics_inst_dept_data='';
$ins_dept_field_data = '';
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
if($_POST['type'] == 'doctors'){

//                    echo "<pre>";
//                    print_r($nodes);
    $nidInst = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('type', 'doctor', '=')
        ->condition('title', $_POST['nid'], '=')
        ->execute()
        ->fetchCol();

    // Get all of the article nodes.
    $nodeInst = node_load_multiple($nidInst);
//    die("gya");
    foreach ($nodeInst as $ica_data) {

            $ica_points = $ica_data->body['und'][0]['value'];
//            print_r($ics_inst_dept_data);echo "</pre>";

//                            print_r($ins_dept_field_data);
//                            echo $node->title;


                $html .= '<div class="pw_grid md2 xs6">
                                <a href="' . $domain_url . url('node/' . $ica_data->nid) . '" class="doctor_list">
                                    <div class="doctor_img"><img src="' . $realpath . str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']) . '" alt="Doctor"></div>
                                    <div class="doctor_info">
                                        <div class="doc_title">' . $ica_data->title . '</div>
                                        <div class="doc_subtitle">' . $ica_data->field_designation_doctor['und'][0]['value'] . '</div>
                                    </div>
                                </a>
                            </div>';
    }
}else {
    $query = new EntityFieldQuery();
    $result = $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'doctor')
        ->execute();

    $nodes = node_load_multiple(array_keys($result['node']));
//                    echo "<pre>";
//                    print_r($nodes);

//    die("gya");
    foreach ($nodes as $ica_data) {

        if ($_POST['type'] == 'department') {
            $ics_inst_dept_data = $ica_data->field_related_department['und'];
        } else {
            $ics_inst_dept_data = $ica_data->field_related_institute['und'];
        }
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

                $html .= '<div class="pw_grid md2 xs6">
                                <a href="' . $domain_url . url('node/' . $ica_data->nid) . '" class="doctor_list">
                                    <div class="doctor_img"><img src="' . $realpath . str_replace('public://','',$ica_data->field_doctor_image['und'][0]['uri']) . '" alt="Doctor"></div>
                                    <div class="doctor_info">
                                        <div class="doc_title">' . $ica_data->title . '</div>
                                        <div class="doc_subtitle">' . $ica_data->field_designation_doctor['und'][0]['value'] . '</div>
                                    </div>
                                </a>
                            </div>';

            }
        }
    }
}
//    echo "<pre>";
//				print_r($nodes);
//echo "</pre>";


echo $html;

?>