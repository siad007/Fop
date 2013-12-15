<?php

namespace siad007\Fop;

class Fop extends Options
{
    /**
     * @var array
     */
    protected $args = array(
        'fo'  => '',
        'xml' => '',
        'xsl' => '',
        'pdf' => 'document.pdf'
    );

    /**
     * @param string $args
     */
    public function __construct($args = null)
    {
        if ($args !== null) {
            $this->args = $args;
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function generatePdf()
    {
        if ($this->hasArgumentFo()) {
            $cmd = sprintf(
                'fop -fo %s -pdf %s',
                $this->args['fo'],
                $this->args['pdf']
            );
        } elseif ($this->hasXmlInputFiles()) {
            $cmd = sprintf(
                'fop -xml %s -xls %s -pdf %s',
                $this->args['xml'],
                $this->args['xsl'],
                $this->args['pdf']
            );
        } else {
            throw new \InvalidArgumentException(
                'Please specify a fo file or xml/xsl files.'
            );
        }

        exec(escapeshellcmd($cmd));
    }

    /**
     * @return boolean
     */
    protected function hasArgumentFo()
    {
        return !empty($this->args['fo']);
    }

    /**
     * @return boolean
     */
    protected function hasXmlInputFiles()
    {
        return !empty($this->args['xml']) && !empty($this->args['xsl']);
    }
}
