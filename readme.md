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

En esta versión se ha implementado la función de permitir realizar cita previa
guardándose en el registro de la cita el nombre del usuario registrado.

## Ficheros añadidos

``` code

```

### Ficheros modificados

``` code
/
  confirmar-registrar-cita-previa.php
  cita-previa.php
  readme.md
```
