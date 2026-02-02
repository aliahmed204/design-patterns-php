<?php

namespace Structural\Bridge\Renderer;

class Article extends Document
{
    public function __construct(
        Renderer $renderer,
        private string $title,
        private string $body,
        private string $footer
    ) {
        parent::__construct($renderer);
    }

    public function render(): string {
        return $this->renderer->renderTitle($this->title)
             . $this->renderer->renderBody($this->body)
             . $this->renderer->renderFooter($this->footer);
    }
}