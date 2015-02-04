<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Medio\Model;

use Gnugat\Medio\Model\Method;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileSpec extends ObjectBehavior
{
    const FILENAME = '/tmp/medio/Gnugat/Medio/MyClass.php';
    const CLASSNAME = 'MyClass';

    function let()
    {
        $this->beConstructedWith(self::FILENAME);
    }

    function it_has_a_filename()
    {
        $this->getFilename()->shouldBe(self::FILENAME);
    }

    function it_has_a_classname()
    {
        $this->getClassname()->shouldBe(self::CLASSNAME);
    }

    function it_has_a_collection_of_methods(Method $method)
    {
        $methodCollection = $this->getMethodCollection();

        $methodCollection->all()->shouldHaveCount(0);
        $this->addMethod($method);
        $methodCollection->all()->shouldHaveCount(1);
    }
}
