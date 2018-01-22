<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
?>
<?php require_once('header.inc'); ?>
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
<div class="banner_inner_full" style="background-image:url(<?php echo $theme_path; ?>/images/banner-career.jpg);"></div>
<div class="pw_section section_with_left currentopening_page">
    <div class="pw_container">
        <div class="left_panel">
            <ul class="left_nav">
                <li><a href="<?php echo $base_url; ?>/career">Life at <br>Jaypee Hospital</a></li>
                <li><a href="#">Frequently <br>Asked Questions</a></li>
                <li><a href="<?php echo $base_url; ?>/current-opening">Current <br>Opening</a></li>
                <li><a href="#">Apply <br>Now</a></li>
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
                            <div class="opening_title"><?php echo $current_opening->title; ?> <span><?php $term = taxonomy_term_load($current_opening->field_sub_department[und][0][tid]);
                                     echo $term->name; ?></span></div>
                            <div class="opening_right">
                                <div class="opening_date">Last Date <br><?php echo date('d/m/Y',strtotime($current_opening->field_date_co[und][0][value])); ?></div>
                                <a href="#" class="apply_link">Apply Now</a>
                            </div>
                        </div>
                    </div>

    <?php $co++; } ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.inc'); ?>