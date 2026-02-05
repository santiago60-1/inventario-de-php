<footer class="bg-slate-800 text-white text-center py-6 mt-12">
    <div class="max-w-7xl mx-auto px-4 space-y-2">
        <p class="text-sm sm:text-base">&copy; {{ date('Y') }} Sistema de Inventario - Todos los derechos reservados</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-2 text-sm text-gray-300">
            <span>Desarrollado con Laravel y Tailwind CSS</span>
            <span class="hidden sm:inline">•</span>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="flex items-center gap-3">
                    <a class="underline hover:text-white" href="{{ route('terms.show') }}" target="_blank" rel="noopener">Terminos y condiciones</a>
                    <span class="text-gray-500">|</span>
                    <a class="underline hover:text-white" href="{{ route('policy.show') }}" target="_blank" rel="noopener">Politica de privacidad</a>
                </div>
            @endif
        </div>
    </div>
</footer>
