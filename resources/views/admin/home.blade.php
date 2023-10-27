@include('partials.__header')
<x-messages />
<div class="flex">
    <!-- left content -->
    @include('components.sidebar')
    <!-- right content -->
    <div class="w-10/12">
        @include('components.nav')
        <!-- main content -->

        <div class="flex">
            <div class="h-60 m-6 shadow-lg rounded-lg"
                style="background: linear-gradient(-90deg, rgba(2,0,36,1) 0%, rgba(118,184,236,1) 0%, rgba(73,114,255,1) 100%); width:680px">
                <div class="flex">
                    <div class="w-1/2">
                        <img src="{{ asset('assets/img/image_2023-10-16_071401491-removebg-preview.png') }}"
                            class="w-60 h-60" alt="hero-3">
                    </div>
                    <div class="p-10 w-3/4">
                        <h1 class="text-2xl font-bold text-white"><span class="mx-1">Welcome back
                            </span>{{ auth()->user()->first_name }}!</h1>
                        <p class="text-xs p-2 mt-3 text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Eveniet illo recusandae earum modi vitae voluptas
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet illo recusandae earum modi
                            vitae voluptas.</p>
                    </div>
                </div>
            </div>

            <div class="h-60 w-72 my-6 bg-white rounded-lg shadow-lg p-5 -z-10" id="piechart">

            </div>
        </div>

        <div class="flex">
            <div class="flex flex-col">
                <div class="flex mx-6 gap-1">
                    <div class="bg-blue-600 shadow-lg w-56 h-28 rounded-lg flex">
                        <div class="p-4 mx-2 mt-4 w-1/2">
                            <img src="{{ asset('assets/img/icon/multiple-users-silhouette.png') }}" class="w-12 h-12"
                                alt="enroll">
                        </div>
                        <div class="w-3/4 text-white font-semibold text-sm">
                            <h1 class="m-3 mt-4 text-center text-sm font-bold">Users</h1>
                            <h2 class="text-4xl text-center font-bold">300</h2>
                        </div>
                    </div>
                    <div class="bg-blue-600 shadow-lg w-56 h-28 rounded-lg flex">
                        <div class="p-4 mx-2 mt-4 w-1/2">
                            <img src="{{ asset('assets/img/icon/reading-book.png') }}" class="w-12 h-12" alt="enroll">
                        </div>
                        <div class="w-3/4 text-white font-semibold text-sm">
                            <h1 class="m-3 mt-4 text-center text-sm font-bold">Student</h1>
                            <h2 class="text-4xl text-center font-bold">300</h2>
                        </div>
                    </div>
                    <div class="bg-blue-600 shadow-lg w-56 h-28 rounded-lg flex">
                        <div class="p-4 mx-2 mt-4 w-1/2">
                            <img src="{{ asset('assets/img/icon/business-people.png') }}" class="w-12 h-12"
                                alt="enroll">
                        </div>
                        <div class="w-3/4 text-white font-semibold text-sm">
                            <h1 class="m-3 mt-4 text-center text-sm font-bold">Employee</h1>
                            <h2 class="text-4xl text-center font-bold">300</h2>
                        </div>
                    </div>
                </div>

                <div id="curve_chart" style="width: 680px; height: 350px" class="absolute -z-10 mx-6 mt-32"></div>

            </div>

            <div class="bg-blue-500 rounded-lg shadow-2xl" style="height:485px; width:290px;">
                <h5 class="m-4 p-2 text-white rounded-lg text-center font-bold text-xl">Summary</h5>
                <div class="mx-4 bg-blue-500 p-2 shadow-lg rounded-lg my-2">
                    <h1 class="text-white">Kinder and Pre-school <span class="mx-5">615</span></h1>
                </div>
                <div class="mx-4 bg-blue-500 p-2 shadow-lg rounded-lg  my-2">
                    <h1 class="text-white">Kinder and Pre-school <span class="mx-5">615</span></h1>
                </div>
                <div class="mx-4 bg-blue-500 p-2 shadow-lg rounded-lg  my-2">
                    <h1 class="text-white">Kinder and Pre-school <span class="mx-5">615</span></h1>
                </div>
                <div class="mx-4 bg-blue-500 p-2 shadow-lg rounded-lg  my-2">
                    <h1 class="text-white">Kinder and Pre-school <span class="mx-5">615</span></h1>
                </div>
                <div class="mx-4 bg-blue-500 p-2 shadow-lg rounded-lg  my-2">
                    <h1 class="text-white">Kinder and Pre-school <span class="mx-5">615</span></h1>
                </div>
                <div class="mx-4 bg-blue-500 p-2 shadow-lg rounded-lg  my-2">
                    <h1 class="text-white">Kinder and Pre-school <span class="mx-5">615</span></h1>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Male', 'Female'],
            ['2004', 1000, 400],
            ['2005', 22, 460],
            ['2006', 660, 1120],
            ['2007', 1030, 540]
        ]);

        var options = {
            title: 'Gender',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawChart1);

    function drawChart1() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 11],
            ['Eat', 2],
            ['Commute', 2],
            ['Watch TV', 2],
            ['Sleep', 7]
        ]);

        var options = {
            title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@include('partials.__footer')
