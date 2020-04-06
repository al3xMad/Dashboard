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
 * OpenLibra File Helper
 *
 * @package     OpenLibra
 * @subpackage  Helper
 * @category    Files
 * @author      EtnasSoft <info@etnassoft.com>
 */

// --------------------------------------------------------------------

/**
 * Create dir if not exists
 * Creates a directory in the filesystem if not exists. The new directory is
 * created with 0777 permissions
 *
 * @param   string  $path           The path for the directory
 * @param   boolean $get_real_path  A flag for get the real path for the directory
 * @return  boolean|void            Return false if missing data
 */
function create_dir_if_not_exists ( $path = null, $get_real_path = false ) {
    // Quick exit if missing data
    if ( empty( $path ) ) {
        return false;
    }

    $path = ( $get_real_path )
        ? realpath( $path )
        : str_replace( '/', '\\', $path );

    if ( ! is_dir( $path ) ) {
        $old = umask( 0 );
        mkdir( $path, 0777 );
        umask( $old );
    }

    return null;
}

// --------------------------------------------------------------------

/**
 * Get file name
 * Returns the filename without extension for a given path (basename)
 *
 * Ej:
 * $test = 'a/very/long/path/my_file.txt';
 * echo get_file_name( $test ); // my_file
 *
 * @param   string      $file       The path where is a file
 * @return  string|bool             The filename without extension (basename). False if missing data
 */
function get_file_name ( $file ) {
    $info = pathinfo( $file );

    // Quick exit if missing data
    if ( ! isset( $info[ 'extension' ] ) ) {
        return false;
    }

    return basename( $file, '.' . $info[ 'extension' ] );
}

// --------------------------------------------------------------------

/**
 * Delete file regex based
 * Deletes all files in a given path that matched with a given regex
 *
 * @param   string      $path   File path
 * @param   string      $regex  Regex
 * @return  bool|void           False if missing data. Void instead
 */
function delete_file_regex_based ( $path = null, $regex = null ) {
    if ( empty( $path ) || empty( $regex ) ) {
        return false;
    }
    // Trim the trailing slash
    $path = rtrim( $path, '/\\' );

    foreach ( glob( $path . DIRECTORY_SEPARATOR . $regex ) as $filename ) {
        @unlink( $filename );
    }

    return null;
}

// --------------------------------------------------------------------

/**
 * Get Image Extension
 * Gets an image URL and retrieve its extension.
 * Useful with gravatars
 *
 * @param   string          $path   The image path
 * @return  string|boolean          The image extension
 */
function get_image_extension ( $path = null ) {
    if ( empty( $path ) ) {
        return false;
    }

    $image_info = getimagesize( $path );

    switch ( $image_info[ 'mime' ] ) {
        case 'image/gif'    : $extension = '.gif';  break;
        case 'image/jpeg'   : $extension = '.jpg';  break;
        case 'image/png'    : $extension = '.png';  break;

        // Asuming that any unknown mime will be parsed as jpg by browsers...
        default             : $extension = '.jpg';  break;
    }

    return $extension;
}

// --------------------------------------------------------------------

/**
 * Check PHP file syntax
 * Check the PHP syntax of a given file
 * Taken from:
 * http://php.net/manual/en/function.php-check-syntax.php#80878
 *
 * NOTE: This function replaces the native php_check_syntax,
 * deprecated and removed from PHP.
 *
 * @param   string  $file       The file path
 * @return  mixed               TRUE if file is valid. A self-explanatory error string instead.
 */
function check_php_file_syntax ( $file ) {
    // If it is not a file or we can't read it throw an exception
    if ( ! is_file( $file ) || ! is_readable( $file ) ) {
        return 'Cannot read file ' . $file;
    }

    // Sort out the formatting of the file
    $file = realpath( $file );

    // Get the shell output from the syntax check command
    $output = shell_exec( 'php -l "' . $file . '"' );

    // Try to find the parse error text and chop it off
    $syntaxError = preg_replace( '/Errors parsing.*$/', '', $output, -1, $count );

    // If the error text above was matched, throw an exception containing the syntax error
    if ( $count > 0 ) {
        return $syntaxError;
    }

    return true;
}

// --------------------------------------------------------------------

/**
 * Write GZ File
 *
 * Writes data to the GZ file specified in the path.
 * Creates a new GZ file if non-existent.
 *
 * @param   string      $path       The file path
 * @param   string      $data       Data to write
 * @param   string      $mode       gzopen() mode (default: 'wb') and GZIP compression level (default: 9)
 * @return  bool
 */
function write_gz_file ( $path, $data, $mode = 'wb9' ) {
    if ( ! $fp = @gzopen( $path, $mode ) ) {
        return false;
    }

    for ( $result = $written = 0, $length = strlen( $data ); $written < $length; $written += $result ) {
        if ( ( $result = gzwrite( $fp, substr( $data, $written ) ) ) === false ) {
            break;
        }
    }

    gzclose( $fp );

    return is_int( $result );
}

// --------------------------------------------------------------------

/**
 * Delete Cache Files
 * Deletes TWIG and database (SQL) cache files
 *
 * @param   string      $type       Optional: the type of cache to delete (html or sql)
 *                                  If empty, both are deleted.
 * @return  void
 */
function delete_cache_files ( $type = null ) {
    $CI =& get_instance();
    $CI->load->helper( 'file' );

    // Removing TWIG files
    if ( empty( $type ) || $type === 'html' ) {
        delete_files( config_item( 'twig_cache_dir' ), true, true );
    }

    // Removing database cache files
    if ( empty( $type ) || $type === 'sql' ) {
        // Native cache_delete_all() doesn't work with CLI (bad routes)
        // We use the delete_files helper function instead.
        delete_files( $CI->db->cachedir, true, true );
    }
}

// --------------------------------------------------------------------

function curl_download ( $url = null ) {
    // is cURL installed yet?
    if ( ! function_exists( 'curl_init' ) || empty( $url ) ) {
        return false;
    }

    $ch = curl_init();

    // Set URL to download
    curl_setopt( $ch, CURLOPT_URL, $url );

    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    // Timeout in seconds
    curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );

    // Download the given URL, and return output
    $output = curl_exec( $ch );

    // Close the cURL resource, and free system resources
    curl_close( $ch );

    return $output;
}

/* End of file ol_file_helper.php */
/* Location: ./application/helpers/ol_file_helper.php */
