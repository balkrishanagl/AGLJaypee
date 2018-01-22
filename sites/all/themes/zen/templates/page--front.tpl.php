<?php  
error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
?>

<?php
global $base_url;
$domain_url = 'http://aglfbapps.in';
$theme_path = $base_url.'/'.path_to_theme();

?>
<?php require_once('header.inc'); ?>
<div class="banner_full" role="banner">
	<a href="#mainSection" class="arrow_section go_link"><i class="arrow_down"></i></a>
	<div class="overlay"></div>
	<div class="loader"></div>
	<div class="main_slider_data">
		<div class="main_slider owl-carousel">
			<?php
			$query_hs = new EntityFieldQuery();
			$result_home_slider = $query_hs->entityCondition('entity_type', 'node')
				->entityCondition('bundle', 'home_slider')
				->execute();
			$nodes_home_slider = node_load_multiple(array_keys($result_home_slider['node']));

			$realpath='';
			if ($wrapper = file_stream_wrapper_get_instance_by_uri('public://')) {
				$realpath = $wrapper->getExternalUrl();
				// ...
			}
			foreach($nodes_home_slider as $home_slider){
			?>
			<div class="banner_item" style="background-image:url(<?php print $realpath.str_replace('public://','',$home_slider->field_slider_image['und'][0]['uri']);  ?>);">
				<div class="banner_container <?php if($home_slider->field_add_banner_class_home['und']){ echo $home_slider->field_add_banner_class_home['und'][0]['value']; }  ?>">
					<?php  if($home_slider->field_slider_banner_title['und']){ ?><div class="bannter_title"><?php echo $home_slider->field_slider_banner_title['und'][0]['value']; ?></div><?php } ?>
					<?php  if($home_slider->field_slider_banner_caption['und']){ ?><div class="banner_caption"><?php echo $home_slider->field_slider_banner_caption['und'][0]['value']; ?></div><?php } ?>
					<?php  if($home_slider->field_home_banner_link['und']){ ?><a href="<?php echo $home_slider->field_home_banner_link['und'][0]['value']; ?>" class="pw_btn <?php if($home_slider->field_add_banner_class_home['und'][0]['value']=='color_light'){ echo 'btn_light'; }else{ echo 'btn_dark'; } ?>">Know More <i class="icon icon_arrow"></i></a> <?php } ?>
				</div>
			</div>
				<?php  } ?>

		</div>
	</div>
</div>
<div class="pw_section facts_section" id="mainSection">
	<div class="pw_container">
		<div class="facts_scroller owl-carousel">

<?php
$query_highlighted_area = new EntityFieldQuery();
$result_highlighted_area = $query_highlighted_area->entityCondition('entity_type', 'node')
	->entityCondition('bundle', 'highlighted_area')
	->execute();
$nodes_highlighted_area = node_load_multiple(array_keys($result_highlighted_area['node']));
//				print_r($nodes_highlighted_area);
foreach($nodes_highlighted_area as $highlighted_area_data) {
	?>
	<div>
		<div class="facts_box"><?php echo $highlighted_area_data->title; ?> <span><?php echo $highlighted_area_data->body['und'][0]['value']; ?></span> <?php echo $highlighted_area_data->field_region_text['und'][0]['value']; ?></div>
	</div>
	<?php
}
?>

		</div>
	</div>
</div>
<div class="pw_section space_no bg_orange pw_scrollload">
	<div class="pw_container">
		<?php
//		$node = node_load(8);
//
//		echo $node->body['und'][0][value];
		?>

		<div class="message_outer">
			<div class="message_right">
				<img src="http://aglfbapps.in/jaypee-hospital/sites/all/themes/zen/images/jaiprakash-gaur.png" class="chairman_img" alt="Shri Jaiprakash Gaur Ji">
			</div>
			<div class="message_left">
				<div class="message_box">
					<div class="message_text">We aim to promote healthcare to the common masses, <br>with the growing needs of society by providing quality and affordable healthcare with commitment.</div>
					<div class="message_from">
						<img src="http://aglfbapps.in/jaypee-hospital/sites/all/themes/zen/images/signature.png" alt="Shri Jaiprakash Gaur Ji">
						<strong>Shri Jaiprakash Gaur Ji</strong>
						Our Revered Founder Chairman
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="pw_section">
	<div class="pw_container pw_scrollload show_load">
		<ul class="main_tab">

			<li class="active"><a href="javascript:void(0);" cat="institutes">Institutes</a></li>
			<li><a href="javascript:void(0);" cat="departments">Departments</a></li>
			<li><a href=javascript:void(0);" cat="clinic">Specialized Clinic</a></li>


		</ul>

		<div class="main_tab_data space_bot">
			<div class="main_data_inner">
				<!--<div class="tab_slider owl-carousel">-->
				<div class="tab_links" id="institute">
					<?php
					$InstMenuTree = menu_tree_all_data('menu-institute');
					$options = array('absolute' => TRUE);

					if (count($InstMenuTree)) {
						$InsMenu='';
						$insM = 1;
						foreach ($InstMenuTree as $linkInst) {
							if($insM==1){$active = 'active'; }else{ $active=''; }
							if ($linkInst['link']['hidden'] == 0) {
								// Query all of the nids of a particular content type.
								$nidInst = db_select('node', 'n')
									->fields('n', array('nid'))
									->condition('type', 'institute', '=')
									->condition('title', $linkInst['link']['title'], '=')
									->execute()
									->fetchCol();

								// Get all of the article nodes.
								$nodeInst = node_load_multiple($nidInst);
//								print_r($nodesss);
								$url = url($linkInst['link']['link_path'], $options);
								foreach($nodeInst as $node_detail) {
									$InsMenu .= '<a href="javascript:void(0);" cat_id="' . $node_detail->nid . '" class="tab_item '.$active.'">' . $linkInst['link']['title'] . '</a>';
								}
								$insM++;
							}
						}
					}

					//print the menu
					print $InsMenu;
					?>
				</div>
				<div class="tab_links" id="department">
					<?php
					$DeptMenuTree = menu_tree_all_data('menu-department-menu');
					$options = array('absolute' => TRUE);

					if (count($DeptMenuTree)) {
						$DeptMenu='';
						$deptM = 1;
						foreach ($DeptMenuTree as $linkDept) {
							if($deptM==1){$active = 'active'; }else{ $active=''; }
							if ($linkDept['link']['hidden'] == 0) {
								// Query all of the nids of a particular content type.
								$nidDept = db_select('node', 'n')
									->fields('n', array('nid'))
									->condition('type', 'department', '=')
									->condition('title', $linkDept['link']['title'], '=')
									->execute()
									->fetchCol();

								// Get all of the article nodes.
								$nodeDept = node_load_multiple($nidDept);
//								print_r($nodesss);
								$url = url($linkDept['link']['link_path'], $options);
								foreach($nodeDept as $node_details) {
									$DeptMenu .= '<a href="javascript:void(0);" cat_id="' . $node_details->nid . '" class="tab_item '.$active.'">' . $linkDept['link']['title'] . '</a>';
								}
								$deptM++;
							}
						}
					}

					//print the menu
					print $DeptMenu;
					?>

				</div>
				<div class="tab_links" id="clinics">
					<?php
					$ClinicMenuTree = menu_tree_all_data('menu-specialised-clinics');
					$options = array('absolute' => TRUE);

					if (count($ClinicMenuTree)) {
						$DeptMenu='';
						$deptM = 1;
						foreach ($ClinicMenuTree as $linkDept) {
							if($deptM==1){$active = 'active'; }else{ $active=''; }
							if ($linkDept['link']['hidden'] == 0) {
								// Query all of the nids of a particular content type.
								$nidDept = db_select('node', 'n')
									->fields('n', array('nid'))
									->condition('type', 'specialized_clinic', '=')
									->condition('title', $linkDept['link']['title'], '=')
									->execute()
									->fetchCol();

								// Get all of the article nodes.
								$nodeDept = node_load_multiple($nidDept);
//								print_r($nodesss);
								$url = url($linkDept['link']['link_path'], $options);
								foreach($nodeDept as $node_details) {
									$DeptMenu .= '<a href="javascript:void(0);" cat_id="' . $node_details->nid . '" class="tab_item '.$active.'">' . $linkDept['link']['title'] . '</a>';
								}
								$deptM++;
							}
						}
					}
					//print the menu
					print $DeptMenu;
					?>

				</div>


					<?php if(isset($ClinicMenuTree)){ ?>
				<div class="tab_slider_data" id="clinic">

						<div class="pw_row">
							<div class="pw_grid md6">
								<div class="panel_inner space_right">
									<div class="heading medium"><?php
										$InsMenu='';
										$inst = 1;
										foreach ($ClinicMenuTree as $linkInst) {
										if ($linkInst['link']['hidden'] == 0) {
										// Query all of the nids of a particular content type.
										$nidInst = db_select('node', 'n')
											->fields('n', array('nid'))
											->condition('type', 'specialized_clinic', '=')
											->condition('title', $linkInst['link']['title'], '=')
											->execute()
											->fetchCol();

										// Get all of the article nodes.
										$nodeInst = node_load_multiple($nidInst);

										$url = url($linkInst['link']['link_path'], $options);
										foreach($nodeInst as $node_ins) {
										if($inst==2){ break; } echo $instnode_title = $node_ins->title;  ?></div>
									<p><?php if(!empty($node_ins->field_inst_short_description['und'])){ $instShortDes = $node_ins->field_inst_short_description['und'][0]['value']; }else{ $instShortDes=''; } echo $instShortDes; $inst++; ?>
									</p>
									<p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> <?php if(!empty($node_ins->field_inst_short_description['und'])){ $instOpHrs = $node_ins->field_operational_hours['und'][0]['value']; }else{ $instOpHrs=''; } echo $instOpHrs; ?></span> </p>
									<a href="<?php echo $domain_url.url('node/'. $node_ins->nid); ?>" class="pw_btn">Know More <i class="icon icon_arrow"></i></a>
									<?php	} } } ?>

								</div>
							</div>
							<div class="pw_grid md6">
								<p class="lg bold">Highlights of Specialized Clinic:</p>
								<div class="spacer"></div>
								<div class="pw_row">
									<?php
									//field_highlights_of_institute
									$short_desc='';
									$operational_hours='';
									$ica_img='';
									$ica_points='';
									$ics_inst_dept_data='';
									$ins_dept_field_data = '';
									$query_ica = new EntityFieldQuery();

									$result_ica = $query_ica->entityCondition('entity_type', 'node')
										->entityCondition('bundle', 'clinic_important_condition')
										->execute();

									$nodes_ica = node_load_multiple(array_keys($result_ica['node']));
									//				print_r($nodes_ica);
									if($nodes_ica) {
										foreach ($nodes_ica as $ica_data) {

											if ($ica_data->field_clinic_ica_logo['und'][0]['uri']) {
												$ica_img = str_replace('public://', '', $ica_data->field_clinic_ica_logo['und'][0]['uri']);
											} else {
												$ica_img = '';
											}
											$ics_inst_dept_data = $ica_data->field_clinic_associated['und'];
											if ($ica_img) {
												$imgPath = $realpath . $ica_img;
											} else {
												$imgPath = '';
											}

											$ica_points = $ica_data->body['und'][0]['value'];
//           print_r($ics_inst_dept_data);
											$ins_dept_field_data = '';
											foreach ($ics_inst_dept_data as $ica_id_data) {
												$term = taxonomy_term_load($ica_id_data['tid']);
												$ins_dept_field_data[] = $term->name;
											}
//echo "<pre>"; echo $instnode_title; print_r($ics_inst_dept_data);print_r($ica_data); print_r($ins_dept_field_data); echo "</pre>";
											if (in_array($instnode_title, $ins_dept_field_data)) {

												?>
												<div class="pw_grid ">
													<div class="panel_inner space_right">
														<img src="<?php echo $imgPath; ?>" alt="" class="panel_icon">

														<div
															class="title"><?php echo $ica_data->field_main_clinic_title["und"][0]["value"]; ?></div>
														<ul class="shiftRight">
															<?php echo $ica_points; ?>
														</ul>
													</div>
												</div>
												<?php

											}
										}
									}
									?>

								</div>
							</div>
						</div>

				</div>
					<?php } ?>
				<?php if(isset($InstMenuTree)){ ?>
				<div class="tab_slider_data" id="inst">

	<div class="pw_row">
		<div class="pw_grid md6">
			<div class="panel_inner space_right">
				<div class="heading medium"><?php
					$InsMenu='';
					$inst = 1;
					foreach ($InstMenuTree as $linkInst) {
						if ($linkInst['link']['hidden'] == 0) {
							// Query all of the nids of a particular content type.
							$nidInst = db_select('node', 'n')
								->fields('n', array('nid'))
								->condition('type', 'institute', '=')
								->condition('title', $linkInst['link']['title'], '=')
								->execute()
								->fetchCol();

							// Get all of the article nodes.
							$nodeInst = node_load_multiple($nidInst);

							$url = url($linkInst['link']['link_path'], $options);
					if($nodeInst){
							foreach($nodeInst as $node_ins) {
							if($inst==2){ break; } echo $instnode_title = $node_ins->title;  ?></div>
				<p><?php echo $node_ins->field_inst_short_description['und'][0]['value']; $inst++; ?>
				</p>
								<p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> <?php echo $node_ins->field_operational_hours["und"][0]["value"]; ?></span> </p>
				<a href="<?php echo $domain_url.url('node/'. $node_ins->nid); ?>" class="pw_btn">Know More <i class="icon icon_arrow"></i></a>
				<?php	} } } } ?>

			</div>
		</div>
		<div class="pw_grid md6">
			<p class="lg bold">Highlights of Institute:</p>
			<div class="spacer"></div>
			<div class="pw_row">
				<?php
	$short_desc='';
	$operational_hours='';
	$ica_img='';
	$ica_points='';
	$ics_inst_dept_data='';
	$ins_dept_field_data = '';
	$query_ica = new EntityFieldQuery();



//			$short_desc = $node->field_inst_short_description["und"][0]["value"];
//			$operational_hours = $node->field_operational_hours["und"][0]["value"];
			$result_ica = $query_ica->entityCondition('entity_type', 'node')
				->entityCondition('bundle', 'important_condition_attended')
				->execute();

		$nodes_ica = node_load_multiple(array_keys($result_ica['node']));
//				print_r($nodes_ica);
if($nodes_ica) {
	foreach ($nodes_ica as $ica_data) {
		if($ica_data->field_ica_logo['und'][0]['uri']) {
			$ica_img = $realpath.str_replace('public://', '', $ica_data->field_ica_logo['und'][0]['uri']);
		}else{
			$ica_img='';
		}
		if($ica_data->field_institute_associated['und']) {
			$ics_inst_dept_data = $ica_data->field_institute_associated['und'];
		}else{
			$ics_inst_dept_data='';
		}


		$ica_points = $ica_data->body['und'][0]['value'];
//           print_r($ics_inst_dept_data);
		$ins_dept_field_data = '';
		foreach ($ics_inst_dept_data as $ica_id_data) {
			$term = taxonomy_term_load($ica_id_data['tid']);
			$ins_dept_field_data[] = $term->name;
		}
//echo "<pre>"; echo $instnode_title; print_r($ics_inst_dept_data);print_r($ica_data); print_r($ins_dept_field_data); echo "</pre>";
		if (in_array($instnode_title, $ins_dept_field_data)) {

			?>
			<div class="pw_grid">
				<div class="panel_inner space_right">
					<img src="<?php echo $ica_img; ?>" alt="" class="panel_icon">

					<div class="title"><?php if($ica_data->field_main_inst_title["und"][0]["value"]){ echo $ica_data->field_main_inst_title["und"][0]["value"]; }else{ } ?></div>
					<ul class="shiftRight">
						<?php echo $ica_points; ?>
					</ul>
				</div>
			</div>
			<?php

		}
	}
}
				?>

			</div>
		</div>
	</div>

				</div>
				<?php } ?>
				<?php if(isset($DeptMenuTree)){ ?>
					<div class="tab_slider_data" id="dept">

						<div class="pw_row">
							<div class="pw_grid md6">
								<div class="panel_inner space_right">
									<div class="heading medium"><?php
										$DeptMenu='';
										$dept = 1;
										foreach ($DeptMenuTree as $linkDept) {

											if ($linkDept['link']['hidden'] == 0) {
												// Query all of the nids of a particular content type.
												$nidDept = db_select('node', 'n')
													->fields('n', array('nid'))
													->condition('type', 'department', '=')
													->condition('title', $linkDept['link']['title'], '=')
													->execute()
													->fetchCol();

												// Get all of the article nodes.
												$nodeDept = node_load_multiple($nidDept);
//								print_r($nodesss);
												$url = url($linkDept['link']['link_path'], $options);
												foreach($nodeDept as $node_dept) {
													$DeptMenu .= '<a href="javascript:void(0);" cat_id="' . $node_details->nid . '" class="tab_item '.$active.'">' . $linkDept['link']['title'] . '</a>';
												if($dept==2){ break; } echo $deptnode_title = $node_dept->title;  ?></div>
									<p><?php echo $node_dept->field_dept_short_description['und'][0]['value']; $dept++; ?>
									</p>
									<p class="lg bold space_top space_bot">Operational Hours:<span class="text_orange"> <?php echo $node_dept->field_dept_operational_hours["und"][0]["value"]; ?></span> </p>
									<?php	} } } ?>
									<a href="<?php echo $domain_url.url('node/'. $node_ins->nid); ?>" class="pw_btn">Know More <i class="icon icon_arrow"></i></a>
								</div>
							</div>
							<div class="pw_grid md6">
								<p class="lg bold">Highlights of Department:</p>
								<div class="spacer"></div>
								<div class="pw_row">
									<?php
									$short_desc='';
									$operational_hours='';
									$ica_img='';
									$ica_points='';
									$ics_inst_dept_data='';
									$ins_dept_field_data = '';
									$query_ica_dept = new EntityFieldQuery();

									$short_desc = $node->field_dept_short_description["und"][0]["value"];
									$operational_hours = $node->field_dept_operational_hours["und"][0]["value"];
									$result_dep = $query_ica_dept->entityCondition('entity_type', 'node')
										->entityCondition('bundle', 'department_important_condition')
										->execute();
									$nodes_ica = node_load_multiple(array_keys($result_dep['node']));
									//echo "<pre>"; print_r($nodes_ica); echo "</pre>";

									foreach($nodes_ica as $ica_data) {

										$ica_img = str_replace('public://','',$ica_data->field_ica_dept_logo['und'][0]['uri']);
										$ics_inst_dept_data = $ica_data->field_department_associated['und'];


										$ica_points = $ica_data->body['und'][0]['value'];

										$ins_dept_field_data = '';
										foreach($ics_inst_dept_data as $ica_id_data){
											$term = taxonomy_term_load($ica_id_data['tid']);

											$ins_dept_field_data[] =$term->name;;
										}

										if(in_array($deptnode_title,$ins_dept_field_data)){
?>
											<div class="pw_grid">
                <div class="panel_inner space_right">
                    <img src="<?php echo $realpath.$ica_img; ?>" alt="" class="panel_icon">
                    <div class="title"><?php echo $ica_data->field_main_dept_title["und"][0]["value"]; ?></div>
                    <ul class="shiftRight">
                        <?php echo $ica_points; ?>
                    </ul>
                </div>
            </div>
												<?php
										}
									}
									?>
								</div>
							</div>
						</div>

					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>
<div class="pw_section bg_lightgrey">
	<div class="pw_container text_center">
		<div class="heading text_orange"><a href="<?php echo $base_url; ?>/packages">Preventive Health Packages</a></div>
		<p class="lg light">Simple to understand and less time consuming preventive health check-ups are very useful in early detection of all types of illnesses and risk factors.</p>
		<div class="pw_scrollload show_load">
			<div class="package_slider owl-carousel">
				<?php
				$query = new EntityFieldQuery();
				$result = $query->entityCondition('entity_type', 'node')
					->entityCondition('bundle', 'health_packages')
					->execute();
				$nodes = node_load_multiple(array_keys($result['node']));
				//print_r($nodes);
				foreach($nodes as $package_data){
				$pack_img =str_replace('public://','',$package_data->field_package_image['und'][0]['uri']);
				?>
					<a href="<?php echo $domain_url.url('node/'. $package_data->nid); ?>" target="_blank" class="box_items">
						<div class="box_img" style="background-image:url(<?php echo $realpath.$pack_img; ?>)"><img src="<?php print $theme_path;  ?>/images/img.png" alt="Package"></div>
						<div class="box_title"><?php echo $package_data->title; ?></div>
					</a>
				<?php }
				?>

			</div>
		</div>
	</div>
</div>
<div class="pw_section">
	<div class="pw_container">
		<div class="pw_row">
			<div class="pw_grid md8">
				<ul class="tab_nav">
					<li class="active"><a href="#news">News</a></li>
					<li><a href="#events">Events</a></li>
				</ul>
				<div class="tab_data active" id="news">
					<ul class="media_list">
					<?php
					$query = new EntityFieldQuery();
					$result_news = $query->entityCondition('entity_type', 'node')
						->entityCondition('bundle', 'news')
						->propertyOrderBy('nid', 'DESC')
						->execute();
					$nodes_news = node_load_multiple(array_keys($result_news['node']));
					//				print_r($nodes_news);

					$i=1;
					foreach($nodes_news as $news_data) {
						$news_img = str_replace('public://','',$news_data->field_news_image['und'][0]['uri']);
						if($i<5){ ?>
							<li>
								<a href="<?php echo $domain_url.url('node/'. $news_data->nid); ?>" class="media_inner">
									<?php if($i==1){ ?>
										<div class="media_img"><img src="<?php echo $realpath.$news_img; ?>" alt="Media"></div>
									<?php } ?>
									<div class="date"><?php echo $news_data->field_news_date['und'][0]['value']; ?></div>
									<div class="media_title"><?php echo $news_data->title; ?></div>
								</a>
							</li>
						<?php } $i++;
					}
					?>
					</ul>
					<div class="space_top">
						<a href="<?php echo $base_url; ?>/about-us/news" class="pw_btn">Read All <i class="icon icon_arrow"></i></a>
					</div>
				</div>
				<div class="tab_data" id="events">
					<ul class="media_list">
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
							?>

							<li>
								<a href="<?php echo $domain_url.url('node/'. $event_data->nid); ?>" class="media_inner">
									<?php if($j==1){ ?>
										<div class="media_img"><img src="<?php echo $realpath.$event_img; ?>" alt="Media"></div>
									<?php } ?>
									<div class="date"><?php echo $event_data->field_event_date['und'][0]['value']; ?></div>
									<div class="media_title"><?php echo $event_data->title; ?></div>
								</a>
							</li>
							<?php $j++;
						}
						?>

					</ul>
					<div class="space_top">
					<a href="<?php echo $base_url; ?>/about-us/events" class="pw_btn">Read All <i class="icon icon_arrow"></i></a>
					</div>
				</div>
			</div>
			<div class="pw_grid md4">
				<div class="magazine_panel">
<!--					<div class="heading2 text_orange">Health Smart Magazine <i class="icon icon_arrow"></i></div>-->
					<div class="magazine_box">
						<div class="magzine_owl owl-carousel">
							<div class="item">
								<div class="heading2 text_orange"><a target="_blank" href="<?php echo $base_url; ?>/about-us/health-smart-reviews">Health Smart Magazine</a></div>
								<a href="<?php echo $base_url.'/assets/pdf/HealthSmart.pdf'; ?>" target="_blank"><img src="<?php print path_to_theme();  ?>/images/magazine.jpg" alt="Jaypee Health Smart"></a>
							</div>
							<div class="item">
								<div class="heading2 text_orange"><a target="_blank" href="<?php echo $base_url; ?>/about-us/med-review">Med Review</a></div>
								<a href="<?php echo $base_url.'/assets/pdf/MedReview.pdf'; ?>" target="_blank"><img src="<?php print path_to_theme();  ?>/images/med-review.png" alt="Jaypee MED Review"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="pw_section bg_blue">
	<div class="pw_container text_center">
		<div class="heading text_white light">Latest Posts</div>
		<div class="posts_panel">
			<ul class="posts_type">
				<!--            	<li><a href="#">All</a></li>-->
				<li><a target="_blank" href="https://www.facebook.com/noidajaypeehospital"><i class="icon icon_facebook"></i></a></li>
				<li><a target="_blank" href="https://twitter.com/jaypee_hospital"><i class="icon icon_twitter"></i></a></li>
				<!--                <li><a href="#"><i class="icon icon_linkedin"></i></a></li>-->
				<li><a target="_blank" href="https://www.youtube.com/user/jaypeehospital/feed"><i class="icon icon_youtube"></i></a></li>
			</ul>
			<div class="clearfix"></div>
			<ul class="post_list post_list_new">
				<li><div class="post_inner" >
						<div class="fb-page" data-href="https://www.facebook.com/noidajaypeehospital/?ref=br_rs" data-tabs="timeline" data-width="" data-height="360" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/noidajaypeehospital/?ref=br_rs" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/noidajaypeehospital/?ref=br_rs">Facebook</a></blockquote></div>
					</div></li>
				<!--                <li><div class="post_inner">-->
				<!--                        <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>-->
				<!--                        <script type="IN/CompanyInsider" data-id="2650375"></script>-->
				<!--                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="300" data-height="360" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>-->
				<!--                </div></li>-->
				<li><div class="post_inner">
						<a class="twitter-timeline" height="360" href="https://twitter.com/jaypee_hospital?ref_src=twsrc%5Etfw">Tweets by jaypee_hospital</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div></li>
				<li><div class="post_inner">
						<?php
						$channel_id = 'UCsv_9UUFOL8IqOOuKhE4XWg'; // put the channel id here
						//using curl
						$url = 'https://www.youtube.com/feeds/videos.xml?channel_id='.$channel_id.'&orderby=published';
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
						//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
						$response  = curl_exec($ch);
						curl_close($ch);

						$response=simplexml_load_string($response);
						$json = json_encode($response);
						$youtube= json_decode($json, true);
						//    echo "<pre>";
						//print_r($youtube);
						$count = 0;
						if(isset($youtube['entry']['0']) && $youtube['entry']['0']!=array())
						{
							foreach ($youtube['entry'] as $k => $v) {
								$yt_vids[$count]['id'] = str_replace('https://www.youtube.com/watch?v=', '', $v['link']['@attributes']['href']);
								$yt_vids[$count]['title'] = $v['title'];
								$yt_vids[$count]['published'] = $v['published'];
								$yt_vids[$count]['href'] = $v['link']['@attributes']['href'];
								$count++;
							}
						}
						else
						{
							$yt_vids[$count]['id']=str_replace('https://www.youtube.com/watch?v=', '', $youtube['entry']['link']['@attributes']['href']);
							$yt_vids[$count]['title']=$youtube['title'];
							$yt_vids[$count]['published']=$youtube['published'];
							$yt_vids[$count]['href']=$youtube['entry']['link']['@attributes']['href'];
						}

						$oo=1;

						foreach($yt_vids as $videoss){
							if($oo==1) {
								//echo '<p><iframe width="400" height="360" src="http://www.youtube.com/embed/' . $videoss['id'] . '" frameborder="0" allowfullscreen></iframe></p>';
								echo '<p><iframe width="400" height="360" src="https://www.youtube.com/embed/hJLfCHWRetc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>';
							}
							$oo++;
						}
						?>
					</div></li>


			</ul>
			<div class="social_feeds_box">


			</div>
		</div>
	</div>
</div>
<?php require_once('footer.inc'); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
