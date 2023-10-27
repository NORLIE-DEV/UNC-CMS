@include('partials.__header')
<div class="flex flex-row">
    {{-- sidebar --}}
    {{-- left content --}}
    @include('components.sidebar')

    {{-- right content --}}
    <div class="w-10/12">
        {{-- nav --}}
        @include('components.nav')

        <div class="mt-24">

        </div>

    </div>
</div>

@include('partials.__footer')
