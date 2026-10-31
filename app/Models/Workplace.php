<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('name', 'city', 'street', 'house', 'housing', 'apartment', 'is_active')]
class Workplace extends Model
{
    /** @use HasFactory<\Database\Factories\WorkplaceFactory> */
    use HasFactory;


    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }



    protected function address(): Attribute
    {
       return Attribute::make(
            get: function () {
                $parts = [];

                $parts[] = "{$this->street} {$this->house}";

                if ($this->housing) {
                    $parts[] = "корп. {$this->housing}";
                }

                if ($this->apartment) {
                    $parts[] = "кв. {$this->apartment}";
                }

                return implode(', ', $parts);
            }
        );
    }

}
