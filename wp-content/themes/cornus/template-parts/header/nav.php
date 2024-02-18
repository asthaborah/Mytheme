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
echo '<pre>';
print_r($header_menu);
wp_die();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        <?php
        //looping through menu item and checking if it is a parent menu or child menu
        foreach ($header_menu as $menu_item) {
          if (!$menu_item->menu_item_parent) { // means menu has no parents
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
              </div>
            </li>
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
</nav>