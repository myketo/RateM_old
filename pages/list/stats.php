<?php
$stats = checkStats();
$added_dates = amountByDate("created_at");
$rated_dates = amountByDate("rated_at");

$progressData1 = [
    [
        "label" => "Progress",
        "y" => $stats['rated']
    ]
];

$progressData2 = [
    [
        "label" => "Progress", 
        "y" => $stats['unrated']
    ]
];

$ratingData = [];
for($i = 0; $i < 10; $i++){
    $ratingData[$i]["y"] = $stats[$i];
    $ratingData[$i]["label"] = ($i+1);
}
?>

<script src='scripts/jquery.canvasjs.min.js'></script>
<script>
    $(window).on('load', function(){
        progress_chart = new CanvasJS.Chart('progress_chart', {
            animationEnabled: true, 
            title: {
                text: "Progress"
            }, 
            toolTip: {
                shared: true
            }, 
            axisY: {
                title: "%", 
                suffix: "%"
            },
            data: [{
                type: "stackedBar100", 
                name: "Rated",
                // indexLabel: "",
                dataPoints: <?php echo json_encode($progressData1, JSON_NUMERIC_CHECK); ?>
            },{
                type: "stackedBar100", 
                name: "Unrated",
                // indexLabel: "",
                dataPoints: <?php echo json_encode($progressData2, JSON_NUMERIC_CHECK); ?>
            }]
        });

        rating_chart = new CanvasJS.Chart('rating_chart', {
            animationEnabled: true,
            theme: 'light2',
            title: {
                text: "Rating amount"
            }, 
            axisX: {
                title: "Rating"
            },
            axisY: {
                title: "Amount"
            }, 
            data: [{
                type: "column", 
                dataPoints: <?= json_encode($ratingData, JSON_NUMERIC_CHECK); ?>
            }]
        });

        progress_chart.render();
        rating_chart.render();
    });
</script>


<div class='stats'>
    <h1>Progress: <?=$stats['progress']?>%</h1>
    <h3>All: <?=$stats['all']?></h3>
    <h3>Rated: <?=$stats['rated']?></h3>
    <h3>Unrated: <?=$stats['unrated']?></h3>

    <br>

    <div id="progress_chart" style="height: 150px; width: 300%;"></div>

    <br>

    <h2>Ratings: </h2>
    <ol>
        <?php for($i = 0; $i < 10; $i++) echo "<li><b>{$stats[$i]}</b></li>"; ?>
    </ol>

    <br>

    <div id="rating_chart" style="height: 400px; width: 250%;"></div>

    <br>

    <h2>Recently added: </h2>
    <?php foreach($added_dates as $data) echo "<p>{$data['date']} - <b>{$data['amount']}</b></p>"; ?>

    <br>

    <h2>Recently rated: </h2>
    <?php foreach($rated_dates as $data) echo "<p>{$data['date']} - <b>{$data['amount']}</b></p>"; ?>
</div>