<?php

namespace App\Repository;

use App\Imports\VacancyImport;
use App\Models\Vacancy;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VacancyRepository implements IVacancyRepository
{

    public function importCsv(object $request): bool
    {
        $response = Excel::import(new VacancyImport(), $request->file);
        return true;
    }

    /**
     * @throws \Exception
     */
    public function getVacancyById(int $id): object
    {

        $vacancy = DB::table('vacancies')
            ->where('id', $id)
            ->get();
        if (!$vacancy) {
            throw new \Exception('No vacancy records found');
        }
        return $vacancy;
    }

    /**
     * @throws \Exception
     */
    public function getVacancyByLocation(string $country, string $city, $seniority, $salary): object
    {
        $vacancyData = DB::table('vacancies')->select('*');

        if ($seniority) {
            $vacancyData->orderBy('seniority_level', 'ASC')->get();
        }
        if ($salary) {
            $vacancyData->orderBy('salary', 'ASC')->get();
        }

        $vacancy = $vacancyData->where('country', $country)
            ->where('city', $city)
            ->get();
        if (!$vacancy) {
            throw new \Exception('No vacancy records found');
        }
        return $vacancy;

    }

    public function mostInterestingPosition(string $seniority, string $country, array $skills): object
    {

        $vacancies = DB::table('vacancies')
            ->where('seniority_level', $seniority)
            ->where('country', $country)
            ->get();

        $ids = [];
        foreach ($vacancies as $vacancy) {
            $requiredSkillsStr = $vacancy->required_skills;
            $requiredSkills = explode(',', $requiredSkillsStr);
            $a = $requiredSkills;
            $b = $skills;
            $c = 0;
            foreach ($a as $k => $v) {
                if ($v == $b[$k]) $c++;
            }
            if ($c / count($a) > 0.05) {
                array_push($ids, $vacancy->id);
            }

        }

        $mostInterestingPositions = DB::table('vacancies')
            ->whereIn('id', $ids)
            ->orderBy('salary', 'ASC')->take(3)->get();
        return $mostInterestingPositions;

    }

}
