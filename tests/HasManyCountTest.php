<?php
require __DIR__ . '/FieldStub.php';
require __DIR__ . '/../src/HasManyCount.php';

use Sashalenz\HasManyCount\HasManyCount;

// Create a dummy related model with a count method
$related = new class {
    public function count(): int
    {
        return 2;
    }
};

// Create a resource that has a relationship method
$resource = new class($related) {
    public $id = 7;

    public function __construct(private $relation)
    {
    }

    public function comments()
    {
        return $this->relation;
    }
};

$field = new HasManyCount('Comments', 'comments');

// Assert default visibility flags
assert($field->component === 'has-many-count');
assert($field->showOnIndex === true);
assert($field->showOnDetail === false);
assert($field->showOnCreation === false);
assert($field->showOnUpdate === false);

// Resolve using attribute from constructor
$field->resolveForDisplay($resource);
assert($field->value === 2);
assert($field->id === 7);

// Resolve using explicit attribute parameter
$field2 = new HasManyCount('Dummy', 'dummy');
$field2->resolveForDisplay($resource, 'comments');
assert($field2->value === 2);
assert($field2->id === 7);

// Test meta information merging
$field->withMeta(['foo' => 'bar']);
$meta = $field->meta();
assert($meta['id'] === 7);
assert($meta['foo'] === 'bar');

echo "All tests passed\n";
