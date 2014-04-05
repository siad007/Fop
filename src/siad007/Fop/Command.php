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

class Command
{
    /**
     *
     * @var Arguments
     */
    protected $args = null;

    /**
     *
     * @var Options
     */
    protected $opts = null;

    /**
     * Standard constructor.
     *
     * @param Arguments $args
     * @param Options $opts
     *            optional: default null
     */
    public function __construct(Arguments $args, Options $opts = null)
    {
        if ($this->args === null) {
            $this->args = $args;
        }

        if ($opts !== null) {
            $this->opts = $opts;
        }
    }

    public function generatePdf()
    {
        exec(escapeshellcmd((string) $this));
    }

    public function getArguments()
    {
        return $this->args;
    }

    public function setArguments(Arguments $args)
    {
        $this->args = $args;

        return $this;
    }

    public function getOptions()
    {
        return $this->opts;
    }

    public function setOptions(Options $opts)
    {
        $this->opts = $opts;

        return $this;
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function __toString()
    {
        if ($this->args->hasArgumentFo()) {
            $cmd = sprintf(
                'fop %s -fo %s -pdf %s',
                (string) $this->opts,
                $this->args['fo'],
                $this->args['pdf']
            );
        } elseif ($this->args->hasXmlInputFiles()) {
            $cmd = sprintf(
                'fop %s -xml %s -xls %s -pdf %s',
                (string) $this->opts,
                $this->args['xml'],
                $this->args['xsl'],
                $this->args['pdf']
            );
        } else {
            throw new \InvalidArgumentException(
                'Please specify a fo file or xml/xsl files.'
            );
        }

        return $cmd;
    }
}
