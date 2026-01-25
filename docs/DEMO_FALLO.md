# Demo de fallo intencional (CI rojo -> verde)

1) Crear rama:
   git checkout -b ci/demo-fallo

2) Provocar fallo de lint frontend:
   - Abrir `resources/js/utils/money.js`.
   - Agregar una variable no usada, por ejemplo: `const unused = 1;`

3) Validar fallo local:
   npm run lint

4) Corregir:
   - Eliminar la variable no usada.

5) Validar OK local:
   npm run lint

6) Push y PR:
   - git add resources/js/utils/money.js
   - git commit -m "ci: demo fallo lint"
   - git push origin ci/demo-fallo

7) Verificar CI:
   - El PR debe fallar en `frontend_lint` con el cambio incorrecto.
   - Tras la corrección, el PR queda en verde.
