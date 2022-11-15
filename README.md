
Tienda Vinilos
 
Para utilizar la base de datos, se debe importar el archivo que se encuentra dentro de la carpeta 'database'.

Para visualizar, se debe utilizar el siguiente url dentro del Postman:
http://localhost/tpe-web2/vinilos

-Si se quiere ordenar, filtrar, limitar o paginar los vinilos al lado de 'vinilos' se debe poner '?' y poner a su vez una de las 5 opciones:

Filtrar: 

-field= (elegir uno de los siguientes campos: id, vinilo, artista, precio, lanzamiento, generosfk) El default es id.

Para que filtre solamente la categoria:
-genero= (poner numero del genero que quiere ver: 2: Pop, 3:Indie Rock, 4: Desert Rock, 5: Rock)

Ordenar ascedente o descedntemente:

-order= (asc (ascendente) o desc (descendente)) default: asc')

Limitar: 

-limit = (numero aleatorio para limitar la cantidad de vinilos que se quieran mostrar)

Paginar: 

-offset= (un número aleatorio para indicar la pagina del listado que se quiere ver dependiendo del límite puesto).

Se debe poner un & para separar cada una de las opciones.








