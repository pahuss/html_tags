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
    /**
     * Tag constructor.
     * @param String $tagName
     * @param array $options
     */
    public function __construct( $tagName = 'div', $options = [], $inner = [])
    {
        $this->tagName = $tagName;
        $this->options = $options;
        $this->inner = $inner;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->parseInner()) {
            return $this->getOpenTag() . $this->out . $this->getCloseTag();
        } else
            return "";
    }

    /**
     * @return bool
     */
    public function parseInner()
    {
        if (! empty($this->inner)) {
            $this->inner = (array)$this->inner;
            foreach ($this->inner as $innerItem) {
                if (is_string($innerItem)) {
                    $this->out .= $innerItem;
                } else if ($innerItem instanceof HtmlObject) {
                    $this->out .= $innerItem->__toString();
                }
            }
            return true;
        } else
            return false;
    }

    /**
     * @param $innerText
     */
    public function setInner($inner) : void
    {
        if (! is_null($this->getCompositeTag())) {
            $this->inner = array_merge($this->inner, $inner);
        }
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
        if (! is_null($this->getCompositeTag())) {
            $this->inner[] = $object;
        }
    }

    public function out()
    {

    }

    /**
     * @return string
     */
    protected function getOpenTag()
    {
        return "<{$this->tagName}{$this->getOptions()}>";
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