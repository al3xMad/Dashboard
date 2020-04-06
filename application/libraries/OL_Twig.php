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
 * CodeIgniter Twig Class
 *
 * @package       CodeIgniter
 * @subpackage    Libraries
 * @category      Twig
 * @author        Bryce Johnston < bryce@beamleaf.com >
 * @license       MIT
 */
class OL_Twig {

    private $CI;
    private $_twig;
    private $_template_dir;
    private $_cache_dir;

    /**
     * Class Construct
     *
     */
    function __construct () {
        $this->CI =& get_instance();
        //$this->CI->config->load('twig');
        $debug = config_item( 'twig_debug_mode' );

        ini_set( 'include_path', ini_get( 'include_path' ) . PATH_SEPARATOR . APPPATH . 'libraries/Twig' );

        require_once (string)"Autoloader.php";

        Twig_Autoloader::register();

        $this->_template_dir = $this->CI->config->item( 'twig_template_dir' );
        $this->_cache_dir = ( $this->CI->config->item( 'twig_cache_enabled' ) ) ? $this->CI->config->item( 'twig_cache_dir' ) : false;

        $loader = new Twig_Loader_Filesystem( $this->_template_dir );

        require_once( 'OL_Twig_Environment.php' );
        $this->_twig = new OL_Twig_Environment( $loader, array( 'cache' => $this->_cache_dir, 'debug' => $debug ) );

        // Load Extensions
        $this->_twig->addExtension( new Twig_Extensions_Extension_I18n() );

        require_once( 'Extensions/Extension/More_Text.php' );
        $this->_twig->addExtension( new OL_More_Text() );

        // Checks if cache folder exists; otherwise, create it.
        create_dir_if_not_exists( $this->_cache_dir, true );

        // Checks if all public functions (loaded helpers) have to be passed to Twig
        if ( $this->CI->config->item( 'reveal_all_functions_to_twig' ) ) {
            $this->make_all_functions_avaible_for_twig();
        }

        $this->add_function( 'twg_func' );
    }

    // --------------------------------------------------------------------

    /**
     * Add function
     * Adds a function to Twig Environment
     *
     * @param   string  $name   The name of the function
     * @return  void
     */
    function add_function ( $name ) {
        $this->_twig->addFunction( $name, new Twig_Function_Function( $name ) );
    }

    // --------------------------------------------------------------------

    /**
     * Render
     * Renders a template on demand
     *
     * @param   string  $template   The template to render
     * @param   array   $data       The data for populate the template
     * @return  string              The template (HTML) rendered
     */
    function render ( $template, $data = array() ) {
        $template = $this->_twig->loadTemplate( $template );

        return $template->render( $data );
    }

    // --------------------------------------------------------------------

    /**
     * Get Blocks
     * Retrieves all blocks defined in a template
     *
     * @param   string  $template   The name of the template (with or without extension)
     * @return  array               The blocks found.
     */
    function get_blocks ( $template = null ) {
        if ( empty ( $template ) ) {
            return false;
        }

        if ( strpos( $template, config_item( 'twig_extension') ) === false ) {
            $template .= $this->CI->config->item( 'twig_extension' );
        }

        $template = $this->_twig->loadTemplate( $template );

        return $template->getBlocks();
    }

    // --------------------------------------------------------------------

    /**
     * Get block
     * Searchs and retrienves a given block defined in a template.
     *
     * @param   bool|string     $template   The name of the template (with or without extension)
     * @param   string          $block      The name of the block to search
     * @return  array                       The block (if found) or false.
     */
    function get_block ( $template = false, $block = null ) {
        $template = $this->get_blocks ( $template );

        if ( empty( $block ) ) {
            return false;
        }

        return isset( $template[ $block ] ) ? $template[ $block ] : false;
    }

    // --------------------------------------------------------------------

    /**
     * Render block
     * Renders a given block in a given template with the given data.
     *
     * @param   string  $template   The name of the template (with or without extension)
     * @param   string  $block      the name of the block to render
     * @param   array   $data       The data to pass to the block
     * @return  string              The block in template rendered
     */
    function render_block ( $template = null, $block = null, $data = array() ) {
        if ( empty( $template ) || empty( $block ) ) {
            return false;
        }

        if ( strpos( $template, config_item( 'twig_extension') ) === false ) {
            $template .= $this->CI->config->item( 'twig_extension' );
        }

        $template = $this->_twig->loadTemplate( $template );

        return ( $template->hasBlock( $block ) ) ? $template->renderBlock( $block, $data ) : false;
    }

    // --------------------------------------------------------------------

    /**
     * Display
     * Similar to render?
     *
     * @param   string  $template   The template to render
     * @param   array   $data       The data for populate the template
     * @return  string              The template (HTML) rendered
     */
    function display ( $template, $data = array() ) {
        $template = $this->_twig->loadTemplate( $template );

        // elapsed_time and memory_usage
        $data[ 'elapsed_time' ] = $this->CI->benchmark->elapsed_time( 'total_execution_time_start', 'total_execution_time_end' );
        $memory = ( !function_exists( 'memory_get_usage' ) ) ? '0' : round( memory_get_usage() / 1024 / 1024, 2 ) . 'MB';
        $data[ 'memory_usage' ] = $memory;
        $template->display( $data );
    }

    // --------------------------------------------------------------------

    /**
     * Make all functions avaible for twig
     * Making all public functions avaible for Twig in templates.
     * Useful but requires a lot of memory (almost 1Mb).
     * It has no impact on performance.
     * Use it with precaution and consider the use of the addFunction()
     * for register the specific public functions that you need.
     *
     * IMPORTANT: get_defined_functions return LOWERCASE NAMES.
     *
     * @return  void
     */
    function make_all_functions_avaible_for_twig () {
        $this->CI->config->set_item( 'reveal_all_functions_to_twig', true );
        $get_defined_functions = get_defined_functions();

        foreach ( $get_defined_functions[ 'user' ] as $function ) {
            if ( ! isset( $this->_twig->$function ) ) {
                $this->_twig->addFunction( $function, new Twig_Function_Function( $function ) );
            }
        }

        unset( $get_defined_functions );
    }

    // --------------------------------------------------------------------

    /**
     * Scan Templates for Translations
     * Scans all twig templates looking for the strings to translate.
     * Once localized, a new file is created and dumped in it.
     *
     * @return  array           A resume of the action performed
     */
    function scan_templates_for_translations () {
        $this->CI->load->helper( 'file' );
        $filename = config_item( 'dummy_translates_filename' );

        // Clean Pattern for new file
        $clean_pattern = "<?php\n";

        // Emptying file
        write_file( $filename, $clean_pattern );

        $path = realpath( config_item( 'current_template_uri' ) );
        $directory = new RecursiveDirectoryIterator( $path );
        $iterator = new RecursiveIteratorIterator( $directory );

        // Regex for no deprecated twig templates
        $regex = '/^((?!DEPRECATED).)*\.twig$/i';
        $file_iterator = new RegexIterator( $iterator, $regex, RecursiveRegexIterator::GET_MATCH );

        $files = 0;
        $arr_strings = array();

        foreach( $file_iterator as $name => $object ) {
            $files++;

            // Mega regex for Quoted String tokens with escapable quotes
            // http://www.metaltoad.com/blog/regex-quoted-string-escapable-quotes
            $pattern = '/{%\s?trans\s?((?<![\\\\])[\'"])((?:.(?!(?<![\\\\])\1))*.?)\1/';
            $current_file = fopen( $name, 'r' );

            while ( ( $buffer = fgets( $current_file ) ) !== false ) {
                if ( preg_match_all( $pattern, $buffer, $matches ) ) {
                    foreach( $matches[ 2 ] as $match ) {
                        // Escaping quotes not yet escaped
                        $match = preg_replace( '/(?<![\\\\])(\'|")/', "\'", $match );
                        array_push( $arr_strings, "echo _( '$match' );\n" );
                    }
                }
            }

            fclose( $current_file );
        }

        // Remove duplicates
        $arr_strings = array_unique( $arr_strings );
        write_file( $filename, implode( $arr_strings ), 'a' );

        $result = array(
            'templates' => $files,
            'strings' => count( $arr_strings ),
            'output' => $filename,
            'lint' => check_php_file_syntax( $filename )
        );

        return $result;
    }
}

/* End of file OL_Twig.php */
/* Location: ./application/libraries/OL_Twig.php */
