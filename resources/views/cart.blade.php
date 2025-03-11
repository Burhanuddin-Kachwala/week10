

<x-cart.layout>
    <x-cart.header />

    <div class="flex items-start mt-8 gap-6">
        <x-cart.table>
            <x-cart.item image="https://iili.io/3FqLBsI.png" name="Green Capsicum" price="14.00" quantity="5"
                subtotal="70.00" />
            <x-cart.item image="https://iili.io/3FqLBsI.png" name="Green Capsicum" price="14.00" quantity="5"
                subtotal="70.00" />
            <x-cart.item image="https://iili.io/3FqLBsI.png" name="Green Capsicum" price="14.00" quantity="5"
                subtotal="70.00" />
        </x-cart.table>

        <x-cart.summary total="84.00" subtotal="84.00" />
    </div>

    <x-cart.coupon />
</x-cart.layout>
