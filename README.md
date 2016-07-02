##Use Navwalker de Wordpress with wordpress theme that have composer autoload


wp-bootstrap-navwalker
======================

**A custom WordPress nav walker class to fully implement the Bootstrap 4.0+ navigation style in a custom theme using the WordPress built in menu manager.**

![Extras](http://edwardmcintyre.com/pub/github/navwalker-3-menu.jpg)
Bootstrap 4.0
------------
To can support Bootsprap 4 alpha you need to use the >3 ver of this package

Installation
------------
go to your theme folder with composer installed and autoloaded in functions.php

to import
```
composer require jorgelsaud/bootstrap-nav-walker
```


Open your WordPress themes **functions.php** file  `/wp-content/your-theme/functions.php` and add the following code:

```php
// Register Custom Navigation Walker
require_once('vendor/autoload.php');

```
add this to your functions file
```php
add_filter('get_custom_logo','change_logo_class');


function change_logo_class($html)
{
    $html = str_replace('class="custom-logo"', 'img-fluid', $html);
    $html = str_replace('class="custom-logo-link"', 'navbar-brand', $html);
    return $html;
}
```



Bootstrap 2.x vs Bootstrap 3.0
------------
There are many changes Bootstrap 2.x & Bootstrap 3.0 that affect both how the nav walker class is used and what the walker supports. For CSS changes I recommend reading the Migrating from 2.x to 3.0 in the official Bootstrap docs http://getbootstrap.com/getting-started/#migration

The most noticeable functionality change in Bootstrap 3.0.0+ is that it only supports a single dropdown level. This script is intended to implement the Bootstrap 3.0 menu structure without adding additional features, so additional dropdown levels will not be supported.

If you would like to use **Bootstrap 2.x** you can find the legacy version of the walker class here https://github.com/twittem/wp-bootstrap-navwalker/tree/For-Bootstrap-2.3.2

NOTE
----
This is a utility class that is intended to format your WordPress theme menu with the correct syntax and classes to utilize the Bootstrap dropdown navigation, and does not include the required Bootstrap JS files. You will have to include them manually. 

Installation
------------
go to your theme folder with composer installed and autoloaded in functions.php

to import
```
composer require jorgelsaud/bootstrap-nav-walker
```


Open your WordPress themes **functions.php** file  `/wp-content/your-theme/functions.php` and add the following code:

```php
// Register Custom Navigation Walker
require_once('vendor/autoload.php');
```

Usage
------------
Update your `wp_nav_menu()` function in `header.php` to use the new walker by adding a "walker" item to the wp_nav_menu array.

```php
 <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => '\jorgelsaud\WordpressTools\NavWalker::fallback',
                'walker'            => new \jorgelsaud\WordpressTools\NavWalker())
            );
        ?>
```

Your menu will now be formatted with the correct syntax and classes to implement Bootstrap dropdown navigation. 

You will also want to declare your new menu in your `functions.php` file.

```php
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );
```

Typically the menu is wrapped with additional markup, here is an example of a ` navbar-fixed-top` menu that collapse for responsive navigation.

```php
<nav class="navbar navbar-light bg-faded">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
    &#9776;
  </button>
  <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
    <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
    </a>

    <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'nav navbar-nav',
        'container_id'      => 'exCollapsingNavbar2',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => '\jorgelsaud\WordpressTools\NavWalker::fallback',
                'walker'            => new \jorgelsaud\WordpressTools\NavWalker())
            );
        ?>
  </div>
</nav>
```

To change your menu style add Bootstrap nav class names to the `menu_class` declaration.

Review options in the Bootstrap docs for more information on nav classes
http://getbootstrap.com/components/#nav

Displaying the Menu 
-------------------
To display the menu you must associate your menu with your theme location. You can do this by selecting your theme location in the *Theme Locations* list wile editing a menu in the WordPress menu manager.

Extras
------------

![Extras](http://edwardmcintyre.com/pub/github/navwalker-3-menu.jpg)

This script included the ability to add Bootstrap dividers, dropdown headers, glyphicons and disables links to your menus through the WordPress menu UI. 

Dividers
------------
Simply add a Link menu item with a **URL** of `#` and a **Link Text** or **Title Attribute** of `divider` (case-insensitive so ‘divider’ or ‘Divider’ will both work ) and the class will do the rest.

![Divider Example](http://edwardmcintyre.com/pub/github/navwalker-divider.jpg)

Glyphicons
------------
To add an Icon to your link simple place the Glyphicon class name in the links **Title Attribute** field and the class will do the rest. IE `glyphicon-bullhorn`

![Header Example](http://edwardmcintyre.com/pub/github/navwalker-3-glyphicons.jpg)

Dropdown Headers
------------
Adding a dropdown header is very similar, add a new link with a **URL** of `#` and a **Title Attribute** of `dropdown-header` (it matches the Bootstrap CSS class so it's easy to remember).  set the **Navigation Label** to your header text and the class will do the rest.

![Header Example](http://edwardmcintyre.com/pub/github/navwalker-3-header.jpg)

Disabled Links
------------
To set a disabled link simply set the **Title Attribute** to `disabled` and the class will do the rest. 

![Header Example](http://edwardmcintyre.com/pub/github/navwalker-3-disabled.jpg)

Only Icons
------------
To set icon of Font awesome only linksimply set the **Title Attribute** to `only-icon` and the class will do the rest. 

![Header Example](http://edwardmcintyre.com/pub/github/navwalker-3-disabled.jpg)

Changelog
------------
**3.0**
Support For Work With Bootstrap 4
**2.4**
compatible with bt4
**2.3**
Resolved Issue with attr not defined
**2.2**
Add class to only icon (icononly)
**2.1**
Added only icon feature

Previous this changes
------------
**2.0.4**
+ Updated fallback function to accept args array from wp_nav_menu

**2.0.3**
+ Included a fallback function that adds a link to the WordPress menu manager if no menu has been assigned to the theme location.

**2.0.2**
+ Small tweak to ensure carets are only displayed on top level dropdowns.

**2.0.1**
+ Added missing `active` class to active menu items.

**2.0**
+ Class was completly re-written using the latest Wordpress 3.6 walker class.
+ Now full supports Bootstrap 3.0+
+ Tested with wp_debug & the Theme Check plugin.

[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/twittem/wp-bootstrap-navwalker/trend.png)](https://bitdeli.com/free "Bitdeli Badge")