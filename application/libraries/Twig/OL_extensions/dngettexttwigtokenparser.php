<?php

/**
 *  Gettext-Twig
 *  Gettext support for Twig template system.
 */

/**
 *  Twig token parser for plural version of gettext overriding the current domain.
 *
 * @package    gettext_twig
 * @author     Alfonso Ruzafa <superruzafa@gmail.com>
 * @version    SVN: $Id$
 */
class DNGettextTwigTokenParser extends Twig_TokenParser {
    public function parse ( Twig_Token $token ) {
        $lineno = $token->getLine();

        $this->parser->getStream()->expect( Twig_Token::OPERATOR_TYPE, "(" );
        $domain = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect( Twig_Token::OPERATOR_TYPE, "," );
        $msgid1 = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect( Twig_Token::OPERATOR_TYPE, "," );
        $msgid2 = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect( Twig_Token::OPERATOR_TYPE, "," );
        $count = $this->parser->getExpressionParser()->parseExpression();
        $this->parser->getStream()->expect( Twig_Token::OPERATOR_TYPE, ")" );

        $parameters = array();
        while ( !$nodeType = $this->parser->getStream()->test( Twig_Token::BLOCK_END_TYPE ) ) {
            $parameters [ ] = $this->parser->getExpressionParser()->parseExpression();
        }

        $this->parser->getStream()->expect( Twig_Token::BLOCK_END_TYPE );

        return new DNGettextTwigNode( $domain, $msgid1, $msgid2, $count, $parameters, $lineno, $this->getTag() );
    }

    public function getTag () {
        return "dngettext";
    }
}

?>
