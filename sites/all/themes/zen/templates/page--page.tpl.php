<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
$domain_url = 'http://aglfbapps.in';
if ( arg(0) == 'node' && is_numeric(arg(1)) ) {
   $nid = arg(1);
}
$node_page_data = node_load($nid);
$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
//echo "<pre>";
//print_r($node_page_data);
//echo "</pre>";
?>
<?php require_once('header.inc');
if($nid==3){ ?>
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
    <?php if(isset($node_page_data->field_page_banner['und'][0]['filename'])){  ?>
        <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.$node_page_data->field_page_banner['und'][0]['filename'] ; ?>);">
        <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
</div>
    <?php } ?>
    <div class="pw_section section_with_left career_page">
        <div class="pw_container <?php if(isset($node_page_data->field_add_class['und'][0]['value'])){ echo $node_page_data->field_add_class['und'][0]['value']; } ?>">
            <div class="left_panel">
                <ul class="left_nav">
                    <li><a href="<?php echo $base_url; ?>/career">Life at <br>Jaypee Hospital</a></li>
                    <li><a href="<?php echo $base_url; ?>/careers/faq">Frequently <br>Asked Questions</a></li>
                    <li><a href="<?php echo $base_url; ?>/careers/current-opening">Current <br>Opening</a></li>
<!--                    <li><a href="--><?php //echo $base_url; ?><!--/apply-now">Apply <br>Now</a></li>-->
                </ul>
            </div>
            <?php echo $node_page_data->body['und'][0]['value']; ?>

        </div>
    </div>
<?php }elseif($nid==4){  ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="javascript:void(0);">Careers</a></li>
                <li>Current Openings</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Current Openings</div>
        </div>
    </div>
    <div class="banner_inner_full" style="background-image:url(<?php echo $theme_path; ?>/images/banner-career.jpg);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php //echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
</div>
    <div class="pw_section section_with_left currentopening_page">
        <div class="pw_container">
            <div class="left_panel">
                <ul class="left_nav">
                    <li><a href="<?php echo $base_url; ?>/career">Life at <br>Jaypee Hospital</a></li>
                    <li><a href="<?php echo $base_url; ?>/careers/faq">Frequently <br>Asked Questions</a></li>
                    <li><a href="<?php echo $base_url; ?>/careers/current-opening">Current <br>Opening</a></li>
<!--                    <li><a href="--><?php //echo $base_url; ?><!--/apply-now">Apply <br>Now</a></li>-->
                </ul>
            </div>
            <div class="main_container">
                <div class="main_container_inner">
                    <div class="opening_outer">
                        <div class="list_search clearfix">
                            <form action="">
                                <div class="pw_group">
                                    <div class="pw_select">
                                        <select name="departments" id="departments" class="pw_form lg">
                                            <option value="">Select Department</option>
                                            <?php
                                            $query_dept = new EntityFieldQuery();
                                            $result_department = $query_dept->entityCondition('entity_type', 'node')
                                                ->entityCondition('bundle', 'department')
                                                ->execute();
                                            $nodes_department = node_load_multiple(array_keys($result_department['node']));
                                            //print_r($nodes_department);
                                            $d = 1;
                                            foreach($nodes_department as $department_data){
                                                ?>
                                                <option value="<?php echo $department_data->vid; ?>"><?php echo $department_data->title; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="pw_group">
                                    <div class="pw_select">
                                        <select name="sub_department" id="sub_department" class="pw_form lg">
                                            <option value="">Sub- Department</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pw_group">
                                    <div class="pw_select">
                                        <select name="position" id="position" class="pw_form lg">
                                            <option value="">Select Positions</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        $query_co = new EntityFieldQuery();
                        $result_co = $query_co->entityCondition('entity_type', 'node')
                            ->entityCondition('bundle', 'current_opening')
                            ->execute();
                        $nodes_co = node_load_multiple(array_keys($result_co['node']));
                        //echo "<pre>"; print_r($nodes_co); echo "</pre>";
                        $co = 1;
                        foreach($nodes_co as $current_opening){
                            ?>
                            <div class="opening_list clearfix">
                                <div class="opening_left"><?php echo $co; ?>.</div>
                                <div class="opening_main">
                                    <div class="opening_title"><?php echo $current_opening->title; ?>
                                        <span><?php $term = taxonomy_term_load($current_opening->field_sub_department['und'][0]['tid']);
                                            echo $term->name; ?></span></div>
                                    <div class="opening_right">
                                        <div class="opening_date">Last Date <br><?php echo date('d/m/Y',strtotime($current_opening->field_date_co['und'][0]['value'])); ?></div>
                                        <a href="<?php echo $base_url.'/apply-now?jid='.base64_encode($current_opening->nid); ?>" class="apply_link">Apply Now</a>
                                    </div>
                                </div>
                            </div>

                            <?php $co++; } ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }elseif($nid==414){
     $jid = $_GET['jid'];
//    echo "<br>";
    $jid = base64_decode($jid);
    if(empty($jid)){
        header("Location: ".$base_url."/careers/current-opening");
    }else{
        $get_apply_now_form = node_view(node_load(413), 'full', NULL);
        $node_job = node_load($jid);
//        echo "<pre>";
//        print_r($node_job);
//        echo "</pre>";
        if($node_job->type!='current_opening'){
        header("Location: ".$base_url."/careers/current-opening");
        }else{
        $term = taxonomy_term_load($node_job->field_department_co['und'][0]['tid']);

        ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="<?php echo $base_url; ?>/career">Careers</a></li>
                <li><a href="<?php echo $base_url; ?>/careers/current-opening">Current Openings</a></li>
                <li>Apply Now</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Current Openings</div>
        </div>
    </div>
    <div class="banner_inner_full" style="background-image:url(<?php echo $theme_path; ?>/images/banner-career.jpg);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php //echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
</div>
    <div class="pw_section section_with_left currentopening_page">
        <div class="pw_container">
            <div class="left_panel">
                <ul class="left_nav">
                    <li><a href="<?php echo $base_url; ?>/career">Life at <br>Jaypee Hospital</a></li>
                    <li><a href="<?php echo $base_url; ?>/careers/faq">Frequently <br>Asked Questions</a></li>
                    <li><a href="<?php echo $base_url; ?>/careers/current-opening">Current <br>Opening</a></li>
<!--                    <li><a href="--><?php //echo $base_url; ?><!--/apply-now">Apply <br>Now</a></li>-->
                </ul>
            </div>
            <div class="main_container">
                <div class="main_container_inner">
                    <div class="apply_now_container">
                        <div class="title"><?php echo $node_job->title; ?></div>
                        <div class="apply_top clear">
                            <div><strong>Job Code:</strong> <?php echo $jid; ?></div>
                            <div><strong>Department:</strong> <?php echo $term->name; ?></div>
                            <div><strong>Last Date:</strong> <?php echo date('d/m/Y',strtotime($node_job->field_date_co['und'][0]['value'])); ?></div>
                        </div>
                        <div class="apply_form">
                            <?php
                            print render($get_apply_now_form);
                            ?>
                            <input type="hidden" value="<?php echo $node_job->title; ?>" id="paf">
<!--                            <form action="">-->
<!--                                <div class="pw_row">-->
<!--                                    <div class="pw_grid sm12"><div class="pw_group"><input name="name" type="text" class="pw_form lg" id="name" placeholder="Name"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row gutter20">-->
<!--                                    <div class="pw_grid sm6"><div class="pw_group"><input name="dob" type="text" class="pw_form lg" id="dob" placeholder="DOB"></div></div>-->
<!--                                    <div class="pw_grid sm6"><div class="pw_group"><input name="gender" type="text" class="pw_form lg" id="gender" placeholder="Gender"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row gutter20">-->
<!--                                    <div class="pw_grid sm6"><div class="pw_group"><div class="pw_select">-->
<!--                                                <select name="speciality" id="speciality" class="pw_form lg">-->
<!--                                                    <option value="">Speciality</option>-->
<!--                                                    <option value=""></option>-->
<!--                                                </select>-->
<!--                                            </div></div></div>-->
<!--                                    <div class="pw_grid sm6"><div class="pw_group"><div class="pw_select">-->
<!--                                                <select name="sub_speciality" id="sub_speciality" class="pw_form lg">-->
<!--                                                    <option value="">Sub-Speciality</option>-->
<!--                                                    <option value=""></option>-->
<!--                                                </select>-->
<!--                                            </div></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row gutter20">-->
<!--                                    <div class="pw_grid sm6"><div class="pw_group">-->
<!--                                            <div class="pw_select">-->
<!--                                                <select name="total_experience" id="total_experience" class="pw_form lg">-->
<!--                                                    <option value="">Total experience</option>-->
<!--                                                    <option value=""></option>-->
<!--                                                </select>-->
<!--                                            </div></div></div>-->
<!--                                    <div class="pw_grid sm6"><div class="pw_group"><input name="gender" type="text" class="pw_form lg" id="gender" placeholder="Highest Qualification"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row">-->
<!--                                    <div class="pw_grid sm12">-->
<!--                                        <div class="pw_group"><input name="graduation" type="text" class="pw_form lg" id="graduation" placeholder="Graduation"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row">-->
<!--                                    <div class="pw_grid sm12">-->
<!--                                        <div class="pw_group"><input name="post_graduation" type="text" class="pw_form lg" id="post_graduation" placeholder="Post Graduation"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row">-->
<!--                                    <div class="pw_grid sm12">-->
<!--                                        <div class="pw_group"> <div class="pw_select">-->
<!--                                                <select name="position_for" id="position_for" class="pw_form lg">-->
<!--                                                    <option value="">Position Applied for</option>-->
<!--                                                    <option value=""></option>-->
<!--                                                </select>-->
<!--                                            </div></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row">-->
<!--                                    <div class="pw_grid sm12">-->
<!--                                        <div class="pw_group"><input name="address" type="text" class="pw_form lg" id="address" placeholder="Address"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row gutter20">-->
<!--                                    <div class="pw_grid sm6">-->
<!--                                        <div class="pw_group"><input name="phone" type="text" class="pw_form lg" id="phone" placeholder="Mobile Number"></div></div>-->
<!--                                    <div class="pw_grid sm6">-->
<!--                                        <div class="pw_group"><input name="email" type="text" class="pw_form lg" id="email" placeholder="Email"></div></div>-->
<!--                                </div>-->
<!--                                <div class="pw_row gutter20">-->
<!--                                    <div class="pw_grid md10">-->
<!--                                        <div class="pw_group"><input name="uploaded_file" type="text" disabled="disabled" class="pw_form lg" id="uploaded_file" placeholder="Upload Resume"></div></div>-->
<!--                                    <div class="pw_grid md2">-->
<!--                                        <div class="pw_group"><div class="pw_btn upload_btn">UPLOAD <input type="file" id="upload_resume"></div></div></div>-->
<!--                                </div>-->
<!--                                <button class="pw_btn" type="button">Submit <i class="icon icon_arrow"></i></button>-->
<!--                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } } }elseif($nid==6){
    $node_faq_banner = node_load('6');
    ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="#">Careers</a></li>
                <li>FAQs</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">FAQs</div>
        </div>
    </div>

    <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.str_replace('public://','',$node_faq_banner->field_page_banner['und'][0]['uri']) ; ?>);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <ul class="faq_list">
                <?php
                $faq_type_datas = array();
                $query_faq = new EntityFieldQuery();
                $result_faq = $query_faq->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'faq')
                    ->execute();
                $nodes_faq = node_load_multiple(array_keys($result_faq['node']));
                //echo "<pre>"; print_r($nodes_faq); echo "</pre>";
                $f = 1;
                foreach($nodes_faq as $faqs){
                    $faq_type_data = $faqs->field_faq_type['und'];

                    foreach($faq_type_data as $faq_type){
                        $term = taxonomy_term_load($faq_type['tid']);

                        $faq_type_datas[] =$term->name;;
                    }
                    if(in_array('Careers',$faq_type_datas)){
                        ?>
                        <li>
                            <div class="faq_title"><?php echo $faqs->title; ?></div>
                            <div class="faq_data">
                                <p><?php echo $faqs->body['und'][0]['value']; ?></p>
                            </div>
                        </li>
                        <?php $f++; }} ?>

            </ul>
        </div>
    </div>
<?php }elseif($nid==88){
    $node_faq_banner = node_load('88');
    ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="#">Patient & visitor</a></li>
                <li>FAQs</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">FAQs</div>
        </div>
    </div>

        <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.str_replace('public://','',$node_faq_banner->field_page_banner['und'][0]['uri']) ; ?>);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <ul class="faq_list">
                <?php
                $faq_type_datas = array();
                $query_faq = new EntityFieldQuery();
                $result_faq = $query_faq->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'faq')
                    ->execute();
                $nodes_faq = node_load_multiple(array_keys($result_faq['node']));
                //echo "<pre>"; print_r($nodes_faq); echo "</pre>";
                $f = 1;
                foreach($nodes_faq as $faqs){
                    $faq_type_data = $faqs->field_faq_type['und'];

                    foreach($faq_type_data as $faq_type){
                        $term = taxonomy_term_load($faq_type['tid']);

                        $faq_type_datas[] =$term->name;;
                    }
                    if(in_array('Patients & Visitors',$faq_type_datas)){
                        ?>
                        <li>
                            <div class="faq_title"><?php echo $faqs->title; ?></div>
                            <div class="faq_data">
                                <p><?php echo $faqs->body['und'][0]['value']; ?></p>
                            </div>
                        </li>
                        <?php $f++; }} ?>

            </ul>
        </div>
    </div>
<?php }elseif($nid==89){
    $node_faq_banner = node_load('89');
    ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li><a href="#">International Patients</a></li>
                <li>FAQs</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">FAQs</div>
        </div>
    </div>

    <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.str_replace('public://','',$node_faq_banner->field_page_banner['und'][0]['uri']) ; ?>);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <ul class="faq_list">
                <?php
                $faq_type_datas = array();
                $query_faq = new EntityFieldQuery();
                $result_faq = $query_faq->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'faq')
                    ->execute();
                $nodes_faq = node_load_multiple(array_keys($result_faq['node']));
                //echo "<pre>"; print_r($nodes_faq); echo "</pre>";
                $f = 1;
                foreach($nodes_faq as $faqs){
                    $faq_type_data = $faqs->field_faq_type['und'];

                    foreach($faq_type_data as $faq_type){
                        $term = taxonomy_term_load($faq_type['tid']);

                        $faq_type_datas[] =$term->name;;
                    }
                    if(in_array('International Patients',$faq_type_datas)){
                        ?>
                        <li>
                            <div class="faq_title"><?php echo $faqs->title; ?></div>
                            <div class="faq_data">
                                <p><?php echo $faqs->body['und'][0]['value']; ?></p>
                            </div>
                        </li>
                        <?php $f++; }} ?>

            </ul>
        </div>
    </div>
<?php }elseif($nid==5){  ?>
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
    <?php if(isset($node_page_data->field_page_banner['und'][0]['uri'])){  ?>

<div class="banner_inner_full" style="background-image:url(<?php echo $realpath.str_replace('public://','',$node_page_data->field_page_banner['und'][0]['uri']) ; ?>);">
        <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
        </div>
    <?php } ?>

    <div class="pw_section">
        <div class="pw_container <?php if(isset($node_page_data->field_add_class['und'][0]['value'])){ echo $node_page_data->field_add_class['und'][0]['value']; } ?>">
            <?php echo $node_page_data->body['und'][0]['value']; ?>
  <div class="pw_grid md6">
<div class="title">Quick Enquiry</div>
            	<div class="contact_form">
                	<?php
$get_contact_form = node_view(node_load(415), 'full', NULL);
print render($get_contact_form);
?>
                </div>
            </div>
        </div>
        <div class="map" id="locate">
                	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112185.79621532731!2d77.371495!3d28.51548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xecd13afcb2e7cb44!2sJaypee+Hospital!5e0!3m2!1sen!2sin!4v1501400090051" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
        </div>
    </div>
<?php }elseif($nid==135){  ?>

<?php }elseif($nid==141){  ?>

<?php }elseif($nid==17){  ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>News</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">News</div>
        </div>
    </div>
    <div class="pw_section pt0 newsSection">
        <div class="pw_container">
            <ul class="media_listing clear">
                <?php
                $query = new EntityFieldQuery();
                $result_news = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'news')
                    ->propertyOrderBy('nid', 'DESC')
                    ->execute();
                $nodes_news = node_load_multiple(array_keys($result_news['node']));
//                				print_r($nodes_news);


                foreach($nodes_news as $news_data) {
                    $news_img = str_replace('public://','',$news_data->field_news_image['und'][0]['uri']);
                    if(!$news_img){
                        $news_img = 'no_image_thumb.png';
                    }
                   ?>
                        <li>
                            <a href="<?php echo $domain_url.url('node/'. $news_data->nid); ?>" class="media_inner">
                                <div class="media_img"><img src="<?php echo $realpath.$news_img; ?>" alt="Media"></div>
                                <div class="date"><?php echo $news_data->field_news_date['und'][0]['value']; ?></div>
                                <div class="media_title"><?php echo $news_data->title; ?></div>
                            </a>
                        </li>
                    <?php
                }
                ?>
            </ul>
            <div class="load_more_outer text_center">
<!--                <a href="#" class="pw_btn btn_loadMore">Load More <i class="icon icon_arrow"></i></a>-->
            </div>
        </div>
    </div>
<?php }elseif($nid==18){  ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Events</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Events</div>
        </div>
    </div>
    <div class="pw_section pt0 eventSection">
        <div class="pw_container">
            <ul class="media_listing clear">
                <?php
                $query = new EntityFieldQuery();
                $result_events = $query->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'events')
                    ->propertyOrderBy('nid', 'DESC')
                    ->execute();
                $nodes_event = node_load_multiple(array_keys($result_events['node']));
                //										print_r($nodes_event);
                $j=1;
                foreach($nodes_event as $event_data) {
                    $event_img = str_replace('public://','',$event_data->field_event_image['und'][0]['uri']);
                    if(!$event_img){
                        $event_img = 'no_image_thumb.png';
                    }
                    ?>
                    <li>
                        <a href="<?php echo $domain_url.url('node/'. $event_data->nid); ?>" class="media_inner">
                            <div class="media_img"><img src="<?php echo $realpath.$event_img; ?>" alt="Media"></div>
                            <div class="date"><?php echo $event_data->field_event_date['und'][0]['value']; ?></div>
                            <div class="media_title"><?php echo $event_data->title; ?></div>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="load_more_outer text_center">
<!--                <a href="#" class="pw_btn btn_loadMore">Load More <i class="icon icon_arrow"></i></a>-->
            </div>
        </div>
    </div>
<?php }elseif($nid==142){
    $query = new EntityFieldQuery();
    $result_institute = $query->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'institute')
        ->execute();
    $nodes_institute = node_load_multiple(array_keys($result_institute['node']));
//				print_r($nodes_institute);
    $s = 1;
    ?>
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
    <div class="banner_inner_full" style="background-image:url(assets/images/inner-banner.jpg);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php //echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
</div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <div class="pw_row gutter20">
                <?php foreach($nodes_institute as $institutes_data){ ?>
                    <div class="pw_grid md4 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $institutes_data->nid); ?>" class="serv_box">
                            <div class="serv_icon"><img src="assets/images/svg/heart.svg" alt="Institute of <?php echo $institutes_data->title; ?>"></div>
                            <div class="serv_title"><?php echo $institutes_data->title; ?></div>
                            <span class="more_arrow"></span>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

<?php }elseif($nid==169){
    $query_dep = new EntityFieldQuery();
    $result_dept = $query_dep->entityCondition('entity_type', 'node')
        ->entityCondition('bundle', 'department')
        ->execute();
    $nodes_department = node_load_multiple(array_keys($result_dept['node']));
//				print_r($nodes_institute);
    $s = 1;
    ?>
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="#">Specialties</a></li>
                <li>Departments</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Departments</div>
        </div>
    </div>
    <div class="banner_inner_full" style="background-image:url(assets/images/inner-banner.jpg);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php //echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
</div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <div class="pw_row gutter20">
                <?php foreach($nodes_department as $dept_data){ ?>
                    <div class="pw_grid md4 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $dept_data->nid); ?>" class="serv_box">
                            <div class="serv_icon"><img src="assets/images/svg/heart.svg" alt="Institute of <?php echo $dept_data->title; ?>"></div>
                            <div class="serv_title"><?php echo $dept_data->title; ?></div>
                            <span class="more_arrow"></span>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

<?php }elseif($nid==216){  ?>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <div class="page_header">
        <div class="pw_container">
            <ul class="pw_breadcrumb">
                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                <li>Doctors</li>
            </ul>
            <div class="clearfix"></div>
            <div class="page_title">Doctors</div>
        </div>
    </div>
    <div class="banner_inner_full" style="background-image:url(<?php echo $theme_path; ?>/images/banner-career.jpg);">
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php //echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
</div>
    <div class="pw_section space_short">
        <div class="pw_container">
            <?php
            $query_doc_search = new EntityFieldQuery();
            $result_doc_search = $query_doc_search->entityCondition('entity_type', 'node')
                ->entityCondition('bundle', 'doctor')
                ->execute();

            $nodes_doc_search = node_load_multiple(array_keys($result_doc_search['node']));
            //                    echo "<pre>";
            //                    print_r($nodes);
            //    die("aya");
            foreach ($nodes_doc_search as $icas_data) {
                $data[] = $icas_data->title;
            }
            ?>
            <div id="" style="opacity: 0;height: 0;">
                <input type="text" value='<?php echo json_encode($data); ?>' id="search_doc_res" ></div>
            <div class="doctor_search_panel">

                <form action="">
                    <div class="pw_row gutter40 doctor_search">
                        <div class="pw_grid md3 xxs6">
                            <div class="pw_select">
                                <select name="institute" id="institute" class="pw_form" onchange="return hideDeptSelect($(this).val());">
                                    <option value="">Institute</option>
                                    <?php
                                    $query_institute = new EntityFieldQuery();
                                    $result_institute = $query_institute->entityCondition('entity_type', 'node')
                                        ->entityCondition('bundle', 'institute')
                                        ->execute();
                                    $nodes_institute = node_load_multiple(array_keys($result_institute['node']));
                                    //print_r($nodes_department);
                                    $d = 1;
                                    foreach($nodes_institute as $institute_data){
                                        ?>
                                        <option value="<?php echo $institute_data->vid; ?>"><?php echo $institute_data->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="pw_grid md3 xxs6">
                            <div class="pw_select">
                                <select name="department" id="doc_department" class="pw_form" onchange="return hideInstSelect($(this).val());">
                                    <option value="">Department</option>
                                    <?php
                                    $query_dept = new EntityFieldQuery();
                                    $result_department = $query_dept->entityCondition('entity_type', 'node')
                                        ->entityCondition('bundle', 'department')
                                        ->execute();
                                    $nodes_department = node_load_multiple(array_keys($result_department['node']));
                                    //print_r($nodes_department);
                                    $d = 1;
                                    foreach($nodes_department as $department_data){
                                        ?>
                                        <option value="<?php echo $department_data->vid; ?>"><?php echo $department_data->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="pw_grid md3 xxs6">
                            <div class="relative">
                                <input type="text" value="" name="doctors"  id="doctors" class="pw_form">
                                <i class="icon icon_search"></i>
                            </div>
                        </div>
                        <div class="pw_grid md3 xxs6">
                            <button class="btn_arrow" id="dct_list"></button>
                            <button type="reset" class="btn_arrow_reset"></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="pw_row gutter40 doctor_listing">
                <?php
                $query_co = new EntityFieldQuery();
                $result_co = $query_co->entityCondition('entity_type', 'node')
                    ->entityCondition('bundle', 'doctor')
                    ->propertyOrderBy('title', 'ASC')
                    ->execute();
                $nodes_co = node_load_multiple(array_keys($result_co['node']));
//                echo "<pre>"; print_r($nodes_co); echo "</pre>";

                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }

                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='director'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='chief'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='additional director'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='associate director'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='sr. consultant'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='executive consultant'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='consultant'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='associate consultant'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }}
                foreach($nodes_co as $doctors){

                if($doctors->field_related_department['und']){
                    $dept_inst_assign = $doctors->field_related_department['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }elseif($doctors->field_related_institute['und']){
                    $dept_inst_assign = $doctors->field_related_institute['und'][0]['tid'];
                    $dept_inst_term = taxonomy_term_load($dept_inst_assign);
					$dept_inst_assign = $dept_inst_term->name;
                }else{
                    $dept_inst_assign = '';
                }
                    if(strtolower(trim($doctors->field_designation_doctor['und'][0]['value']))=='counsellor'){
                    ?>
                    <div class="pw_grid md2 xs6">
                        <a href="<?php echo $domain_url.url('node/'. $doctors->nid); ?>" class="doctor_list">
                            <div class="doctor_img"><img src="<?php echo $realpath.str_replace('public://','',$doctors->field_doctor_image['und'][0]['uri']); ?>" alt="Doctor"></div>
                            <div class="doctor_info">
                                <div class="doc_title"><?php echo $doctors->title; ?></div>
                                <div class="doc_subtitle"><?php echo $doctors->field_designation_doctor['und'][0]['value']; ?></div>
                                <div class="doc_subtitle"><?php echo $dept_inst_assign; ?></div>
                            </div>
                        </a>
                    </div>

                    <?php  }} ?>


            </div>
        </div>
    </div>
<?php }else{
?>
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
<?php if(isset($node_page_data->field_page_banner['und'][0]['uri'])){  ?>
    <div class="banner_inner_full" style="background-image:url(<?php echo $realpath.str_replace('public://','',$node_page_data->field_page_banner['und'][0]['uri']) ; ?>);">
<!--    <img src="--><?php //echo $realpath.str_replace('public://','',$node_page_data->field_page_banner['und'][0]['uri']) ; ?><!--" alt="">-->
    <div class="pw_container">
            <div class="banner_overlay">
                <p><?php echo $node_health_package_data->field_page_banner_text['und'][0]['value']; ?></p>
            </div>
        </div>
    </div>
<?php } ?>

    <div class="pw_section">
        <div class="pw_container <?php if(isset($node_page_data->field_add_class['und'][0]['value'])){ echo $node_page_data->field_add_class['und'][0]['value']; } ?>">
            <?php echo $node_page_data->body['und'][0]['value']; ?>

        </div>
    </div>
<?php }
require_once('footer.inc'); ?>