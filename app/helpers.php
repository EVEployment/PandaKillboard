<?php

if (!function_exists('img_url')) {

    /**
     * Return an <img> tag ready for the lazy
     * loading plugin.
     *
     * @param $type
     * @param $variation
     * @param $id
     * @param $size
     * @param array $attr
     * @param bool|true $lazy
     *
     * @return string
     * @throws \Seat\Services\Exceptions\EveImageException
     */
    function img_url(string $type, string $variation, $id, int $size, array $attr = []) {

        $image = (new \App\Image\Eve($type, $variation, (int) $id, $size, $attr))
            ->url();

        return $image;
    }
}
