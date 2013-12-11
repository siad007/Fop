<?php

namespace siad007\Fop;

class Fop extends Options
{
    protected $args = array(
        'xml' => '',
        'xsl' => '',
        'pdf' => ''
    );

    public function __construct($args = null)
    {
        if ($args !== null) {
            $this->args = $args;
        }
    }

    public function generatePdf()
    {
        $cmd = sprintf(
            'fop -xml %s -xls %s -pdf %s',
            $this->args['xml'],
            $this->args['xsl'],
            $this->args['pdf']
        );

        exec(escapeshellcmd($cmd));
    }
}
