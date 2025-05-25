<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Gracias por crear una cuenta! Antes de empezar, debes verificar tu email dando click en el siguiente boton y te enviaremos un correo de verificacion. Si no recibiste el correo, vuelve a presionar y te enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Un nuevo correo de verificacion se ha enviado a tu email.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Enviar Email de Confirmacion') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar Sesion') }}
            </button>
        </form>
    </div>
</x-guest-layout>
