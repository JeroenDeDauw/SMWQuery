<?php

spl_autoload_register( function ( $className ) {
	$className = ltrim( $className, '\\' );
	$fileName = '';
	$namespace = '';

	if ( $lastNsPos = strripos( $className, '\\') ) {
		$namespace = substr( $className, 0, $lastNsPos );
		$className = substr( $className, $lastNsPos + 1 );
		$fileName  = str_replace( '\\', '/', $namespace ) . '/';
	}

	$fileName .= str_replace( '_', '/', $className ) . '.php';

	$namespaceSegments = explode( '\\', $namespace );

	if ( $namespaceSegments[0] === 'SMW' && count( $namespaceSegments ) > 1 && $namespaceSegments[1] === 'Query' ) {
		if ( count( $namespaceSegments ) === 2 || $namespaceSegments[2] !== 'Tests' ) {
			require_once __DIR__ . '/src/' . $fileName;
		}
	}
} );

/**
 * Hook to register PHPUnit test cases with MediaWiki.
 * @see https://www.mediawiki.org/wiki/Manual:Hooks/UnitTestsList
 */
$GLOBALS['wgHooks']['UnitTestsList'][]	= function( array &$files ) {
	$directoryIterator = new RecursiveDirectoryIterator( __DIR__ . '/tests/' );

	/**
	 * @var SplFileInfo $fileInfo
	 */
	foreach ( new RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
		if ( substr( $fileInfo->getFilename(), -8 ) === 'Test.php' ) {
			$files[] = $fileInfo->getPathname();
		}
	}

	return true;
};
