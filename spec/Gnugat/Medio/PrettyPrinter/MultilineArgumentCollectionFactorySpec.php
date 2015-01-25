<?php

namespace spec\Gnugat\Medio\PrettyPrinter;

use Gnugat\Medio\Model\Argument;
use Gnugat\Medio\Model\ArgumentCollection;
use Gnugat\Medio\PrettyPrinter\ArgumentPrinter;
use PhpSpec\ObjectBehavior;

class MultilineArgumentCollectionFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new ArgumentPrinter());
    }

    function it_generates_no_arguments()
    {
        $this->dump(new ArgumentCollection())->shouldBe('');
    }

    function it_generates_one_argument()
    {
        $argument = new Argument('array', 'lines');
        $argumentCollection = new ArgumentCollection();
        $argumentCollection->add($argument);

        $this->dump($argumentCollection)->shouldBe(<<<'EOT'
        array $lines

EOT
        );
    }

    function it_generates_many_arguments()
    {
        $argument1 = new Argument('array', 'lines');
        $argument2 = new Argument('string', 'content');
        $argument3 = new Argument('\\StdClass', 'myClass', true);
        $argumentCollection = new ArgumentCollection();
        $argumentCollection->add($argument1);
        $argumentCollection->add($argument2);
        $argumentCollection->add($argument3);

        $this->dump($argumentCollection)->shouldBe(<<<'EOT'
        array $lines,
        $content,
        StdClass $myClass

EOT
);
    }
}
