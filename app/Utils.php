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

namespace App;

use App\Models\MapDenormalize;

/**
 * Class Utils.
 * @package Seat\Eveapi\Traits
 */
class Utils {
    /**
     * Finds the itemID
     * of the celestial closest to the x, y, z in a given
     * solar system.
     *
     * @param int   $solar_system_id
     * @param float $x
     * @param float $y
     * @param float $z
     *
     * @return int
     */
    public static function findNearestCelestial(int $solar_system_id, float $x, float $y, float $z): array {

        // Querying mapDenormalized with [1] we can see
        // the available different group types in the
        // table is basically:
        //
        //        groupID	typeName
        //        ------------------
        //        3	        Region
        //        4	        Constellation
        //        5	        Solar System
        //        6	        Sun
        //        7	        Planet
        //        8	        Moon
        //        9	        Asteroid Belt
        //        10        Stargate
        //        15        Caldari Logistics Station
        //        995       EVE Gate

        // For 'nearest to' resolution we will only be
        // matching coordinates in groups 6,7,8,9 and 10.

        // [1] select `invTypes`.`groupID`, `invTypes`.`typeName`,
        // `mapDenormalize`.`itemName` from `mapDenormalize`
        // join `invTypes` on `mapDenormalize`.`groupID` = `invTypes`.`groupID`
        // group by `invTypes`.`typeName` order by `mapDenormalize`.`groupID`;

        // The basic idea when determining the closest celestial
        // is to calculate the distance celestial to the x, y, z's
        // that we have. For that, we have to start with the max
        // possible distance.
        $closest_distance = PHP_INT_MAX;

        // As a response, we will return an array with
        // the closest ID and name from mapDenormallized.
        // The default response will be the system this
        // location is in.
        $response = $solar_system_id;

        $possible_celestials = MapDenormalize::where('solarSystemID', $solar_system_id)
            ->whereNotNull('itemName')
            ->where('x', '<>', '0.0') // Exclude the systems star.
            ->whereIn('groupID', [6, 7, 8, 9, 10])
            ->get();

        foreach ($possible_celestials as $celestial) {

            // See: http://math.stackexchange.com/a/42642
            $distance = sqrt(
                pow(($x - $celestial->x), 2) + pow(($y - $celestial->y), 2) + pow(($z - $celestial->z), 2)
            );

            // Are we there yet?
            if ($distance < $closest_distance) {

                // Update the current closest distance
                $closest_distance = $distance;

                $response = $celestial->itemID;
            }
        }

        return [$response,$closest_distance];
    }
}
