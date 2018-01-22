<?php
 $nodeid='';
 if (arg(0) == 'node' && is_numeric(arg(1))) $nodeid = arg(1);
      
?>
<?php require_once('header.inc'); ?>
<div id="sb-site">


  <div class="wrapper">
  
  <?php //if($nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16 ){ require_once('header_home.inc');} else 
          require_once('header_pages.inc');
   ?>
  
<?php if ($page['page_banner']):
  print render($page['page_banner']); 
   endif; ?>
 
<?php if($nodeid==63){ ?>
        <section class="banner_box">
          <div class="noclass">
            <img class="top_banner" alt="" src="http://aglmobileapps.com/mikasadoors/sites/default/files/contactus_banner.jpg">
            <div class="title_box">
              <span class="title"><?php echo $title; ?></span>
              <span class="bdr_btm"></span>
            </div>
          </div>
        </section>
        <?php } elseif($nodeid==62){?>
        <section class="banner_box">
          <div class="noclass">
            <img class="top_banner" alt="" src="http://aglmobileapps.com/mikasadoors/sites/default/files/Construction.jpg">
            <div class="title_box">
              <span class="title"><?php echo $title; ?></span>
              <span class="bdr_btm"></span>
            </div>
          </div>
        </section>

        <?php } if($nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16){
            echo '';
        }else{?> <section class="middle_box"><?php }

        if($nodeid==61 || $nodeid==62 || $nodeid==63 || $nodeid==64){?><section class="new_middle"> <?php }

        if($nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16){?><div id="gallery"><div class="section gallery"> <?php }
        else { ?> <div class= "faq_layout"><?php } 

        /*else {?> <div class= "faq_layout"><?php } */

        //echo  $nodeid; die;

        print render($page['content']); 
?>

   <?php if($nodeid==61){}else{?>  </div><?php }?>
   <?php if($nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16){?></div></div><?php }?>
   <?php if($nodeid==8 || $nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16){?></div><?php }?>
   <?php if($nodeid==61 || $nodeid==62 || $nodeid==63 || $nodeid==64){?> </section> <?php }?>
   <?php if($nodeid==8 || $nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16){}else{?> </section><?php }?>
   <?php if($nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16) {
      require_once('footer_fixed.inc');
       }
      else
       require_once('footer.inc'); ?>
</div>

</div>
<?php require_once('right-menu.inc'); ?>



<?php if($nodeid==13 || $nodeid==14 || $nodeid==15 || $nodeid==16){?>
<script>

$(document).ready(function(e) {
/*$('#gallery1').fullpage({responsiveWidth: 900,
        anchors: ['teamfirstPage'],
        navigation: false,
        scrollOverflow: false,
        loopHorizontal: false
});*/
  
});

</script>
<style>
  .tabbing_box{
    float: none !important;
    margin: auto;
    width: 92%;
  }
  #gallery{
  top: 70px !important;
  min-height: auto !important;
  padding: 0px !important;
}

 #sb-site{
   transform: none;
}

html, body {
    overflow-x: visible !important;
}

</style>
<?php }?>


