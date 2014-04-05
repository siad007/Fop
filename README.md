Fop
===

Wrapper class for using fop with a fluend interface.

[![Build Status](https://travis-ci.org/siad007/Fop.png?branch=master)](https://travis-ci.org/siad007/Fop)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/siad007/Fop/badges/quality-score.png?s=58fad0e4e15cab2bda4e29d0d7c166f26d33f4c0)](https://scrutinizer-ci.com/g/siad007/Fop/)[![Code Coverage](https://scrutinizer-ci.com/g/siad007/Fop/badges/coverage.png?s=e80a7752ea39d75e0546103cfc5396f8d0f3b0dd)](https://scrutinizer-ci.com/g/siad007/Fop/)

Example usage:
```
use siad007\Fop\Command as Fop;
use siad007\Fop\Arguments as Args;
use siad007\Fop\Options as Opts;

$args = new Args();
$args['fo']  = __DIR__ . '/../data/test.fo';
$args['pdf'] = __DIR__ . '/../output/test.pdf'

$opts = new Opts();
$opts->setQuiet(true);

$fop = new Fop($args, $opts);
$fop->generatePdf();
```
