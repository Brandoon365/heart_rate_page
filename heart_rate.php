<!DOCTYPE HTML>
<html>
    <head>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>
        <script src="js/jquery.dropkick-1.0.0.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/heart_rate.css"/>
    </head>
    <body>
        
        <div id="training-hr-zones">
            <div id="column-one">
                <div class="all-heartrate">
                    <div class="heartrate" id="top-heartrate"></div>
                    <div class="heartrate" id="ninety-percent-heartrate"></div>
                    <div class="heartrate" id="eighty-percent-heartrate"></div>
                    <div class="heartrate" id="seventy-percent-heartrate"></div>
                    <div class="heartrate" id="sixty-percent-heartrate"></div>
                    <div class="heartrate" id="fifty-percent-heartrate"></div>
                </div>
                
                <div class="all-zones">
                    <div class="heartrate-zone" id="sprint-zone">SPRINT</div>
                    <div class="heartrate-zone" id="speed-zone">SPEED</div>
                    <div class="heartrate-zone" id="endurance-zone">ENDURANCE</div>
                    <div class="heartrate-zone" id="fatburn-zone">FAT BURN</div>
                    <div class="heartrate-zone" id="warmup-zone">WARM UP</div>
                </div>
            </div>
            
            <div id="column-two">
                <div class="max-hr">
                    Maximum Heart Rate
                    <div id="max-heartrate"></div>
                </div>
                
                <div class="zone-description">
                    <div id="zone-title"></div>
                    <div class="hr-description" id="sprint-zone-description">Sprint Zone</div>
                    <div class="hr-description" id="speed-zone-description">Speed Zone</div>
                    <div class="hr-description" id="endurance-zone-description">Endurance Zone</div>
                    <div class="hr-description" id="fatburn-zone-description">Fat Burn Zone</div>
                    <div class="hr-description" id="warmup-zone-description">Warm Up Zone</div>
                </div>
            </div>
            
        </div>
        <div class= "year-selector">
        <select id="year-select"></select>
        <button id="update-hr-button">Update</button>
        </div>
    </body>

<script type="text/javascript">
    var age = 35;
    $('div.hr-description').hide();
    populate_dropdown();
    populate_heart_rate_zones();
    
    //Populate dropdown menu with each year from 1900 until current
    //Use last entry as default
    function populate_dropdown() {
        var year_counter = 1900;
        for (year_counter; year_counter < 2014; year_counter++) {
            var o = new Option(year_counter, year_counter);
            $("#year-select").append(o);
        }
        $("select option:last").attr("selected","selected");
    }
    
    //Calculate and display heart rates for each level
    function populate_heart_rate_zones() {
        var max_hr = 220 - age;
        $('#max-heartrate').html(max_hr + '<sup>BPM</sup>');
        $('#top-heartrate').html(max_hr + '<sup>BPM</sup>');
        $('#ninety-percent-heartrate').html(Math.floor(max_hr * .9) + '<sup>BPM</sup>');
        $('#eighty-percent-heartrate').html(Math.floor(max_hr * .8) + '<sup>BPM</sup>');
        $('#seventy-percent-heartrate').html(Math.floor(max_hr * .7) + '<sup>BPM</sup>');
        $('#sixty-percent-heartrate').html(Math.floor(max_hr * .6) + '<sup>BPM</sup>');
        $('#fifty-percent-heartrate').html(Math.floor(max_hr * .5) + '<sup>BPM</sup>');
    }
    
    //Bind hover state to div list
    $('div.heartrate-zone').hover(
      function () {
        $(this).addClass("hover");
      }, function() {
        $(this).removeClass("hover");
      }
    );
    
    //When a zone title is clicked, highlight it and show matching description
    $('div.heartrate-zone').click(function(){
        var currentId = $(this).attr('id');
        currentId += '-description';
        currentId = '#' + currentId;
        $('div.hr-description').hide();
        $('#zone-title').text($(this).text() + ' ZONE');
        $(currentId).toggle();
        $('div.heartrate-zone').removeClass("active");
        $(this).addClass("active");
    });
    
    //Bind event to update button
    $("#update-hr-button").bind("click", function(event){
        var selectedYear =$('#year-select').find(":selected").text();
        var currentYear = (new Date).getFullYear();
        age = currentYear - selectedYear;
        populate_heart_rate_zones();
    });
</script>
</html>