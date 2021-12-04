# Imagen Principal
FROM mysql:5.7

# Se establee la contraseña para el usuario root
ENV MYSQL_ROOT_PASSWORD=root

# Se crea la base de datos
ENV MYSQL_DATABASE=formulario

# Credenciales para la conexion
ENV MYSQL_USER=pablo
ENV MYSQL_PASSWORD=pablo123

# Copia todo lo que esta en la carpeta formulario (osea el script formulario.sql) para que se ejecute al iniciar el contenedor.
COPY ./formulario/ /docker-entrypoint-initdb.d/
