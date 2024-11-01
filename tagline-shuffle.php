<?php
/**
 * @package tagline-shuffle
 * @author Jeremy Wolfe
 * @version 1.0
 */
/*
Plugin Name: Tagline Shuffle
Plugin URI: http://kwitcherbitchen.org/
Description: Picks a random tagline from a list every time a page is loaded.
Author: Jeremy Wolfe
Version: 1.0
Author URI: http://blog.jeremywolfe.com/
*/

function random_tagline($result='', $show='') {

	if ($show == "description") {
	
		$random_tag_list = get_option("random_tag_list");
		
		// Here we split it into lines
		$tag_list_array = explode("\n", $random_tag_list);

		// And then randomly choose a line
		$result = $tag_list_array[ mt_rand(0, count($tag_list_array) - 1) ];
	}

	return $result;
}

function insert_random_tagline() {
	echo random_tagline("", "description");
}

function random_tag_menu() {
	add_options_page('Tagline Shuffle Options', 'Tagline Shuffle', 8, __FILE__, 'random_tag_options');
}

function random_tag_options() { ?>

<div class="wrap">
<h2>Tagline Shuffle Settings</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table">

<tr valign="top">
<th><h3>List of taglines to randomly select from:</h3></th></tr><tr>
<td><textarea name="random_tag_list" cols="100" rows="20"><?php echo get_option('random_tag_list'); ?></textarea></td>
</tr>

<tr valign="top">
<td><input name="tag_replace_random" type="checkbox" id="repl_checkbox" value="true"<?php if (get_option('tag_replace_random')) echo(" checked"); ?> /><label for="repl_checkbox">Replace all normal taglines with randoms from this list</label>
</td>
</tr>

<tr valign="top">
<th><h3>Usage:</h3></th></tr><tr>
<td>To replace all existing tagline items with randomly selected ones from this list, use the above checkbox.<br />
Otherwise, you may add a random line to any part of any template using the following syntax:<br />
<blockquote>&lt;?php insert_random_tagline() ?&gt; </blockquote></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="random_tag_list,tag_replace_random" />

<p class="submit">
<input type="submit" class="button-primary" name="Submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>

<?php }

if (get_option("tag_replace_random")) add_filter('bloginfo', 'random_tagline', 1, 2);
add_action('admin_menu', 'random_tag_menu');

?>
