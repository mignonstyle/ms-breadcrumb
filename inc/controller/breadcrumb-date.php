<?php
/**
 * Date (year, month, day) item of breadcrumbs.
 *
 * @package ms-breadcrumb
 * @author  Mignon Style
 * @license GPLv2 or later
 * @version 1.0
 */

/**
 * Class MS_Breadcrumb_Date.
 */
class MS_Breadcrumb_Date extends MS_Breadcrumb_Abstract {

	/**
	 * Sets breadcrumbs items.
	 *
	 * @return void
	 */
	protected function set_items() {
		if ( is_year() ) {
			$this->set( $this->year_label() );
		} elseif ( is_month() ) {
			$this->set( $this->year_label(), $this->year_url() );
			$this->set( $this->month_label() );
		} elseif ( is_day() ) {
			$this->set( $this->year_label(), $this->year_url() );
			$this->set( $this->month_label(), $this->month_url() );
			$this->set( $this->day_label() );
		}
	}

	/**
	 * Return year label.
	 *
	 * @return string
	 */
	protected function year_label() {
		$year_label = sprintf(
			_x( '%s', 'year date format', 'ms-breadcrumb' ),
			get_the_time( 'Y' )
		);

		return $year_label;
	}

	/**
	 * Return year url.
	 *
	 * @return string
	 */
	protected function year_url() {
		$year_url = get_year_link( get_the_time( 'Y' ) );

		return $year_url;
	}

	/**
	 * Return month label.
	 *
	 * @return string
	 */
	protected function month_label() {
		$month_label = sprintf(
			_x( '%s', 'month date format', 'ms-breadcrumb' ),
			get_the_time( 'F' )
		);

		return $month_label;
	}

	/**
	 * Return month url.
	 *
	 * @return string
	 */
	protected function month_url() {
		$month_url = get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );

		return $month_url;
	}

	/**
	 * Return day label.
	 *
	 * @return string
	 */
	protected function day_label() {
		$day_label = sprintf(
			_x( '%s', 'day date format', 'ms-breadcrumb' ),
			get_the_time( 'd' )
		);

		return $day_label;
	}
}
