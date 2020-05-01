<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

// --------------------------------------------------------------------

/**
 * Twig function wrapper
 * Wrapper a PHP function in order to be executed by TWIG
 *
 * @param   string  $func   The PHP function
 * @return  null
 */
function twg_func ( $func ) {
    $args = func_get_args();
    $func = trim( $func );
    if ( strpos( $func, '.' ) !== false ) {
        $obj = explode( '.', $func );
        $class = $obj[ 0 ];
        $func_name = $obj[ 1 ];

        $CI =& get_instance();

        return call_user_func_array( array( $CI->$class, $func_name ), array_slice( $args, 1 ) );
    } else {
        if ( function_exists( $func ) ) {
            return call_user_func_array( $func, array_slice( $args, 1 ) );
        } else {
            return true;
        }
    }
}

/* End of file ol_twig_helper.php */
/* Location: ./application/helpers/ol_twig_helper.php */
