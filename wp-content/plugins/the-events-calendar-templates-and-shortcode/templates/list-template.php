<?php
$ev_time=$this->ect_tribe_event_time($event_id,false);
$list_style=$style;
if($template=="modern-list") {
	$list_style='style-2';
}
else if($template=="classic-list") {
	$list_style='style-3';
}
$ev_post_img='';
$size='medium';
$ev_post_img=ect_pro_get_event_image($event_id,$size='large');
$ect_cate = ect_display_category($event_id);
/*** Default List Style 3 */
if(($style=="style-3" && $template=="default") || $template=="classic-list") {
	$events_html.='
	<div id="event-'.$event_id.'" '.$cat_colors_attr.' class="ect-list-post '.$list_style.' '.$event_type.'" itemscope itemtype="http://schema.org/Event">
		<meta itemprop="name" content="'.get_the_title($event_id).'">
		<meta itemprop="image" content="'.$ev_post_img.'">
		
		<div class="ect-clslist-event-date ect-list-date">
			'.$event_schedule;
			if($socialshare=="yes"){
				$events_html.=ect_pro_share_button($event_id);
			}
		$events_html.='</div>';  
	
		$events_html.='<div class="ect-clslist-event-info"> 
			<div class="ect-clslist-inner-container">';
				if(!empty($ect_cate)){
					$events_html.= '<div class="ect-event-category ect-list-category">';
					$events_html.= $ect_cate;
					$events_html.= '</div>';
				}
				$events_html.='
				<h2 class="ect-list-title">'.$event_title.'</h2>
				<div class="ect-clslist-time">
					<span class="ect-icon"><i class="ect-icon-clock"></i></span>
					<span class="cls-list-time">'.$ev_time.'</span>
				</div>';
				
				if (tribe_has_venue($event_id)) {
					$events_html.=$venue_details_html;
				}
				else{
					$events_html.='';
				}
		 
			$events_html.='</div>
				<div class="ect-list-cost">'.$ev_cost.'</div>
		</div><div class="ect-clslist-event-details">
			<a href="'.esc_url( tribe_get_event_link($event_id)).'" class="tribe-events-read-more" rel="bookmark" '.$cat_bg_styles.'>'.esc_html__( 'Find out more', 'the-events-calendar' ).'<i class="ect-icon-right-double"></i></a>
		</div>
	</div>';
}


/*** Default List Style 2 */
else if (($style=="style-2" && $template=="default") || $template=="modern-list") {
	$bg_styles="background-image:url('$ev_post_img');background-size:cover;background-position:bottom center;";
	$events_html.='
	<div id="event-'.$event_id.'" '.$cat_colors_attr.' class="ect-list-post '.$list_style.' '.$event_type.'" itemscope itemtype="http://schema.org/Event">
		<meta itemprop="name" content="'.get_the_title($event_id).'">
		<meta itemprop="image" content="'.$ev_post_img.'">
		
		<div class="ect-list-post-left ">
			<div class="ect-list-img" style="'.$bg_styles.'"></div>';
			if($socialshare=="yes"){
				$events_html.=ect_pro_share_button($event_id);
			}
		$events_html.='</div><!-- left-post close -->
		
		<div class="ect-list-post-right">
			<div class="ect-list-post-right-table">
				<div class="ect-list-description">';
					if(!empty($ect_cate)){
						$events_html.= '<div class="ect-event-category ect-list-category">';
						$events_html.= $ect_cate;
						$events_html.= '</div>';
					}
					$events_html.='<h2 class="ect-list-title">'.$event_title.'</h2>';
					
					if (tribe_has_venue($event_id)) {
					$events_html.=$venue_details_html;
					}
					else{
					$events_html.='';
					}

					$events_html.='<div class="ect-list-cost">'.$ev_cost.'</div>';
					$events_html.=$event_content;
					
				$events_html.='</div>
				<div class="modern-list-right-side" '.$cat_bg_styles.'>
					<div class="ect-list-date">'.$event_schedule.'</div>
				</div>
			</div>
		</div><!-- right-wrapper close -->
	</div><!-- event-loop-end -->';
}


/*** Default List Style 1 */
else{
	$bg_styles="background-image:url('$ev_post_img');background-size:cover;";
	$events_html.='
	<div id="event-'. $event_id .'" '.$cat_colors_attr.' class="ect-list-post style-1 '.$event_type.'" itemscope itemtype="http://schema.org/Event">
		<meta itemprop="name" content="'.get_the_title($event_id).'">
		<meta itemprop="image" content="'.$ev_post_img.'">
		
		<div class="ect-list-post-left ">
			<div class="ect-list-img" style="'.$bg_styles.'">
				<a href="'.esc_url( tribe_get_event_link($event_id)).'" alt="'.get_the_title($event_id).'" rel="bookmark">
					<div class="ect-list-date">'.$event_schedule.'</div>
				</a>
			</div>';
			if($socialshare=="yes"){
				$events_html.=ect_pro_share_button($event_id);
			}
		$events_html.='</div><!-- left-post close -->
		
		<div class="ect-list-post-right">
			<div class="ect-list-post-right-table">';	
				if (tribe_has_venue($event_id)) {
				$events_html.='<div class="ect-list-description">';
				}else{
				$events_html.='<div class="ect-list-description" style="width:100%;">';
				}
					$events_html.='<h2 class="ect-list-title">'.$event_title.'</h2>';

					if(!empty($ect_cate)){
						$events_html.= '<div class="ect-event-category ect-list-category">';
						$events_html.= $ect_cate;
						$events_html.= '</div>';
					}
					
					$events_html.=$event_content;
					$events_html.='<div class="ect-list-cost">'.$ev_cost.'</div>';

				$events_html.= '</div>';
				
				if (tribe_has_venue($event_id)) {				
					$events_html.=$venue_details_html;
				}else{
					$events_html.='';
				}
			
			$events_html.='</div>
		</div><!-- right-wrapper close -->
	</div><!-- event-loop-end -->';
}