<?php

namespace Structural\Bridge\Renderer;

class HtmlRender implements Renderer
{
    public function renderTitle(string $title): string
    {
        return "<h1>" . htmlspecialchars($title) . "</h1>";
    }

    public function renderBody(string $text): string
    {
        return "<p>" . nl2br(htmlspecialchars($text)) . "</p>";
    }

    public function renderFooter(string $footer): string
    {
        return "<footer>" . htmlspecialchars($footer) . "</footer>";
    }

}