<?php

use Faker\Factory as Faker;
use App\Models\Area;
use App\Repositories\AreaRepository;

trait MakeAreaTrait
{
    /**
     * Create fake instance of Area and save it in database
     *
     * @param array $areaFields
     * @return Area
     */
    public function makeArea($areaFields = [])
    {
        /** @var AreaRepository $areaRepo */
        $areaRepo = App::make(AreaRepository::class);
        $theme = $this->fakeAreaData($areaFields);
        return $areaRepo->create($theme);
    }

    /**
     * Get fake instance of Area
     *
     * @param array $areaFields
     * @return Area
     */
    public function fakeArea($areaFields = [])
    {
        return new Area($this->fakeAreaData($areaFields));
    }

    /**
     * Get fake data of Area
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAreaData($areaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'sector' => $fake->word,
            'max_cant_empleados' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $areaFields);
    }
}
