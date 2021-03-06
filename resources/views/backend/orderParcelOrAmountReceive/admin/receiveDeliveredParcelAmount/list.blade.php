

 <table  class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>Sl.</th>
            <th>#</th>
            <th>Invoice No</th>
            <th>Customer Invoice</th>
            <th>Receive From</th>
            <th>Collect <br/> Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="">
        @foreach($orders as $key=> $order)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <input checked type="checkbox" class="order_id_class" data-id="{{$order->order_id}}" id="order_id_{{$order->order_id}}" name="order_id[]" data-amount="{{$order->orders->collect_amount}}" value="{{$order->order_id}}" />
                <input type="hidden" class="total_amount_class" id="amount_order_id_{{$order->order_id}}"  name="order_id_amount[]" value="" />
            </td>
            <td>
                <a class="viewSingleDataByAjax"   data-id="{{ $order->orders->id }}" href="#">
                    {{$order->orders->invoice_no}}
                </a>
            </td>
            <td>{{$order->orders->merchant_invoice}}</td>
            <td>{{$order->manpowers?$order->manpowers->name:''}}</td>
            <td>
                <span id="del_order_id_{{$order->order_id}}">
                    <span id="" class="total_before_action" >{{$order->orders->collect_amount}}</span>
                </span>
            </td>
            <td>
                Receive
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfooter>
        <tr>
            <td colspan="4"></td>
            <td style="text-align:right">
                <strong>Total</strong> 
            </td>
            <td >
                <strong id="totalAmount"></strong>
            </td>
            <td >
                <input Type="submit" id="submit" class="btn btn-primary" value="Receive All"/>
            </td>
        </tr>
    </tfooter>
</table>
    {{--  {{$orders->links()}}  --}}



{{--  @foreach($orders as $key=> $order)

    <tr>
        <td>{{$key+1}}</td>
        <td>
            <a class="viewSingleDataByAjax"   data-id="{{ $order->orders->id }}" href="#">
                {{$order->orders->invoice_no}}
            </a>
        </td>
        <td>{{$order->orders->merchant_invoice}}</td>
        <td>{{$order->orders->collect_amount}}</td>
        <td>{{$order->orders->customer->customer_name}}</td>
        <td>{{$order->orders->customer->customer_phone}}</td>
    </tr>

@endforeach  --}}
