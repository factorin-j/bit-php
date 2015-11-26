<?php

/**
 * Class View
 */
class View
{
    const PATH = 'app/views';
    const EXTENSION = 'php';

    /** @var string $template */
    protected $template;

    /** @var array $variables */
    protected $variables = array();

    /**
     * Class constructor
     * @param $template
     * @param array $variables
     */
    protected function __construct($template, $variables = array())
    {
        $this->template = sprintf('%s/%s/%s.%s', __ROOT__, static::PATH, $template, static::EXTENSION);
        $this->variables = $variables;
    }

    /**
     * Render view template
     * @param $template
     * @param array $variables
     * @return View
     */
    public static function render($template, $variables = array())
    {
        return new self($template, $variables);
    }

    /**
     * Build response
     * @return string
     * @throws Exception
     */
    public function build()
    {
        if (!file_exists($this->template)) {
            throw new Exception(sprintf('View file %s not found', $this->template));
        }

        extract($this->variables, EXTR_SKIP);
        ob_start();
        ob_implicit_flush(0);

        /** @noinspection PhpIncludeInspection */
        include_once($this->template);

        return ob_get_clean();
    }
}
