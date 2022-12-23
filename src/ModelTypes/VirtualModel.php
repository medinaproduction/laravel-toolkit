<?php

namespace MedinaProduction\Toolkit\ModelTypes;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use LogicException;

abstract class VirtualModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Overrides the default save method.
     *
     * @throws LogicException
     */
    public function save(array $options = []): void
    {
        throw new LogicException('Cannot save virtual model');
    }

    /**
     * Overrides the default getKey method.
     *
     * @throws InvalidArgumentException
     */
    public function getKey(): mixed
    {
        if (! $this->getKeyName()) {
            throw new InvalidArgumentException("Virtual model doesn't have a primary key");
        }

        return parent::getKey();
    }
}
