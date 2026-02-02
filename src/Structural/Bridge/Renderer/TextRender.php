<?php

namespace Structural\Bridge\Renderer;

class TextRender implements Renderer {
    public function renderTitle(string $title): string 
    {
        return strtoupper($title) . "\n";
    }

    public function renderBody(string $text): string 
    {
        return $text . "\n";
    }

    public function renderFooter(string $footer): string 
    {
        return "--- " . $footer . " ---\n";
    }
}