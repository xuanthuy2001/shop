@extends('customer.main')

@section('content')
<form class="bg0 p-t-75 p-b-85" method="post">
      @if (count($products) != 0 )
      <div class="container">
            <div class="row">
                  <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                              <div class="wrap-table-shopping-cart">
                                    @php
                                    $total = 0;
                                    @endphp
                                    <table class="table-shopping-cart">
                                          <tbody>
                                                <tr class="table_head">
                                                      <th class="column-1">Product</th>
                                                      <th class="column-2"></th>
                                                      <th class="column-3">Price</th>
                                                      <th class="column-4">Quantity</th>
                                                      <th class="column-5">Total</th>
                                                      <th class="column-5">&nbsp</th>
                                                </tr>

                                                @foreach ($products as $key => $product)
                                                @php
                                                $price = $product->price_sale != 0 ? $product->price_sale :
                                                $product->price;
                                                $priceEachProduct = $price*$carts[$product->id];
                                                $total += $priceEachProduct;
                                                @endphp
                                                <tr class="table_row">
                                                      <td class="column-1">
                                                            <div class="how-itemcart1">
                                                                  <img src="{{ $product->thumb }}" alt="IMG">
                                                            </div>
                                                      </td>
                                                      <td class="column-2">{{$product -> name}}</td>
                                                      <td class="column-3">
                                                            {{number_format( $price)}}
                                                      </td>
                                                      <td class="column-4">
                                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                                  <div
                                                                        class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                                  </div>

                                                                  <input class="mtext-104 cl3 txt-center num-product"
                                                                        type="number"
                                                                        name="num-product[{{$product->id}}]"
                                                                        value="{{ $carts[$product -> id] }}">

                                                                  <div
                                                                        class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                        <i onclick="tang()"
                                                                              class="fs-16 zmdi zmdi-plus"></i>
                                                                  </div>
                                                            </div>
                                                      </td>
                                                      <td class="column-5">{{
                                                        number_format( $priceEachProduct)
                                                      
                                                      }}</td>
                                                      <td><a href="/carts/delete/{{$product->id}}">xóa</a></td>
                                                </tr>
                                                @endforeach


                                          </tbody>
                                    </table>
                              </div>

                              <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                    <div class="flex-w flex-m m-r-20 m-tb-5">
                                          <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5"
                                                type="text" name="coupon" placeholder="Coupon Code">

                                          <div
                                                class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                                Apply coupon
                                          </div>
                                    </div>

                                    <input type="submit" value="Update Cart" formaction="/update_cart"
                                          class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" />
                                    @csrf

                              </div>
                        </div>
                  </div>

                  <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                              <h4 class="mtext-109 cl2 p-b-30">
                                    Cart Totals
                              </h4>

                              <div class="flex-w flex-t bor12 p-b-13">
                                    <div class="size-208">
                                          <span class="stext-110 cl2">
                                                tổng tiền:
                                          </span>
                                    </div>

                                    <div class="size-209">
                                          <span class="mtext-110 cl2">
                                                {{number_format($total, 2, ',', ' ')}}
                                                <!-- (number_format(tiền , 2 số hàng thập phân , hàng phập phân với phần nguyên cách nhau bởi dấu phẩy , các hàng nghìn cách nhau bởi khoảng trống )) -->
                                          </span>
                                    </div>
                              </div>

                              <button type="submit" name="num-product[{{$product->id}}]" formaction="/update_cart"
                                    class=" flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                              </button>

                        </div>
                  </div>
            </div>
      </div>
</form>
@else
<div style="padding: 15px; text-align: center">
      <h1 style="color:red">giỏ hàng trống</h1>
</div>
@endif

@endsection