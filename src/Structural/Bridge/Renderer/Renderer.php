<?php

namespace Structural\Bridge\Renderer;

interface Renderer
{
    public function renderTitle(string $title): string;
    public function renderBody(string $text): string;
    public function renderFooter(string $footer): string;
}