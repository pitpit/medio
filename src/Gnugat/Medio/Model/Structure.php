<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\Model;

/**
 * An abstract type which defines behavior using methods.
 *
 * @api
 */
interface Structure
{
    /**
     * @return string
     */
    public function getFullyQualifiedName();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getNamespace();
}
