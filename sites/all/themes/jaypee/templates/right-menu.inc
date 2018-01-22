
<!-- start right menu -->
<div class="sb-slidebar sb-right">
 <?php
 $top_menu = ''; 
  $top_menu .='<ul class="right_menu_box">';

      $menu = 'menu-side-bar-toggle-menu';
     $tree = menu_tree_all_data($menu);
     //echo "<pre>";
     foreach ($tree as $branch) {
    
               //echo '<pre>'; print_r($branch['below']);
      if( count($branch['below']) > 0)
        {
        $top_menu .= '<li class="down_arrow">'.l(t($branch['link']['link_title']), $branch['link']['link_path'] );

               foreach($branch['below'] as $menu_level)
                      {
    
                   $top_menu .= '<ul class="right_sub"><li class="">'.l(t($menu_level['link']['link_title']), $menu_level['link']['link_path'] );
                   $top_menu .= '</li>';
                   $top_menu .= '</ul>';
                      }
         $top_menu .= '</li>';
         
    
        }
      else 
           $top_menu .= '<li class="">'.l(t($branch['link']['link_title']), $branch['link']['link_path'] );

                }
   
    
$top_menu .= '</ul>';

echo $top_menu;
 ?>
  
        
           <?php
          $block = module_invoke('search', 'block_view', 'search');
          print render($block);
           ?>
          
</div>
<!-- end right menu --> 



