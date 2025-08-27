<?php
namespace Laravel\Nova\Fields;

class Field
{
    public $component;
    public $attribute;
    public $value;
    public $id;
    public $meta = [];
    public $showOnIndex = false;
    public $showOnDetail = true;
    public $showOnCreation = true;
    public $showOnUpdate = true;

    public function __construct(?string $name = null, ?string $attribute = null)
    {
        $this->attribute = $attribute ?? $name;
    }

    public function meta(): array
    {
        return $this->meta;
    }

    public function withMeta(array $meta): static
    {
        $this->meta = array_merge($this->meta, $meta);
        return $this;
    }

    public function resolveForDisplay(mixed $resource, ?string $attribute = null): void
    {
        // To be overridden in child classes.
    }
}
