# Libreria Manga
---------------------------------------------

Este es un proyecto de una librería en línea y proximamente fisica, especializada en comics Japoneses y proximamente Colombianos. La aplicación permite a los usuarios navegar por un catálogo de mangas, ver detalles de cada obra y realizar sus compras de las obras .


Funcionalidades Principales
Catálogo de Manga: Una página principal (index.html) que muestra todos los mangas disponibles, con imágenes y títulos mas destacados.

Detalles del Manga: Una página específica (indexManga.html) que muestra información detallada de un titulo para leerlo en linea, como la sinopsis, el autor, el género, etc.

Panel de Administración: Una interfaz (indexadmin.html) para que el administrador pueda agregar, editar, agregar usuarios, autores, compradores, tambien puede eliminar cualquier tipo de registro.

Navegación Interactiva: Un carrusel (scriptCarrucel.js) para una navegación fluida por los títulos destacados.
---------------------------------------------

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

│   └── libreriamanga.sql

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
- [ ] En tu navegador, navega a http://localhost/Frontendindex/index.html
- [ ] 
- [ ] Para la interfaz de usuario: Visita http://localhost/Frontendindex/index.html
- [ ] Para el panel de administración: Visita http://localhost/Frontendindex/indexadmin.html
---

## : 
- [ ] 
---
