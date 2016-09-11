<?php
/**********************************************************************************************************************
 *  Utils: A collection of useful PHP functions, mini classes and snippets that you need or could use every day.      *
 *                                                                                                                    *
 * @link      https://github.com/layershifter/utils                                                                  *
 *                                                                                                                    *
 * @copyright Copyright (c) 2016, Alexander Fedyashov                                                                *
 * @license   https://raw.githubusercontent.com/layershifter/utils/master/LICENSE Apache 2.0 License                 *
 **********************************************************************************************************************/

namespace LayerShifter\Utils;

/**
 * Helper class for work with PHP DOM.
 */
class DOM
{

    /**
     * Checks that node is a DOMComment.
     *
     * @param \DOMNode $node
     *
     * @return bool
     */
    public static function isComment(\DOMNode $node)
    {
        return $node->nodeType === XML_COMMENT_NODE;
    }

    /**
     * Checks that node is a DOMDocument.
     *
     * @param \DOMNode $node
     *
     * @return bool
     */
    public static function isDocument(\DOMNode $node)
    {
        return $node->nodeType === XML_DOCUMENT_NODE;
    }

    /**
     * Checks that node is a DOMElement.
     *
     * @param \DOMNode $node
     *
     * @return bool
     */
    public static function isElement(\DOMNode $node)
    {
        return $node->nodeType === XML_ELEMENT_NODE;
    }

    /**
     * Checks that node is a DOMText.
     *
     * @param \DOMNode $node
     *
     * @return bool
     */
    public static function isText(\DOMNode $node)
    {
        return $node->nodeType === XML_TEXT_NODE;
    }
}
