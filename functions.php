<?php
//Child Theme Functions File
add_action('wp_enqueue_scripts', 'enqueue_wp_child_theme');
function enqueue_wp_child_theme()
{
	if ((esc_attr(get_option('child_2019_setting_x')) != "Yes")) {
		//This is your parent stylesheet you can choose to include or exclude this by going to your Child Theme Settings under the "Settings" in your WP Dashboard
		wp_enqueue_style('parent-css', get_template_directory_uri() . '/style.css');
	}

	//This is your child theme stylesheet = style.css
	wp_enqueue_style('child-css', get_stylesheet_uri());

	//This is your child theme js file = js/script.js
	wp_enqueue_script('child-js', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}


// ChildThemWP.com Settings 
function child_2019_register_settings()
{
	register_setting('child_2019_theme_options_group', 'child_2019_setting_x', 'ctwp_callback');
}
add_action('admin_init', 'child_2019_register_settings');

function child_2019_register_options_page()
{
	add_options_page('Child Theme Settings', 'My Child Theme', 'manage_options', 'child_2019', 'child_2019_theme_options_page');
}
add_action('admin_menu', 'child_2019_register_options_page');

function child_2019_theme_options_page()
{
	?>
	<div>
		<style>
			table.child_2019 {
				table-layout: fixed;
				width: 100%;
				vertical-align: top;
			}

			table.child_2019 td {
				width: 50%;
				vertical-align: top;
				padding: 0px 20px;
			}

			#child_2019_settings {
				padding: 0px 20px;
			}
		</style>
		<div id="child_2019_settings">
			<h1>Child Theme Options</h1>
		</div>
		<table class="child_2019">
			<tr>
				<td>
					<form method="post" action="options.php">
						<h2>Parent Theme Stylesheet Include or Exclude</h2>
						<?php settings_fields('child_2019_theme_options_group'); ?>
						<p><label><input size="76" type="checkbox" name="child_2019_setting_x" id="child_2019_setting_x" <?php if ((esc_attr(get_option('child_2019_setting_x')) == "Yes")) {
																																echo ' checked="checked" ';
																															} ?> value='Yes'>
								TICK To DISABLE The Parent Stylesheet style.css In Your Site HTML<br><br>
								Tick This Box If When You Inspect Your Source Code It Contains Your Parent Stylesheet style.css Two Times. Ticking This Box Will Only Include It Once.</label></p>
						<?php submit_button(); ?>
					</form>
				</td>
				<td>
					<h2>Confirm your child theme works</h2>
					<h4>Does your child theme work?</h4>
					<p>
						<a href="./options-general.php?page=child_2019&childthemewpconfirm=Yes">Yes my child theme works</a><br>
						<a href="./options-general.php?page=child_2019&childthemewpconfirm=No">No my child theme does not work</a><br>
						<?php
						$problem = "";
						global $wpdb;
						$table_name = esc_attr($wpdb->prefix . 'childthemewp');
						$childthemeconfirmed = $wpdb->get_results("SELECT datavalue FROM $table_name ORDER BY id DESC LIMIT 1");
						?>
						<br>You previously answered: <strong>
							<?php
							$dbanswer = esc_attr($childthemeconfirmed[0]->datavalue);

							if ($dbanswer != "") {
								if ($dbanswer == "Yes") {
									?>
									<strong style="color:green">YES IT WORKS!</strong>
								<?php
								} else {
									$problem = "flag";
									?>
									<strong style="color:red">NO THERE'S A PROBLEM</strong>
								<?php
								}
							} else {
								?>
								<strong style="color:red">? NOT ANSWERED PLEASE ANSWER ?</strong>
							<?php
							}
							?></strong></p>
					<p>Your answer is important because it helps us to keep our child theme library up to date and bug free for the WordPress community to use.</p>
					<hr>
					<?php
					if ($problem == "flag") {
						?>
						<h2>Report a bug</h2>
						<h4 style='color:red'>Please report your problem in more details using this link</h4>
						<p><a href="https://childthemewp.com/ask-a-question/" target="_blank">Report your bug using this form</a></p>
						<p>We can only fix bugs if you share more information with us. Please complete the form above so that we can assist you and other WordPress users.</p>
					<?php
					} else {
						?>
						<h2>Suggest improvements</h2>
						<h4>Suggest a child theme improvement using the form below</h4>
						<p><a href="https://childthemewp.com/ask-a-question/" target="_blank">Suggest an improvement</a></p>
						<p>Your feedback is valuable because it helps us to improve our platform for other WordPress users.</p>
					<?php
					}
					?>
					<hr>
					<h2>Say thanks!</h2>
					<p><strong>Buy Ben a coffee to say thank you for making your child theme!</strong><br><br>
						<a href="https://www.buymeacoffee.com/bennyboyworld" target="_blank">Buy Ben a Coffee</a><br>
				</td>
			</tr>
		</table>
	</div>
<?php
}

function child_2019_footerlink()
{
	if ((is_home()) || (is_front_page())) {
		?>
		<div id="footerlinktochildthemewp" style="text-align:center;">
			<p><a href="https://childthemewp.com" title="WordPress child theme created by childthemewp.com" target="_blank" style="font-size:10px;">www.childthemewp.com</a></p>
		</div>
		<!-- Credit: Made with childthemewp.com & released opensource - Thankyou Ben! -->
	<?php
	}
}
add_action('wp_footer', 'child_2019_footerlink');


if (is_admin()) {
	/* Table To Log Working/Not Working Answers */
	global $wpdb;
	$table_name = esc_attr($wpdb->prefix . 'childthemewp');
	if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		$charset_collate = esc_attr($wpdb->get_charset_collate());

		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		datavalue text NOT NULL,
		UNIQUE KEY id (id)
		) $charset_collate;";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta($sql);
	}

	/* Check If Theme Is Working */
	function display_admin_notice()
	{
		/* Ask The Question: "Does Your Child Theme Work?" To Improve Our Child Theme Library */
		global $wpdb;
		$table_name = esc_attr($wpdb->prefix . 'childthemewp');
		$childthemeconfirmed = $wpdb->get_results("SELECT datavalue FROM $table_name ORDER BY id DESC LIMIT 1");
		if (empty($childthemeconfirmed)) {
			?>
			<div class="notice notice-success">
				<p><strong>Message from ChildThemeWP.com:</strong> Confirm your child theme work?
					<a href="./options-general.php?page=child_2019&childthemewpconfirm=Yes">Yes my child theme works</a> &nbsp; or &nbsp;
					<a href="./options-general.php?page=child_2019&childthemewpconfirm=No">No my child theme does not work</a></p>
			</div>
		<?php
		}


		/* Save Answer To: "Does Your Child Theme Work?" To Improve Our Child Theme Library */
		if (isset($_GET["childthemewpconfirm"])) {
			$safe_childthemewpconfirm = esc_attr($_GET["childthemewpconfirm"]);
			unset($_GET["childthemewpconfirm"]);

			$wpdb->insert('wp_childthemewp', array(
				'id' => '',
				'datavalue' => $safe_childthemewpconfirm
			));

			if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
				$link = "https";
			} else {
				$link = "http";
			}
			$link .= "://";
			$link .= $_SERVER['HTTP_HOST'];

			$theme = get_template();

			$query = http_build_query([
				'site' => $link,
				'theme' => $theme
			]);

			if ($safe_childthemewpconfirm == "Yes") {
				$type = "success.php?" . $query;
			} else {
				$type = "fail.php?" . $query;
			}

			/* We Log Answers To "Does Your Child Theme Work?" To Improve Our Child Theme Library */
			$ch = curl_init('https://childthemewp.com/report/' . $type);
			curl_setopt($ch, CURLOPT_TIMEOUT, 5);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
			$data = curl_exec($ch);
			curl_close($ch);
		}
	}
	add_action('admin_notices', 'display_admin_notice');
}
