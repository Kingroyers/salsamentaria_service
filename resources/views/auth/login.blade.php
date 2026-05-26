<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Salsamentaria POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.33.0/dist/tabler-icons.min.css" rel="stylesheet">
    @vite('resources/css/login.css')
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">

            {{-- Cabecera --}}
            <div class="login-header">
                <div class="login-logo">
                    <i class="ti ti-meat" aria-hidden="true"></i>
                </div>
                <div>
                    <p class="login-brand-name">Salsamentaria POS</p>
                    <p class="login-brand-sub">Sistema de Punto de Venta</p>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="login-body">
                <p class="login-title">Iniciar sesión</p>

                {{-- Error general --}}
                @if ($errors->any())
                <div class="alert-custom" role="alert">
                    <i class="ti ti-alert-circle" aria-hidden="true"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" id="login-form">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="field-label">Correo electrónico</label>
                        <div class="input-wrap">
                            <i class="ti ti-mail input-icon" aria-hidden="true"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="admin@salsamentaria.com"
                                autocomplete="email"
                                autofocus
                                required
                                class="@error('email') is-invalid @enderror">
                        </div>
                        @error('email')
                        <div class="invalid-feedback">
                            <i class="ti ti-alert-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div style="margin-top: 0.25rem;">
                        <div class="field-row">
                            <label for="password" class="field-label" style="margin:0;">Contraseña</label>
                            <a href="#" class="field-forgot">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="input-wrap">
                            <i class="ti ti-lock input-icon" aria-hidden="true"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                autocomplete="current-password"
                                required
                                class="@error('password') is-invalid @enderror">
                            <button type="button" class="btn-eye" onclick="togglePassword()" aria-label="Mostrar u ocultar contraseña">
                                <i class="ti ti-eye" id="eye-icon" aria-hidden="true"></i>
                            </button>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            <i class="ti ti-alert-circle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Recordar sesión --}}
                    <div class="check-row" style="margin-top: 1rem;">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Recordar sesión</label>
                    </div>

                    {{-- Botón --}}
                    <button type="submit" class="btn-submit" id="btn-submit">
                        <i class="ti ti-login" id="btn-icon" aria-hidden="true"></i>
                        <span id="btn-label">Entrar al sistema</span>
                    </button>

                </form>
            </div>

            {{-- Footer --}}
            <div class="login-footer">
                <i class="ti ti-clock" aria-hidden="true"></i>
                <p>Sesión expira tras 2 horas de inactividad</p>
            </div>

        </div>

        <p class="login-meta">© {{ date('Y') }} Salsamentaria POS · v2.1.0</p>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ti ti-eye-off';
            } else {
                input.type = 'password';
                icon.className = 'ti ti-eye';
            }
        }

        document.getElementById('login-form').addEventListener('submit', function() {
            const btn = document.getElementById('btn-submit');
            const icon = document.getElementById('btn-icon');
            const label = document.getElementById('btn-label');
            btn.disabled = true;
            icon.className = 'ti ti-loader-2 spinning';
            label.textContent = 'Verificando...';
        });
    </script>

</body>

</html>