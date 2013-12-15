<?php
/**
 * Fop - Wrapper class for using fop with a fluend interface.
 *
 * PHP Version 5.3
 *
 * @copyright Siad Ardroumli
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link https://github.com/siad007/Fop
 */

namespace siad007\Fop;

/**
 * Argument representation of a FOP command.
 *
 * @author siad.ardroumli <siad.ardroumli@idealo.de>
 */
class Arguments implements \ArrayAccess
{
    /**
     * Arguments.
     *
     * @var array
     */
    protected $arguments = array(
        'fo' => '',
        'xml' => '',
        'xsl' => '',
        'pdf' => 'document.pdf'
    );

    /**
     * Is argument fo set?
     *
     * @return boolean
     */
    public function hasArgumentFo()
    {
        return ! empty($this['fo']);
    }

    /**
     * Is xml/xsl file set?
     *
     * @return boolean
     */
    public function hasXmlInputFiles()
    {
        return ! empty($this['xml']) && ! empty($this['xsl']);
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->arguments[] = $value;
        } else {
            $this->arguments[$offset] = $value;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function offsetExists($offset)
    {
        return isset($this->arguments[$offset]);
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function offsetUnset($offset)
    {
        unset($this->arguments[$offset]);
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function offsetGet($offset)
    {
        return isset($this->arguments[$offset]) ? $this->arguments[$offset] : null;
    }
}
