@extends('layouts.app')
@section('content')
    <h1 class="text-4xl font-extrabold text-blue-900">Dashboard</h1>
    <hr class="h-1 bg-red-500">

    <div class="mt-5 grid grid-cols-3 gap-8">
        <div class="bg-blue-100 p-5 shadow rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900">Categories</h2>
            <p>Total Categories: {{$categories}}</p>
        </div>
        <div class="bg-red-100 p-5 shadow rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900">Products</h2>
            <p>Total Products: {{$products}}</p>
        </div>
        <div class="bg-green-100 p-5 shadow rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900">Users</h2>
            <p>Total Users: 15</p>
        </div>
        <div class="bg-yellow-100 p-5 shadow rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900">Pending Orders</h2>
            <p>Pending Orders: {{$pending}}</p>
        </div>
        <div class="bg-purple-100 p-5 shadow rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900">Processing Orders</h2>
            <p>Processing Orders: {{$processing}}</p>
        </div>
        <div class="bg-pink-100 p-5 shadow rounded-lg">
            <h2 class="text-2xl font-bold text-blue-900">Completed Orders</h2>
            <p>Completed Orders: {{$delivered}}</p>
        </div>

        <div>
            <canvas id="myChart" ></canvas>
        </div>

        <div>
            <canvas id="myChart2"></canvas>
          </div>

    </div>

     <!-- Required chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
            labels: ["Pending","Processing","Shipping","Delivered"],
            datasets: [{
                label: "No. of Orders",
                data: [{{$pending}}, {{$processing}}, {{$shipping}}, {{$delivered}}],
                backgroundColor: [
                    "rgb(90, 50, 241)",
                    "rgb(101, 143, 200)",
                    "rgb(0, 200, 20)",
                    "rgb(150, 143, 0)",
                ],
                hoverOffset: 4,
            }, ],
        };

        const configPie2 = {
            type: "pie",
            data: data,
            options: {},
        };

        var chartBar = new Chart(document.getElementById("myChart"), configPie2);
    </script>

<script>
    const ctx = document.getElementById('myChart2');

    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: {!! $allcat !!},
        datasets: [{
          label: '# of Products',
          data: {!! $productcount !!},
          borderWidth: 1
        }]
      },
      options: {
      }
    });
  </script>
@endsection
