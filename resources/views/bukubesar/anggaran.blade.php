<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Anggaran</th>
        <th>Realisasi</th>
        <th>Posisi Anggaran</th>
    </tr>                      
    <tbody>
    @foreach ($bbanggaran as $item)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $item->kode}}</td>
        <td>{{Str::rupiah ($item->anggaran)}}</td>
        <td>{{Str::rupiah ($item->realisasi)}}</td>
        <td>{{Str::rupiah ($saldo = $saldo + $item->anggaran - $item->realisasi)}}</td>
        </tr>  
    @endforeach  
    </tbody> 
    <th>Total</th>                
    <th></th>          
    <th>{{Str::rupiah($anggaran)}}</th>                                           
    <th>{{Str::rupiah($realisasi)}}</th>                
    <th>{{Str::rupiah($total)}}</th>                
    <th></th>                
</thead>
</table>