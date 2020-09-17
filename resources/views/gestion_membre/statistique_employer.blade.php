@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')
@include('flash')
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       
        <p class="card-text"> <span class="xx">5</span> <i class="fa fa-tasks yy"></i></p>
        
      </div>
      <div class="card-footer zz ">Services</div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text "> <span class="xx">30</span> <i class="fa fa-users-cog yy"></i></p>
        
      </div>
      <div class="card-footer  zz">Users</div>
    </div>
  </div>
</div>  <br> 


<div class="row">
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Nombre employer par services </div>
      <div class="card-body">
      <canvas id="bar-chart" width="800" height="450"></canvas>
<script>

// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"],
      datasets: [
        {
          label: "nombre employer par service",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [<?= $x[0]?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre employer par services'
      }
    }
});
</script>
       
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Nombre employer par salaire</div>
      <div class="card-body">
      <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["9000", "6000", "5000", "10000"],
      datasets: [
        {
          label: "Nombre employer ",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [<?= $x[1]?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre employer par salaire'
      }
    }
});
</script>
        
      </div>
    </div>

</div>   
</div><br><br>
<div class="row">
<div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Nombre employer par Heure de travail</div>
      <div class="card-body">
        
      <canvas id="bar-chart1" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("bar-chart1"), {
    type: 'bar',
    data: {
      labels: ["6", "7", "8", "9", "10"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [5,2,7,3,10]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre employer par Heure de travail'
      }
    }
});
</script>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">employer par servises</div>
      <div class="card-body">
        
      <canvas id="doughnut-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [5,2,7,3,10]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'employer par servises'
      }
    }
});
</script>
      </div>
    </div>
  </div>

</div>  <br> 
 
  











    
@endsection