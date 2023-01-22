<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo" class="logo">
      @include('parts.header')
    </x-slot>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4 validation__error-red" :errors="$errors" />

    <div class="auth-common__form">
      <p class="auth-common__form-title">Login</p>
      <div class="auth-common__form-item">

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email Address -->
          <div class="auth-common__email-wrap">
            <input id="email" class="auth-common__address" type="email" name="email" placeholder="Email"
              value="{{ old('email') }}" required />
          </div>

          <!-- Password -->
          <div class="auth-common__pass-wrap">
            <input id="password" class="auth-common__password" type="password" name="password" required
              autocomplete="new-password" placeholder="Password" />
          </div>

          <div class="auth-common__submit-wrap">
            <button class="auth-common__submit">ログイン</button>
          </div>
        </form>

      </div>
    </div>

  </x-auth-card>
</x-guest-layout>