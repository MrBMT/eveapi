<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017, 2018  Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Eveapi\Models\Wallet;

use Illuminate\Database\Eloquent\Model;
use Seat\Eveapi\Models\Universe\UniverseName;
use Seat\Eveapi\Traits\HasCompositePrimaryKey;

/**
 * Class CharacterWalletJournal.
 * @package Seat\Eveapi\Models\Wallet
 */
class CharacterWalletJournal extends Model
{
    use HasCompositePrimaryKey;

    /**
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $primaryKey = ['character_id', 'ref_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function first_party()
    {

        return $this->hasOne(UniverseName::class, 'entity_id', 'first_party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function second_party()
    {

        return $this->hasOne(UniverseName::class, 'entity_id', 'second_party_id');
    }
}
