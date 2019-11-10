# Shopping Cart

Prueba técnica de Uvinum

#### Requerimientos:
- php ^7.1
- composer


##### Primeros pasos antes de empezar:

Ejecutar el comando de composer para instalar todos los paquetes : 

```
composer install
```

## Utilización de la aplicación

Se ha creado un comando para poder utilizar la aplicación.


Para iniciar la ejecución es necesario tirar el siguiente comando :

`bin/console report:suspicious`

Ahora te aparecera las diferentes opciones que puedes utilizar:


```
 'Elige una opción?',
 '=============================================',
     '[1] Fichero 2016_reading.csv',
     '[2] Fichero 2016_reading.xml'
```


## Test

Para ejecutar los test tiene que tirar el siguiente comando:

`
./bin/phpunit
`

#### Estructura de carpetas

```scala
src
├── Reports
│   ├── Application
│   │   └── Report
│   │       └── Query
│   │           └── FindSuspicious
│   ├── Domain
│   │   └── Model
│   │       ├── Client
│   │       │   ├── DTO
│   │       │   └── ValueObject
│   │       ├── Reading
│   │       │   ├── Exceptions
│   │       │   └── ValueObject
│   │       └── Report
│   │           ├── DTO
│   │           └── ValueObject
│   ├── Infrastructure
│   │   └── Report
│   │       └── Parser
│   │           ├── Csv
│   │           │   └── File
│   │           └── Xml
│   │               └── File
│   └── UI
│       └── Cli
└── Shared
    ├── Application
    └── Domain
        ├── Bus
        │   └── Query
        └── ValueObject
tests
└── Reports
    ├── Application
    │   └── Report
    │       └── Query
    │           └── FindSuspicious
    ├── Domain
    │   └── Model
    │       ├── Client
    │       └── Report
    └── Infrastructure
        └── Report
            └── Parser
                ├── Csv
                └── Xml        
        


```

