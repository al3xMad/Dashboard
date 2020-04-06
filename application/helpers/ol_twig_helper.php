<?php
/**
 * OpenLibra
 *
 * The free online library
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, EtnasSoft
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package     OpenLibra
 * @author      EtnasSoft
 * @copyright   Copyright (c) 2014, EtnasSoft (http://www.etnassoft.com/)
 * @license     http://opensource.org/licenses/MIT  MIT License
 * @link        http://openlibra.com
 * @since       Version 1.0.0
 * @filesource
 */
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/**
 * OpenLibra Twig Helper
 *
 * @package     OpenLibra
 * @subpackage  Helper
 * @category    Twig
 * @author      EtnasSoft <info@etnassoft.com>
 */

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
