<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\TwigExtension\Line;

interface LineStrategy
{
    /**
     * @param mixed $model
     *
     * @return bool
     */
    public function supports($model);

    /**
     * @param mixed  $model
     * @param string $block
     *
     * @throws \Gnugat\Medio\Exception\InvalidArgumentException If the block isn't supported
     */
    public function needsLineAfter($model, $block);
}
