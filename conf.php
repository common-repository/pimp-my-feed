<?php
 include 'form.php';
 function save() {
  adminForm();
 } 
 function PMF() {
  add_options_page('Pimp my Feed', 'Pimp my Feed', 1, 'PMF', 'save');
 } 
 add_action('admin_menu', 'PMF');
?>
