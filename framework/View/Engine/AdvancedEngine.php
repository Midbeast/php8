<?php

namespace Framework\View\Engine;
use Framework\View\Engine\HasManager;
use Framework\View\View;
use function view;

class AdvancedEngine implements Engine
{
    use HasManager;
    protected $layouts = [];

    public function render(View $view): string
    {
        $hash = md5($view->path);
        $folder = __DIR__ . '/../../../storage/framework/views';
        $cached = realpath("{$folder}/{$hash}.php");
        if (!file_exists($hash) || filemtime($view->path) >
            filemtime($hash)) {
            $content = $this->compile(file_get_contents($view->path));
            file_put_contents($cached, $content);
        }
        extract($view->data);
        ob_start();
        include($cached);
        $contents = ob_get_contents();
        ob_end_clean();
        if ($layout = $this->layouts[$cached] ?? null) {
            $contentsWithLayout = view($layout, array_merge(
                $view->data,
                ['contents' => $contents],
            ));
            return $contentsWithLayout;
        }
        return $contents;
    }
    protected function compile(string $template): string
    {
        return $template;
    }
    protected function extends(string $template): static
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
        $this->layouts[realpath($backtrace[0]['file'])] = $template;
        return $this;
    }
    public function __call(string $name, $values)
    {
        return $this->manager->useMacro($name, ...$values);
    }
}