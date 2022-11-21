<?php

namespace App\Imports;

use App\Models\Vacancy;
use Maatwebsite\Excel\Concerns\ToModel;

class VacancyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vacancy([
            "id" => $row[0],
            "job_title" => $row[1],
            "seniority_level" => $row[2],
            "country" => $row[3],
            "city" => $row[4],
            "salary" => $row[5],
            "currency" => $row[6],
            "required_skills" => $row[7],
            "company_size" => $row[8],
            "company_domain" => $row[9],

        ]);
    }
}
