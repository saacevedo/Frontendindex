# Frontendindex
Frontendindex
---------------------------------------------
Tecnologías Utilizadas
HTML: Estructura de todas las páginas del sitio, como el catálogo, los detalles del manga y el panel de administración.

CSS: Estilos y diseño visual de la interfaz.

JavaScript: Interactividad en el frontend, como la navegación en el carrusel de mangas, la gestión de favoritos y la validación de formularios.

PHP: Lógica del backend para interactuar con la base de datos, gestionar los datos de los mangas y manejar las acciones de los usuarios.

MySQL: Base de datos para almacenar toda la información del catálogo de mangas, incluyendo títulos, descripciones, imágenes y otros detalles.

XAMPP: Servidor local para el desarrollo y las pruebas, incluyendo Apache y MySQL.

Funcionalidades Principales
Catálogo de Manga: Una página principal (index.html) que muestra todos los mangas disponibles, con imágenes y títulos.

Detalles del Manga: Una página específica (indexManga.html) que muestra información detallada de cada título, como la sinopsis, el autor, el género, etc.

Panel de Administración: Una interfaz (indexadmin.html) para que el administrador pueda agregar, editar o eliminar mangas del catálogo.

Navegación Interactiva: Un carrusel (scriptCarrucel.js) para una navegación fluida por los títulos destacados.
---------------------------------------------




# LIBRERIA MANGA
Este es un proyecto de una librería en línea y proximamente fisica, especializada en comics Japoneses y Colombianos. La aplicación permite a los usuarios navegar por un catálogo de mangas, ver detalles de cada obra y realizar sus compras de las obras .

# Tecnologías Utilizadas
HTML, CSS, JavaScript: Para la estructura, estilos y lógica del frontend.

PHP: Para la lógica del backend y la interacción con la base de datos.

XAMPP: Servidor local para ejecutar el entorno de desarrollo (Apache y MySQL).

MySQL: Sistema de gestión de base de datos.

JSON: Para el manejo de datos en algunas interacciones.

Estructura del Proyecto
Aquí puedes dar un resumen de los archivos y carpetas más importantes.

## Estructura del proyecto
├── BASE DE DATOS/

│   └── [nombre_del_archivo].sql

├── estilos/

│   └── ...                

├── imagenes/

│   └── ...                      

├── navegacion/

│   └── ...                      

├── index.html                  

├── indexadmin.html             

├── indexfrontend.html           

├── indexManga.html              

├── script.js                    

└── scriptCarrucel.js            

> [!IMPORTANT]
> ## Configuración e Instalación Para que el proyecto funcione localmente, sigue estos pasos:


# Instala XAMPP

Si no lo tienes, descárgalo e instálalo desde el sitio oficial de XAMPP.

---

## 1: Configurar la base de datos
- [ ] Inicia los módulos Apache y MySQL en el panel de control de XAMPP.
- [ ] Ve a http://localhost/phpmyadmin en tu navegador.
- [ ] Crea una nueva base de datos con el nombre **libreriamanga**.
- [ ] Importa el archivo SQL **libreriamanga.sql** que se encuentra en la carpeta BASE DE DATOS/ de este proyecto.
---

## 2: Colocar el proyecto en el servidor local:
- [ ] Copia todos los archivos y carpetas del repositorio a la carpeta htdocs dentro de tu instalación de XAMPP. La ruta por defecto suele ser C:\xampp\htdocs\ en Windows.
---

## 3: Abrir el proyecto:
- [ ] En tu navegador, navega a http://localhost/[nombre_de_la_carpeta_del_proyecto]/.
- [ ] **Uso Aquí puedes dar instrucciones sobre cómo usar las diferentes partes de tu proyecto, si es necesario. Por ejemplo:**
- [ ] Para la interfaz de usuario: Visita http://localhost/[nombre_de_la_carpeta_del_proyecto]/indexfrontend.html.
- [ ] Para el panel de administración: Visita http://localhost/[nombre_de_la_carpeta_del_proyecto]/indexadmin.html.
---

## : 
- [ ] 
---
