# Look
Es una plataforma parecida a Instagram. En esta plataforma los usuarios pueden ver fotos que han subido otros usuarios o subir las suyas propias. Además, pueden interactuar con las publicaciones dejando comentarios o reaccionando con "me gusta".

Los perfiles de usuario muestran una galería con todas las fotos subidas, junto a estadísticas como el número total de publicaciones, seguidores y personas a las que siguen.

## Stack
Se ha utilizado Laravel para el backend, gestionando la autenticación, subida de archivos y lógica de negocio. En el frontend, se utiliza Blade para renderizar las vistas y Livewire para dar dinamicidad a las interfaces de manera simple y fluida, sin necesidad de recargar la página.

Para guardar las imágenes, la plataforma está conectada a un Cloudflare R2, aprovechando su rendimiento y escalabilidad. Además, se usa Tailwind CSS para diseñar la interfaz, lo que permite crear un estilo limpio y moderno con facilidad.

La base de datos está construida con MySQL, organizando las entidades principales como usuarios, publicaciones, comentarios y reacciones.

## Imagenes
Este es el dashboard principal. Estes o no registrado puedes ver las maravillosas fotos de los usuarios
![postspark_export_2025-03-13_10-07-55](https://github.com/user-attachments/assets/c70ca4fe-290a-4de4-8265-67a19f4deb41)

Aqui tenemos la vista de un perfil. En él, puedes ver todas las fotos de un usuario y sus estadisticas.
![postspark_export_2025-03-13_10-09-45](https://github.com/user-attachments/assets/449f9b8e-275a-4492-b92b-db03cf800eef)

Creando un post. Podemos arrastrar la imagen hacia la caja y ponere un titulo y una descripción.
![postspark_export_2025-03-13_10-17-44](https://github.com/user-attachments/assets/4890acb8-08a0-41c6-899f-3c3c214abf25)

Los comentarios. Dentro de la vista de la imagen, podemos poner un comentario al post.
![postspark_export_2025-03-13_10-19-20](https://github.com/user-attachments/assets/224c44c5-9701-4dc0-8580-88329829db2a)
