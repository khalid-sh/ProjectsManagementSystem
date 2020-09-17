@extends('redirection')
@extends('gestion_membre/dashbord2')
@section('content')
@include('flash')
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text"> <span class="xx"><?= $x[7]?></span> <i class="fa fa-align-left yy"></i></p>
      </div>
      <div class="card-footer zz">Projects</div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <p class="card-text"> <span class="xx"><?= $x[8]?></span> <i class="fa fa-user-friends yy"></i></p>
         
      </div>
      <div class="card-footer zz ">Equipe</div>

    </div>

</div>   

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
       
        <p class="card-text"> <span class="xx"><?= $x[9]?></span> <i class="fa fa-tasks yy"></i></p>
        
      </div>
      <div class="card-footer zz ">Tâche</div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        
        <p class="card-text "> <span class="xx"><?= $x[10]?></span> <i class="fa fa-users-cog yy"></i></p>
        
      </div>
      <div class="card-footer  zz">Users</div>
    </div>
  </div>
</div>  <br> 


<div class="row">
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Project par tàche </div>
      <div class="card-body">
      <canvas id="bar-chart" width="800" height="450"></canvas>
<script>

// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels:  [<?= $x[0]?> ],
      datasets: [
        {
          label: "TACHE effectué",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [<?= $x[1]?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'les Tàche completer pour chaque Projet '
      }
    }
});
</script>
       
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">Employer par services</div>
      <div class="card-body">
      <canvas id="pie-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Dévlopement", "Design", "Marketing", "Comptabilté", "Management"],
      datasets: [{
        label: "Employer par services",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [<?= $x[2]?> ]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Nombres employer  dans chaque service'
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
    <div class="card-header bg-warning">Projet par priorité </div>
      <div class="card-body">
        
      <canvas id="doughnut-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: [<?= $x[3]?>],
      datasets: [
        {
          label: "priorité du projet",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [<?= $x[4]?>]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Priorité des projets'
      }
    }
});
</script>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
    <div class="card-header bg-warning">status des projets</div>
      <div class="card-body">
        
      <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: [<?= $x[5]?> ],
      datasets: [
        {
          label: "status du projet",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
          data: [<?= $x[6]?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'status des projets:    1=démarrage , 2=planning , 3=exécution , 4=cloture'
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
