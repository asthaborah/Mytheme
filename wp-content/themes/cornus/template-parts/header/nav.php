<?php
/**
 * 
 * @package Cornus
 */

?>
<?php

//getting the menu id
$menu_class = \CORNUS_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('cornus-header-menu');

//Retrieves all menu items of a navigation menu.
$header_menu = wp_get_nav_menu_items($header_menu_id);

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- adding custom logo here  -->
    <?php
    if (function_exists('the_custom_logo')) {
      the_custom_logo();
    }
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      //checking if menu or menus exists or not
      if (!empty($header_menu) && is_array($header_menu)) {
        ?>
        <ul class="navbar-nav mr-auto">
          <!-- adding dynamic menu -->
          <?php
          //looping through menu item and checking if it is a parent menu or child menu
          foreach ($header_menu as $menu_item) {
            if (!$menu_item->menu_item_parent) { // means menu has no parents
        
              // array for child menus
              $child_header_menus = $menu_class->get_menu_child_class($header_menu, $menu_item->ID);

              $has_children = !empty($child_header_menus) && is_array($child_header_menus);

              // checking if the menu item is a parent with no child or with child
              if (!$has_children) {
                ?>
                <!-- this menu has no child -->
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo esc_url($menu_item->url) ?>">
                    <?php echo esc_html($menu_item->title) ?>
                  </a>
                </li>
                <?php
              } else {
                //menu with child
                ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url) ?>" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo esc_html($menu_item->title) ?>
                  </a>
                  <!-- looping through the child array to display child items -->
                  <?php
                  foreach ($child_header_menus as $child_menu) {
                    ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="<?php echo esc_url($child_menu->url) ?>">
                        <?php echo esc_html($child_menu->title) ?>
                      </a>
                    </div>
                    <?php
                  }
                  ?>
                </li>
                <?php
              }

              ?>
              <?php
            }
          }

          ?>
        </ul>
        <?php
      }

      ?>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>