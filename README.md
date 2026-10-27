# ejemplo-php
Ejercicios de practica de PHP con mucho potencial ;)

## Actualización del repositorio Oct-2026
_*Aviso:*_ He decidido cambiar la meta de este repositorio, inicialmente se tenia como finalidad ser una colección de scripts sobre el lenguage de programación PHP.

La presente actualización permite, con ayuda de `Docker compose`, crear un ambiente de desarrollo para una aplicación web ya que la imagen incluye, además de PHP, el servidor HTTP _*Apache 2*_.

## Como usar este repositorio
Se requiere haber instalado previamente _Docker_ en la computadora, una vez descargado el repositorio tendras la siguiente estructura de directorios:

```
    ejemplo-postgresql/
    |-- container/
    |   |-- docker-php-ext-xdebug.ini
    |   └-- Dockerfile
    |-- volumes/
    |   |-- html/
    |   |   |-- .gitkeep
    |   |   └-- # directorio para colocar los archivos de PHP #
    |   └-- temp/
    |       └-- .gitkeep
    |-- .gitignore
    |-- compose.yaml
    |-- LICENSE
    └-- README.md
```
### Descripción del contenido

* _*Directorio container.*_ Contiene el archivo `Dockerfile` con las instrucciones para la creación de la imagen del contenedor, el archivo `docker-php-ext-xdebug.ini` con la configuración para _*xDebug*_.

* _*Directorio volumes*_ Este contenedor tiene los directorios compartidas entre el host y el contenedor de docker, el directorio `volumes/html` está reservado para los proyectos de PHP.

## Instalación de PostgreSQL con este repositorio
Realiza los siguientes pasos:

### 1. Iniciar la red `localnet`
Este contenedor utiliza la network `localnet` de Docker esto permite a otros contenedores interactuar entre ellos dentro del mismo host. Previo a crear la imagen o crear el contenedor es necesario crear la red.

```
docker network crate localnet
```

### 2. Crear la imagen e iniciar el contenedor
Te recomiendo que antes de inicar el contenedor Apache-PHP generes la imagen del mismo para detectar cualquier error durante la instalación de los paquetes.

```
docker compose build
```
Una vez validado que la imagen fue creada sin problemas inicia el contenedor.
```
docker compose up -d
```

### 3. Ingresar al servidor 
Ingresa al servidor de Apache-PHP con el siguiente comando:
```
docker exec -it apache-php bash
```
Puedes utilizar el comando `php` para ejecutar scripts en modo `cli`:
```
php hello-world.php
```

### 4. Crea un archivo de ejemplo
Dentro del directorio `volumes/html` crea un archivo de nombre `index.php` y copia el siguiente código dentro de él:
```
<?php phpinfo(); ?>
```
Con ayuda de navedador puedes revisar la ejecución del archivo entrando a la `URL: localhost`.

## Configuración de xDebug
Está imagen cuenta con el debugger de PHP xDebug, dentro del archivo `compose.yaml` existe un apartado para la instalación y configuración de la extensión.

Para usar el debugger en _*VS Code*_ crea el archivo `.vscode/launch.json` y coloca dentro el siguiente código:

```
{   
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9020,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}"
            }
        }
    ]
}
```

## ChangeLog
