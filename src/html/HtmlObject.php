<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.06.18
 * Time: 15:30
 */

namespace html;


abstract class HtmlObject
{
    /**
     * @return $this
     */
    public function getCompositeTag() : HtmlObject
    {
        return null;
    }

    abstract function append(HtmlObject $object);
    abstract function out();
    abstract function getHtmlAsString();
}