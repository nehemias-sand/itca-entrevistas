
# ITCA Entrevistas

## Configuración Recomendada del IDE

Utiliza [Visual Studio Code (VSCode)](https://code.visualstudio.com/) junto con la extensión [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (asegúrate de desactivar la extensión `Vetur` para evitar conflictos).

## Soporte de Tipos para Importaciones `.vue` en TypeScript

TypeScript no maneja por defecto la información de tipos para importaciones de archivos `.vue`. Para solucionar esto, reemplazamos el comando `tsc` de TypeScript con `vue-tsc` para realizar la comprobación de tipos. En los editores, es necesario instalar [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) para que el servicio de lenguaje de TypeScript sea compatible con los tipos de archivos `.vue`.

## Personalizar la Configuración

Consulta la [referencia de configuración de Vite](https://vitejs.dev/config/) para más detalles.

## Configuración del Proyecto

Primero, instala las dependencias:

```bash
yarn
```

### Compilar y Recargar en Caliente para Desarrollo

Inicia el entorno de desarrollo con:

```bash
yarn dev
```

### Verificación de Tipos, Compilación y Minificación para Producción

Prepara el proyecto para producción ejecutando:

```bash
yarn build
```

### Analizar Código con [ESLint](https://eslint.org/)

Ejecuta el análisis de código estático con:

```bash
yarn lint
```
