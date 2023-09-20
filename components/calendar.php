<!-- CSS -->
<style>
  .app-card{
    padding:40px;
  }
  .calendar-container{
    width: 90%;
    height: 70%;
    display:flex;
    justify-content: center;
  }

  .clip-content{
    overflow: hidden;
  }
  .calendar-beveled{
    border-radius: 30px;
  }
  
  .container-fluid {
    padding-top: 120px !important;
    padding-bottom: 120px !important;
  }
  .col-lg-10{
    background-color: #BDBDBD;
  }
  
  .card {
  box-shadow: 0px 4px 8px 0px #7986CB;
  }

  p{
    text-align:center;
  }
  
  input .datepicker{
    padding: 10px 20px !important;
    border: 1px solid #000 ;
    border-radius: 10px;
    box-sizing: border-box;
    background-color: #616161 ;
    font-size: 16px;
    letter-spacing: 1px;
    width: 180px;
  }
  
  input:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #fff;
    outline-width: 0;
  }
  
  ::placeholder {
    color: #fff;
    opacity: 1;
  }
  
  :-ms-input-placeholder {
    color: #fff;
  }
  
  ::-ms-input-placeholder {
    color: #fff;
  }
  
  button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0;
  }
  
  .datepicker {
    top: 20px;
    background-color: #211eb7!important;
    height:400px;
    color: #fff !important;
    border: none;
    padding: 10px !important;
    text-align: center;
    cursor: pointer;
    }


  td.active.day {
    border-radius: 90px!important;
  }
  #dp1{
    width: 400px;
    height: 40px;
  }
  
  td span.month{
    color:#000!important;
  }

  .datepicker-dropdown:after {
  border-bottom: 6px solid #000;
  }
  
  .datepicker-dropdown {
  width: 400px;
  background: #fff!important;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Adjust the values for shadow color and size as needed */
}

  .table-condensed{
    width: 380px;
  }
  .table-condensed thead{
    background:#fff!important;
  }
  
  thead tr:nth-child(3) th {
  color: #000 !important;
  font-weight: bold;
  padding-top: 20px;
  padding-bottom: 10px;
  }
  
  .dow, .old-day, .day, .new-day {
  width: 40px !important;
  height: 40px !important;
  border-radius: 0px !important;
  }
  
  .old-day:hover, .day:hover, .new-day:hover, .month:hover, .year:hover, .decade:hover, .century:hover {
  border-radius: 6px !important;
  background-color: #eee;
  color: #000;
  }
  
  .calendar-active {
  border-radius: 6px !important;
  color: #000 !important;
  }
  

  .disabled {
  color: #616161 !important;
  }
  
  .prev, .next, .datepicker-switch {
  border-radius: 0 !important;
  padding: 20px 10px !important;
  text-transform: uppercase;
  font-size: 20px;
  color: #fff !important;
  opacity: 0.8;
  }
  
  .prev:hover, .next:hover, .datepicker-switch:hover {
  background-color: inherit !important;
  opacity: 1;
  }
  
  .cell {
  border: 1px solid #BDBDBD;
  margin: 2px;
  cursor: pointer;
  }
  
  .cell:hover {
  border: 1px solid #3D5AFE;
  }
  
  .cell.select {
  background-color: #3D5AFE;
  color: #fff;
  }
  
  .fa-calendar {
  margin-top: 20px;
  color: grey;
  font-size: 30px;
  padding-top: 8px;
  padding-left: 5px;
  cursor: pointer;
  }

  .unavailable{
    pointer-events: none;
    background-color: #EEE;
  }
  
  .datepicker-days{
    background:white  ;
    color:black;
  }

  .datepicker-switch{
    color:black!important;
  }
  .next{
    color:black!important;
  } 
  tr th.prev{
    color:black!important;
  }   
</style>
<!-- !CSS -->

<!--  Bootstraps -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"> -->
<!-- <link href="https://cdn.jsdeliv .net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<!--  !Bootstraps -->

<!-- JS -->
<script>
  $(document).ready(function(){
    $('.cell').click(function(){
        $('.cell').removeClass('select');
        $(this).addClass('select');
    });
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        startDate: '0d'
    });
    document.querySelectorAll('.cell').forEach( cell => {
      cell.addEventListener('click',()=>{
        document.querySelector('#sched_time').value = cell.innerHTML;
      });
    });
});

let availability_table = {
  "sunday" :  [],
  "saturday" : [],
    <?php
        foreach($week as $day=>$available){
            echo "'".$day."': [";
            foreach($available as $time){
                echo "'".$time."'".",";
            }
            echo "],";
        }
    ?>     
}

function setSchedule(value){
  var date_split = value.split("-");
  date_split.reverse();
  const date = new Date(date_split[0]+"-"+date_split[1]+"-"+date_split[2]);
  let day_index = date.getDay();
  var day = "";
  switch(day_index){
    case 0:
      day = "Sunday";
    break;
    case 1:
      day = "Monday";
    break;
    case 2:
      day = "Tuesday";
    break;
    case 3:
      day = "Wednesday";
    break;
    case 4:
      day = "Thursday";
    break;
    case 5:
      day = "Friday";
    break;
    case 6:
      day = "Saturday";
    break;
    default:
      day = "INVALID";
  }
  
  var d = new Date();
  d.setMonth(date_split[2] - 1)
  var month = d.toLocaleString('en-US', { month: 'long' });
  var sched = day + ", " + month + " "+ date_split[1] + ", " + date_split[0];
  if(document.querySelector('#selected-date'))document.querySelector('#selected-date').value = sched;

  // set available time

  document.querySelectorAll('.cell').forEach( cell =>{
    if(availability_table[day.toLowerCase()].includes(cell.innerHTML)){
      cell.classList.remove('unavailable');
    }else{
      if(!cell.classList.contains('unavailable')){
        cell.classList.add('unavailable');
      }
    }
  });
}
</script>
<!-- !JS -->

<!-- this hold the calendar -->
      <div class="calendar-container">

              <!-- this hold the main width of the calendar -->
              <div class="col-lg-10 calendar-beveled">
                <!-- This hold the time -->
                <div class="card border-0 calendar-beveled clip-content">
                  <form autocomplete="off">
                  <span class="fa fa-calendar"></span>
                    <div class="card-header bg-white">
                      <!-- this class hold the pick date interface -->
                      <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
                        <input type="text" id="dp1" class="datepicker" onChange="setSchedule(this.value)" placeholder="Pick Date" name="date" readonly>
                      </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body p-3 p-sm-5">
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">08:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">08:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">09:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">09:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">10:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">10:30AM</div></div> 
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">11:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">11:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">12:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">01:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">01:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">02:00PM</div></div>                 
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">02:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">03:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">03:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">04:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">04:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1 unavailable">05:00PM</div></div>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
      </div>



