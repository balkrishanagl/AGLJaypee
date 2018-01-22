<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();

$node_doc = node_load(140);
//echo "<pre>"; print_r($node_doc); echo "</pre>";
$doc_img = $node_doc->field_doctor_image['und'][0]['filename'];
$doc_name = $node_doc->title;
$field_doctor_education = $node_doc->field_doctor_education[und][0][value];
$field_doctor_fellowships = $node_doc->field_doctor_fellowships[und][0][value];
$field_doctor_membership = $node_doc->field_doctor_membership[und][0][value];
$field_doctor_experience = $node_doc->field_doctor_experience[und][0][value];
$field_doctor_area_of_interest = $node_doc->field_doctor_area_of_interest[und][0][value];
$field_doctor_pdf_link = $node_doc->field_doctor_pdf_link[und][0][value];
$field_doctor_degrees = $node_doc->field_doctor_degrees[und][0][value];
$field_related_institute = $node_doc->field_related_institute[und][0][value];
$field_doctor_phone_number = $node_doc->field_doctor_phone_number[und][0][value];
$field_doctor_email_id = $node_doc->field_doctor_email_id[und][0][value];
?>
<?php require_once('header.inc'); ?>
<div class="page_header">
    <div class="pw_container">
        <ul class="pw_breadcrumb">
            <li><a href="#">Specialties</a></li>
            <li><a href="#">Institutes</a></li>
            <li><a href="#">Institute of Bone &amp; Joints</a></li>
            <li>Specialist</li>
        </ul>
        <div class="clearfix"></div>
        <div class="page_title">Bone &amp; Joint Specialist</div>
    </div>
</div>
<div class="profile_top">
    <div class="pw_container">
        <div class="profile_top_box">
            <div class="profile_img">
                <img src="<?php echo $theme_path; ?>/images/<?php echo $doc_img; ?>" alt="Specialist">
            </div>
            <div class="profile_right">
                <div class="profile_title"><?php echo $doc_name; ?> <span>Senior Consultant | Institute of Orthopaedics and Spine</span></div>
                <p class="degree lg">MRCS, M.Sc., M.Ch., FRCS (Trauma & Orthopaedics)</p>
                <div class="actions_bot">
                    <a href="#"><img src="assets/images/svg/print.svg" alt=""></a>
                    <a href="<?php if($field_doctor_pdf_link){ echo $field_doctor_pdf_link; }else{ echo 'javascript:void(0);'; } ?>"><img src="assets/images/svg/pdf.svg" alt=""></a>
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