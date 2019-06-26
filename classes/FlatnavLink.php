<?php

namespace local_navigation_customizer;

class FlatnavLink
{
    private $label;
    private $url;
    private $icon;
    private $position;

    private $valid = true;

    private $tokens;

    public function __construct($line_array)
    {
        global $COURSE, $USER;

        $this->tokens = [
            'COURSEID' => $COURSE->id,
        ];

        $this->parseLineArray($line_array);
    }

    public function parseLineArray($line_array)
    {
        $this->label = count($line_array) > 0 ? $this->validateLabel($line_array[0]) : null;
        $this->url   = count($line_array) > 1 ? $this->validateURL($line_array[1]) : null;

        if(!is_string($this->label) || !is_string($this->url)) {
            $this->valid = false;
            return;
        }

        $this->label = $this->applyTokens($this->label);
        $this->url   = $this->applyTokens($this->url);

        if (count($line_array) > 2) {
            $icon_array     = $this->parseIcon($line_array[2]);
            $icon_id        = $this->validateIconID($icon_array['id']);
            $icon_namespace = $this->validateIconNamespace($icon_array['namespace']);

            $this->icon = new \pix_icon($icon_id, '', $icon_namespace);
        }

        $this->position = count($line_array) > 3 ? $this->validatePosition($line_array[3]) : null;
    }

    public function isValid(): bool
    {
        return (bool)$this->valid;
    }

    public function applyTokens($string)
    {
        $applied = $string;

        foreach($this->tokens as $token => $value) {
            $applied = preg_replace('/\{' . $token . '\}/', $value, $applied);
        }

        return $applied;
    }

    private function validateLabel(?string $string): ?string
    {
        return preg_match('/^[a-zA-Z0-9\s-_]*$/', $string) ? $string : null;
    }

    public function validateURL(?string $string): ?string
    {
        return filter_var($string, FILTER_SANITIZE_URL);
    }

    public function validateIconID(?string $string): ?string
    {
        return preg_match('/^[a-z\-\_\/]*$/', $string) ? $string : null;
    }

    public function validateIconNamespace(?string $string): ?string
    {
        return preg_match('/^[a-z\_]*$/', $string) ? $string : null;
    }

    public function validatePosition(?string $string): ?string
    {
        return preg_match('/^[a-z\-\_]*$/', $string) ? $string : null;
    }

    public function parseIcon($raw)
    {
        if (strpos($raw, ':') !== false) {
            $array  = explode(':', $raw);
            $result = [
                'id'        => $array[1],
                'namespace' => $array[0]
            ];
        } else {
            $result = [
                'id'        => $raw,
                'namespace' => ''
            ];
        }

        return $result;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    public function getIcon(): ?\pix_icon
    {
        return $this->icon;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function getKey(): string
    {
        return str_replace(' ', '_', strtolower($this->getLabel()));
    }
}