# Parallelize 
## Autores:
- Marcos Alonso Campillo
- Juan Trillo Carreras
- Jaime González Fábregas
- Jaime Pablo Vázquez Martín
- Diego Quiroga Jaldín.

## Concepto:
Aplicación de computación distribuida. En la aplicación entrarán usuarios que quieran procesar programas, pero no tengan suficiente capacidad computacional. La funcionalidad de la aplicación será que cada usuario ofrezca su ordenador para el procesamiento del programa y a cambio reciban créditos/euros/lo que sea. A través de estos créditos/euros se podrá pagar el servicio de otros usuarios. En base a esta idea se desarrollarán diversas funcionalidades.

Cada programa lo llamaremos kernel. La inspiración la tomamos de la nomenclatura que se usa en cuda.

## Usuarios y tareas: 

- Habrá un único tipo de usuario. Las tareas serán: 
    - Iniciar sesión y crear cuenta.
    - Subir kernels.
    - Ejecutar kernels.
    - Introducir y retirar dinero.
- La web también hará ciertas operaciones.
    - Evaluar la complejidad de los kernels.
    - Calcular un ranking de participación.
