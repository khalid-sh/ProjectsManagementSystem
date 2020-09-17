@extends('redirection')
@include('redirection')
@extends('gestion_membre/dashbord')
@section('content')

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
        
        <p class="card-text "> <span class="xx">5</span> <i class="fa fa-users-cog yy"></i></p>
        
      </div>
      <div class="card-footer  zz">équipe</div>
    </div>
  </div>
</div>  <br> 


<div class="row">
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Nombre équipe par services </div>
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
          label: "Nombre équipe par services",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [5,2,7,3,10]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Nombre équipe par services '
      }
    }
});
</script>
       
      </div>
    </div>
  </div>
  
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">équipe par nombre de membre</div>
      <div class="card-body">
        
      <canvas id="doughnut-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"],
      datasets: [
        {
          label: "équipe par nombre de membre",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [5,2,7,3,10]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'équipe par nombre de membre'
      }
    }
});
</script>
      </div>
    </div>
  </div>

</div>  <br> 
 
  











    
@endsection