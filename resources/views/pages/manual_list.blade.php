<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

  {{-- Top 5 populairste handleidingen van dit merk --}}
@if(isset($topManuals) && $topManuals->count() > 0)
    <div class="mb-4">
        <h2>Top 5 populairste handleidingen</h2>
        <div class="card">
            <div class="card-body">
                <ol>
                    @foreach($topManuals as $topManual)
                        <li>
                            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $topManual->id }}/">
                                {{ $topManual->name }}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endif

</x-layouts.app>
