<x-mail::message>
    Hello {{ $user->name }},
    You have Ordered
    @foreach ($products as $product)
      {{ $product->product->name }}
    @endforeach
    and these orders has been placed successfully and is now being processed

    You can view your order details using the link below.

    <x-mail::button :url="$product_url">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
