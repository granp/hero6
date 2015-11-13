$(function(){   
                //Datepicker
                $('#departure_date').datepicker({startView: 1});    
                $('#arrival-date').datepicker({startView: 1}); 
                $('#dtdateprofile').datepicker({startView: 1});   
                $('#atdateprofile').datepicker({startView: 1});    
                $('.birthday').datepicker({startView: 1});           
                //End Datepicker

  /*ios slider*/
      var $range = $("#range_47"),
      $result = $("#result_47"),
      $table_seatmap = $("#table_seatmap");

      var track = function () {
          var $this = $(this),
          value = $this.prop("value");

          // $result.html("Value: " + value);

          //remove existing elect
          if($('tr.Row').length){
            $('tr.Row').remove();
          }
          //generate new number of elements base on values  

          var val = value;
          var cntrSeat = 1;

          for(i = 0; i <= val; i++){

            // $table_seatmap.append("<div class='Row'><div class='Cell'><p>Row "+i+" Column 1</p></div><div class='Cell'><p>Row "+i+" Column 1</p></div><div class='Cell'><p>Row 1 Column 1</p></div></div>");
            $table_seatmap.append("<tr class='Row' id='RowMap"+i+"'></tr>");
            if(i == 0){//head = driver seat
              for(j = 1; j <= 4; j++){
                  if(j == 1){
                    $("#RowMap"+i).append("<td><div class='Cell' id='driverseat'><div id='drvSeat' data-toggle='tooltip' data-placement='top' title='Driver&rsquo;s Seat'>driverSeat</div></div></td>");
                    
                  }else{
                    $("#RowMap"+i).append("<td><div class='Cell hide-seat' id=''></div></td>");
                  }
              }
            }else if(i == val){//last Row Seat
              for(j = 1; j <= 4; j++){
                    $("#RowMap"+i).append("<td><div class='Cell' id='cell"+cntrSeat+"'><div id='cxSeat"+cntrSeat+"' class='cxSeat' data-toggle='tooltip' data-placement='top' title='S"+cntrSeat+"'>S"+cntrSeat+"</div></div></td>");
                    cntrSeat++;
              }
            }else{//middle seat
              for(j = 1; j <= 4; j++){
                  if(j != 3){
                    $("#RowMap"+i).append("<td><div class='Cell' id='cell"+cntrSeat+"'><div id='cxSeat"+cntrSeat+"' class='cxSeat' data-toggle='tooltip' data-placement='top' title='S"+cntrSeat+"'>S"+cntrSeat+"</div></div></td>");
                    cntrSeat++;
                  }else{
                    $("#RowMap"+i).append("<td><div class='Cell hide-seat' id=''></div></td>");
                  }
              }
            }
          }
      };

      $range.ionRangeSlider({
          type: "single",
          min: 0,
          max: 10,
      });

      $range.on("change", track);

$(".cxSeat").on("click",function(){
           // alert('!!');
    });
  /*end ios slider*/

  //convert seatmap to json
$('#convert-table').click( function() {
  var table = $('#example-table').tableToJSON();
  console.log(table);

  $("#seatMapValue").val(JSON.stringify(table));//store value to hidden input text
  // alert(JSON.stringify(table));  
  // alert('!!');
});


/*Start Json convert to table*/
// var array_busSeatNumber = new Array();
// var seatmapjson = JSON.parse($('#seatMapValue').attr("value")),
//     fragment = document.createDocumentFragment(),
//     tr, td, i, il, key;

// var start = new Date().getTime();

// for( i=0, il=seatmapjson.length; i<il; i++) {
//     tr = document.createElement('tr');
//     for(key in seatmapjson[i]) {
//         td = document.createElement('td');

//         td.setAttribute('class', 'SeatMapCell');

//         if(seatmapjson[i][key] == "driverSeat"){
//             td.setAttribute('id', 'driverSeat');//added
//         }else{
//             td.setAttribute('id', seatmapjson[i][key]);
//         }
        
//         td.appendChild( document.createTextNode( seatmapjson[i][key] ) );
//         tr.appendChild( td );

//         array_busSeatNumber.push(seatmapjson[i][key]);
//     }
//     fragment.appendChild( tr );
// }
// $('#seatMapTable tbody').append( fragment.cloneNode(true) );
/*End Json convert to table*/

/*start putting div on table seat map*/
// alert(array_busSeatNumber);
// var id_val;
// var hash_val;
// var div_con;
// var div_child;
// var seat_count;

// for (i = 0; i < array_busSeatNumber.length; i++) { 
//     id_val = array_busSeatNumber[i];
//     hash_val = "#"+id_val;

//     $( hash_val ).empty(); //find and remove the date inside tag

//     div_con = document.createElement('div'); //create new element div
//     div_child = document.createElement('div'); //create new element div

//     //filter if driver seat(red) or not
//     if(id_val == 'driverSeat'){
//       div_con.setAttribute('class', 'Cell dropdown-toggle');
//       div_con.setAttribute('id', 'driverSeat');
//       div_con.setAttribute('title', 'Driver Seat');
//       div_con.setAttribute('data-toggle', 'tooltip');

//       div_child.setAttribute('class', 'seatmap_child');
//       div_child.setAttribute('id', 'drvSeat');
//       // div_child.setAttribute('data-toggle', 'modal');
//       div_child.setAttribute('data-placement', 'top');
//       div_child.setAttribute('title', 'Driver’s Seat');
//       // div_child.setAttribute('data-target', '#modal_no_head');

//     }else{
//       seat_count = i + 1;
//       div_con.setAttribute('class', 'Cell');
//       div_con.setAttribute('id', 'cell'+getRemoveFirstChar(id_val));
//       div_con.setAttribute('title', id_val);
//       div_con.setAttribute('data-toggle', 'tooltip');

//       div_child.setAttribute('class', 'cxSeat seatmap_child');
//       div_child.setAttribute('id', 'cxSeat'+getRemoveFirstChar(id_val));
//       div_child.setAttribute('data-placement', 'top');
//       div_child.setAttribute('data-target', '#modal_no_head');
//       div_child.setAttribute('data-toggle', 'modal');
//     }
    

//     div_child.appendChild(document.createTextNode(id_val)); //insert data in child div tag
//     div_con.appendChild(div_child); //insert child div tag to parent div tag
//     $( hash_val ).append(div_con); //find id and insert parent div tag to td

//      // alert(id_val);
// }

// /*start busbooking.blade.php toggle seatmap, change color*/
// var $bookSeat_arr = new Array();
// var div_seatNameDetails = document.createElement('div');
// var div_seatPriceDetails = document.createElement('div');
// var $total = 0;

//       var div_con_panel;
//       var div_heading_panel;
//       var h3_heading_title;
//       var div_body_panel;

//       var div_form_group;
//       var label_form_group;
//       var div_body_form_group;

// var $textfields = {
//     'fname': 'First Name',
//     'lname': 'Last Name',
//     'bday': 'Birthday',
//     'adress': 'Address',
//     'contact_no': 'Contact No.'
// };
// // var textfields_result = $.parseJSON(textfields);

// $(".cxSeat").click(function () { 
//     var $seatNameVal = $(this).html();
//     var $divSeatPrice = $('#seatprice').attr('value');//get value

//       $( '.seatNameDet' ).empty();
//       $( '.cxDetails' ).remove();


//       div_seatNameDetails.setAttribute('class', 'seatNameDet');
//       div_seatNameDetails.setAttribute('id', '');

//       div_seatPriceDetails.setAttribute('class', 'seatNameDet');
//       div_seatPriceDetails.setAttribute('id', '');

//       if ($(this).is('.resrveSeat')) {
        
//           $(this).removeClass('resrveSeat');

//           //remove element from the array
//           $bookSeat_arr = jQuery.grep($bookSeat_arr, function(value) {
//             return value != $seatNameVal;
//           });

//       }
//       else{
//         if($bookSeat_arr.length != 4){
//             $(this).addClass('resrveSeat');

//             //Insert Element into array.
//             $bookSeat_arr.push($seatNameVal);
//         }
//       }

//       //set total cost of ticket
//       total = $bookSeat_arr.length * $divSeatPrice;

//       div_seatNameDetails.appendChild(document.createTextNode($bookSeat_arr.join('\n'))); 
//       $( '.showBookedSeatsName' ).append(div_seatNameDetails);   

//       div_seatPriceDetails.appendChild(document.createTextNode(total)); 
//       $( '.showBookedSeatsTotal' ).append(div_seatPriceDetails);            
      

//       //Generate textbox to fill cx details after they select seats
//       for (i = 0; i < $bookSeat_arr.length; i++) { 
//         /*Generate Textboxes*/
//         div_con_panel = document.createElement('div');
//         div_heading_panel = document.createElement('div');
//         h3_heading_title = document.createElement('h3');
//         div_body_panel = document.createElement('div');

//             //set classes
//             div_con_panel.setAttribute('class', 'panel panel-colorful cxDetails selectedSeat');
//             div_heading_panel.setAttribute('class', 'panel-heading cxDetails');
//             h3_heading_title.setAttribute('class', 'panel-title cxDetails');
//             div_body_panel.setAttribute('class', 'panel-body cxDetails');

//             //set id's
//             div_con_panel.setAttribute('id', 'panel-colorful-'+$bookSeat_arr[i]);
//             div_heading_panel.setAttribute('id', 'panel-heading-'+$bookSeat_arr[i]);
//             h3_heading_title.setAttribute('id', 'panel-title-'+$bookSeat_arr[i]);
//             div_body_panel.setAttribute('id', 'panel-body-'+$bookSeat_arr[i]);

//         h3_heading_title.appendChild(document.createTextNode('Seat: '+$bookSeat_arr[i]));
//         div_heading_panel.appendChild(h3_heading_title);
//         div_con_panel.appendChild(div_heading_panel);

//             //Textfield list in array
//             for(var $Key in $textfields) {
//               //create element
//               div_form_group = document.createElement('div');
//               label_form_group = document.createElement('label');
//               div_body_form_group = document.createElement('div');

//               //set classes
//               div_form_group.setAttribute('class', 'form-group');
//               label_form_group.setAttribute('class', 'col-md-2 control-label');
//               div_body_form_group.setAttribute('class', 'col-md-10');

//               //set id's
//               div_form_group.setAttribute('id', "form_group-"+$bookSeat_arr[i]+"-"+$Key);
//               label_form_group.setAttribute('id', "label-"+$bookSeat_arr[i]+"-"+$Key);
//               div_body_form_group.setAttribute('id', "body-"+$bookSeat_arr[i]+"-"+$Key);

//               //set label text
//               label_form_group.appendChild(document.createTextNode($textfields[$Key]));
//               div_form_group.appendChild(label_form_group);

//               if($textfields[$Key] == 'Birthday'){
//                 $('<input/>').attr({ type: 'text', id: $seatNameVal+"-txtbx-"+$Key, name: $bookSeat_arr[i]+"_"+$Key, class: 'form-control cxDetails birthday inptTxt_seat', placeholder: $textfields[$Key] }).appendTo(div_body_form_group);
//               }
//               else{
//                 $('<input/>').attr({ type: 'text', id: $seatNameVal+"-txtbx-"+$Key, name: $bookSeat_arr[i]+"_"+$Key, class: 'form-control cxDetails inptTxt_seat', placeholder: $textfields[$Key] }).appendTo(div_body_form_group);
//               }


//               div_form_group.appendChild(div_body_form_group);

//               div_body_panel.appendChild(div_form_group);
//             }

//         div_con_panel.appendChild(div_body_panel);
//         $( '.bookingCustomerDetails' ).append(div_con_panel);
//         }

              

// });
// // end busbooking.blade.php toggle seatmap, change color

/*start when click seat map*/
$( ".seatmap_child" ).click(function() {
  $('.tboxModalSeatBus').remove(); //remove first input box before generate new.

  var $val = $(this).html();//get value
  // alert($val);

  //generate new text box;
  $('<input/>').attr({ type: 'text', id: $val+'-btname-modal', name: 'modalseatBus', class: 'form-control tboxModalSeatBus', value: $val }).appendTo('#tbox-busSeat');
 

});
/*end when click seat map*/

/*start bustype edit modal*/
$(".bustypeprofile-edit").click(function(){

  $('.tboxModalBusType').remove();
  $('.btn-saveBtprofile-modal').remove();
  $('.input-group-addon').remove();
  $('#modal-label-bustype').empty();


  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

  var $valueAttr = $(this).attr('value');//get value
  var $idAttr = $(this).attr('id');//get value
  var $saveBtn =  document.createElement('button');

    //set save button attribute
    $saveBtn.setAttribute('type', 'button');
    $saveBtn.setAttribute('class', 'btn btn-default btn-saveBtprofile-modal');
    $saveBtn.setAttribute('data-dismiss', 'modal');

  if($idAttr == 'btname'){//set bustypename field

    $('#btnameprofile').attr("placeholder",$valueAttr);
    $('.bustype-modal-btnSave').attr("id",$idAttr+"profile-btn");

    //set button attribute
    $saveBtn.setAttribute('id', 'btnameprofile-btn');

  }else if($idAttr == 'dtdate'){//set departure date time text field
    
    var myDate = new Date(Date.parse($valueAttr));
    var day = myDate.getDate();
    var month = months[myDate.getMonth()+1 - 1];
    var year = myDate.getFullYear();
    var time = formatAMPM(myDate);

    var $valueAttrDate = month+" "+day+", "+year;

    $('#dtdateprofile').attr("placeholder",$valueAttrDate);
    $('.bustype-modal-btnSave').attr("id",$idAttr+"profile-btn");

    $('#dtimeprofile').timepicker('setTime', time);
    
    alert($valueAttr);

    //set button attribute
    $saveBtn.setAttribute('id', 'dtdateprofile-btn');

  }else if($idAttr == 'atdate'){//set arrival date time text field

    var myDate = new Date(Date.parse($valueAttr));

    var day = myDate.getDate();
    var month = myDate.getMonth()+1;
    var year = myDate.getFullYear();
    var $valueAttrDate = month+"/"+day+"/"+year;

    $('<input/>').attr({ type: 'text', id: 'artdateprofile', name: 'artdate-modal', class: 'form-control tboxModalBusType', value: $valueAttrDate, placeholder: $valueAttrDate }).appendTo('#tbox-busType');
    
    //set button attribute
    $saveBtn.setAttribute('id', 'atdateprofile-btn');

  }else if($idAttr == 'sprice'){//set seat price text field

    $('#spriceprofile').attr("placeholder",$valueAttr);
    $('.bustype-modal-btnSave').attr("id",$idAttr+"profile-btn");

    //set button attribute
    $saveBtn.setAttribute('id', 'spriceprofile-btn');
  }
  
    $saveBtn.appendChild(document.createTextNode('Save'));
    $('.btn-busType-modal').append($saveBtn);


    /*start Button save Bus Profile*/
    $('.btn-saveBtprofile-modal').click(function(){
      var $idAttr_btn = $(this).attr('id');//get value
      var textId_arr = $idAttr_btn.split("-");
      var textbox_main = textId_arr[0]+"-textb-id";//Id from textbox in busprofile.blade.php

      if($idAttr == 'dtdate' || $idAttr == 'atdate'){
        var myDate = $("#dtdateprofile").val();
        var time = $("#dtimeprofile").val();

        myDate = new Date(Date.parse(myDate));
        var day = myDate.getDate();
        var month = months[myDate.getMonth()+1 - 1];
        var year = myDate.getFullYear();
        var $valueAttrDate = month+" "+day+", "+year;

        $("#"+textbox_main).val($valueAttrDate+" "+time);//set value to textboxes in busprofile.blade.php
        
      }else if($idAttr == 'sprice'){
        $("#"+textbox_main).val($("#"+textId_arr[0]).val()+".00");//set value to textboxes in busprofile.blade.php
      }else{
        $("#"+textbox_main).val($("#"+textId_arr[0]).val());//set value to textboxes in busprofile.blade.php
      }
      
      });
    /*end Button save Bus Profile*/

});
/*end bustype edit modal*/

/*Start PM/AM function*/
function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}
/*PM/AM function*/


/*start save new seat name temporary*/
$('#saveBusSeatName').click(function() {
  
  });

function getRemoveFirstChar(args0){
  var count = args0.substring(1);//remove first character

  return count;
}

/*end putting div on table seat map*/
                //Spinner
                $(".spinner_default").spinner()
                $(".spinner_decimal").spinner({step: 0.01, numberFormat: "n"});                
                //End spinner
                
                

    /* reportrange */
    if($("#reportrange").length > 0){   
        $("#reportrange").daterangepicker({                    
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM.DD.YYYY',
            separator: ' to ',
            startDate: moment().subtract('days', 29),
            endDate: moment()            
          },function(start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
        
        $("#reportrange span").html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    }
    /* end reportrange */
    
    /* Rickshaw dashboard chart */
    var seriesData = [ [], [] ];
    var random = new Rickshaw.Fixtures.RandomData(1000);

    for(var i = 0; i < 100; i++) {
        random.addData(seriesData);
    }

    var rdc = new Rickshaw.Graph( {
            element: document.getElementById("dashboard-chart"),
            renderer: 'area',
            width: $("#dashboard-chart").width(),
            height: 250,
            series: [{color: "#33414E",data: seriesData[0],name: 'New'}, 
                     {color: "#3FBAE4",data: seriesData[1],name: 'Returned'}]
    } );

    rdc.render();

    var legend = new Rickshaw.Graph.Legend({graph: rdc, element: document.getElementById('dashboard-legend')});
    var shelving = new Rickshaw.Graph.Behavior.Series.Toggle({graph: rdc,legend: legend});
    var order = new Rickshaw.Graph.Behavior.Series.Order({graph: rdc,legend: legend});
    var highlight = new Rickshaw.Graph.Behavior.Series.Highlight( {graph: rdc,legend: legend} );        

    var rdc_resize = function() {                
            rdc.configure({
                    width: $("#dashboard-chart").width(),
                    height: $("#dashboard-chart").height()
            });
            rdc.render();
    }

    var hoverDetail = new Rickshaw.Graph.HoverDetail({graph: rdc});

    window.addEventListener('resize', rdc_resize);        

    rdc_resize();
    /* END Rickshaw dashboard chart */
    
    /* Donut dashboard chart */
    Morris.Donut({
        element: 'dashboard-donut-1',
        data: [
            {label: "Returned", value: 2513},
            {label: "New", value: 764},
            {label: "Registred", value: 311}
        ],
        colors: ['#33414E', '#3FBAE4', '#FEA223'],
        resize: true
    });
    /* END Donut dashboard chart */
    
    /* Bar dashboard chart */
    Morris.Bar({
        element: 'dashboard-bar-1',
        data: [
            { y: 'Oct 10', a: 75, b: 35 },
            { y: 'Oct 11', a: 64, b: 26 },
            { y: 'Oct 12', a: 78, b: 39 },
            { y: 'Oct 13', a: 82, b: 34 },
            { y: 'Oct 14', a: 86, b: 39 },
            { y: 'Oct 15', a: 94, b: 40 },
            { y: 'Oct 16', a: 96, b: 41 }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['New Users', 'Returned'],
        barColors: ['#33414E', '#3FBAE4'],
        gridTextSize: '10px',
        hideHover: true,
        resize: true,
        gridLineColor: '#E5E5E5'
    });
    /* END Bar dashboard chart */
    
    /* Line dashboard chart */
    Morris.Line({
      element: 'dashboard-line-1',
      data: [
        { y: '2014-10-10', a: 2,b: 4},
        { y: '2014-10-11', a: 4,b: 6},
        { y: '2014-10-12', a: 7,b: 10},
        { y: '2014-10-13', a: 5,b: 7},
        { y: '2014-10-14', a: 6,b: 9},
        { y: '2014-10-15', a: 9,b: 12},
        { y: '2014-10-16', a: 18,b: 20}
      ],
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['Sales','Event'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#3FBAE4','#33414E'],
      gridLineColor: '#E5E5E5'
    });   
    /* EMD Line dashboard chart */
    
    /* Vector Map */
    var jvm_wm = new jvm.WorldMap({container: $('#dashboard-map-seles'),
                                    map: 'world_mill_en', 
                                    backgroundColor: '#FFFFFF',                                      
                                    regionsSelectable: true,
                                    regionStyle: {selected: {fill: '#B64645'},
                                                    initial: {fill: '#33414E'}},
                                    markerStyle: {initial: {fill: '#3FBAE4',
                                                   stroke: '#3FBAE4'}},
                                    markers: [{latLng: [50.27, 30.31], name: 'Kyiv - 1'},                                              
                                              {latLng: [52.52, 13.40], name: 'Berlin - 2'},
                                              {latLng: [48.85, 2.35], name: 'Paris - 1'},                                            
                                              {latLng: [51.51, -0.13], name: 'London - 3'},                                                                                                      
                                              {latLng: [40.71, -74.00], name: 'New York - 5'},
                                              {latLng: [35.38, 139.69], name: 'Tokyo - 12'},
                                              {latLng: [37.78, -122.41], name: 'San Francisco - 8'},
                                              {latLng: [28.61, 77.20], name: 'New Delhi - 4'},
                                              {latLng: [39.91, 116.39], name: 'Beijing - 3'}]
                                });    
    /* END Vector Map */

    
    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
    
    
});

