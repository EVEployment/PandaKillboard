<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015 to 2020 Leon Jacobs
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

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Fittings\Insurance;
// use App\Models\Market\Price;
use App\Concerns\IsReadOnly;

/**
 * Class InvType.
 * @package App
 *
 * @OA\Schema(
 *     description="Inventory Type",
 *     title="InvType",
 *     type="object"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     minimum=1,
 *     property="typeID",
 *     description="The inventory type ID"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     minimum=1,
 *     property="groupID",
 *     description="The group to which the type is related"
 * )
 *
 * @OA\Property(
 *     type="string",
 *     property="typeName",
 *     description="The inventory type name"
 * )
 *
 * @OA\Property(
 *     type="string",
 *     property="description",
 *     description="The inventory type description"
 * )
 *
 * @OA\Property(
 *     type="number",
 *     format="double",
 *     property="mass",
 *     description="The inventory type mass"
 * )
 *
 * @OA\Property(
 *     type="number",
 *     format="double",
 *     property="volume",
 *     description="The inventory type volume"
 * )
 *
 * @OA\Property(
 *     type="number",
 *     format="double",
 *     property="capacity",
 *     description="The inventory type storage capacity"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     property="portionSize"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     property="raceID",
 *     description="The race to which the inventory type is tied"
 * )
 *
 * @OA\Property(
 *     type="number",
 *     format="double",
 *     property="basePrice",
 *     description="The initial price used by NPC to create order"
 * )
 *
 * @OA\Property(
 *     type="boolean",
 *     property="published",
 *     description="True if the item is available in-game"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     property="marketGroupID",
 *     description="The group into which the item is available on market"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     property="iconID"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     property="soundID"
 * )
 *
 * @OA\Property(
 *     type="integer",
 *     property="graphicID"
 * )
 */
class InvName extends Model {
    use IsReadOnly;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $table = 'invNames';

    /**
     * @var string
     */
    protected $primaryKey = 'itemID';

}
