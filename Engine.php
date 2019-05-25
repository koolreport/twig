<?php

namespace koolreport\twig;

trait Engine
{
    public function __constructPlatesPhpEngine()
    {
        if (method_exists($this, "twigInit")) {
            $this->templateEngine = new TwigTemplateEngine($this->twigInit());
        }
    }
}