<?php
namespace MediaWiki\Extension\CustomTypeaheadSearch;

use MediaWiki\Logger\LoggerFactory;
use MediaWiki\Output\OutputPage;
use MediaWiki\ResourceLoader\ResourceLoader;

class Hooks {
	/**
	 * @param \OutputPage $out
	 * @param string &$text
	 */
	public static function onAfterFinalPageOutput( OutputPage $out ) {
		$html = ob_get_clean();
		$startIndex = strpos( $html, '<!-- typeahead-start -->' );
		$endIndex = strpos( $html, '<!-- typeahead-end -->' );
		$ssr = '<div>My custom typeahead!</div>';
		$html = substr( $html, 0, $startIndex ) .  $ssr . substr( $html, $endIndex );
		ob_start();
		echo $html;
	}

	public static function onResourceLoaderRegisterModules( ResourceLoader $resourceLoader ) {
		$module = $resourceLoader->getModule( 'ext.CustomTypeaheadSearch' );
		$dir = dirname( __DIR__, 1 ) . '/resources/';
		$resourceLoader->register( [
			'skins.vector.search' => [
				'localBasePath' => $dir,
				'remoteExtPath' => "CustomTypeaheadSearch/resources",
				'packageFiles' => [
					'skins.vector.search.js'
				],
			],
		]  );
	}
}
