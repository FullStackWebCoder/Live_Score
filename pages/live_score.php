<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Score</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css"/>
</head>
<body>
  
<div class="container mt-4">
    <div class="clearfix">
        <h6 id="timer" class="float-right text-success"></h6>
    </div>
    <div class="row" id="teamData">
        <h2 class="mx-auto text-center">Loading Please wait ....</h2>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
<script>
    $(function(){
        var time = 10;
        loadData();
        setInterval(function () {
            $("#timer").html(time+'s');
            time--;
        }, 1000);
        setInterval(function () {
            time = 10;
            loadData();
        }, 10000);
    });
    function loadData(){
        $.ajax({
            dataType: "json",
            type: 'get',
            url: "https://cric-score.skdev.one/scorecard/91623",
            success: function(result){
                var teamData = "";
                $.each(result, function(i, inning){
                    if(inning[0] && inning[0].hasOwnProperty("Batsman")){
                        teamData += '<div class="col-sm-6">';
                        teamData += '<h4>'+inning[2].team+' '+inning[2].score+'</h4>';
                        teamData += '<table class="table">';
                        teamData += '<thead>';
                        teamData += '<tr>';
                        teamData += '<th>Batter</th>';
                        teamData += '<th></th>';
                        teamData += '<th>Runs</th>';
                        teamData += '<th>Balls</th>';
                        teamData += '<th>4s</th>';
                        teamData += '<th>6s</th>';
                        teamData += '<th>SR</th>';
                        teamData += '</tr>';
                        teamData += '</thead>';
                        teamData += '<tbody>';
                        $.each(inning[0].Batsman, function(i, field){
                            teamData += '<tr>';
                            teamData += '<td>'+field.name+'</td>';
                            teamData += '<td>'+field.dismissal+'</td>';
                            teamData += '<td>'+field.runs+'</td>';
                            teamData += '<td>'+field.balls+'</td>';
                            teamData += '<td>'+field.fours+'</td>';
                            teamData += '<td>'+field.sixes+'</td>';
                            teamData += '<td>'+field.sr+'</td>';
                            teamData += '</tr>';
                        });
                        teamData += '</tbody>';
                        teamData += '</table>';
                        teamData += '</div>';
                    }
                });
                $("#teamData").html(teamData);
            }
        });
    }
</script>
</body>
</html>
