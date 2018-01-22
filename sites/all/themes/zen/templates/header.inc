<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
?>
<div class="header_full">
    <span class="nav_action"><i></i></span>
    <div class="top_full">
        <div class="pw_container">
            <div class="top_right">
                <ul class="pw_nav nav_inline">
                    <li><a href="<?php echo $base_url; ?>/doctors" ><i class="icon icon_doctor"></i> <span>Find A Doctor</span></a></li>
                    <li><a href="#" ><i class="icon icon_booking"></i> <span>Book An Appointment</span></a></li>
                    <li><a id="myBtn" href="javascript:void(0);" data-toggle=""><i class="icon icon_quote"></i> <span>Get A Quote</span></a></li>
                </ul>
                <div id="google_translate_element"></div>

               <?php //print render($page['sidebar_first']); ?>
            </div>
        </div>
    </div>
    <div class="head_full">
        <div class="pw_container">
            <div class="logo">
                <a href="<?php echo $base_url; ?>" class="logo_jaypee"><img src="<?php echo $theme_path;?>/images/jaypee_logo.png" alt="JAYPEE hospital"></a>
                <span class="logo_nabh"><img src="<?php echo $theme_path;?>/images/nabh_logo.png" alt="NABH"></span>
            </div>
            <div class="head_right">
                <div class="head_top">
                    <ul class="pw_nav nav_inline">
                        <li><a href="<?php echo $base_url; ?>/contact-us" data-toggle=""><i class="icon icon_phone"></i> Contact Us</a></li>
                        <li><a href="<?php echo $base_url; ?>/contact-us#locate" data-toggle=""><i class="icon icon_location"></i> Locate Us</a></li>
                        <div class="clearfix show_md"></div>
                        <li class="hide_sm"><a href="tel:1800 102 9102">Emergency <span class="phone_no emg_no">1800 102 9102</span></a></li>
                        <li class="hide_sm"><a href="tel:1800 102 9103">Helpline <span class="phone_no">1800 102 9103</span></a></li>
                        <li class="head_search"><span class="search_btn"><i class="icon icon_search"></i></span>
                            <div class="search_box">
                                <?php print render($page['sidebar_first']); ?>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <?php
                $menuTree = menu_tree_all_data('main-menu');
                $options = array('absolute' => TRUE);


                if(count($menuTree)) {
                    $menu = '  <nav class="main_nav" role="navigation">
      <ul class="pw_navbar nav_primary">';
                    $i = 1;
                    foreach ($menuTree as $link) {
                        if ($link['link']['hidden'] == 0) {
                            $url = url($link['link']['link_path'], $options);
                            if(trim($link['link']['title'])=='Blog'){
                                $menu .= '<li><a href="' . $url . '">' . $link['link']['title'] . ' </a>';
                            }elseif(trim($link['link']['title'])=='Contact Us' || trim($link['link']['title'])=='Blog' ){
                                $menu .= '<li data-nav="dropdown" class="dd_parent"><a href="' . $url . '" data-toggle="hover">' . $link['link']['title'] . ' </a><span class="nav_toggle"></span>';
                            }elseif(trim($link['link']['title'])=='Careers' ){
                                $menu .= '<li data-nav="dropdown" class="dd_parent"><a href="javascript:void(0);" data-toggle="hover">' . $link['link']['title'] . ' </a><span class="nav_toggle"></span>';
                            }else {
                                $menu .= '<li data-nav="dropdown" data-dropdown="multicolumn" class="multicolumn dd_parent"><a href="javascript:void(0);" data-toggle="hover">' . $link['link']['title'] . ' </a><span class="nav_toggle"></span>';
                            }

                            if (count($link['below'])) {

                                if (count($link['below'])) $cll = "abouttab"; else $cll = '';
                                $menu .= '<div class="pw_dropdown" data-full="false">
                                <div class="pw_row">';
                                if(trim($link['link']['title'])=='Centres of Excellence'){
                                    $menu .= '<div class="pw_grid md4">
                                   <ul class="pw_nav nav_items">
                                            ';
                                }else {
                                    $menu .= '<div class="pw_grid md6">
                                   <ul class="pw_nav nav_items">';
                                }

                                $p=0;

                                foreach ($link['below'] as $childs) {
                                    $p++;
                                    if (count($childs['below'])) $cl = "arrow"; else $cl = "";
                                    if ($childs['link']['hidden'] == 0) {
                                        //echo $childs['link']['title']."<br>";
                                        if ($childs['link']['title'] == "Development" || $childs['link']['title'] == "Management Services") {
                                            $url = "";
                                        } else {
                                            $url = url($childs['link']['link_path'], $options);
                                        }
                                        if ($childs['link']['title'] == "Development" || $childs['link']['title'] == "Management Services") {
                                            $menu .= '  <li class="' . $cl . ' dev-no"> ' . $childs['link']['title'] . '';
                                        }
                                        else {
                                            if(trim($childs['link']['title'])=='Download Brochure'){
                                                $blank='_blank';
                                            }else{
                                                $blank='';
                                            }
                                            if(strtolower(trim($childs['link']['title']))=='institute' || strtolower(trim($childs['link']['title']))=='department' ||strtolower(trim($childs['link']['title']))=='specialised clinics' ){
                                                $menu .= '  <li class="nav_head"><a href="javascript:void(0);"  > ' . $childs['link']['title'] . '</a>';
                                            }elseif(strtolower(trim($childs['link']['title']))=='preventive health plans'){
                                                $menu .= '  <li class="nav_head"><a href="' . $url . '"  > ' . $childs['link']['title'] . '</a>';
                                            }elseif(strtolower(trim($childs['link']['title']))=='send an enquiry') {
                                                $menu .= '  <li class="' . $cl . '"><a target="'.$blank.'" id="sndEnq" href="javascript:void(0);"> ' . $childs['link']['title'] . '</a>';
                                            }else {
                                                $menu .= '  <li class="' . $cl . '"><a href="' . $url . '" target="'.$blank.'"> ' . $childs['link']['title'] . '</a>';
                                            }
                                            if(trim($childs['link']['title'])=='Download Brochure'){
                                                $menu .='</ul></div><div class="pw_grid md6">
                                   <ul class="pw_nav nav_items">';
                                            }elseif(trim($childs['link']['title'])=='Oncology'){
                                                $menu .='</ul></div><div class="pw_grid md4">
                                   <ul class="pw_nav nav_items">';
                                            }elseif(trim($childs['link']['title'])=='Haematology & Bone Marrow Transplant'){
                                                $menu .='</ul></div><div class="pw_grid md4">
                                   <ul class="pw_nav nav_items">';
                                            }elseif(trim($childs['link']['title'])=='Head & Neck Clinic'){
                                                $menu.='</ul><ul class="pw_nav nav_items">';
                                            }elseif(trim($childs['link']['title'])=='Online Bill Payment'){
                                                $menu .='</ul></div><div class="pw_grid md6">
                                   <ul class="pw_nav nav_items">';
                                            }elseif(trim($childs['link']['title'])=='Success Stories' && trim($link['link']['title'])=='International Patients'){
                                                $menu .='</ul></div><div class="pw_grid md6">
                                   <ul class="pw_nav nav_items">';
                                            }
                                        }
                                        if (count($childs['below'])) {
                                            $menu .= '<ul class="pw_nav nav_items"> ';

                                            $menu .= '</ul>';
                                        }
                                        $menu .= '</li>';
                                    }
                                }
                                $menu .= '</ul>';
                            }
                            $menu .= '</li>';
                            $i++;
                        }
                    }
                    $menu .= '</ul>';

                    $menu .= '</nav>';
                }

                //print the menu
                print $menu;
                ?>


            </div>
        </div>
    </div>
</div>