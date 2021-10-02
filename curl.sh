curl -X GET "localhost:8080/users"

curl -X POST "localhost:8080/users" -H 'Content-Type: application/json' -d'
{
  "email": "hilljoshua@example.net",
  "first_name": "use",
  "last_name": "likely",
  "role": "Paediatric nurse"
}
'

curl -X POST "localhost:8080/users/5813" -H 'Content-Type: application/json' -d'
{
  "email": "hilljoshua@example.net",
  "first_name": "use",
  "id": 5813,
  "last_name": "likely",
  "role": "Paediatric nurse"
}
'

curl -X GET "localhost:8080/users/5813"

curl -X DELETE "localhost:8080/users/5813"

# --

curl -X GET "localhost:8080/clients"

curl -X POST "localhost:8080/clients" -H 'Content-Type: application/json' -d'
{
  "city": "letter",
  "country": "material",
  "description": "carry",
  "industry": "discuss",
  "name": "others",
  "notes": "People modern green within training nor reflect. Onto resource page.",
  "phone": "season",
  "revenue": "attorney",
  "state": "determine",
  "street1": "hour",
  "street2": "boy",
  "website": "read",
  "zip": 7148
}
'

curl -X POST "localhost:8080/clients/4552" -H 'Content-Type: application/json' -d'
{
  "city": "letter",
  "country": "material",
  "description": "carry",
  "id": 4552,
  "industry": "discuss",
  "name": "others",
  "notes": "People modern green within training nor reflect. Onto resource page.",
  "phone": "season",
  "revenue": "attorney",
  "state": "determine",
  "street1": "hour",
  "street2": "boy",
  "website": "read",
  "zip": 7148
}
'

curl -X GET "localhost:8080/clients/4552"

curl -X DELETE "localhost:8080/clients/4552"

# --

curl -X GET "localhost:8080/projects"

curl -X POST "localhost:8080/projects" -H 'Content-Type: application/json' -d'
{
  "active": 3877,
  "budget": 47.0,
  "client_id": 9663,
  "hourly_rate": 973.840571,
  "labor_costs": 307.3,
  "material_cost": 112.55969449,
  "project_manager_id": 2244,
  "project_name": "training",
  "start_date": "2021-10-04",
  "status_id": 4465,
  "total_hours": 815.33
}
'

curl -X POST "localhost:8080/projects/5886" -H 'Content-Type: application/json' -d'
{
  "active": 3877,
  "budget": 47.0,
  "client_id": 9663,
  "hourly_rate": 973.840571,
  "id": 5886,
  "labor_costs": 307.3,
  "material_cost": 112.55969449,
  "project_manager_id": 2244,
  "project_name": "training",
  "start_date": "2021-10-04",
  "status_id": 4465,
  "total_hours": 815.33
}
'

curl -X GET "localhost:8080/projects/5886"

curl -X DELETE "localhost:8080/projects/5886"

# --

curl -X GET "localhost:8080/tasks"

curl -X POST "localhost:8080/tasks" -H 'Content-Type: application/json' -d'
{
  "instruction": "others",
  "milestone": 1966,
  "project_id": 9060,
  "status": 35,
  "task_name": "more",
  "total_hours": 813.0,
  "user_id": 2643
}
'

curl -X POST "localhost:8080/tasks/2643" -H 'Content-Type: application/json' -d'
{
  "id": 2643,
  "instruction": "others",
  "milestone": 1966,
  "project_id": 9060,
  "status": 35,
  "task_name": "more",
  "total_hours": 813.0,
  "user_id": 2643
}
'

curl -X GET "localhost:8080/tasks/2643"

curl -X DELETE "localhost:8080/tasks/2643"

# --

curl -X GET "localhost:8080/hours"

curl -X POST "localhost:8080/hours" -H 'Content-Type: application/json' -d'
{
  "date": "2021-10-14",
  "project_id": 398,
  "task_id": 5811,
  "time": 586.371,
  "user_id": 4544,
  "work_completed": "anything"
}
'

curl -X POST "localhost:8080/hours/9148" -H 'Content-Type: application/json' -d'
{
  "date": "2021-10-14",
  "id": 9148,
  "project_id": 398,
  "task_id": 5811,
  "time": 586.371,
  "user_id": 4544,
  "work_completed": "anything"
}
'

curl -X GET "localhost:8080/hours/9148"

curl -X DELETE "localhost:8080/hours/9148"

# --

