<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'このページヘアクセスする権限がありません！　　　You do not have sufficient permissions to access this page!' );
}



$postarr = get_post_custom($id);
// front page animation
$rin_anim  		=   (isset($postarr['rin_anim'][0]) && $postarr['rin_anim'][0] != 0 )? 
					'data-rin-anim-data="' . $animarr[$postarr['rin_anim'][0]] . '"' : '';	
$rin_animclass  =   ($rin_anim != '' )? ' animated ' : '';




// get the details of the upcomming show
$ap 			= ringoxcal_upcomming_arr(1);
$timervalue 	= $ap[0]['date'] - (get_option('gmt_offset') * 3600);


$bgcol 		= ($postarr['rin_bgcolor'][0] != '')?  $postarr['rin_bgcolor'][0] :  '#292C2F';
$txtcol 	= ($postarr['rin_textcolor'][0] != '')?  $postarr['rin_textcolor'][0] :  '#fff';



// if there's an upcomming event, process the event
if ($ap && !empty($ap)){

// Get the content for the upcomming show
$title 			= get_the_title( $ap[0]['id']);
$title 			= ($title != '') ?  '<h3 class="rin_hp_header" style="color: ' . $txtcol . ';">' . stripslashes(html_entity_decode($title)) . '</h3>'  :  '';
$desc 			= '<p  class="rin_hp_body rin_introdate" style="color: ' . $txtcol . ';">' .  date_i18n( get_option('date_format') , $ap[0]['date'], false )  . ' ' .  date_i18n( get_option('time_format') , $ap[0]['date'], false )  . '</p>';
$adesc 			= (get_post_meta( $ap[0]['id'], 'rin_introdesc', true ) != '')?  '<p  class="rin_cdt_desc" style="color: ' . $txtcol . ';">' . get_post_meta( $ap[0]['id'], 'rin_introdesc', true ) . '</p>'  : '';
$page_content 	=  $title . $desc;

// check for an alternative link

$link_label = ($postarr['rin_laylabel'][0] != '')?  stripslashes(html_entity_decode($postarr['rin_laylabel'][0])) :  __('Read more','ringo');
$link_src   = ($postarr['rin_laylink'][0] != '')?  stripslashes(html_entity_decode($postarr['rin_laylink'][0])) :  get_permalink( $ap[0]['id'] );;





?>


<!-- render the section and the background -->
<section class="rin_frontpage_cdt rin_frontpage_layout <?php echo $classname; ?>" style="background: <?php echo $bgcol; ?>;" >


	<div class="rin_cdt_block">


		<div class="row" style="padding-top: 80px; padding-bottom: 80px;position: relative; z-index: 5;">


			
			<div class="large-6 columns">


				<!-- page content and description -->
				<?php echo $page_content; ?>
				<?php echo $adesc; ?>

			</div>

			<div class="large-6 columns">

				<!-- start the countdown timer-->
				<ul data-rin-countdownvalue="<?php echo $timervalue; ?>" class="rin_timervalue">
			
					<!-- section for the days -->
					<li class="rin_timerday <?php echo $rin_animclass; ?>"  <?php echo $rin_anim; ?> data-rin-anim-delay="100">
						<span class="dayname" style="color: <?php echo  $txtcol;?>;"><?php _e('Days','ringo'); ?></span>
						<span class="daynumber dsec" style="color: <?php echo  $txtcol;?>;"></span>
					</li>

			
					<!-- section for the hours -->
					<li class="rin_timerday <?php echo $rin_animclass; ?>"  <?php echo $rin_anim; ?> data-rin-anim-delay="200">
						<span class="dayname" style="color: <?php echo  $txtcol;?>;"><?php _e('Hours','ringo'); ?></span>
						<span class="hournumber dsec" style="color: <?php echo  $txtcol;?>;"></span>
					</li>

			
					<!-- section for the minutes -->
					<li class="rin_timerday <?php echo $rin_animclass; ?>"  <?php echo $rin_anim; ?> data-rin-anim-delay="300">
						<span class="dayname" style="color: <?php echo  $txtcol;?>;"><?php _e('Minutes','ringo'); ?></span>
						<span class="minutenumber dsec" style="color: <?php echo  $txtcol;?>;"></span>
					</li>


					<!-- section for the seconds  -->			
					<li class="rin_timerday rin_timerlinenone <?php echo $rin_animclass; ?>"  <?php echo $rin_anim; ?> data-rin-anim-delay="400">
						<span class="dayname" style="color: <?php echo  $txtcol;?>;"><?php _e('Seconds','ringo'); ?></span>
						<span class="secondnumber dsec" style="color: <?php echo  $txtcol;?>;"></span>
					</li>


				</ul>


				<!-- view the calendar link -->
				<p class="rin_cdtlink">
					<a href="<?php echo $link_src; ?>" class="rin_cust_bg rin_hp_body"><?php echo $link_label; ?></a>
				</p>

			</div>
		</div>
	</div>
</section>




<?php } ?>














