<?php
namespace koolreport\twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Widget extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('widget', [$this, 'loadWidget']),
        ];
    }

    public function loadWidget($name,$params,$report)
    {
        return \koolreport\core\Utility::getClassName($report);//$name::create($params);
    }
}