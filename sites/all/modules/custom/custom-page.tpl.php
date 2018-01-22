<?php
$node = node_load(140);

//echo $node->body[und][0][value];
$html='';
$short_desc='';
$operational_hours='';
if($_POST['type']=='department' || $_POST['type']=='institute') {
    if($_POST['type']=='department'){
        $short_desc = $node->field_dept_short_description["und"][0]["value"];
        $operational_hours = $node->field_dept_operational_hours["und"][0]["value"];
    }else{
        $short_desc = $node->field_inst_short_description["und"][0]["value"];
        $operational_hours = $node->field_operational_hours["und"][0]["value"];
    }
    $html = '<div class="pw_row">
    <div class="pw_grid md6">
        <div class="panel_inner space_right">
            <div class="heading medium">'.$node->title.'</div>
            <p>'.$short_desc.'</p>
            <p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> '.$operational_hours.'</span> </p>
            <a href="#" class="pw_btn">Know More <i class="icon icon_arrow"></i></a>
        </div>
    </div>
    <div class="pw_grid md6">
        <p class="lg bold">Important Conditions Attended:</p>
        <div class="spacer"></div>
        <div class="pw_row">
            <div class="pw_grid xs6">
                <div class="panel_inner space_right">
                    <img src="assets/images/icon1.png" alt="" class="panel_icon">
                    <div class="title">Gyanaecology</div>
                    <ul class="pw_navlist">
                        <li><a href="#">Placenta Praevia</a></li>
                        <li><a href="#">Preeclampsia</a></li>
                        <li><a href="#">Ovarian Hypofunction</a></li>
                        <li><a href="#">Pelvic Inflammatory Disease</a></li>
                    </ul>
                </div>
            </div>
            <div class="pw_grid xs6">
                <div class="panel_inner space_left">
                    <img src="assets/images/icon2.png" alt="" class="panel_icon">
                    <div class="title">Child Care</div>
                    <ul class="pw_navlist">
                        <li><a href="#">Atrial Septal Defect</a></li>
                        <li><a href="#">Ductus Arteriosus</a></li>
                        <li><a href="#">Clubfoot</a></li>
                        <li><a href="#">Vesicoureteral Reflux</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>';
}elseif($_POST['type']=='clinic'){
    $node = node_load(136);
    print_r($node);
    $html = '<div class="heading medium">'.$node->title.'</div>
        '.$node->title;
}
echo $html;

?>