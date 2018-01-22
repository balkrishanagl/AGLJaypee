<?php
// load node

$node = node_load($_POST['nid']);
//print_r($node);
//echo $node->body[und][0][value];
$html='';
if($_POST['type']=='department' || $_POST['type']=='institute') {
    $html = '<div class="pw_row">
    <div class="pw_grid md6">
        <div class="panel_inner space_right">
            <div class="heading medium">Heart</div>
            <p>The Institute of Child Care offers a personalized and compassionate care with principals of modern medicine in a child friendly environment. We provide comprehensive neonatal and pediatric care from birth to 18 years of age.</p>
            <p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> 24X7</span> </p>
            <a href="#" class="pw_btn">Know More <i class="icon icon_arrow"></i></a>
        </div>
    </div>
    <div class="pw_grid md6">
        <p class="lg bold">Symptoms:</p>
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
$html = '<div class="main_data_inner">
    <div class="heading medium">Specialized Clinic</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id justo accumsan, bibendum erat ut, blandit metus. Ut mattis, sapien at mollis convallis, purus justo condimentum sapien, et tempor arcu mauris sit amet orci. Sed tempor velit vitae diam blandit, ut efficitur elit imperdiet. Nulla ut rhoncus orci, non aliquet nisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean rhoncus condimentum massa. Sed quis mauris eget est suscipit malesuada.</p>
<p>Phasellus sed dapibus mi, eget dictum diam. Sed eu est purus. Proin justo eros, malesuada ultrices bibendum sed, malesuada eu erat. Fusce aliquam, nisi id euismod aliquam, justo magna vulputate magna, sed placerat sem velit sed risus. Nam egestas sapien augue, eu lacinia velit semper eu. Phasellus pretium lorem ante, eu commodo dui posuere ac. Fusce sollicitudin lacinia massa, euismod mattis lorem. Integer enim ligula, volutpat vel nisl non, tincidunt dignissim sem. Quisque scelerisque rhoncus elit, nec consequat tellus lacinia sit amet. Nam vitae neque vel nunc malesuada mattis. Nulla a ullamcorper enim. Etiam in diam nisi. In euismod, tortor nec faucibus tincidunt, felis purus fermentum mi, in accumsan velit ex sit amet sapien. Nullam vestibulum libero urna, vel faucibus purus pellentesque eu. Maecenas elit ex, fermentum sed hendrerit a, finibus id nisi. </p>
</div>';
}
echo $html;
?>