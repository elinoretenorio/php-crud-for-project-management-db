<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", ProjectManagement\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// Users

$container->add("UsersRepository", ProjectManagement\Users\UsersRepository::class)
    ->addArgument("Database");
$container->add("UsersService", ProjectManagement\Users\UsersService::class)
    ->addArgument("UsersRepository");
$container->add(ProjectManagement\Users\UsersController::class)
    ->addArgument("UsersService");

// Clients

$container->add("ClientsRepository", ProjectManagement\Clients\ClientsRepository::class)
    ->addArgument("Database");
$container->add("ClientsService", ProjectManagement\Clients\ClientsService::class)
    ->addArgument("ClientsRepository");
$container->add(ProjectManagement\Clients\ClientsController::class)
    ->addArgument("ClientsService");

// Projects

$container->add("ProjectsRepository", ProjectManagement\Projects\ProjectsRepository::class)
    ->addArgument("Database");
$container->add("ProjectsService", ProjectManagement\Projects\ProjectsService::class)
    ->addArgument("ProjectsRepository");
$container->add(ProjectManagement\Projects\ProjectsController::class)
    ->addArgument("ProjectsService");

// Tasks

$container->add("TasksRepository", ProjectManagement\Tasks\TasksRepository::class)
    ->addArgument("Database");
$container->add("TasksService", ProjectManagement\Tasks\TasksService::class)
    ->addArgument("TasksRepository");
$container->add(ProjectManagement\Tasks\TasksController::class)
    ->addArgument("TasksService");

// Hours

$container->add("HoursRepository", ProjectManagement\Hours\HoursRepository::class)
    ->addArgument("Database");
$container->add("HoursService", ProjectManagement\Hours\HoursService::class)
    ->addArgument("HoursRepository");
$container->add(ProjectManagement\Hours\HoursController::class)
    ->addArgument("HoursService");

