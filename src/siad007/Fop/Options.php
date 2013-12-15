<?php

namespace siad007\Fop;

class Options
{
    protected $verbose = false;

    protected $quiet = false;

    public function isVerbose()
    {
        return $this->verbose;
    }

    public function setVerbose($verbose)
    {
        $this->verbose = $verbose;

        return $this;
    }

    public function isQuiet()
    {
        return $this->quiet;
    }

    public function setQuiet($quiet)
    {
        $this->verbose = $quiet;

        return $this;
    }
}
