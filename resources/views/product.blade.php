<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap -mx-4">
            <!-- Product Images -->
            <div class="w-full md:w-1/2 px-4 mb-8">
                <x-product.image
                    mainImage="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
                    :thumbnails="[
                        'https://images.unsplash.com/photo-1505751171710-1f6d0ace5a85?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMnx8aGVhZHBob25lfGVufDB8MHx8fDE3MjEzMDM2OTB8MA&ixlib=rb-4.0.3&q=80&w=1080',
                        'https://images.unsplash.com/photo-1484704849700-f032a568e944?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw0fHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080',
                        'https://images.unsplash.com/photo-1496957961599-e35b69ef5d7c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080',
                        'https://images.unsplash.com/photo-1528148343865-51218c4a13e6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwzfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080',
                    ]" />
            </div>

            <!-- Product Details -->
            <div class="w-full md:w-1/2 px-4">
                <x-product.details name="Premium Wireless Headphones" sku="WH1000XM4" price="349.99"
                    originalPrice="399.99" rating="4.5" reviews="120"
                    description="Experience premium sound quality and industry-leading noise cancellation with these wireless headphones. Perfect for music lovers and frequent travelers."
                    :features="[
                        'Industry-leading noise cancellation',
                        '30-hour battery life',
                        'Touch sensor controls',
                        'Speak-to-chat technology',
                    ]" />
            </div>
        </div>
    </div>
</x-layout>