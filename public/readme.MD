## verificar la configuracion de VHOST.
https://stackoverflow.com/questions/10175513/mod-rewrite-in-vhosts-configuration
en mi local queda así

Hay que habilitar el mod_rewrite, aca dice como mas como probar si está
https://rumahtulip.nl/blog/index.php/apache/enable-mod-rewrite-on-opensuse-linux

## develop.conf
<Directory /home/alejandro/htdocs>
 Require all granted
 Options FollowSymLinks Includes ExecCGI #este es importante
 AllowOverride All
</Directory>
<VirtualHost *>
 ServerAdmin ale@landini.com.ar
 DocumentRoot /home/alejandro/htdocs
 ServerName develop
 RewriteEngine On
</VirtualHost>

### reiniciar apache cuando se cambien el VHOST
~systemctl restart apache2

Configuración basica del .htaccess en la carpeta public

```
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  # change RewriteBase for other project
  RewriteBase /multipleUpload/public
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```


```
<IfModule mod_rewrite.c>
  Options -Multiviews
  RewriteEngine On
  
  # Base URL del proyecto (ajustar si no está en el root)
  RewriteBase /clientes/mios/mvcModelo/public

  # No redirigir si es un archivo o directorio existente
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f

  # Redirigir todo a index.php
  RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>

# Manejo de errores personalizados
ErrorDocument 404 /404.php
ErrorDocument 500 /500.php

# Proteger archivos sensibles
<FilesMatch "\.(env|ini|log|json|php|config)$">
  Order Deny,Allow
  Deny from all
</FilesMatch>
```


## Detalles de la optimización
Portabilidad:

Cambiar RewriteBase a una ruta relativa (/) o ajustarla dinámicamente para facilitar el despliegue en diferentes entornos.
Errores personalizados:

Define páginas específicas para errores comunes, asegurando una mejor experiencia del usuario.
Bloqueo de archivos sensibles:

Protege archivos que podrían exponer información crítica.

## Pruebas sugeridas
Acceso a rutas existentes:

Verifica que las rutas (/login, /members) funcionen correctamente.
Acceso a archivos estáticos:

Asegúrate de que los archivos en public/css o public/js se carguen normalmente.
Acceso a rutas inexistentes:

Prueba una ruta inexistente (/nonexistent) y verifica que el manejo de errores funcione correctamente.
Acceso a archivos bloqueados:

Intenta acceder directamente a archivos como .env o config.php y verifica que estén bloqueados.

## Conclusión
Este .htaccess optimizado está listo para usarse en tu proyecto actual y es adaptable para entornos futuros. Si necesitas más ajustes o ayuda con la configuración, ¡no dudes en pedírmelo!






