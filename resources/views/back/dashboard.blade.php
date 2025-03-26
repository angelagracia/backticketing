@extends('layouts.default')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Ticket Opens</h4>
            </div>
            <div class="card-body">
              {{ $totalTicketsOpen }}
          </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Ticket Processed</h4>
            </div>
            <div class="card-body">
              {{ $totalTicketsProses }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Ticket Closed</h4>
            </div>
            <div class="card-body">
              {{ $totalTicketsClose }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Online Users</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>                  
    </div>


    <div style="width: 100%; max-width: 600px; margin: auto;">
      <canvas id="ticketChart"></canvas>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("ticketChart").getContext("2d");

    var ticketData = @json($ticketData); // Ambil data dari controller

    var labels = ticketData.map(data => data.status);
    var dataValues = ticketData.map(data => data.count);

    new Chart(ctx, {
        type: 'bar', // Bisa diganti 'line', 'pie', dll.
        data: {
            labels: labels,
            datasets: [{
                label: "Jumlah Tiket",
                data: dataValues,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'], // Warna grafik
                borderColor: '#ccc',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

  </section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


