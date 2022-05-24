# Version 1.0

## Permitir registro y login en el sitio web

En esta versión se ha implementado las funciones de permitir registrarse y logearse
en el sitio web. Después, se ha realizado a configurar que se puedan registrar
usuarios que no ponen el número de teléfono y que está obligado rellenar
usuario y contraseña para poder registrar un usuario.

La configuración se ha realizado de manera no JS, para que tenga la
funcionalidad primero y segundo la mejora ideal.

### Cambios en la versión

### Ficheros añadidos

``` code
/
  /css
  /sql
    database.sql
  cerrar-sesion.php
  cita-previa.php
  comprobar-login-usuario.php
  conexion.php
  confirmar-registrar-usuario.php
  index.php
  login.php
  readme.md
```

### Ficheros modificados

``` code

```

# Version 2.0

## Permitir realizar cita previa

En esta versión se ha implementado la función de permitir realizar cita previa.
Se realiza el registro de la cita con un usuario con username `a`.
En la siguiente versión, se implementará con la sesión del usuario iniciado.

También se ha arreglado un bug que no permitía registrar usuarios si no
rellenabas el campo de teléfono con 9 dígitos.
Se ha cambiado y ahora puede registrarse un usuario sin rellenar el campo de
teléfono. Y se ha implementado una configuración nueva que hace que en el campo
de teléfono si rellenas menos de 9 dígitos y más de 9 dígitos, no puede crearse
el usuario y salte un mensaje diciendo que el teléfono debe tener 9 dígitos.

### Ficheros añadidos

``` code
/
  confirmar-registrar-cita-previa.php
```

### Ficheros modificados

``` code
/
  cita-previa.php
  confirmar-registrar-usuario.php
  readme.md
```


# Version 3.0

## Crear cita previa con el usuario registrado

En esta versión se ha implementado la función de permitir realizar cita previa
guardándose en el registro de la cita el nombre del usuario registrado.

### Ficheros añadidos

``` code

```

### Ficheros modificados

``` code
/
  confirmar-registrar-cita-previa.php
  cita-previa.php
  readme.md
```


# Version 4.0

## Vista de las citas previas creadas

En esta versión se ha implementado una vista para que el usuario pueda ver las
citas que ha creado.

También se ha quitado un error que había en cita-previa.php
al guardar el nombre del usuario en una variable.

### Ficheros añadidos

``` code
/
  ver-citas.php
```

### Ficheros modificados

``` code
/
  index.php
  cita-previa.php
  readme.md
```

# Version 5.0

## Vista de las citas previas creadas 2ª Parte

En esta versión se ha implementado una vista para que el peluquero pueda ver
las citas que tiene.

También se ha implementado que el peluquero pueda iniciar sesión en la
aplicación.

### Ficheros añadidos

``` code

```

### Ficheros modificados

``` code
/
  index.php
  comprobar-login-usuario.php
  ver-citas.php
  readme.md
```

# Version 6.0

## Anular cita previa y usuario administrador crea usuarios

En esta versión se ha implementado la función de anular citas ya generadas.

También se ha cambiado la estructura de la base de datos, fusionando la tabla
clientes con la tabla peluqueros formando una nueva tabla llamada usuarios.

Y se ha incoporado un usuario con rol de administrador que permite crear
usuarios cliente o peluquero.

### Ficheros añadidos

``` code
/
  confirmar-anular-cita-previa.php
```

### Ficheros modificados

``` code
/
  sql/
    database.sql
  comprobar-login-usuario.php
  conexion.php
  confirmar-registrar-usuario.php
  index.php
  login.php
  ver-citas.php
  readme.md
```

# Version 6.1

## Generalizar cabecera y pie de página

Se han añadido dos archivos nuevos para reutilizar código.

Uno consta de los datos del menú de la aplicación y el otro consta de los datos
de Contacto.

También se han corregido un bug al crear un usuario que marcaba undefined el
rol pero creaba el usuario si no era un usuario administrador.

### Ficheros añadidos

``` code
/
  menu.php
  footer.php
```

### Ficheros modificados

``` code
/
  cita-previa.php
  comprobar-login-usuario.php
  confirmar-anular-cita-previa.php
  confirmar-registrar-cita-previa.php
  confirmar-registrar-usuario.php
  index.php
  login.php
  ver-citas.php
  readme.md
```

# Version 6.2

## No haga citas de un peluquero a la misma hora y no haga citas pasadas

Se ha implementado que al crear citas previa, no se pueda crear más de una cita
a la misma hora a un mismo peluquero.

Para ello se ha cambiado la forma de rellenar la cita previa.

Se podrá realizar cita previa cada 30 minutos para que la función implementada
sea más sencilla.

También se ha implementado que no se pueda realizar citas pasadas.

### Ficheros añadidos

``` code
/
  
```

### Ficheros modificados

``` code
/
  sql/
    database.sql
  cita-previa.php
  confirmar-registrar-cita-previa.php
  readme.md
```