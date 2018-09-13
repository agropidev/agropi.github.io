<?php

$themename = "WP Blueprint";
$shortname = "cc";
$options = array (

array(
"name" => "Misc &amp; Welcome Message",
"type" => "title"),

array(
"type" => "open"),

array(
"name" => "Say hello!",
"desc" => "Try to use 450 characterss or less. Any HTML is welcome",
"id" => $shortname."_welcome",
"type" => "textarea",
"image" => "",
"std" => ""),

array(
"name" => "Feedburner ID",
"desc" => "http://feedburner.google.com/fb/a/mailverify?uri=<em>This is your ID</em>",
"id" => $shortname."_feedid",
"type" => "text",
"feed" => "",
"std" => ""),

array(
"name" => "Twitter ID",
"desc" => "http://twitter.com/<em>MyID</em>",
"id" => $shortname."_twitter",
"type" => "text",
"feed" => "",
"std" => ""),

array(
"type" => "close"),

array(
"name" => "Countdown Settings",
"type" => "title"),

array(
"type" => "open"),

array(
"name" => " Footer Script's ",
"desc" => "Google analytics, Woopra, etc. ",
"id" => $shortname."_fscripts",
"type" => "textarea",
"image" => "",
"std" => ""),

array(
"name" => "Define the year",
"desc" => "Remember to use this format: <em>yyyy</em>",
"id" => $shortname."_year",
"type" => "text",
"image" => "",
"std" => ""),

array(
"name" => "Define the month",
"desc" => "Remember to use this format: <em>mm</em>",
"id" => $shortname."_month",
"type" => "text",
"image" => "",
"std" => ""),

array(
"name" => "Define the day",
"desc" => "Remember to use this format: <em>dd</em>",
"id" => $shortname."_day",
"type" => "text",
"image" => "",
"std" => ""),


array(
"type" => "close")
);

/*Add a Theme Options Page*/
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap" style="margin:0 auto; padding:10px 0px 20px;">

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<div style="width:80%; background:#eee; border:1px solid #ddd; padding:20px 20px 5px 20px; overflow:hidden; display: block; margin: 0px 0px 5px;">

<?php break;

case "close":
?>

</div>

<?php break;

case "misc":
?>
<div style="width:80%; background:#fffde2; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 5px;">
	<?php echo $value['name']; ?>
</div>
<?php break;

case "title":
?>

<div style="width:80%; height:22px; background:#555; border: 1px solid #555;padding:9px 20px; overflow:hidden; margin:0px; font-family:Verdana, sans-serif; font-size:18px; font-weight:normal; color:#EEE;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case 'text':
?>

<div style="width:50%; padding:0px 0px 5px; margin:0px 0px 5px;overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>

	<input style="width:80%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case 'textarea':
?>

<div style="width:50%; padding:0px 0px 5px; margin:0px 0px 5px;overflow:hidden; float:right">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['feed'] != "") {?>
		<div style="width:50%; padding:10px 0px; overflow:hidden;">
			<input style="width:80%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
		</div>
	<?php } ?>
	<textarea name="<?php echo $value['id']; ?>" style="width:95%; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
	
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>




<?php
break;

case "submit":
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>

<?php break;
}
}
?>

<p class="submit" style="float:left; margin-right:5px;">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>

<form method="post">
<p class="submit"style="float:left; margin-right:5px;">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>
<?php
}

add_action('admin_menu', 'mytheme_add_admin');
/*End of Add a Theme Options Page*/

/*End of Theme Options =======================================*/
?>