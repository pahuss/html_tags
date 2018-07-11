<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 07.07.18
 * Time: 15:09
 */

namespace html;


class SingleTag extends HtmlObject
{
    /**
     * Tag constructor.
     * @param String $tagName
     * @param array $options
     */
    public function __construct( $tagName = 'input', $options = [])
    {
        $this->tagName = $tagName;
        $this->options = $options;
    }

    function append(HtmlObject $object) {

    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "<{$this->tagName} {$this->getOptions()}>";
    }

    function parseInner() {
        return null;
    }

    function out() {}

    function getHtmlAsString() {}

    function setInner($inner) {}
}