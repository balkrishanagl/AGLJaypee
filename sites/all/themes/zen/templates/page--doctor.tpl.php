<?php
error_reporting(0);
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
if ( arg(0) == 'node' && is_numeric(arg(1)) ) {
    $nid = arg(1);
}
$node_doc = node_load($nid);
//echo "<pre>"; print_r($node_doc); echo "</pre>";
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
$doc_img = str_replace('public://','',$node_doc->field_doctor_image['und'][0]['uri']);
$doc_name = $node_doc->title;
if($node_doc->field_doctor_education['und']) {
    $field_doctor_education = $node_doc->field_doctor_education['und'][0]['value'];
}else{
    $field_doctor_education = '';
}
if($node_doc->field_doctor_fellowships['und']) {
    $field_doctor_fellowships = $node_doc->field_doctor_fellowships['und'][0]['value'];
}else{
    $field_doctor_fellowships = '';
}
if($node_doc->field_doctor_membership['und']) {
    $field_doctor_membership = $node_doc->field_doctor_membership['und'][0]['value'];
}else{
    $field_doctor_membership = '';
}
if($node_doc->field_doctor_experience['und']) {
    $field_doctor_experience = $node_doc->field_doctor_experience['und'][0]['value'];
}else{
    $field_doctor_experience = '';
}
if($node_doc->field_doctor_area_of_interest['und']) {
    $field_doctor_area_of_interest = $node_doc->field_doctor_area_of_interest['und'][0]['value'];
}else{
    $field_doctor_area_of_interest = '';
}
if($node_doc->field_doctor_pdf_link['und']) {
    $field_doctor_pdf_link = $node_doc->field_doctor_pdf_link['und'][0]['value'];
}else{
    $field_doctor_pdf_link = '';
}
if($node_doc->field_doctor_degrees['und']) {
    $field_doctor_degrees = $node_doc->field_doctor_degrees['und'][0]['value'];
}else{
    $field_doctor_degrees = '';
}
if($node_doc->field_related_institute['und']) {
    $field_related_institute = $node_doc->field_related_institute['und'][0]['value'];
}else{
    $field_related_institute = '';
}
if($node_doc->field_doctor_phone_number['und']) {
    $field_doctor_phone_number = $node_doc->field_doctor_phone_number['und'][0]['value'];
}else{
    $field_doctor_phone_number = '';
}
if($node_doc->field_doctor_email_id['und']) {
    $field_doctor_email_id = $node_doc->field_doctor_email_id['und'][0]['value'];
}else{
    $field_doctor_email_id = '';
}
if($node_doc->field_designation_doctor['und']) {
    $field_designation_doctor = $node_doc->field_designation_doctor['und'][0]['value'];
}else{
    $field_designation_doctor = '';
}
?>
<?php require_once('header.inc'); ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="<?php echo $base_url; ?>/doctors">Specialist</a></li>
                <li><?php echo $doc_name; ?></li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title"><?php echo $field_related_institute; ?></div>
        </div>
    </div>
    <div class="profile_top">
        <div class="pw_container">
            <div class="profile_top_box">
                <div class="profile_img">
                    <img src="<?php echo $realpath.$doc_img; ?>" alt="<?php echo $doc_name; ?>">
                </div>
                <div class="profile_right">
                    <div class="profile_title"><?php echo $doc_name; ?> <span><?php echo $field_designation_doctor; ?><?php if($field_related_institute){ ?> | Institute of <?php echo $field_related_institute; } ?></span></div>
                    <p class="degree lg"><?php echo $field_doctor_degrees; ?></p>
                    <div class="actions_bot">
                        <a href="javascript:void(0);" onclick="myPrintFunction()"><img src="assets/images/svg/print.svg" alt=""></a>
                        <?php if($field_doctor_pdf_link){ ?><a href="<?php  echo $field_doctor_pdf_link; ?>"><img src="assets/images/svg/pdf.svg" alt=""></a><?php  } ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <div class="detail_info">
                <div class="info_row">
                    <div class="info_grid">
                        <div class="profile_detail_box">
                            <div class="icon_circle"><img src="assets/images/svg/degree.svg" alt=""></div>
                            <div class="detail_inner">
                                <div class="heading3">Qualification</div>
                                <?php if($field_doctor_education){ ?>
                                    <div class="inner_box">
                                        <div class="title2">Education</div>
                                        <ul class="list">
                                            <?php echo $field_doctor_education; ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <div class="inner_box">
                                    <div class="title2">Fellowships</div>
                                    <ul class="list">
                                        <?php echo $field_doctor_fellowships; ?>
                                    </ul>
                                </div>
                                <div class="inner_box">
                                    <div class="title2">Membership</div>
                                    <ul class="list">
                                        <?php echo $field_doctor_membership; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info_grid"></div>
                    <div class="info_grid">
                        <div class="profile_detail_box">
                            <div class="icon_circle"><img src="assets/images/svg/experience.svg" alt=""></div>
                            <div class="detail_inner">
                                <div class="heading3">Experience & Area of Interest</div>
                                <div class="inner_box">
                                    <div class="title2">Experience</div>
                                    <ul class="list">
                                        <?php echo $field_doctor_experience; ?>
                                    </ul>
                                </div>
                                <div class="inner_box">
                                    <div class="title2">Area Of Interest</div>
                                    <ul class="list">
                                        <?php echo $field_doctor_area_of_interest; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact_info">
                <div class="pw_row">
                    <div class="pw_grid md6 text_right">
                        <div class="text_box">Email-Id: <a href="mailto:<?php echo $field_doctor_email_id; ?>"><?php echo $field_doctor_email_id; ?></a></div>
                    </div>
                    <div class="pw_grid md6 ">
                        <div class="text_box">Phone Number: <span><?php echo $field_doctor_phone_number; ?></span></div>
                    </div>
                </div>
            </div>
            <div class="book_apnt text_center">
                <a href="#" class="pw_btn btn_big">Book an Appointment <i class="icon icon_arrow"></i></a>
            </div>
        </div>
    </div>
<?php require_once('footer.inc'); ?>