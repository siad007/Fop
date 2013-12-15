Fop
===

Wrapper class for using fop with a fluend interface.

[![Build Status](https://travis-ci.org/siad007/Fop.png?branch=master)](https://travis-ci.org/siad007/Fop)[![Coverage Status](https://coveralls.io/repos/siad007/Fop/badge.png?branch=master)](https://coveralls.io/r/siad007/Fop?branch=master)

Example usage:
´´´
use siad007\Fop\Command as Fop;
use siad007\Fop\Arguments as Args;
use siad007\Fop\Options as Opts;

$args = new Args();
$args[] = __DIR__ . '/../data/test.fo';
$args['pdf'] = __DIR__ . '/../output/test.pdf'

$opts = new Opts();
$opts->setQuiet(true);

new Fop($args, $opts);
´´´
