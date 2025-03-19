<x-layout>
    <section class="bg-light min-h-screen flex items-center justify-center antialiased mb-6 mt-4">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg dark:border px-10 py-12 flex">
            <div class="w-1/2 hidden md:block">
                <img src="{{ Vite::asset('resources/images/main-banner1.jpg') }}" alt="Image description"
                    class="w-full h-full object-cover rounded-l-xl" style="width: 90%; height: 100%;">
            </div>
            <div class="w-full md:w-1/2 px-6">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">
                    Admin Login
                </h1>
                <x-forms.form method="POST" action="{{ route('admin.authenticate') }}" id="admin-login-form">
                    <div class="space-y-5">
                        <x-forms.input label="Email Address" name="email" type="email" placeholder="example@mail.com"
                            class="w-full py-3" value="admin3@admin.com" />
                        <x-forms.error name="email" />

                        <x-forms.input label="Password" name="password" type="password" placeholder="********"
                            class="w-full py-3" value="admin@123"/>
                        <x-forms.error name="password" />

                    </div>
                    <x-forms.button class="bg-primary">
                        Login
                    </x-forms.button>
                    {{-- <p class="text-sm text-gray-600 mt-4 text-center">
                        Don't have an account?
                        <a href="/register" class="text-green-600 hover:underline mt-2 mb-2">Register Now</a>
                    </p> --}}
                </x-forms.form>
            </div>
        </div>
    </section>
</x-layout>