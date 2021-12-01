<?php

namespace Framework\View\Engine;
use Framework\View\View;

interface Engine
{
    public function render(View $view): string;
}