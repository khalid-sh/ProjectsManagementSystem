@extends('redirection')
@extends('gestion_membre/dashbord')
@section('content')


<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
       
        <p class="card-text"> <span class="xx">13</span> <i class="fa fa-tasks yy"></i></p>
        
      </div>
      <div class="card-footer zz ">Tâche</div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text "> <span class="xx">30</span> <i class="fa fa-users-cog yy"></i></p>
        
      </div>
      <div class="card-footer  zz">Users</div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
      <p class="card-text"> <span class="xx">5</span> <i class="fa fa-user-friends yy"></i></p>
         
      </div>
      <div class="card-footer zz ">Equipe</div>

    </div>

</div>   

  
</div>  <br> 



<div class="row">
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">tache par priorité </div>
      <div class="card-body">
        
      <canvas id="doughnut-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ['tache1','tache2' , 'tache3', 'tache4','tache5'],
      datasets: [
        {
          label: "priorité de chaque tache",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2,5,4,1,3]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Priorité des taches'
      }
    }
});
</script>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">status des tache</div>
      <div class="card-body">
        
      <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ['tache1','tache2' , 'tache3', 'tache4','tache5' ],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
          data: [20,15,30,35]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'status des tache'
      }
    }
});
</script>
      </div>
    </div>
  </div>
</div>
</div>  <br> 
 
  















@endsection
