# Gobernanza / Branch protection (GitHub 2026)

## Objetivo
Configurar protecciones para la rama `main` con PR obligatorio, 1 aprobacion, checks obligatorios y sin bypass.

## Pasos (Settings → Branches)
1) Ir al repositorio en GitHub.
2) Abrir `Settings` → `Branches`.
3) En "Branch protection rules", hacer clic en `Add rule`.
4) En "Branch name pattern", escribir `main`.
5) Activar las siguientes opciones:
   - `Require a pull request before merging`
   - `Require approvals` y setear `Required approving reviews` en `1`
   - `Require status checks to pass before merging`
     - Seleccionar los checks reales del workflow: `Backend Quality (PHP)`, `Frontend Quality (JS/Vue)` y `Pipeline Summary`
   - `Require branches to be up to date before merging`
   - `Do not allow bypassing the above settings`
   - `Block force pushes`
   - `Restrict deletions`
6) Guardar con `Create` o `Save changes`.

## Notas
- Si GitHub muestra los checks con prefijo del workflow, usar exactamente el nombre visible en la UI.
- Revisar que los checks esten en verde antes de mergear.
