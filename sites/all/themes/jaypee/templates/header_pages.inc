<?php require_once('header.inc'); ?>
<header>
      <div class="logo"><a href="<?php echo $base_url?>"><img src="<?php echo $theme_path;?>/images/logo.png" alt="LOGO"></a></div>
     <div class="right_menu"> 
      <nav>
          
           <?php 
         $left_menu = 'menu-right-menu-home';
          $left_menu_tree = menu_tree_all_data($left_menu);
          $left_menu_home='';
          $left_menu_home .= '<ul>';
           foreach ($left_menu_tree as $left_menu_block){
            
           $left_menu_home .= '<li>'.l(t($left_menu_block['link']['link_title']),$left_menu_block['link']['link_path']);
           $left_menu_home .= '</li>';
          }
             
            $left_menu_home.= '</ul>';
             echo  $left_menu_home;
           ?>
      </nav>
    </div>

    <div class="sb-toggle-right right_menu_icon">
      <div class="three_line three_line--htx"><span>toggle menu</span> </div>
    </div>
  </header>



