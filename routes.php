<?php

declare(strict_types=1);

$router->get("/users", "ProjectManagement\Users\UsersController::getAll");
$router->post("/users", "ProjectManagement\Users\UsersController::insert");
$router->group("/users", function ($router) {
    $router->get("/{id:number}", "ProjectManagement\Users\UsersController::get");
    $router->post("/{id:number}", "ProjectManagement\Users\UsersController::update");
    $router->delete("/{id:number}", "ProjectManagement\Users\UsersController::delete");
});

$router->get("/clients", "ProjectManagement\Clients\ClientsController::getAll");
$router->post("/clients", "ProjectManagement\Clients\ClientsController::insert");
$router->group("/clients", function ($router) {
    $router->get("/{id:number}", "ProjectManagement\Clients\ClientsController::get");
    $router->post("/{id:number}", "ProjectManagement\Clients\ClientsController::update");
    $router->delete("/{id:number}", "ProjectManagement\Clients\ClientsController::delete");
});

$router->get("/projects", "ProjectManagement\Projects\ProjectsController::getAll");
$router->post("/projects", "ProjectManagement\Projects\ProjectsController::insert");
$router->group("/projects", function ($router) {
    $router->get("/{id:number}", "ProjectManagement\Projects\ProjectsController::get");
    $router->post("/{id:number}", "ProjectManagement\Projects\ProjectsController::update");
    $router->delete("/{id:number}", "ProjectManagement\Projects\ProjectsController::delete");
});

$router->get("/tasks", "ProjectManagement\Tasks\TasksController::getAll");
$router->post("/tasks", "ProjectManagement\Tasks\TasksController::insert");
$router->group("/tasks", function ($router) {
    $router->get("/{id:number}", "ProjectManagement\Tasks\TasksController::get");
    $router->post("/{id:number}", "ProjectManagement\Tasks\TasksController::update");
    $router->delete("/{id:number}", "ProjectManagement\Tasks\TasksController::delete");
});

$router->get("/hours", "ProjectManagement\Hours\HoursController::getAll");
$router->post("/hours", "ProjectManagement\Hours\HoursController::insert");
$router->group("/hours", function ($router) {
    $router->get("/{id:number}", "ProjectManagement\Hours\HoursController::get");
    $router->post("/{id:number}", "ProjectManagement\Hours\HoursController::update");
    $router->delete("/{id:number}", "ProjectManagement\Hours\HoursController::delete");
});

