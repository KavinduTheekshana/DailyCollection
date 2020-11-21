<h1>KC Daily Transaction</h1>
<p>Date :{{$date}}</p>
<p>Route : {{$route}}</p>


<table width="100%">
    <thead>
    <tr>
        <th width="30%">Name</th>
        <th width="40%">Address</th>
        <th width="20%">Phone</th>
        <th width="10%">Installment</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $r)
        <tr>
            <td>{{ $r->transaction->customerData->name}}</td>
            <td>{{ $r->transaction->customerData->address}}</td>
            <td>{{ $r->transaction->customerData->mobile}}</td>
            <td>{{ $r->transaction->installment}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
