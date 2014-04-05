<?php
/**
 * Fop - Wrapper class for using fop with a fluend interface.
 *
 * PHP Version 5.3
 *
 * @copyright Siad Ardroumli
 * @author siad.ardroumli@gmail.com
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link https://github.com/siad007/Fop
 */

namespace siad007\Fop;

/**
 * FOP Command Facade.
 */
class Command
{
    /**
     * FOP CLI Arguments.
     *
     * @var Arguments
     */
    protected $args = null;

    /**
     * FOP CLI Options.
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

    /**
     * Generates the PDF.
     *
     * @return void
     */
    public function generatePdf()
    {
        exec(escapeshellcmd((string) $this));
    }

    /**
     * Get Arguments.
     *
     * @return Arguments
     */
    public function getArguments()
    {
        return $this->args;
    }

    /**
     * Set Arguments.
     *
     * @param Arguments $args
     *
     * @return Command
     */
    public function setArguments(Arguments $args)
    {
        $this->args = $args;

        return $this;
    }

    /**
     * Get Options.
     *
     * @return Options
     */
    public function getOptions()
    {
        return $this->opts;
    }

    /**
     * Set Options.
     *
     * @param Options $opts
     *
     * @return Command
     */
    public function setOptions(Options $opts)
    {
        $this->opts = $opts;

        return $this;
    }

    /**
     * String representation of the FOP cli command.
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function __toString()
    {
        if ($this->args->hasArgumentFo()) {
            $cmd = sprintf('fop %s -fo %s -pdf %s', (string) $this->opts, $this->args['fo'], $this->args['pdf']);
        } elseif ($this->args->hasXmlInputFiles()) {
            $xml = $this->args['xml'];
            $xsl = $this->args['xsl'];
            $pdf = $this->args['pdf'];
            $cmd = sprintf('fop %s -xml %s -xls %s -pdf %s', (string) $this->opts, $xml, $xsl, $pdf);
        } else {
            throw new \InvalidArgumentException('Please specify a fo file or xml/xsl files.');
        }

        return $cmd;
    }
}
