<?php
/**
 * OL Twig Environment Class
 *
 * @package       CodeIgniter
 * @subpackage    Libraries
 * @category      Twig
 * @author        Alexandra Perez
 * @license       MIT
 */
class OL_Twig_Environment extends Twig_Environment {
    /**
     * This exists so template cache files use the same
     * group between apache and cli
     */
    protected function writeCacheFile ( $file, $content ) {
        if ( ! is_dir( dirname( $file ) ) ) {
            $old = umask( 0002 );
            mkdir( dirname( $file ), 0777, true );
            umask( $old );
        }

        parent::writeCacheFile( $file, $content );
        chmod( $file, 0775 );
    }
}
