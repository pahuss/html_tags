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
     * Var inner must contain strings or HtmlObject instance items only
     *
     * @var array $inner
     */
    protected $inner = [];

    /** @var array options */
    protected $options = [];

    /** @var  String out */
    protected $out = '';

    /** @var  string tagName */
    protected $tagName;

    /**
     * @return $this
     */
    public function getCompositeTag() : HtmlObject
    {
        return null;
    }

    protected function getOptions()
    {
        $options = '';
        foreach ($this->options as $option => $value) {
            $options .= " {$option}=\"$value\"";
        }
        return $options;
    }

    abstract function append(HtmlObject $object);
    abstract function setInner($inner);
    abstract function parseInner();
    abstract function out();
    abstract function getHtmlAsString();
}