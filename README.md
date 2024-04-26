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

CHALLENGE ENTTITY
Properties:
        "name": "string",-Required
        "level": "[low,medium,high]",
        "desciption": "string"
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
        "name": "string",-Required
        "contact_name": "string",
        "contact": "string",
        "sector": "string"
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
        "name": "string",-Required
        "date": "string",
        "location": "string",
        "frequency": "string",
        "description": "string"
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
        "name": "string",-Required
        "email": "string",
        "password": "string"
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
        "participant": "string",-Required
        "type":  "['user', 'challenge','company']",
        "program": "string"
```
GET|HEAD programs/participants 
POST programs/participants 
GET|HEAD programs/participants/{id_program} 
DELETE programs/participants/{id} 
PATCH programs/participants/{id} 
```


**-🏭 Faker **
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

Ejemplos de uso:

EJEMPLO 1
POST /programs/generate
BODY 
```
{
    "keyword":"cars", // Palabra clave con la que el servicio de IA externo contextualiza las propiedades de la entidad a crear
    "cantity":"2" // Cantidad de Programas a crear
}
```
RESPONSE
"program1": {
    "name": "Car Show at the Park",
    "date": "July 10, 2021",
    "location": "Central Park",
    "frequency": "Annual",
    "description": "Join us for a day of classic and modern cars at Central Park. There will be food trucks, live music, and a chance to win prizes. All car enthusiasts are welcome!"
},
"program2": {
    "name": "Drag Racing Night",
    "date": "August 15, 2021",
    "location": "Speedway Raceway",
    "frequency": "Monthly",
    "description": "Experience the thrill of drag racing at Speedway Raceway. Bring your own car or just come to watch the action. Food and drinks will be available for purchase. Don't miss out on this high-speed event!"
}



EJEMPLO 2
POST /companies/generate
BODY 
```
{
    "keyword":"soccer", // Palabra clave con la que el servicio de IA externo contextualiza las propiedades de la entidad a crear
    "cantity":"2"  // Cantidad de Programas a crear
}
```
RESPONSE
{
    "company1": {
        "name": "Adidas",
        "contact_name": "John Smith",
        "contact": "john.smith@adidas.com",
        "sector": "Sportswear"
    },
    "company2": {
        "name": "Nike",
        "contact_name": "Jane Doe",
        "contact": "jane.doe@nike.com",
        "sector": "Sportswear"
    }
}

EJEMPLO 3
POST /challenges/generate
BODY 
```
{
    "keyword":"software", // Palabra clave con la que el servicio de IA externo contextualiza las propiedades de la entidad a crear
    "cantity":"2"  // Cantidad de Programas a crear
}
```
RESPONSE
{
    "challenge1": {
        "name": "Memory Management",
        "level": "high",
        "description": "This challenge involves efficiently managing the allocation and deallocation of memory in a software system. It requires a deep understanding of data structures and algorithms to optimize memory usage and prevent memory leaks."
    },
    "challenge2": {
        "name": "Concurrency",
        "level": "medium",
        "description": "Concurrency is the ability of a software system to handle multiple tasks simultaneously. This challenge involves designing and implementing a system that can handle concurrent processes without causing errors or conflicts. It requires knowledge of threading, synchronization, and parallel programming."
    }
}

**-✅ Testing API**

Ejecutar desde el directorio raiz del proyecto

```
vendor/bin/phpunit --testdox tests
```

Output:

```
Api (Tests\Feature\Api)
 ✔ Home
 ✔ Create user
 ✔ Create program
 ✔ Create challenges
 ✔ Create companies
 ✔ Create partiipants

OK (6 tests, 21 assertions)
```