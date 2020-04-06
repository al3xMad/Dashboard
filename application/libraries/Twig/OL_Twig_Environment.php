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

/**
 * OL Twig Environment Class
 *
 * @package       CodeIgniter
 * @subpackage    Libraries
 * @category      Twig
 * @author        EtnasSoft
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
