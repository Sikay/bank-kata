# Base para hacer tests

Configuración básica para empezar a hacer una kata o aprender a hacer tests en los siguientes lenguajes:

- PHP y PHPUnit

# Configuración específica por lenguaje

## PHP
1. Instalar [composer](https://getcomposer.org/) `curl -sS https://getcomposer.org/installer | php`
2. `composer install` (estando en la carpeta php)
3. `./vendor/bin/phpunit`

## PHP
[PHPUnit](https://phpunit.readthedocs.io/)

[Prophecy](https://github.com/phpspec/prophecy) para dobles de prueba

## Resumen

Al diseñar un sistema grande, nos gusta basar nuestro diseño en la forma en que se utilizará el sistema. De esa manera, las historias de usuario y los criterios de aceptación se convierten en mucho más que una línea de meta: son un principio rector para todo el sistema.

Esto resuelve una variedad de problemas. Por ejemplo, elimina el exceso de ingeniería (ya que solo escribimos lo que sabemos que necesita el usuario). Comenzar en la interfaz pública aleja el riesgo del final del proyecto (nadie quiere una pesadilla de integración cuando se acerca el día de la fecha límite).

Este Kata tiene como objetivo destilar esa experiencia en un problema que se puede resolver en un par de horas, escribiendo un programa primitivo de cuenta bancaria. En este caso, nuestra interfaz de usuario son solo algunos métodos públicos; supongamos que estamos escribiendo una biblioteca. Pero se mantienen los mismos principios.

Es una forma fantástica de practicar el uso de pruebas de aceptación para guiar su diseño. Si se hace correctamente, el resultado será un sistema que evolucione por sí mismo sin esfuerzos superfluos y sin sorpresas desagradables al final. Verá cómo la forma de trabajar de afuera hacia adentro puede ser una forma poderosa de crear software orientado a objetos.

## Instrucciones

Escriba una clase llamada Cuenta que implemente la siguiente interfaz pública:

```
public interface AccountService
{
    void deposit(int amount)
    void withdraw(int amount)
    void printStatement()
}
```

### Normas
- No puede cambiar la interfaz pública de esta clase.

### Comportamiento deseado
Aquí está la especificación para una prueba de aceptación que expresa el comportamiento deseado para este

Dado que un cliente hace un depósito de 1000 el 10-01-2012
Y un depósito de 2000 el 13-01-2012
Y un retiro de 500 el 14-01-2012
Cuando imprima su extracto bancario
Entonces vería:

```
Date       || Amount || Balance
14/01/2012 || -500   || 2500
13/01/2012 || 2000   || 3000
10/01/2012 || 1000   || 1000
```

### Notas
- Usamos int para las cantidades de dinero para mantener los auxiliares lo más simple posible. En un sistema real, siempre usaríamos un tipo de datos con precisión arbitraria garantizada, pero hacerlo aquí distraería la atención del objetivo principal del ejercicio.
- No se preocupe por el espaciado y la sangría en la salida de la declaración. (Si lo desea, puede indicar a su prueba de aceptación que ignore los espacios en blanco).
- Utilice la prueba de aceptación para guiar su progreso hacia la solución. Sandro hace esto haciendo que todos los métodos no implementados arrojen una excepción, de modo que pueda ver de inmediato lo que queda por implementar cuando ejecuta la prueba de aceptación.
- En caso de duda, ¡busque la solución más sencilla!
