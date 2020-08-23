<?php

namespace Common;

use Spiral\Core\FactoryInterface as SpiralFactoryInterface;
use Yiisoft\Factory\Factory;

/**
 * @todo Remove after fix https://github.com/yiisoft/yii-cycle/issues/50
 */
final class CycleFactory extends Factory implements SpiralFactoryInterface
{

    public function make(string $alias, array $parameters = [])
    {
        return $this->create($alias, $parameters);
    }
}
