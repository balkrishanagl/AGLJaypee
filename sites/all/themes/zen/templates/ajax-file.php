<?php
// load node
$query = new EntityFieldQuery();
$result_institute = $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'institute')
    ->execute();
$nodes_institute = node_load_multiple(array_keys($result_institute['node']));
print_r($nodes_institute);
die("aya");
$html ='<div class="pw_row">
    <div class="pw_grid md6">
        <div class="panel_inner space_right">
            <div class="heading medium">Heart</div>
            <p>The Institute of Child Care offers a personalized and compassionate care with principals of modern medicine in a child friendly environment. We provide comprehensive neonatal and pediatric care from birth to 18 years of age.</p>
            <p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> 24X7</span> </p>
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
echo $html;
?>