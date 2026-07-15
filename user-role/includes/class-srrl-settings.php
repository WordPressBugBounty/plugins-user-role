<?php
/**
 * Displays the content on the plugin settings page
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( ! class_exists( 'Srrl_Settings_Tabs' ) ) {
	/**
	 * Class for display Settings Tab
	 */
	class Srrl_Settings_Tabs extends Bws_Settings_Tabs {

		/**
		 * Constructor.
		 *
		 * @access public
		 *
		 * @see Bws_Settings_Tabs::__construct() for more information on default arguments.
		 *
		 * @param string $plugin_basename Plugin basename.
		 */
		public function __construct( $plugin_basename ) {
			global $srrl_options, $srrl_plugin_info;

			$tabs = array(
				'import-export' => array( 'label' => __( 'Import / Export', 'user-role' ) ),
				'misc'          => array( 'label' => __( 'Misc', 'user-role' ) ),
				'license'       => array( 'label' => __( 'License Key', 'user-role' ) ),
			);

			parent::__construct(
				array(
					'plugin_basename'    => $plugin_basename,
					'plugins_info'       => $srrl_plugin_info,
					'prefix'             => 'srrl',
					'default_options'    => srrl_get_options_default(),
					'options'            => $srrl_options,
					'is_network_options' => is_network_admin(),
					'tabs'               => $tabs,
					'wp_slug'            => 'user-role',
					'link_key'           => '0e8fa1e4abf7647412878a5570d4977a',
					'link_pn'            => '132',
					'doc_link'           => 'https://bestwebsoft.com/documentation/user-role/user-role-user-guide/',
				)
			);
		}

		/**
		 * Save options
		 */
		public function save_options() {}

		public function tab_import_export() { ?>
			<h3 class="bws_tab_label"><?php esc_html_e( 'Import / Export', 'user-role' ); ?></h3>
			<?php $this->help_phrase(); ?>
			<hr>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php esc_html_e( 'Export User Role and settings', 'user-role' ); ?></th>
					<td>
						<fieldset>
							<label><input type="radio" name="srrl_format_export" value="csv" checked="checked" /><?php esc_html_e( 'CSV file format', 'user-role' ); ?></label><br />
						</fieldset>
						<input type="submit" name="srrl_export_submit" class="button" value="<?php esc_html_e( 'Export', 'user-role' ) ?>" />
						<?php wp_nonce_field( 'srrl_export_import_action', 'srrl_export_import_nonce' ); ?>
					</td>
				</tr>
			</table>
			<div class="bws_pro_version_bloc">
				<div class="bws_pro_version_table_bloc">
					<button type="submit" name="bws_hide_premium_options" class="notice-dismiss bws_hide_premium_options" title="<?php esc_html_e( 'Close', 'user-role' ); ?>"></button>
					<div class="bws_table_bg"></div>
					<table class="form-table bws_pro_version">
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Import User Role and settings', 'user-role' ); ?></th>
							<td>
								<fieldset>
									<label><input disabled="disabled" type="radio" checked="checked" /><?php esc_html_e( 'Add new User Roles', 'user-role' ); ?></label><br />
									<label><input disabled="disabled" type="radio" /><?php esc_html_e( 'Replace setting for exists User Roles', 'user-role' ); ?> </label><br />
									<label><input disabled="disabled" type="radio" /><?php esc_html_e( 'Add new User Roles and replace setting for exists User Roles', 'user-role' ); ?></label><br />
									<label><input disabled="disabled" type="checkbox" checked="checked" /><?php esc_html_e( 'Do not touch standard User Roles', 'user-role' ); ?></label><br />
								</fieldset>
								<label><input disabled="disabled" type="file" /></label><br />
								<input  disabled="disabled" type="submit" class="button" value="<?php esc_html_e( 'Import', 'user-role' ); ?>" />
							</td>
						</tr>
					</table>
				</div>
				<?php $this->bws_pro_block_links(); ?>
			</div>
		<?php }


		/**
		 * Display tab
		 */
		public function tab_settings() {}

	}
}
