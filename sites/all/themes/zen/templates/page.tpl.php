<?php
error_reporting(0);
//display a page without header, footer and regions

if(isset($_POST['format']) && $_POST["format"] == "simple")  {
    include ('page-node-simple.tpl.php');
    return;
}
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */

?>

<div class="layout-center">
    <?php require_once('header.inc'); ?>

    <div class="layout-3col layout-swap">

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
      // Decide on layout classes by checking if sidebars have content.
      $content_class = 'layout-3col__full';
      $sidebar_first_class = $sidebar_second_class = '';
      if ($sidebar_first && $sidebar_second):
        $content_class = 'layout-3col__right-content';
        $sidebar_first_class = 'layout-3col__first-left-sidebar';
        $sidebar_second_class = 'layout-3col__second-left-sidebar';
      elseif ($sidebar_second):
        $content_class = 'layout-3col__left-content';
        $sidebar_second_class = 'layout-3col__right-sidebar';
      elseif ($sidebar_first):
        $content_class = 'layout-3col__right-content';
        $sidebar_first_class = 'layout-3col__left-sidebar';
      endif;
    ?>

    <main class="<?php print $content_class; ?>" role="main">
<!--      --><?php //print render($page['highlighted']); ?>
<!--      --><?php //print $breadcrumb; ?>
<!--      <a href="#skip-link" class="visually-hidden visually-hidden--focusable" id="main-content">Back to top</a>-->
<!--      --><?php //print render($title_prefix); ?>
<!--      --><?php //if ($title): ?>
<!--        <h1>--><?php //print $title; ?><!--</h1>-->
<!--      --><?php //endif; ?>
<!--      --><?php //print render($title_suffix); ?>
<!--      --><?php //print $messages; ?>
<!--      --><?php //print render($tabs); ?>
<!--      --><?php //print render($page['help']); ?>
<!--      --><?php //if ($action_links): ?>
<!--        <ul class="action-links">--><?php //print render($action_links); ?><!--</ul>-->
<!--      --><?php //endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </main>

    <div class="layout-swap__top layout-3col__full">

<!--      <a href="#skip-link" class="visually-hidden visually-hidden--focusable" id="main-menu" tabindex="-1">Back to top</a>-->



<!--      --><?php //print render($page['navigation']); ?>

    </div>

<!--    --><?php //if ($sidebar_first): ?>
<!--      <aside class="--><?php //print $sidebar_first_class; ?><!--" role="complementary">-->
<!--        --><?php //print $sidebar_first; ?>
<!--      </aside>-->
<!--    --><?php //endif; ?>
<!---->
<!--    --><?php //if ($sidebar_second): ?>
<!--      <aside class="--><?php //print $sidebar_second_class; ?><!--" role="complementary">-->
<!--        --><?php //print $sidebar_second; ?>
<!--      </aside>-->
<!--    --><?php //endif; ?>

  </div>

<!--  --><?php //print render($page['footer']); ?>

</div>

<?php //print render($page['bottom']); ?>
<?php require_once('footer.inc'); ?>