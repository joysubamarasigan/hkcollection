<!-- =========================
 SECTION: SERVICES
============================== -->
<?php
	global $wp_customize;
	$azera_shop_our_services_title = get_theme_mod('azera_shop_our_services_title',esc_html__('Our Services','azera-shop'));
	$azera_shop_our_services_subtitle = get_theme_mod('azera_shop_our_services_subtitle',esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','azera-shop'));
	$azera_shop_services = get_theme_mod('azera_shop_services_content',
		json_encode(
			array(
					array('choice'=>'azera_shop_icon','icon_value' => 'icon-basic-webpage-multiple','title' => esc_html__('Lorem Ipsum','azera-shop'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','azera-shop')),
					array('choice'=>'azera_shop_icon','icon_value' => 'icon-ecommerce-graph3','title' => esc_html__('Lorem Ipsum','azera-shop'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','azera-shop')),
					array('choice'=>'azera_shop_icon','icon_value' => 'icon-basic-geolocalize-05','title' => esc_html__('Lorem Ipsum','azera-shop'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','azera-shop'))
			)
		)
	);

	if(!empty($azera_shop_our_services_title) || !empty($azera_shop_our_services_subtitle) || !azera_shop_general_repeater_is_empty($azera_shop_services)){
?>
		<section class="services" id="services" role="region" aria-label="<?php esc_html_e('Services','azera-shop') ?>">
			<div class="section-overlay-layer">
				<div class="container">

					<!-- SECTION HEADER -->
					<div class="section-header">
						<?php
							if( !empty($azera_shop_our_services_title) ){
								echo '<h2 class="dark-text">'.esc_attr($azera_shop_our_services_title).'</h2><div class="colored-line"></div>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<h2 class="dark-text azera_shop_only_customizer"></h2><div class="colored-line azera_shop_only_customizer"></div>';
							}
						?>

						<?php
							if( !empty($azera_shop_our_services_subtitle) ){
								echo '<div class="sub-heading">'.esc_attr($azera_shop_our_services_subtitle).'</div>';
							} elseif ( isset( $wp_customize )   ) {
								echo '<div class="sub-heading azera_shop_only_customizer"></div>';
							}
						?>
					</div>


					<?php
						if( !empty($azera_shop_services) ){
							$azera_shop_services_decoded = json_decode($azera_shop_services);
							echo '<div id="our_services_wrap" class="services-wrap">';
								foreach($azera_shop_services_decoded as $azera_shop_service_box){
									if( (!empty($azera_shop_service_box->icon_value) && $azera_shop_service_box->icon_value!='No Icon' && $azera_shop_service_box->choice == 'azera_shop_icon')  || (!empty($azera_shop_service_box->image_url)  && $azera_shop_service_box->choice == 'azera_shop_image') || !empty($azera_shop_service_box->title) || !empty($azera_shop_service_box->text) ){
										echo '<div class="service-box"><div class="single-service border-bottom-hover">';
											if( !empty($azera_shop_service_box->choice) && $azera_shop_service_box->choice !== 'azera_shop_none'  ){
												if ( $azera_shop_service_box->choice == 'azera_shop_icon' ){
													if( !empty($azera_shop_service_box->icon_value) ) {
														if( !empty($azera_shop_service_box->link) ){
															
															if (function_exists ( 'icl_t' ) && !empty($azera_shop_service_box->id)){
																
																$azera_shop_link_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_link',$azera_shop_service_box->link);
																
																echo '<div class="service-icon colored-text"><a href="'.esc_url($azera_shop_link_services).'"><span class="'.esc_attr($azera_shop_service_box->icon_value).'"></span></a></div>';
															} else {
															
																echo '<div class="service-icon colored-text"><a href="'.esc_url($azera_shop_service_box->link).'"><span class="'.esc_attr($azera_shop_service_box->icon_value).'"></span></a></div>';
															}

														} else {
															echo '<div class="service-icon colored-text"><span class="'.esc_attr($azera_shop_service_box->icon_value).'"></span></div>';
														}
													}
												}
												if( $azera_shop_service_box->choice == 'azera_shop_image' ){
													if( !empty($azera_shop_service_box->image_url)){
														if( !empty($azera_shop_service_box->link) ){
															if(!empty($azera_shop_service_box->title)){
																
																if (function_exists ( 'icl_t' ) && !empty($azera_shop_service_box->id)){
																
																	$azera_shop_title_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_title',$azera_shop_service_box->title);
																	$azera_shop_link_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_link',$azera_shop_service_box->link);
														
																	echo '<a href="'.esc_url($azera_shop_link_services).'"><img src="'.esc_url($azera_shop_service_box->image_url).'" alt="'.$azera_shop_title_services.'"/></a>';
																	
																} else {
																	
																	echo '<a href="'.esc_url($azera_shop_service_box->link).'"><img src="'.esc_url($azera_shop_service_box->image_url).'" alt="'.$azera_shop_service_box->title.'"/></a>';
																}	
																
																
															} else {
																
																if (function_exists ( 'icl_t' ) && !empty($azera_shop_service_box->id)){
																	
																	$azera_shop_link_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_link',$azera_shop_service_box->link);
																	
																	echo '<a href="'.esc_url($azera_shop_link_services).'"><img src="'.esc_url($azera_shop_service_box->image_url).'" alt="'.esc_html__('Featured Image','azera-shop').'"/></a>';
																	
																} else {
																	
																	echo '<a href="'.esc_url($azera_shop_service_box->link).'"><img src="'.esc_url($azera_shop_service_box->image_url).'" alt="'.esc_html__('Featured Image','azera-shop').'"/></a>';
																}
																
															}
														} else {
															if(!empty($azera_shop_service_box->title)){
																echo '<img src="'.esc_url($azera_shop_service_box->image_url).'" alt="'.$azera_shop_service_box->title.'"/>';
															} else {
																echo '<img src="'.esc_url($azera_shop_service_box->image_url).'" alt="'.esc_html__('Featured Image','azera-shop').'"/>';
															}
														}
													}
												}
											}
											if(!empty($azera_shop_service_box->title)){
												if( !empty($azera_shop_service_box->link) ){
													if (function_exists ( 'icl_t' ) && !empty($azera_shop_service_box->id)){
														$azera_shop_title_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_title',$azera_shop_service_box->title);
														$azera_shop_link_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_link',$azera_shop_service_box->link);
														echo '<h3 class="colored-text"><a href="'.esc_url($azera_shop_link_services).'">'.esc_attr($azera_shop_title_services).'</a></h3>';
													} else {
														echo '<h3 class="colored-text"><a href="'.esc_url($azera_shop_service_box->link).'">'.esc_attr($azera_shop_service_box->title).'</a></h3>';
													}
												} else {
													if (function_exists ( 'icl_t' ) && !empty($azera_shop_service_box->id)){
														$azera_shop_title_services = icl_t('Featured Area',$azera_shop_service_box->id.'_services_title',$azera_shop_service_box->title);
														echo '<h3 class="colored-text">'.esc_attr($azera_shop_title_services).'</h3>';
													} else {
														echo '<h3 class="colored-text">'.esc_attr($azera_shop_service_box->title).'</h3>';
													}
												}
											}
											if(!empty($azera_shop_service_box->text)){
												if (function_exists ( 'icl_t' ) && !empty($azera_shop_service_box->id)){
													echo '<p>'.icl_t('Featured Area',$azera_shop_service_box->id.'_services_text',html_entity_decode($azera_shop_service_box->text)).'</p>';
												} else {
													echo '<p>'.html_entity_decode($azera_shop_service_box->text).'</p>';
												}
											}
										echo '</div></div>';
									}
								}
							echo '</div>';
						}
					?>
				</div>	
			</div>
		</section>
<?php
	} else {
		if( isset( $wp_customize ) ) {
?>
			<section class="services azera_shop_only_customizer" id="services" role="region" aria-label="<?php esc_html_e('Services','azera-shop') ?>">
				<div class="section-overlay-layer">
					<div class="container">
						<div class="section-header">
							<h2 class="dark-text azera_shop_only_customizer"></h2><div class="colored-line azera_shop_only_customizer"></div>
							<div class="sub-heading azera_shop_only_customizer"></div>
						</div>
					</div>
				</div>
			</section>
<?php
		}
	}
?>