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

use Gnugat\Medio\Model\Argument;
use PhpSpec\ObjectBehavior;

class MethodSpec extends ObjectBehavior
{
    const NAME = '__construct';

    function let()
    {
        $this->beConstructedWith(self::NAME);
    }

    function it_has_a_collection_of_arguments(Argument $argument)
    {
        $this->allArguments()->shouldBe(array());
        $this->addArgument($argument);
        $this->allArguments()->shouldBe(array($argument));
    }

    function it_has_a_name()
    {
        $this->getName()->shouldBe(self::NAME);
    }

    function it_has_public_visibility_by_default()
    {
        $this->getVisibility()->shouldBe('public');
    }

    function it_can_have_private_visibility()
    {
        $this->makePrivate();
        $this->getVisibility()->shouldBe('private');
    }

    function it_can_have_protected_visibility()
    {
        $this->makeProtected();
        $this->getVisibility()->shouldBe('protected');
    }

    function it_can_have_no_visibility()
    {
        $this->removeVisibility();
        $this->getVisibility()->shouldBe('');
    }

    function it_can_be_changed_back_to_public_visibility()
    {
        $this->makePrivate();
        $this->makePublic();
        $this->getVisibility()->shouldBe('public');
    }

    function it_is_not_static_by_default()
    {
        $this->isStatic()->shouldBe(false);
    }

    function it_can_be_made_static()
    {
        $this->makeStatic();
        $this->isStatic()->shouldBe(true);
    }

    function it_can_be_made_back_to_non_static()
    {
        $this->makeStatic();
        $this->removeStatic();
        $this->isStatic()->shouldBe(false);
    }

    function it_can_have_a_body()
    {
        $body =<<<'EOT'
        $length = strlen('Nobody expects the spanish inquisition');
EOT;
        $this->setBody($body);
        $this->getBody()->shouldBe($body);
    }
}
