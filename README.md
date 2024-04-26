<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Test Talent Pitch

Solucion para prueba tecnica Talent Pitch

Api desarrollada en Laravel Framework 11.4.0 desplegada en Heroku

Generacion de modelos faker consmiendo API externa de IA 

Base de datos MySql alojada en nube

**-💻[Remote] API**

```
https://tptest-57c6370c6944.herokuapp.com/

```

**-💻[Local] API**

-Clonar Repositorio

```
git clone https://github.com/backend3v/aquinas_test.git

```

-Arrancar servidor local
Ejecutar desde el directorio raiz del proyecto

```
php artisan serve

```
**-🚎Rutas API**

Descargar coleccion de Postman [TPTest Collection](https://drive.google.com/file/d/1kNKaEXtLGx-45PipHm1hqOwRWwgKUJ8w/view?usp=sharing)

CHALLENGE ENTTITY

Properties:
```
        "title": "string",-Required
        "level": "[low,medium,high]",
        "desciption": "string"
```


```
GET|HEAD challenges 
POST challenges 
GET|HEAD challenges/{id} 
DELETE challenges/{id} 
PATCH challenges/{id}
POST challenges/generate 
```


COMPANY ENTITY

Properties:
```
        "name": "string",-Required
        "contact_name": "string",
        "contact": "string",
        "industry": "string",
        "location": "string"
```


```
GET|HEAD companies 
POST companies 
GET|HEAD companies/{id} 
DELETE companies/{id} 
PATCH companies/{id}
POST companies/generate 
```



PROGRAM ENTITY

Properties:
```
        "name": "string",-Required
        "start_date": "date",
        "end_date": "date",
        "location": "string",
        "frequency": "string",
        "description": "string"
```

```
GET|HEAD programs 
POST programs 
GET|HEAD programs/{id} 
DELETE programs/{id} 
PATCH programs/{id} 
POST programs/generate 
```


USER ENTITY

Properties:
```
        "name": "string",-Required
        "email": "string",
        "password": "string"
```

```
GET|HEAD users 
POST users 
GET|HEAD users/{id} 
DELETE users/{id} 
PATCH users/{id}
POST users/generate 
```


PROGRAM PARTICIPANTS ENTITY

Properties:
```
        "participant": "string",-Required
        "type":  "['user', 'challenge','company']",
        "program": "string"
```

```
GET|HEAD programs/participants 
POST programs/participants 
GET|HEAD programs/participants/{id_program} 
DELETE programs/participants/{id} 
PATCH programs/participants/{id} 
```


**-🏭Faker**


Disponible para las entidades:
USER
COMPANY
CHALLENGE
PROGRAM

Rutas:
```
POST users/generate 
POST programs/generate
POST companies/generate
POST challenges/generate
```


**-Ejemplos de uso:**


EJEMPLO 1

POST /programs/generate

BODY 
```
{
    "keyword":"Motorcycles&food", // Palabra clave con la que el servicio de IA externo contextualiza las propiedades de la entidad a crear
    "cantity":"5" // Cantidad de Programas a crear
}
```
RESPONSE

```
{
    "program1": {
        "name": "Biker Brunch",
        "start_date": "2021-07-10",
        "end_date": "2021-07-10",
        "location": "The Biker's Cafe",
        "frequency": "One-time event",
        "description": "Join us for a delicious brunch at The Biker's Cafe, where you can enjoy a variety of food options while surrounded by fellow motorcycle enthusiasts."
    },
    "program2": {
        "name": "Ride & Dine",
        "start_date": "2021-07-15",
        "end_date": "2021-07-15",
        "location": "The Twisty Roads",
        "frequency": "Monthly",
        "description": "Take a scenic ride through the twisty roads and end the day with a delicious dinner at a local restaurant. Open to all levels of riders."
    },
    "program3": {
        "name": "Biker BBQ",
        "start_date": "2021-07-20",
        "end_date": "2021-07-20",
        "location": "The Biker's Clubhouse",
        "frequency": "Bi-weekly",
        "description": "Join us for a BBQ at our clubhouse, where you can meet other motorcycle enthusiasts and enjoy some delicious food hot off the grill."
    },
    "program4": {
        "name": "Cruiser Coffee Ride",
        "start_date": "2021-07-25",
        "end_date": "2021-07-25",
        "location": "The Coastal Route",
        "frequency": "Weekly",
        "description": "Start your Sunday morning with a scenic ride along the coast and end it with a cup of coffee and some pastries at a local cafe."
    },
    "program5": {
        "name": "Track Day & Food Trucks",
        "start_date": "2021-07-30",
        "end_date": "2021-07-30",
        "location": "The Race Track",
        "frequency": "One-time event",
        "description": "Experience the thrill of riding on a race track and then refuel with some delicious food from various food trucks parked at the event."
    }
}
```


EJEMPLO 2

POST /companies/generate

BODY 
```
{
    "keyword":"tvWithSportInColombia", // Palabra clave con la que el servicio de IA externo contextualiza las propiedades de la entidad a crear
    "cantity":"2"  // Cantidad de Programas a crear
}
```
RESPONSE
```
{
    "company1": {
        "name": "TV Deportes Colombia",
        "contact_name": "Juan Perez",
        "contact": "j.perez@tvdeportes.com",
        "industry": "Media",
        "location": "Bogota, Colombia"
    },
    "company2": {
        "name": "Colombia Sports TV",
        "contact_name": "Maria Rodriguez",
        "contact": "m.rodriguez@colombiasportstv.com",
        "industry": "Media",
        "location": "Medellin, Colombia"
    }
}
```

EJEMPLO 3

POST /challenges/generate

BODY 
```
{
    "keyword":"softwareWithBurguer", // Palabra clave con la que el servicio de IA externo contextualiza las propiedades de la entidad a crear
    "cantity":"2"  // Cantidad de Programas a crear
}
```
RESPONSE
```
{
    "challenge1": {
        "title": "Burguer Building",
        "level": "medium",
        "description": "Create a software that allows users to build their own custom burguer with various toppings and sauces."
    },
    "challenge2": {
        "title": "Burguer Delivery Tracker",
        "level": "high",
        "description": "Develop a software that tracks the delivery of burguers from the restaurant to the customer's location, providing real-time updates and estimated delivery time."
    }
}
```

**-✅ Testing API**

Ejecutar desde el directorio raiz del proyecto

```
vendor/bin/phpunit --testdox tests
```

Output:

```
Api (Tests\Feature\Api)
 ✔ Home
 ✔ Crud user
 ✔ Crud program
 ✔ Crud challenges
 ✔ Crud companies
 ✔ Crud partiipants
 ✔ Create bad user

OK (7 tests, 22 assertions)
```