<?php
global $base_url;
$theme_path = $base_url.'/'.path_to_theme();
$node_faq_banner = node_load('88');

$realpath='';
if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
    $realpath = $wrapper->getExternalUrl();
    // ...
}
?>
<?php require_once('header.inc'); ?>
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
    <div class="banner_inner"><img src="<?php echo $realpath.$node_faq_banner->field_page_banner[und][0][filename] ; ?>" alt=""></div>
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
                    $faq_type_data = $faqs->field_faq_type[und];

                    foreach($faq_type_data as $faq_type){
                        $term = taxonomy_term_load($faq_type['tid']);

                        $faq_type_datas[] =$term->name;;
                    }
                    if(in_array('Patients & Visitors',$faq_type_datas)){
                        ?>
                        <li>
                            <div class="faq_title"><?php echo $faqs->title; ?></div>
                            <div class="faq_data">
                                <p><?php echo $faqs->body[und][0][value]; ?></p>
                            </div>
                        </li>
                        <?php $f++; }} ?>

            </ul>
        </div>
    </div>
<?php require_once('footer.inc'); ?>