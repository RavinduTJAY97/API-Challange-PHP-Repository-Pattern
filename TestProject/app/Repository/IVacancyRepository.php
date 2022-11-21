<?php

namespace App\Repository;

interface IVacancyRepository
{
    //import the csv file
    public function importCsv(object $request): bool;

    //get vacancy by its id
    public function getVacancyById(int $id): object;

    //get vacancy by location
    public function getVacancyByLocation(string $country,string $city,$seniority,$salary): object;

    //most interesting position
    public function mostInterestingPosition(string $seniority, string $country,array $skills): object;
}
