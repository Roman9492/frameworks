<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmployeeController extends AbstractController
{
    private static array $employees = [
        ['id' => '1', 'name' => 'John Doe', 'position' => 'Developer', 'salary' => 1000, 'email' => 'john@example.com'],
        ['id' => '2', 'name' => 'Jane Smith', 'position' => 'Manager', 'salary' => 2000, 'email' => 'jane@example.com'],
    ];

    #[Route('/employees', methods: ['GET'])]
    public function getEmployees(): Response
    {
        return new JsonResponse(self::$employees);
    }

    #[Route('/employees/{id}', methods: ['GET'])]
    public function getEmployee(string $id): Response
    {
        foreach (self::$employees as $employee) {
            if ($employee['id'] === $id) {
                return new JsonResponse($employee);
            }
        }
        return new JsonResponse(['error' => 'Not found'], Response::HTTP_NOT_FOUND);
    }

    #[Route('/employees', methods: ['POST'])]
    public function createEmployee(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $data['id'] = (string) rand(100, 999);
        return new JsonResponse($data, Response::HTTP_CREATED);
    }

    #[Route('/employees/{id}', methods: ['PATCH'])]
    public function updateEmployee(string $id, Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $data['id'] = $id;
        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/employees/{id}', methods: ['DELETE'])]
    public function deleteEmployee(string $id): Response
    {
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}