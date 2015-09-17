<?php
/*
This file is part of SeAT

Copyright (C) 2015  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Seat\Eveapi\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EveApiKey
 * @package Seat\Eveapi\Models
 */
class EveApiKey extends Model
{

    /**
     * @var string
     */
    protected $primaryKey = 'key_id';

    /**
     * @var array
     */
    protected $fillable = ['key_id', 'v_code', 'user_id', 'enabled', 'last_error'];

    /**
     * Returns the key information such as accessMask
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info()
    {

        return $this->hasOne(
            'Seat\Eveapi\Models\AccountApiKeyInfo', 'keyID', 'key_id');
    }

    /**
     * Returns the characters for the key
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function characters()
    {

        return $this->hasMany(
            'Seat\Eveapi\Models\AccountApiKeyInfoCharacters', 'keyID', 'key_id');
    }
}
