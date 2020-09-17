@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       
        <p class="card-text"> <span class="xx">50000</span> <i class="fa fa-tasks yy"></i></p>
        
      </div>
      <div class="card-footer zz ">Catégorie</div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text "> <span class="xx">5</span> <i class="fa fa-money-check-alt yy"></i></p>
        
      </div>
      <div class="card-footer  zz">Montant total</div>
    </div>
  </div>
</div>  <br> 


<div class="row">
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Montant par catégorie </div>
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
          label: "Montant par catégorie ",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [5000,2000,7000,3000,1000]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Montant par catégorie  '
      }
    }
});
</script>
       
      </div>
    </div>
  </div>
  
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">comparaisan du consomation  ressource par catégorie </div>
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
          data: [10,7,3,2,5]
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