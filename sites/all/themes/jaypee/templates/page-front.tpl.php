<?php  
error_reporting(E_ALL); ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
<?php drupal_add_js(path_to_theme().'/js/mikasa.js'); ?>
<?php global $base_url;?>	
<div id="top_navigtion">
       	<div class="white_bg"></div>
                <?php if ($logo): ?>
                  <div id="logo_sec">
                    <a href="<?php print $front_page; ?>" ><h1><img src="http://mikasafloors.com/dev/sites/default/files/mikasa_logo_small2.png" alt="Mikasa Engineered Wood Floors" style="margin-top:-100px" /></h1></a>
                  </div>

            <div id="top_nav_button_sec">
                <div id="side_menu_controler">
                	<ul>
                    	<li></li>
                        <li class="middle_li"></li>
                        <li></li>
                    </ul>
                </div>
            </div>
             <?php endif; ?>
                 <?php if ($page['header_login_details']):
						print render($page['header_login_details']); 
                 endif; ?>
        </div>
        
        
        <div id="sideMenu">
         	<?php if ($page['homepage_sideblock_one']): ?>
			<div id="side_bar_navigation">
            		   <div class="scroll-pane">
            				<?php print render($page['homepage_sideblock_one']); ?>
               				 </div>
                
                <?php if ($page['social_media']):
				print render($page['social_media']); 
                 endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($page['homepage_sideblock_two']): ?>
            <div id="side_bar_lower_nav">
            <?php print render($page['homepage_sideblock_two']); ?>
    
            </div>
            <?php endif; ?>
		</div>
        
          <?php if ($messages): ?>
            <div id="messages"><div class="section clearfix">
              <?php print $messages; ?>
            </div></div> <!-- /.section, /#messages -->
          <?php endif; ?>
        
        <?php  print render($page['content']); ?>
        
    <!-- Pupop on 15Sept2015 -->
 
<style>
#mask { position: absolute; left: 0; top: 0; z-index: 9000; background-color: #000; opacity:0.5 !important; display: none; }
#boxes .window { position: absolute; left: 0; top: 0; width: 666px; display: none; z-index: 9999; padding: 20px; border-radius: 15px; text-align: center; }
#boxes .window > img{width:100%;}
#boxes .close{opacity:1;}
#boxes #dialog {width: 666px; height: auto; padding: 10px; background-color: #ffffff;}
a.close{width:36px; height:34px; position:absolute; top:-18px; right:-10px;}



/* Added on 6 Nov 2015 */

#dialog a > img {
	width:100% !important;
	height:auto !important;
}

@media (min-width:768px){

	#boxes #dialog{
		left:50% !important;
		margin-left:-333px;
		top:10% !important;
	}

}

@media screen and (max-width: 767px) {
	#boxes .window, #boxes #dialog {width: 80%; padding:5px; box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box;}
	#boxes #dialog{ margin:0 10%; left:0 !important;}
}
@media screen and (max-width: 480px) {
	#boxes #dialog{
		top:10% !important;
	}
	
}
</style>
<script>
jQuery(document).ready(function() {	

		var id = '#dialog';
	
		//Get the screen height and width
		var maskHeight = jQuery(document).height();
		var maskWidth = jQuery(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		jQuery('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		jQuery('#mask').fadeIn(500);	
		jQuery('#mask').fadeTo("slow",0.9);	
	
		//Get the window height and width
		var winH = jQuery(window).height();
		var winW = jQuery(window).width();
              
		//Set the popup window to center
		jQuery(id).css('top',  winH/2-jQuery(id).height()/2);
		jQuery(id).css('left', winW/2-jQuery(id).width()/2);
	
		//transition effect
		jQuery(id).fadeIn(2000); 	
	
	//if close button is clicked
	jQuery('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		jQuery('#mask').hide();
		jQuery('.window').hide();
	});		
	
	//if mask is clicked
	jQuery('#mask').click(function () {
		jQuery(this).hide();
		jQuery('.window').hide();
	});		
	
});

</script> 

<div id="boxes">
  	<div style="display:block;" id="dialog" class="window">
 <a href="http://www.greenlamindustries.com/interzum2017/" target="_blank">
			<img src="/sites/all/themes/mikasa/images/greenlam-popup2017.jpg" width="666" height="533" alt="" style="width:644px;" />
		</a>
		<a href="javascript:void()" class="close agree">
			<img src="/sites/all/themes/mikasa/images/fancybox_sprite1.png" width="36" height="34" alt=""  />
		</a>
  	</div>
  	<div  id="mask"></div>
</div>
<!-- Popup on 15Sept2015 -->   
