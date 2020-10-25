<?php

namespace Kiora\EverialBundle;

use Kiora\EverialBundle\DependencyInjection\KioraEverialExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EverialBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new KioraEverialExtension();
    }
}
