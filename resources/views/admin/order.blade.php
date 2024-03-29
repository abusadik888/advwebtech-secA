<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
   
   <style>
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg{
            border:3px solid white;
            width: 80%;
            margin: auto;
            padding-top: 50px;
            text-align: center;
        }
        .th_deg{
            background-color: skyblue;
        }
        .img_size{
            width: 200px;
            height: 100px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="title_deg">All Orders</h1>

<div>
  <form class="d-flex justify-content-center" style="padding-bottom:30px;" action="{{('search')}}" method="get" >
    @csrf


  <input type="text" name="search" placeholder="Search Here" class="d-flex justify-content-center" style="color:black;">
    <input type="submit" value="submit" class="btn btn-outline-primary">
  </form>
      </div>


            <table class="table_deg">
                <tr class="th_deg">
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Email</th>
                    <th style="padding: 10px;">Address</th>
                    <th style="padding: 10px;">Phone</th>
                    <th style="padding: 10px;">Product Title</th>
                    <th style="padding: 10px;">Quantity</th>
                    <th style="padding: 10px;">Price</th>
                    <th style="padding: 10px;">Payment Status</th>
                    <th style="padding: 10px;">Delivery Status</th>
                    <th style="padding: 10px;">Image</th>
                    <th style="padding: 10px;">Delivered</th>
                    <th style="padding: 10px;">Print PDF</th>
                    <th style="padding: 10px;">Send Email</th>
                    
                </tr>
      </div>

                @forelse ($order as $order)
                <tr>
                    <td>{{ $order-> name}}</td>
                    <td>{{ $order-> email}}</td>
                    <td>{{ $order-> address}}</td>
                    <td>{{ $order-> phone}}</td>
                    <td>{{ $order-> product_title}}</td>
                    <td>{{ $order-> quantity}}</td>
                    <td>{{ $order-> price}}</td>
                    <td>{{ $order-> payment_status}}</td>
                    <td>{{ $order-> delivery_status}}</td>
                    <td>
                        <img class="img_size" src="/product/{{ $order->image }}">
                    </td>

                    <td>

                    

                      <a href="{{url('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered !!!')">Delivered</a>
                      
                     
                    </td>

                    <td>

                    <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                    </td>

                    <td>

                    <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                    </td>
                    
                </tr>
                @empty
                <tr>
                  <td colspan="16">
                    No Data Found
                  </td>
                </tr>
                @endforelse
               
                
            </table>
        </div>
      </div>
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>