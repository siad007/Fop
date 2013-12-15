<?php

namespace siad007\Fop;

class Arguments
{
    protected $arguments = array(
        'fo'  => '',
        'xml' => '',
        'xsl' => '',
        'pdf' => 'document.pdf'
    );

    /**
     * @return boolean
     */
    public function hasArgumentFo()
    {
        return !empty($this->args['fo']);
    }

    /**
     * @return boolean
     */
    public function hasXmlInputFiles()
    {
        return !empty($this->args['xml']) && !empty($this->args['xsl']);
    }
}
