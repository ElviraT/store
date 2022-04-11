@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Add Category') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="product" class="row">
                                    <h2 class="page-title my-3">
                                        {{ 'Categorias' }}
                                    </h2>
                                </div>
                                <br>
                                <div class="col-md-6 col-xl-6">
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                            {{ __('Add Category') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 p-3">
                                    <div class="card p-3">
                                        <div class="col-md-12">
                                            <table id="myTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>{{'Categoria'}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category->name}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4 my-3">
                                    <div class="mb-3">
                                        <a href="{{ route('user.products', $id) }}" class="btn btn-primary">{{'Agregar productos'}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('user.includes.footer')
@section('modal')
    @include('user.includes.category_modal')
@endsection
@push('custom-js')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $('#myTable').DataTable({
      destroy: true,
      info: false,
      responsive: true,
    });
    //$("#myTable").on('click', '.btn-info', function () { $(this).parent().parent().remove(); }); 
function add_category(){
    "use strict";
    var name = $('#name').val();
    var id_business_cards = $('#id_business_cards').val();
    var id_user = $('#id_user').val();


    $.ajax({
    url: "{{ route('user.add.category') }}",
    method: 'POST',
    data:{_token: "{{ csrf_token() }}", name: name, id_business_cards: id_business_cards, id_user: id_user},
    }).done(function(res) {
        if(res[0].status == 'success') {
            $('#name').val('');
         var t= $('#myTable').DataTable({
              destroy: true,
              info: false,
              data: res[1],
              responsive: true,
              columns: [
                { title: "Categoria", data: "name" }
              ]
            });

            $('#status_category').html("<span class='badge mt-2 bg-green'>{{ 'Registro Agregado' }}</span>");
        }else{
            $('#status_category').html("<span class='badge mt-2 bg-red'>{{ 'Error al Agregar' }}</span>");
        }
            window.setTimeout(function() { $("#status_category").html(''); }, 3000);
    });
}
 
</script>
@endpush
</div>
@endsection
