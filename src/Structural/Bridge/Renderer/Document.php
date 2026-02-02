<?php

namespace Structural\Bridge\Renderer;

abstract class Document
{
    public function __construct
    (
        protected Renderer $renderer
    ) {}

    abstract public function render(): string;
}