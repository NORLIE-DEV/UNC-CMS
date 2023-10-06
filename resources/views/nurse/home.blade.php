@include('partials.__header')
    <a href="#">{{auth()->user()->name}}</a>
    <form action="/nurse/logout" method="post">
        @csrf
        <button type="submit">LOGOUT</button>
    </form>
@include('partials.__footer')
