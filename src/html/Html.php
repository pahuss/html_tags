<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.06.18
 * Time: 17:23
 */

namespace html;


class Html
{
    public static function div(String $textContent = '', $options = [])
    {
        return self::createTag('div', $options, $textContent);
    }

    public static function createTag(String $tagName = 'div', $options = [], String $textContent)
    {
        $tag = new Tag($tagName, $options, $textContent);
        return $tag->getHtmlAsString();
    }
}