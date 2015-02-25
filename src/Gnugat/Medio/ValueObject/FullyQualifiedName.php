<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\ValueObject;

/**
 * @api
 */
class FullyQualifiedName
{
    /**
     * @var string
     */
    private $fullyQualifiedName;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $namepace;

    /**
     * @param string $fullyQualifiedName
     *
     * @api
     */
    public function __construct($fullyQualifiedName)
    {
        $namespaces = explode('\\', $fullyQualifiedName);

        $this->name = array_pop($namespaces);
        $this->namepace = implode('\\', $namespaces);
        if ('\\' !== substr($fullyQualifiedName, 0, 1)) {
            $fullyQualifiedName = '\\'.$fullyQualifiedName;
        }
        $this->fullyQualifiedName = $fullyQualifiedName;
    }

    /**
     * @param string $fullyQualifiedName
     *
     * @return FullyQualifiedName
     *
     * @api
     */
    public static function make($fullyQualifiedName)
    {
        return new self($fullyQualifiedName);
    }

    /**
     * @return string
     */
    public function getFullyQualifiedName()
    {
        return $this->fullyQualifiedName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namepace;
    }
}
