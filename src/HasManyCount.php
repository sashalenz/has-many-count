<?php

namespace Sashalenz\HasManyCount;

use Laravel\Nova\Fields\Field;

class HasManyCount extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'has-many-count';

    /**
     * Indicates if the element should be shown on the index view.
     *
     * @var bool
     */
    public $showOnIndex = true;
    /**
     * Indicates if the element should be shown on the detail view.
     *
     * @var bool
     */
    public $showOnDetail = false;
    /**
     * Indicates if the element should be shown on the creation view.
     *
     * @var bool
     */
    public $showOnCreation = false;
    /**
     * Indicates if the element should be shown on the update view.
     *
     * @var bool
     */
    public $showOnUpdate = false;

    /**
     * Resolve the field's value for display.
     *
     * @param  mixed  $resource
     * @param  string|null  $attribute
     * @return void
     */
    public function resolveForDisplay($resource, $attribute = null)
    {
        $attribute = $attribute ?? $this->attribute;
        $this->value = $resource->$attribute()->count();
        $this->id = $resource->id;
    }

    /**
     * Get additional meta information to merge with the field payload.
     *
     * @return array
     */
    public function meta()
    {
        return array_merge([
            'id' => $this->id,
        ], $this->meta);
    }

}
