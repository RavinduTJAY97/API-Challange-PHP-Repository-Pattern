<?php

namespace App\Http\Controllers;

use App\Repository\IVacancyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function __construct(IVacancyRepository $vacancy)
    {
        $this->vacancy = $vacancy;
    }

    public function importCsV(Request $request): JsonResponse
    {
        try {
            $data = $this->vacancy->importCsv($request);
            $response = ['status' => '200', 'Imported successfully', 'data' => $data];
            return response()->json($response);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }

    }

    public function getVacancyById(int $id): JsonResponse
    {
        try {
            $data = $this->vacancy->getVacancyById($id);
            $response = ['status' => '200', 'Vacancy details', 'data' => $data];
            return response()->json($response);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    public function getVacancyByLocation(Request $request, string $country, string $city): JsonResponse
    {
        $salary = $request->input('salary');
        $seniority = $request->input('seniority_level');

        try {
            $data = $this->vacancy->getVacancyByLocation($country, $city, $seniority, $salary);
            $response = ['status' => '200', 'Vacancy details', 'data' => $data];
            return response()->json($response);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    public function mostInterestingPositions(Request $request)
    {

        $seniority = $request->input('seniority');
        $country = $request->input('country');
        $skills = $request->input('skills');
        try {
            $data = $this->vacancy->mostInterestingPosition($seniority,$country, $skills);
            $response = ['status' => '200', 'Most interesting positions', 'data' => $data];
            return response()->json($response);
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }
}
