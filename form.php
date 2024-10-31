<?php
 function adminForm() {
  echo '<div class="wrap">';
  echo '<h2>Pimp my Feed Plugin Options Page</h2>';
  echo '<h3>Usage</h3>';
  echo '<p>Just fill in the text you want displayed before and after your posts in your feed. ';
  echo 'No PHP here, just HTML. May be used for a copyright notice, ads or stuff like that. Put in whatever you want.</p>';
  echo '<p></p><hr size="2">';
  echo '<h3>Example</h3>';
  echo '<p><strong>from:</strong> &amp;copy; 2008 Pierre Markuse - &lt;a href="http://www.pierre-markuse.de/"&gt;www.pierre-markuse.de&lt;/a&gt;</p>';
  echo '<p><strong>you would get this output:</strong> &copy; 2008 Pierre Markuse - <a href="http://www.pierre-markuse.de/">www.pierre-markuse.de</a></p><hr size="2">';
  echo '<h3>Options</h3>';
  if ($_REQUEST['submit']) {
   saveForm(); 
  }
 showForm();
 }
  if ($_REQUEST['vorweg']) {
   update_option('before', "");
  }
  if ($_REQUEST['hinweg']) {
   update_option('behind', "");
  }
  
    if ($_REQUEST['disclaimer']) {
    	$hstr="THIS FEED IS NOT INTENDED FOR SYNDICATION! - Please visit <a href=\"";
     	$hstr=$hstr . get_bloginfo('url');
     	$hstr=$hstr . '">';
     	$hstr=$hstr . get_bloginfo('url');
      $hstr=$hstr . '</a>';  	
   update_option('before', $hstr);
  }
 function saveForm() {
  if ($_REQUEST['before']) {

  update_option('before', $_REQUEST['before']);
  }
  if ($_REQUEST['behind']) {
  update_option('behind', $_REQUEST['behind']);
 }
 }
  
 
function showForm() {

  $default = get_option('before');
  if ($default=="") {$default="Nothing...";}
  $default = str_replace("&","&amp;",$default);
  $default = str_replace("<","&lt;",$default);
  $default = str_replace(">","&gt;",$default);
  $default = str_replace("\"","&quot;",$default);
  $default = str_replace("\\","",$default);
  $default2 = get_option('behind');
  if ($default2=="") {$default2="Nothing...";}
  $default2 = str_replace("&","&amp;",$default2);
  $default2 = str_replace("<","&lt;",$default2);
  $default2 = str_replace(">","&gt;",$default2);
  $default2 = str_replace("\"","&quot;",$default2);
  $default2 = str_replace("\\","",$default2);
 
  echo '<form method="post">';
  echo '<label for="before"><strong>Text to place before the post: </strong>';
  echo '<input type="text"  name="before" size="122" maxlength="300" value="' . $default . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit" value="Confirm">'; 
//  echo '</form>  ';

 // echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 300px" name="disclaimer" value="Add standard -Not for Syndication Disclaimer-">'; 
  echo '</form><br/>';


  echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 250px" name="vorweg" value="Reset">'; 
  echo '</form>';
  echo '<br /><br />';
  echo '<form method="post">';
  echo '<label for="behind"><strong>Text to place after the post: </strong>';
  echo '<input type="text"  name="behind" size="122" maxlength="300" value="' . $default2 . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit" value="Confirm">'; 
  echo '</form><br />';
  echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 250px" name="hinweg" value="Reset">'; 
  echo '</form>';
  echo '<br /><br /><hr size="2">';
  echo '<p>This is the <strong>Pimp my Feed Plugin 0.1.1</strong> &copy; 2008 Pierre Markuse - You can always find the latest version here: ';
  echo '<a href="http://www.pierre-markuse.de/pimp-my-feed-wordpress-plugin/">Pierre Markuse</a></p>';
  echo '</div>';
 } 
?>
