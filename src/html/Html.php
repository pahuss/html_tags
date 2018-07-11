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
    public static function div( $options = [], $inner = [])
    {
        return self::createTag('div', $options, $inner);
    }

    public static function span( $options = [], $inner = [])
    {
        return self::createTag('span', $options, $inner);
    }

    public static function createTag($tagName = 'div', $options = [], $inner = [])
    {
        return new Tag($tagName, $options, $inner);
    }

    public static function createSingleTag($tagName = 'input', $options = [], $value=null)
    {
        if (! is_null($value)) {
            $options = array_merge(['value' => $value], $options);
        }
        return new SingleTag($tagName, $options);
    }

    public static function link($url, $text, $options) {
        $options = array_merge(['href' => $url], $options);
        return self::createTag('a', $options, $text);
    }

    public static function inputText($value, $options) {
        $options = array_merge(['type' => 'text'], $options);
        return self::createSingleTag('input', $options, $value);
    }

    public static function inputCheckbox($name, $value, $options) {

    }

    public static function inputSelect($name, $items, $options) {

    }
}