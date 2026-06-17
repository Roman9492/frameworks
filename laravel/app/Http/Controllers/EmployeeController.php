<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    private static array $employees = [
        ['id' => '1', 'name' => 'John Doe', 'position' => 'Developer', 'salary' => 1000, 'email' => 'john@example.com'],
        ['id' => '2', 'name' => 'Jane Smith', 'position' => 'Manager', 'salary' => 2000, 'email' => 'jane@example.com'],
    ];

    public function index(): mixed
    {
        return response()->json(self::$employees, Response::HTTP_OK);
    }

    public function show(string $id): mixed
    {
        foreach (self::$employees as $employee) {
            if ($employee['id'] === $id) {
                return response()->json($employee, Response::HTTP_OK);
            }
        }
        return response()->json(['error' => 'Not found'], Response::HTTP_NOT_FOUND);
    }

    public function store(Request $request): mixed
    {
        $data = $request->all();
        $data['id'] = (string) rand(100, 999);
        return response()->json($data, Response::HTTP_CREATED);
    }

    public function update(Request $request, string $id): mixed
    {
        $data = $request->all();
        $data['id'] = $id;
        return response()->json($data, Response::HTTP_OK);
    }

    public function destroy(string $id): mixed
    {
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}