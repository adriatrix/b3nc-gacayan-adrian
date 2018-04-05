@extends('layouts.app')

@section('title')
Orders List
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
           <table class="table table-hover table-sm text-center">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">SO number</th>
                  <th scope="col">Customer</th>
                  <th scope="col">PO number</th>
                  <!-- <th scope="col">Created by</th> -->
                  <th scope="col">Created at</th>
                  <th scope="col" class="text-left">Notes</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($user->orders as $order)
                 <tr>
                    <th scope="row">{{$order->so_num}}</th>
                    <td>{{$order->get_customer->name}}</td>
                    <td>{{$order->po_num}}</td>
                    <!-- <td>{{$order->get_user->name}}</td> -->
                    <td><span class="is-7">{{$order->created_at}}</span></td>
                    <td class="text-left">{{$order->notes}}</td>
                 </tr>
                 @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
