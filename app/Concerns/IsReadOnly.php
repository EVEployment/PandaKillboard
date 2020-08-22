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

namespace App\Concerns;

use App\Exceptions\ReadOnlyModelException;

/**
 * Trait IsReadOnly.
 * @package App\Concerns
 */
trait IsReadOnly {
    /**
     * @param array $attributes
     *
     * @throws \App\Exception\ReadOnlyModelException
     */
    public static function create(array $attributes = []) {

        throw new ReadOnlyModelException;
    }

    /**
     * @param array $arr
     *
     * @throws \App\Exception\ReadOnlyModelException
     */
    public static function firstOrCreate(array $arr) {

        throw new ReadOnlyModelException;
    }

    /**
     * @param array $options
     *
     * @throws \App\Exception\ReadOnlyModelException
     */
    public function save(array $options = []) {

        throw new ReadOnlyModelException;
    }

    /**
     * @param array $attributes
     * @param array $options
     *
     * @throws \App\Exception\ReadOnlyModelException
     */
    public function update(array $attributes = [], array $options = []) {

        throw new ReadOnlyModelException;
    }

    /**
     * @throws \App\Exception\ReadOnlyModelException
     */
    public function delete() {

        throw new ReadOnlyModelException;
    }

    /**
     * @throws \App\Exception\ReadOnlyModelException
     */
    public function forceDelete() {

        throw new ReadOnlyModelException;
    }
}
