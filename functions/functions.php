<?php 
add_filter('get_custom_logo','change_logo_class');

function change_logo_class($html)
{
    $html = str_replace('class="custom-logo"', 'class="img-fluid"', $html);
    $html = str_replace('class="custom-logo-link"', 'class="navbar-brand"', $html);
    return $html;
}
?>