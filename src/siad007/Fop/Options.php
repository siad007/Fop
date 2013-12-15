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
 * Options representation of a FOP command.
 *
 * @author siad.ardroumli <siad.ardroumli@idealo.de>
 */
class Options
{
    /**
     * Verbose.
     *
     * @var boolean
     */
    protected $verbose = false;

    /**
     * Quiet.
     *
     * @var boolean
     */
    protected $quiet = false;

    /**
     * Stringify command options.
     *
     * @return string
     */
    public function __toString()
    {
        $optString = '';

        if ($this->verbose) {
            $optString .= '-v ';
        }

        if ($this->quiet) {
            $optString .= '-q ';
        }

        $optString = rtrim($optString, ' ');

        return $optString;
    }

    /**
     * Verbose enabled?
     *
     * @return boolean
     */
    public function isVerbose()
    {
        return $this->verbose;
    }

    /**
     * Set verbosity.
     *
     * @param boolean $verbose
     *
     * @return \siad007\Fop\Options
     */
    public function setVerbose($verbose)
    {
        $this->verbose = (boolean) $verbose;

        return $this;
    }

    /**
     * Quiet enabled?
     *
     * @return boolean
     */
    public function isQuiet()
    {
        return $this->quiet;
    }

    /**
     * Set quiet mode.
     *
     * @param boolean $quiet
     *
     * @return \siad007\Fop\Options
     */
    public function setQuiet($quiet)
    {
        $this->quiet = (boolean) $quiet;

        return $this;
    }
}
