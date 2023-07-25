# ejemplo-php
Ejercicios de practica de PHP con mucho potencial ;)

Etiquetas PHP
<?php ?>
<?= ?>
No usar etiquetas cortas
Escapar desde html
<?php if ($exp === true): ?>
A
<?php else: ?>
B
<?php endif; ?>
Separador de instrucciones
;
Comentarios
//
/**/
#
Tipos de datos
null
bool
int
float
string
array
object
callable
resource
PHP es de Tipo dinamico
Funciones para identificar tipos, var_dump, get_debug_type, gettype
Sistema de tipos de datos
Tipos base
built in:
null,
scalar:
bool,
int,
float,
string
array,
object,
resource,
never,
void,
realtive class (self, parent, static)

Literal:
false,
true

User defined:
interfaces,
classes,
enumerations

Callable

aliases type
mixed = object|resource|array|string|float|int|bool|null 
iterable = Traversable|array

NULL
variables sin definir y unset devuelven NULL
is_null
uset

Booleans
true o false
casteo (bool)
son false todos los siguientes casteos a booleano
(bool) false
(bool) 0
(bool) 0.0
(bool) ""
(bool) "0"
(bool) array()
(bool) NULL
Cualquiera fuera de estos sera true

Enteros
decimales, hexadecimales, octales y binario
Limites definidos por las constantes PHP_INT_SIZE, PHP_INT_MAX, PHP_INT_MIN
casteo (int) (integer)
intval()
(int) false = 0
(int) true = 1
(int) 8.1 = 8 (pierde decimales)
(int) NaN = 0
(int) "8" = 8
(int) "8A" = 0
