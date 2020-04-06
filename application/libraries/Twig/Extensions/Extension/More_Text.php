<?php

/**
 * This file is a Twig extension for assist in working with text based on CodeIgniter own helpers.
 * The native CodeIgniter functions will be called when avaible.
 * (c) 2012 Carlos Benitez | EtnasSoft
 * For the full copyright and license information, please view the LICENSE
 * file in the following web address: https://openlibra.com/license
 *
 * @author Carlos Benitez | EtnasSoft <info@etnassoft.com>
 * @package Twig
 * @subpackage Twig-extensions
 */
class OL_More_Text extends Twig_Extension {
    /**
     * Returns a list of filters.
     *
     * @return array
     */
    public function getFilters () {
        $filters = array( 'word_limiter' => new Twig_Filter_Function( 'twig_word_limiter_filter', array( 'needs_environment' => true ) ) );

        return $filters;
    }

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName () {
        return 'OL_More_Text';
    }
}

/**
 * Word Limiter
 * Limits a string to X number of words.
 *
 * @access  public
 * @param   string
 * @param   integer
 * @param   string  the end character. Usually an ellipsis
 * @return  string
 */
function twig_word_limiter_filter ( Twig_Environment $env, $value, $length = 30, $separator = '...' ) {
    $CI =& get_instance();
    $CI->load->helper( 'text' );

    return word_limiter( $value, $length, $separator );
}
