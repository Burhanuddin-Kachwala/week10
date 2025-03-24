<x-layout>
    <section class="bg-light min-h-screen flex items-center justify-center antialiased">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg dark:border px-10 py-12">
            <div class="w-full px-6">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">
                    Add Address
                </h1>
                <x-forms.form method="POST" action="{{route('addresses')}}" id="address-form">
                    <div class="space-y-5">
                        <!-- Address Type -->
                        <div>
                            <x-forms.label :label="'Address Type'" :name="'type'" />
                            <select name="type"
                                class="w-full py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="billing" {{ old('type')=='billing' ? 'selected' : '' }}>Billing</option>
                                <option value="shipping" {{ old('type')=='shipping' ? 'selected' : '' }}>Shipping
                                </option>
                            </select>
                            <x-forms.error name="type" />
                        </div>

                        <!-- Address Line 1 -->
                        <x-forms.label :label="'Address Line 1'" :name="'address_line_1'" />
                        <x-forms.input placeholder="Enter Address Line 1" class="w-full py-3" name="address_line_1"
                            value="{{ old('address_line_1') }}" />
                        <x-forms.error name="address_line_1" />

                        <!-- Address Line 2 -->
                        <x-forms.label :label="'Address Line 2 (Optional)'" :name="'address_line_2'" />
                        <x-forms.input placeholder="Enter Address Line 2" class="w-full py-3" name="address_line_2"
                            value="{{ old('address_line_2') }}" />
                        <x-forms.error name="address_line_2" />

                        <!-- City -->
                        <x-forms.label :label="'City'" :name="'city'" />
                        <x-forms.input placeholder="Enter City" class="w-full py-3" name="city"
                            value="{{ old('city') }}" />
                        <x-forms.error name="city" />

                        <!-- State -->
                        <x-forms.label :label="'State'" :name="'state'" />
                        <x-forms.input placeholder="Enter State" class="w-full py-3" name="state"
                            value="{{ old('state') }}" />
                        <x-forms.error name="state" />

                        <!-- Postal Code -->
                        <x-forms.label :label="'Postal Code'" :name="'postal_code'" />
                        <x-forms.input placeholder="Enter Postal Code" class="w-full py-3" name="postal_code"
                            value="{{ old('postal_code') }}" />
                        <x-forms.error name="postal_code" />

                        <!-- Country -->
                        <x-forms.label :label="'Country'" :name="'country'" />
                        <x-forms.input placeholder="Enter Country" class="w-full py-3" name="country"
                            value="{{ old('country') }}" />
                        <x-forms.error name="country" />
                    </div>

                    <x-forms.button class="bg-primary">
                        Save Address
                    </x-forms.button>
                </x-forms.form>
            </div>
        </div>
    </section>
</x-layout>