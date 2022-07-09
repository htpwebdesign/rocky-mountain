<?php
/**
 * Adds buttons to navigation menus with sub menus.
 *
 * @package FWD_Starter_Theme
 */

/**
 * Adds buttons for sub-menu nav items for mobile.
 */
class FWD_Add_Sub_Menu_Button_Walker extends Walker_Nav_Menu {
	/**
	 * Adds buttons for sub-menu nav items for mobile.
	 *
	 * @param array $output Number of posts to get.
	 * @param int   $depth ID of the post to skip.
	 * @param array $args List of sub locations if any.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<button class='sub-menu-toggle' aria-expanded='false' aria-label='Toggle sub-menu'>
		<svg class='submenu-icon' clip-rule='evenodd' fill-rule='evenodd' stroke-linejoin='round' stroke-miterlimit='2' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='m11.998 2c5.517 0 9.997 4.48 9.997 9.998 0 5.517-4.48 9.997-9.997 9.997-5.518 0-9.998-4.48-9.998-9.997 0-5.518 4.48-9.998 9.998-9.998zm4.843 8.211c.108-.141.157-.3.157-.456 0-.389-.306-.755-.749-.755h-8.501c-.445 0-.75.367-.75.755 0 .157.05.316.159.457 1.203 1.554 3.252 4.199 4.258 5.498.142.184.36.29.592.29.23 0 .449-.107.591-.291z' fill-rule='nonzero'/></svg>
		</button><ul class='sub-menu'>\n";
	}
	/**
	 * Adds buttons for sub-menu nav items for mobile.
	 *
	 * @param array $output Number of posts to get.
	 * @param int   $depth ID of the post to skip.
	 * @param array $args List of sub locations if any.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}
}