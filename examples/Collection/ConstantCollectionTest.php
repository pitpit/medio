<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\Examples\Collection;

use Gnugat\Medio\Examples\PrettyPrinterTestCase;
use Gnugat\Medio\Model\Constant;

class ConstantCollectionTest extends PrettyPrinterTestCase
{
    public function testZeroConstants()
    {
        $constants = array();

        $generatedCode = $this->prettyPrinter->generateCode($constants);

        $this->assertSame('', $generatedCode);
    }

    public function testOneConstant()
    {
        $constants = array(
            new Constant('MY_CONSTANT', '0'),
        );

        $generatedCode = $this->prettyPrinter->generateCode($constants);

        $this->assertExpectedCode($generatedCode);
    }

    public function testThreeConstants()
    {
        $constants = array(
            new Constant('FIRST_CONSTANT', '0'),
            new Constant('SECOND_CONSTANT', '1'),
            new Constant('THIRD_CONSTANT', '2'),
        );

        $generatedCode = $this->prettyPrinter->generateCode($constants);

        $this->assertExpectedCode($generatedCode);
    }
}
