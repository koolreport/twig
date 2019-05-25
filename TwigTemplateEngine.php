<?php
namespace koolreport\twig;

class TwigTemplateEngine implements \koolreport\core\ITemplateEngine
{
    protected $twig;
    public function __construct($twig)
    {
        $this->twig = $twig;
        $widget = new Widget();
        $twig->addExtension($widget);
    }

    public function render($view, $params)
    {
        return $this->twig->render($view, $params);
    }
}