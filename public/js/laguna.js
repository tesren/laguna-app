$('#slider-range-precios').slider({
    orientation: "horizontal",
    range: true,
    min: 0,
    max: 4000000,
    values: [0,4000000],
    step: 1000,
    slide: function( event, ui ) {
        $( "#minprice" ).val(ui.values[0]);
        $( "#maxprice" ).val(ui.values[1]);
    }
});

$('#slider-range-beds').slider({
    orientation: "horizontal",
    range: true,
    min: 0,
    max: 5,
    values: [0,5],
    step: 1,
    slide: function( event, ui ) {
        $( "#minbeds" ).val(ui.values[0]);
        $( "#maxbeds" ).val(ui.values[1]);
    }
});

$( "#btn-search" ).one( "click", function() {
    $(document).ready( function () {

        $.ajax({
            url: '/ajax/towers',
            method: 'POST',
            data:{
                id:1,
                _token:$('input[name="_token"]').val()
            },
        }).done(function(res){
            var arrayTowers = JSON.parse(res);
            //console.log(arrayTowers);

            for(var j=0; j<arrayTowers.length; j++){
                $('#search-towers').append($('<option>').val(arrayTowers[j].id).text(arrayTowers[j].name));
            }

        });

    });
  });