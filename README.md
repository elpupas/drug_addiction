<p align="center"><img src="https://i.ibb.co/zS6Jzpg/Vector.png" width="300" alt="dados"></a></p>

- **Diagnostico** 
- **Rapido** 
- **Urgencia**
- **Graves**
- **ON**
<!-- API REST para Aplicación de Seguimiento de Consumo de Drogas (Alcohol) -->

# API REST para Aplicación de Seguimiento de Consumo de Drogas (Alcohol)


Aplicación de seguimiento de consumo de drogas (alcohol), perfil de nivel de riesgo e historial de consumo, con asesoramiento personalizado, conectando con centros públicos de salud locales.  <br>
Restful API escalable, mantenible para poder usar con cualquier cliente Front-end.

## Figma prototype
https://www.figma.com/file/U3PmMKd0BZpwJwyoBFqrjS/Drug_On?type=design&node-id=0-1&mode=design&t=KMUaN3jIHMH9VKvW-0
## Funcionalidades Principales

- **Evaluación de Riesgo:** La API ofrece herramientas para evaluar el patrón de consumo de alcohol de los usuarios, identificar comportamientos de riesgo y proporcionar recomendaciones para reducir o controlar dicho consumo.
- **Intervención Temprana:** Implementa estrategias para intervenir tempranamente en casos de riesgo, ofreciendo recursos, información y apoyo a los usuarios.
- **Educación y Prevención:** Además de la evaluación de riesgo, la API proporciona contenido educativo sobre los efectos del alcohol en la salud, estrategias de prevención de adicciones y recursos para buscar ayuda profesional.
- **Red de Apoyo:** Facilita la interacción entre usuarios, permitiéndoles compartir experiencias, consejos y apoyo mutuo en un entorno seguro y confidencial.

## Tecnologías Utilizadas

- **Laravel Passport:** Utilizado para la gestión de tokens y la autenticación.
- **Swagger:** Documentación de la API para facilitar su entendimiento y uso.
- **Spatie:** Gestión de roles y permisos.

## Instalación

1. Clona el repositorio en tu máquina local.
2. Instala las dependencias utilizando Composer:

    ```
    composer install or composer update
    ```

3. Configura la base de datos en el archivo `.env`:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_base_de_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña
    ```

4. Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

    ```
    php artisan migrate
    ```

5. Genera las claves de Passport:

    ```
    php artisan passport:install
    ```

6. Inicia el servidor local:

    ```
    php artisan serve
    ```

## Uso

La API proporciona endpoints para diversas funcionalidades, incluyendo:

- **Autenticación:** Utiliza Laravel Passport para la autenticación mediante tokens.
- **Gestión de Usuarios:** Creación, actualización, eliminación y consulta de usuarios.
- **Evaluación de Riesgo:** Funciones para evaluar el nivel de riesgo del usuario.
- **Intervención y Apoyo:** Herramientas para ofrecer apoyo y recursos a los usuarios en situaciones de riesgo.
- **Educación y Prevención:** Contenido educativo y recursos para la prevención de adicciones.

Para una documentación detallada de los endpoints disponibles y su funcionamiento, accede a la documentación de la API generada con Swagger.

## Contribución

Si deseas contribuir a este proyecto, por favor sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una rama (`git checkout -b feature/AmazingFeature`).
3. Realiza tus cambios y haz commit de ellos (`git commit -m 'Añade una funcionalidad increíble'`).
4. Haz push a la rama (`git push origin feature/AmazingFeature`).
5. Abre un pull request.

## Créditos

Esta API fue desarrollada por Andres Ros, Leidy Zhang, Ania Dergachev, Jul, Josep Maria, Joe Romero y Peterson Andres Sena

## Licencia

Este proyecto está bajo la Licencia [tipo de licencia]. Consulta el archivo `LICENSE` para más detalles.

