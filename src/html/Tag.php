<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 30.06.18
 * Time: 16:05
 */

namespace html;


class Tag extends HtmlObject
{
    /** @var array objects */
    private $objects = [];

    /** @var  string tagName */
    protected $tagName;

    /** @var string innerText */
    protected $innerText = '';

    /** @var array options */
    protected $options = [];

    /** @var  String out */
    protected $out;


    /**
     * Tag constructor.
     * @param String $tagName
     * @param array $options
     */
    public function __construct(String $tagName = 'div', $options = [], String $innertext = '')
    {
        $this->tagName = $tagName;
        $this->options = $options;
        $this->innerText = $innertext;
    }

    /**
     * @param $innerText
     */
    public function setInnerText($innerText) : void
    {
        $this->innerText = $innerText;
    }

    /**
     * @return $this
     */
    public function getCompositeTag() : HtmlObject
    {
        return $this;
    }

    /**
     * @param HtmlObject $object
     */
    public function append(HtmlObject $object) : void
    {
        $this->objects[] = $object;
    }

    public function out()
    {
        $this->open();
        foreach ($this->objects as $object) {
            $object->out();
        }
        $this->close();
    }

    /**
     * @return string
     */
    protected function getOpenTag()
    {
        $options = '';
        foreach ($this->options as $option => $value) {
            $options .= " \"{$option}\"=\"$value\"";
        }
        return "<{$this->tagName}{$options}>";
    }

    /**
     * @return string
     */
    protected function getCloseTag()
    {
        return "</{$this->tagName}>";
    }

    /**
     *
     */
    public function open()
    {
        echo $this->getOpenTag();
    }

    /**
     *
     */
    public function close()
    {
        echo $this->getCloseTag();
    }

    public function getHtmlAsString()
    {
        $this->out = $this->getOpenTag() . $this->innerText;
        foreach ($this->objects as $object) {
            $this->out .= $object->getHtmlAsString();
        }
        $this->out .= $this->getCloseTag();
        return $this->out;
    }

}