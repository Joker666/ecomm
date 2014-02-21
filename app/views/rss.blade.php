{{ '<?xml version="1.0" encoding="UTF-8"?>' }}

<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Hey Man</title>
    <subtitle>The best men are all slave to women</subtitle>
    <link href="{{ url('/feed') }}" />
    <updated>{{ Carbon\Carbon::now()->toATOMString() }}</updated>
    <author>
        <name>Hasan Rafi</name>
    </author>
    <id>...</id>
    @foreach($products as $product)
    <entry>
        <title>{{ $product->title }}</title>
        <link href="{{ url('/store/view', $product->id) }}"/>
        <id>...</id>
        <summary>{{ str_limit($product->description, $limit = 100, $end = '...') }}</summary>
    </entry>
    @endforeach
</feed>