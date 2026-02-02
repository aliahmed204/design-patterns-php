<?php

namespace Tests\Unit\Bridge\Renderer;

use PHPUnit\Framework\TestCase;
use Structural\Bridge\Renderer\Article;
use Structural\Bridge\Renderer\HtmlRender;
use Structural\Bridge\Renderer\TextRender;

class RendererBridgeTest extends TestCase
{
    public function test_HTMLRednderer_output(): void
    {
        $article = new Article(
            new HtmlRender(),
            "Test Title",
            "Body text",
            "Footer text"
        );

        $output = $article->render();
        $this->assertStringContainsString("<h1>Test Title</h1>", $output);
        $this->assertStringContainsString("<p>Body text</p>", $output);
        $this->assertStringContainsString("<footer>Footer text</footer>", $output);
    }

    public function test_textRenderer_output() {
        $article = new Article(
            new TextRender(),
            "Test Title",
            "Body text",
            "Footer text"
        );

        $output = $article->render();
        $this->assertStringContainsString("TEST TITLE", $output);
        $this->assertStringContainsString("Body text", $output);
        $this->assertStringContainsString("--- Footer text ---", $output);
    }

    public function test_empty_strings_handled() {
        $article = new Article(
            new TextRender(),
            "",
            "",
            ""
        );

        $output = $article->render();
        $this->assertNotEmpty($output, "Renderer should still produce output even if empty strings are passed.");
    }
}