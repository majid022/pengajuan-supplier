<script type="text/javascript">
    jQuery(function(){
        Morris.Donut({
            element: donut_chartku,
            data: [{
                label: 'AKTIF',
                value: <?=$user?>
            }, {
                    label: 'TIDAK AKTIF',
                    value: <?=$user_taktif?>
                }],
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'],
            formatter: function (y) {
                return y + ' user'
            }
        });
    }); 
</script>
 <section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENGAJUAN SUPPLIER & ITEM
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="active">
                                        <th>VALIDASI</th>
                                        <th>SUPPLIER</th>
                                        <th>ITEM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="warning">
                                        <td>PROGRESS</td>
                                        <td><?=$progres?></td>
                                        <td><?=$progres_item?></td>
                                    </tr>
                                    <tr class="success">
                                        <td>DISETUJUI</td>
                                        <td><?=$sup?></td>
                                        <td><?=$item?></td>
                                    </tr>
                                    <tr class="danger">
                                        <td>TIDAK DISETUJUI</td>
                                        <td><?=$tidak_sup?></td>
                                        <td><?=$tidak_item?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENYELESAIAN
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="active">
                                        <th>STATUS</th>
                                        <th>SUPPLIER</th>
                                        <th>ITEM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="warning">
                                        <td>MENUNGGU PROSES</td>
                                        <td><?=$app_sup?></td>
                                        <td><?=$app_item?></td>
                                    </tr>
                                    <tr class="success">
                                        <td>PROSES SELESAI</td>
                                        <td><?=$tidak_app_sup?></td>
                                        <td><?=$tidak_app_item?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                USER
                            </h2>
                        </div>
                        <div class="body" >
                             <div style="max-height: 180px" id="donut_chartku" class="graph"></div>
                        </div>
                    </div>
                </div>
            </div>
           <!--  <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header" >
                            <h2>KALENDER </h2>
                           
                        </div>
                        <div class="body" style="margin-top: -25px" >
                             <div id='calendar'>
                          </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body">
                        <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="headingOne_1">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                                           TENTANG
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                                        <center>
                                    <div class="panel-body">
                                            <h3 style="color: #d59e3a">
                                                <img src="<?php echo base_url('assets/images/logokalla.png')?>" height="50" widht="50"> 
                                            </h3>
                                      <br>
                                       <br>
                                       <img class="img-responsive" src="<?php echo base_url('assets/upload/3.jpeg')?>"> 
                                       <br>
                                       <img class="img-responsive" src="<?php echo base_url('assets/upload/2.jpeg')?>"> 
                                    </div>
                                        </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>
<script>

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        
        var calendar =  $('#calendar').fullCalendar({
            header: {
                left: 'title',
                
                right: 'prev,next'
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',
            
            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date, allDay) { // this function is called when something is dropped
            
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                
                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);
                
                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                
                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
                
            },
            
        
        });
        
        
    });

</script>
<style>
    #calendar {
/*      float: right; */
        margin: 0 auto;
        width: 280px;
        background-color: #FFFFFF;
          border-radius: 2px;
        }

</style>