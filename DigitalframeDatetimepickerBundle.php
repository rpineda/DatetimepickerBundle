<?php

namespace Digitalframe\DatetimepickerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Digitalframe\DatetimepickerBundle\DependencyInjection\Compiler\FormPass;

class DigitalframeDatetimepickerBundle extends Bundle
{
    
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new FormPass());
    }
}

