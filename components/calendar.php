<!-- CSS -->
<style>
   body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: #C5CAE9 ;
        background-repeat: no-repeat;
        padding: 0px !important;
    }
  
  .calendar-container{
    width: 90%;
    height: 55%;
    display:flex;
    justify-content: center;
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
  
  input {
    padding: 10px 20px !important;
    border: 1px solid #000 ;
    border-radius: 10px;
    box-sizing: border-box;
    background-color: #616161 ;
    color: #fff !important;
    font-size: 16px;
    letter-spacing: 1px;
    width: 180px;
  }
  
  input:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #512DA8;
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
  background-color: #fb8b24!important;
  color: #fff !important;
  border: none;
  padding: 10px !important;
  text-align: center;
  cursor: pointer;
  }
  #dp1{
    width: 400px;
    height: 40px;
  }
  
  .datepicker-dropdown:after {
  border-bottom: 6px solid #000;
  }
  
  .datepicker-dropdown{
    width: 400px;
  }
  .table-condensed{
    width: 380px;
  }
  
  thead tr:nth-child(3) th {
  color: #fff !important;
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
  color: #fff;
  font-size: 30px;
  padding-top: 8px;
  padding-left: 5px;
  cursor: pointer;
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
});
</script>
<!-- !JS -->

<!-- this hold the calendar -->
      <div class="calendar-container">

              <!-- this hold the main width of the calendar -->
              <div class="col-lg-10">
                <!-- This hold the time -->
                <div class="card border-0">
                  <form autocomplete="off">
                    <div class="card-header bg-dark">
                      <!-- this class hold the pick date interface -->
                      <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
                        <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" readonly><span class="fa fa-calendar"></span>
                      </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body p-3 p-sm-5">
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">9:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">9:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">9:45AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">10:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">10:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">10:45AM</div></div>
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">11:00AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">11:30AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">11:45AM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">12:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">12:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">12:45PM</div></div>
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">1:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">1:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">1:45PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">2:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">2:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">2:45PM</div></div>
                      </div>
                      <div class="row text-center mx-0">
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">3:00PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">3:30PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">4:15PM</div></div>
                        <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">5:00PM</div></div>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
      </div>



