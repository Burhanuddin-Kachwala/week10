<x-layout>
    <section class="bg-light min-h-screen flex items-center justify-center antialiased">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg dark:border px-10 py-12 flex">
            <div class="w-1/2 hidden md:block">
                <img src="{{ Vite::asset('resources/images/main-banner2.jpg') }}" alt="Image description" class="w-full h-full object-cover rounded-l-xl" style="width: 90%; height: 100%;">
            </div>
            <div class="w-full md:w-1/2 px-6">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">
                    Create an Account
                </h1>
                <x-forms.form method="POST" action="/register">
                    <div class="space-y-5">
                        <x-forms.label :label="'Full Name'" :name="'name'" />
                        <x-forms.input placeholder="Enter your full name" class="w-full py-3" name="name"/>
                        <x-forms.error name="name" />
                        
                        <x-forms.input label="Email Address" name="email" type="email" placeholder="example@mail.com"
                            class="w-full py-3" />
                        <x-forms.error name="email" />
                        
                        <x-forms.input label="Password" name="password" type="password" placeholder="********"
                            class="w-full py-3" />
                        <x-forms.error name="password" />
                        
                        <x-forms.input label="Confirm Password" name="password_confirmation" type="password"
                            placeholder="********" class="w-full py-3" />
                        <x-forms.error name="password_confirmation" />
                    </div>
                    <x-forms.button class="bg-primary">
                        Create Account
                    </x-forms.button>
                    <p class="text-sm text-gray-600 mt-4 text-center">
                        Already have an account?
                        <a href="/login" class="text-green-600 hover:underline mt-2 mb-2">Sign in</a>
                    </p>
                </x-forms.form>
            </div>
        </div>
    </section>
</x-layout>