<div class="card">
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-lock"></i></span>
        Ingreso
      </p>
    </header>
    <div class="card-content">
      <form method="post" wire:submit.prevent="login">

        <div class="field spaced">
          <label class="label">Correo</label>
          <div class="control icons-left">
            <input class="input" type="text" id="email" placeholder="micorreo@mail.com" autocomplete="email" wire:model="email">
            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
          </div>
          <p class="help">
            Por favor ingrese su correo electrónico
          </p>
          @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="field spaced">
          <label class="label">Contraseña</label>
          <p class="control icons-left">
            <input class="input" type="password" id="password" placeholder="Contraseña" autocomplete="password" wire:model="password">
            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
          </p>
          <p class="help">
            Por favor ingrese su contraseña
          </p>
          @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <hr>

        <div class="field grouped">
          <div class="control">
            <button type="submit" class="button blue">
                <span wire:loading.remove>Iniciar sesión</span>
                <span wire:loading>Ingresando</span>
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>
