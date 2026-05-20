# Sistema POS — Salsamentaria

Sistema de punto de venta web interno para gestión de ventas, pagos e inventario en tiempo real.

**Stack:** Laravel 10 · MySQL 8 · Blade + Bootstrap 5 · Laravel Sanctum  
**Uso:** Red local (LAN) · No requiere internet

---

## Requisitos previos

Instala esto una sola vez en tu máquina antes de empezar:

| Herramienta | Versión mínima |
|---|---|
| PHP | 8.2+ (con extensiones: `pdo_mysql`, `mbstring`, `openssl`, `gd`) |
| Composer | 2.x |
| MySQL | 8.0+ |
| Git | Cualquier versión reciente |
| Navegador | Chrome 90+ o Edge actual |

---

## Instalación (solo la primera vez)

```bash
# 1. Clonar el repositorio
git clone https://github.com/tu-repo/pos-salsamentaria.git
cd pos-salsamentaria

# 2. Instalar dependencias de PHP
composer install

# 3. Instalar Laravel Sanctum (autenticación)
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# 4. Crear el archivo de configuración
cp .env.example .env
php artisan key:generate

# 5. Configurar la base de datos en .env
# Edita el archivo .env y ajusta estas líneas:
#   DB_DATABASE=pos_salsamentaria
#   DB_USERNAME=tu_usuario
#   DB_PASSWORD=tu_contraseña

# 6. Crear las tablas y cargar datos iniciales
php artisan migrate --seed

# 7. Ajustar permisos de carpetas
chmod -R 775 storage bootstrap/cache
```

---

## Arranque diario

Estos son los **únicos comandos** que necesitas cada vez que vayas a trabajar:

```bash
php artisan serve
```

Luego abre el navegador en: **http://localhost:8000**

---

## Credenciales iniciales

Después de correr `migrate --seed` se crea un usuario administrador por defecto:

| Campo | Valor |
|---|---|
| Email | admin@salsamentaria.com |
| Contraseña | password |

> ⚠️ Cambia la contraseña inmediatamente después del primer login.

---

## Módulos del sistema

| Módulo | Descripción |
|---|---|
| **POS / Ventas** | Registro de ventas, carrito, procesamiento de pago |
| **Inventario** | Control de stock automático tras cada venta |
| **Productos** | CRUD de productos y categorías |
| **Reportes** | Ventas del día, semana y mes |

---

## Roles de usuario

**Admin** — Acceso completo: productos, inventario, reportes, anular ventas, ajustar stock, gestionar usuarios.

**Cajero** — Solo puede registrar ventas y consultar productos. No tiene acceso al panel de administración.

---

## Estructura de la base de datos

9 tablas principales:

```
usuarios            → Login y roles
productos           → Catálogo con stock
categorias          → Clasificación de productos
ventas              → Cabecera de cada venta
detalle_ventas      → Líneas de producto por venta
pagos               → Método y monto de pago
facturas            → Referencia y PDF del comprobante
inventario_movs     → Historial de movimientos de stock
clientes            → Datos del comprador (opcional)
```

---

## Roadmap

### v1.x — En desarrollo
- [x] Núcleo del POS (venta, pago efectivo, inventario automático)
- [ ] Métodos de pago adicionales (transferencia, tarjeta débito/crédito)
- [ ] Reportes básicos con exportación a PDF

### v2.x — Próximamente
- [ ] Lector de código de barras (USB/HID)
- [ ] Impresora térmica 80mm (ESC/POS, compatible Epson TM)
- [ ] Cierre de caja diario con conciliación

### v3.x — Futuro
- [ ] Facturación electrónica DIAN (Colombia)
- [ ] App móvil + soporte multi-sucursal

---

## Seguridad

- Autenticación con **Laravel Sanctum** (sesiones)
- Contraseñas cifradas con **bcrypt** (cost 12)
- Sesión expira tras **2 horas** de inactividad
- Protección **CSRF** en todos los formularios
- Control de acceso por rol en rutas sensibles
- Bloqueo de BD (`lockForUpdate`) para evitar condiciones de carrera en ventas simultáneas
- Soft deletes en ventas y productos para auditoría

---

## Optimización para producción

Cuando el sistema esté listo para usar en el local, corre:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Preguntas frecuentes

**¿Necesita internet para funcionar?**
No. Corre completamente en red local (LAN).

**¿En qué navegador funciona mejor?**
Chrome o Edge actuales. JavaScript debe estar habilitado.

**¿Cómo agrego un nuevo cajero?**
Desde el panel de administración → Usuarios → Nuevo usuario → Rol: Cajero.