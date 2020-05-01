<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );


class OL_Loader extends CI_Loader {
    /**
     * Class Construct
     */
    function __construct () {
        parent::__construct();
    }

    // --------------------------------------------------------------------

    /**
     * Database Loader
     * Database must be overwrite in order to extending database drivers (MySQLi)
     *
     * @access  public
     * @param   string  $params         The DB credentials
     * @param   boolean $return         Whether to return the DB object
     * @param   boolean $active_record  whether to enable active record (this allows us to override the config setting)
     * @return  object
     */
    function database ( $params = '', $return = false, $active_record = null ) {
        // Grab the super object
        $CI =& get_instance();

        // Do we even need to load the database class?
        if ( class_exists( 'CI_DB' ) AND $return == false AND $active_record == null AND isset( $CI->db ) AND is_object( $CI->db ) ) {
            return false;
        }

        require_once( BASEPATH . 'database/DB.php' );

        // Load the DB class
        $db =& DB( $params, $active_record );

        $driver = config_item( 'subclass_prefix' ) . 'DB_' . $db->dbdriver . '_driver';
        $driver_file = APPPATH . 'core/' . $driver . '.php';

        if ( file_exists( $driver_file ) ) {
            require_once( $driver_file );
            $db = new $driver( get_object_vars( $db ) );
        }

        if ( $return === true ) {
            return $db;
        }

        // Initialize the db variable.  Needed to prevent
        // reference errors with some configurations
        $CI->db = '';
        $CI->db = $db;

        return true;
    }

    // --------------------------------------------------------------------

    /**
     * View
     * In order to offer Twig support, the view method checks if exists a .twig
     * file for the current view.
     *
     * @param  string   $view
     * @param  mixed    $vars
     * @param  boolean  $return
     * @return object
     */
    function view ( $view, $vars = array(), $return = false ) {
        // Grab the super object
        $CI =& get_instance();

        // Checks if $view exists as twig file
        if ( $this->exists_twig_template_for_the_view( $view ) ) {
            $output = ( $return )
                // Return the render object, but no display it.
                ? $CI->ol_twig->render( $view . config_item( 'twig_extension' ), $vars )
                // Return and display the rendered display.
                : $CI->ol_twig->display( $view . config_item( 'twig_extension' ), $vars );

            return $output;
        }

        // If not, we return the CI object as normal.
        return $this->_ci_load( array( '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array( $vars ), '_ci_return' => $return ) );
    }

    // --------------------------------------------------------------------

    /**
     * Exists twig template for the view
     *
     * @param   string  $view
     * @return  boolean
     */
    private function exists_twig_template_for_the_view ( $view ) {
        $twigFile = APPPATH . 'views/' . $view . config_item( 'twig_extension' );

        return file_exists( $twigFile );
    }
}

/* End of file OL_Loader.php */
/* Location: ./application/core/OL_Loader.php */
