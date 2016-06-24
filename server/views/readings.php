<!-- title  -->
<div id="title">
    <h3>Current<br />
    Moisture:</h3>
</div>

<!-- Start reading -->
<div id="reading">
    <p>
    <?php foreach ($measurements as $measurement): ?>
        <!-- <?= $measurement["time"] ?> -->
        <?= $measurement["humidity"] ?>
    <?php endforeach; ?><span id="percent">%</span></p>
</div>
<!-- Start update -->
<div id="update">
    <span id="bold">Last Update: </span>
    <?php foreach ($measurements as $measurement): ?>
        <?= $measurement["time"] ?>
    <?php endforeach; ?>
</div>
<!-- end -->