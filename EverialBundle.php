<?php


namespace Kiora\EverialBundle;


use Kiora\EverialBundle\DependencyInjection\EveriralExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EverialBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new EveriralExtension();
    }
}