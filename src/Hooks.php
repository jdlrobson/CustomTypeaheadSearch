<?php
namespace MediaWiki\Extension\CustomTypeaheadSearch;

use MediaWiki\Logger\LoggerFactory;
use MediaWiki\Output\OutputPage;
use MediaWiki\ResourceLoader\ResourceLoader;
use MediaWiki\ResourceLoader as RL;

class Hooks {
	/**
	 * @param \OutputPage $out
	 * @param string &$text
	 */
	public static function onAfterFinalPageOutput( OutputPage $out ) {
		$html = ob_get_clean();
		$startIndex = strpos( $html, '<!-- typeahead-start -->' );
		$endIndex = strpos( $html, '<!-- typeahead-end -->' );
		$ssr = '<div class="vector-typeahead-search-container"><input class="mw-searchInput">My custom typeahead!</div>';
		if ( $startIndex && $endIndex ) {
			$html = substr( $html, 0, $startIndex ) .  $ssr . substr( $html, $endIndex );
		}
		ob_start();
		echo $html;
	}

	public static function onSkinPageReadyConfig(
		RL\Context $context,
        array &$config
	) {
		if ( $context->getSkin() === 'vector-2022' ) {
			$config['search'] = true;
			$config['searchModule'] = 'ext.CustomTypeaheadSearch';
		}
		// Stop other hooks using this
		return false;
	}
}
