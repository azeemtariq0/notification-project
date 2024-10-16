@extends('layouts.app')


@section('content')

<?php  $isView = (@$expense->is_view==1) ? 'readonly' : '';   ?>
<?php  $isSelectView = (@$expense->is_view==1) ? 'pointer-off' : '';   ?>

@if (count($errors) > 0)
<div id="content" class="padding-20">

    <div class="alert alert-danger margin-bottom-30">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
           @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
<style type="">
.main {
    /*margin-bottom: 10px !important;*/
}.col-md-3 {
    width: 30%;
}.col-md-3,.col-md-7,.col-md-4,.col-md-5{
  padding-right: 0px !important;

}.center{
  text-align: center;
}.left{
  text-align: left;
}.right{
  text-align: right;
}
.col-md-7{
    margin-bottom: 7px;
}
</style>

   <div id="content" class="padding-20">

    <div class="row">

        <div class="col-md-12">

            <!-- ------ -->
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-transparent">
                    <strong>{{ $data['page_management']['title'] ?? "" }}</strong>
                </div>

                <div class="panel-body">
                  @if(!isset($expense->id))
                   {!! Form::open(array('route' => 'expenses.store','method'=>'POST' , 'id' => 'expense_form')) !!}
                   @else
                     {!! Form::model($expense, ['id' => 'expense_form','method' => 'PATCH','route' => ['expenses.update', $expense->id ]]) !!}
                    @endif
                   <!-- <form class="validate" action="{{ route('users.store')}}" method="post" data-success="Sent! Thank you!" data-toastr-position="top-right"> -->
                    <fieldset>
                        <!-- required [php action request] -->
                        <input type="hidden" id="block_hidden" value="{{ @$expense->block_id }}" />
                         <div class="row">

                              <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Exp Code</label>
                                            <div class="col-md-8">
                                           
                                                {!! Form::text('exp_code', null, array('placeholder' => 'AUTO','class' => 'form-control' , 'readonly'=>'true')) !!}
                                         
                                           
                                          </div>
                                        

                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                            <label class="col-md-2">Date</label>
                                            <div class="col-md-9">
                                           {!! Form::text('exp_date', null, array('placeholder' => 'dd-mm-yyyy','class' => 'form-control datepicker','required'=>true ,'autocomplete'=>'off',$isView =>true)) !!}
                                        
                                          </div>

                                    </div>
                                  </div>
                              </div>
                              <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Exp Category</label>
                                            <div class="col-md-8 {{$isSelectView}}">
                                            <select class=" form-control web-select2" {{$isView}} required id="exp_category_id" name="exp_category_id">
                                                <option value="">Select an option</option>
                                                
                                                @foreach($exp_categories as $value)
                                                <option {{  $value->id== @$expense->exp_category_id ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->exp_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                          </div>
                                        

                                    </div>
                                  </div>
                                  
                              </div>



                               
                            
                                      <div class="main">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                            <label class="col-md-3">Description</label>
                                            <div class="col-md-8">
                                            {!! Form::textarea('remarks', null, array('placeholder' => 'Descreption','class' => 'form-control','rows'=>2,$isView =>true)) !!}
                                          </div>
                                        

                                    </div>
                                  </div>
                                  </div>
                              

                            </div>



                        </fieldset>


                             <div class="table-responsive" style="margin-top: 20px">
                            <table class="table table-striped table-bordered table-hover table-responsive data-table mt-4" width="100%">
                                <thead>
                                  <tr>
                                    <th width="5%" class="center">S.No </th>
                                    <th  class="center"> Expense Detail </th>
                                    <th  class="center" width="15%">Qty</th>
                                    <th  class="center" width="15%">Amount</th>
                                    <th  class="center" width="10%"><button type="button" class="btn btn-default btn-xs" id="addNew"><i class="fa fa-plus"></i></button></th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                  <?php if(isset($expense->expense_detail)){ foreach ($expense->expense_detail as $key => $value) {?>
                                    <tr> 
                                        <td class="count center"><?= $key+1 ?></td>
                                        <td>
                                          <textarea rows="1" type="text" {{$isView}} required class="form-control" name="description[]" autocomplete="off">{{ $value->description}}</textarea></td>
                                           <td><input type="number"  {{$isView}}  class="form-control" name="qty[]" autocomplete="off" value="{{ $value->qty}}"></td>
                                       

                                        <td><input type="text" {{$isView}}  required class="form-control right" name="amount[]" value="{{ $value->amount}}" autocomplete="off"></td>
                                        <td class="center"><button type="button" class="btn btn-default btn-xs removeBtn"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                  <?php }} else{ ?>
                                        <tr> 
                                        <td  class="count center">1</td>
                                        <td>
                                          <textarea rows="1" type="text" required class="form-control" name="description[]" autocomplete="off"></textarea></td>
                                        <td><input type="number"  class="form-control" name="qty[]" autocomplete="off"></td>
                                       
                                        <td><input type="text" required class="form-control right" name="amount[]" autocomplete="off" onkeyup="calculateAmount()" value="0"></td>
                                        <td><button type="button" class="btn btn-default btn-xs removeBtn"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                   <?php }  ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="4" class="right">Total Amount:</td>
                                    <td><input type="text" class="form-control right" id="total_amount" name="total_amount" value="0"></td>

                                  </tr>
                                </tfoot>
                              </table>
                          </div>
                      
                        @if($isView=="")
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" onclick="save()" class="btn btn-info margin-top-30 pull-right">
                                   <i class="fa fa-check"></i> <?= (!isset($expense->id)) ? "Save" : "Update" ?>
                               </button>
                           </div>
                       </div>
                       @endif
                    
                       {!! Form::close() !!}
                   </div>
               </div>
               <!-- /----- -->
           </div>
       </div>
   </div>
   <script type="">
     $(document).ready(function() {
     $('#addNew').on('click',function(){
      $tr = $('#tbody').find('tr:last');
      var $clone = $tr.clone();
     $tr.after($clone);
    SequenceNo();
    removeDiv();
    singleDiv();
    calculateAmount();

});


  $('#projects').trigger('change');
   calculateAmount();

});

function calculateAmount(){
  var total_amount = 0;
  $.each($('input[name="amount[]"]'),function(i,elem){
    total_amount+=parseInt($(elem).val() || 0) || 0;
  });
  $('#total_amount').val(total_amount);
}
function SequenceNo(){
$.each($('.count'),function(i,elem){
$(this).text(i+1);
});
}

function singleDiv(){
    if($('.removeBtn').length==1)
        $('.removeBtn').attr('style','display:none');
    else
        $('.removeBtn').removeAttr('style');
}
singleDiv();

function removeDiv(){
$('.removeBtn').on('click',function(){
   $(this).closest('tr').remove();
   singleDiv();
   SequenceNo();
   calculateAmount();
});
}
removeDiv();

   </script>
</div>
@include('expenses/validate')
@endsection



