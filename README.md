# Login y CRUD con MVC

Este proyecto implementa un sistema de acceso a un CRUD básico mediante un login con controles de seguridad utilizando el patrón arquitectónico **Modelo Vista Controlador (MVC)**.

## Componentes del Proyecto

### 1. **Base de Datos (Database.php)**
El acceso a la base de datos es gestionado por la clase `Database.php`, que utiliza el método **PDO** para realizar las operaciones necesarias.

### 2. **Usuario (User.php)**
El archivo `User.php` (clase Usuario) contiene el método `login`, que se apoya en la clase `Database.php` para comprobar que los datos proporcionados por el formulario coinciden con los almacenados en la base de datos.

### 3. **Controladores**
El controlador `AuthController.php` se encarga de realizar la comprobación de las credenciales a través del método `authenticate`. Además, contiene los métodos:
- `login`
- `authenticate`
- `logout`

El controlador `VideojuegoController.php` contiene los métodos que dirigen a las distintas vistas del CRUD una vez se ha accedido a este:
- `index` (muestra la tabla de datos)
- `create` (muestra el formulario para añadir un nuevo videojuego) 
- `edit` (muestra el formulario para editar un videojuego concreto)
- `delete` (no muestra vista, elimina un registro de la tabla)

Estos métodos son utilizados por el archivo `index.php` para redirigir al usuario según el contexto indicado mediante `$_REQUEST['action']`.

### 4. **Archivo Principal (index.php)**
El archivo `index.php` es el punto de entrada del proyecto y se encuentra en la carpeta raíz. Su acción por defecto es redirigir al formulario de **login**. Dependiendo del valor de `$_REQUEST['action']`, los controladores gestionarán distintas acciones como el login, la vista de la tabla o el logout. Las acciones previas al acceso al CRUD son gestionadas por el controlador de autenticación (AuthController.php). Una vez pasado el control de acceso, las acciones de acceso a las diferentes vistas del CRUD se gestionan mediante 
llamadas a métodos de VideojuegoController.php.

### 5. **Validación de Formularios**
La validación de los campos relevantes del formulario se realiza mediante el archivo `validacionLogin.js`. Este archivo se asegura de que:
- Los campos **nombre de usuario (idusuario)** y **contraseña (password)** no contengan caracteres potencialmente peligrosos.
- La contraseña tenga al menos 8 caracteres, incluya una mayúscula, una minúscula y un dígito.
Las vistas del CRUD que incluyen un formulario tambíen tienen un archivo javascript que valida los campos de texto: 'validacionCrearEditar.js'.

### 6. **Protección de Sesión**
Desde el formulario de login, se envía un token de sesión de manera oculta, lo que sirve como protección ante accesos no autorizados. Un caso importante de protección es cuando un usuario intenta acceder directamente a la vista de la tabla **listar.php** mediante la URL sin haber iniciado sesión. En este caso, se redirige automáticamente al formulario de login, indicando la necesidad de autenticación.

### 7. **Encriptación de la contraseña**
El campo de la contraseña se encuentra encriptado en la base de datos. Para que el acceso a través del formulario sea correcto, en el método login de la clase Usuario se verifica que la contraseña indicada coincida con su versión encriptada mediante el método password_verify

**Pista muy importante sobre esto en los comentarios del dump de la base de datos**

---

## Requisitos
- PHP 7.4 o superior.
- Servidor web con soporte para **PDO**.

---

