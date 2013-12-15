<?php

namespace siad007\Fop;

class Arguments implements \ArrayAccess
{

    protected $arguments = array(
        'fo' => '',
        'xml' => '',
        'xsl' => '',
        'pdf' => 'document.pdf'
    );

    /**
     *
     * @return boolean
     */
    public function hasArgumentFo()
    {
        return ! empty($this['fo']);
    }

    /**
     *
     * @return boolean
     */
    public function hasXmlInputFiles()
    {
        return ! empty($this['xml']) && ! empty($this['xsl']);
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->arguments[] = $value;
        } else {
            $this->arguments[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->arguments[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->arguments[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->arguments[$offset]) ? $this->arguments[$offset] : null;
    }
}
