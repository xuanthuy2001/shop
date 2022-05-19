@extends('layout.master')

{{--  @section('head')
<link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css" />
@endsection  --}}

@section('content')
<table class="table table-bordered" id="menu">
      <thead>
            <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Active</th>
                  <th>Update</th>
                  <th>&nbsp;</th>
            </tr>
      </thead>
      <tbody>
            {{--  <!-- truyền vào $menu lấy từ bên c -->  --}}
            {!! \App\Helpers\helper::menu($menus) !!}
      </tbody>
</table>
      {{ $menus->links() }}


@endsection

{{--  @section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
      src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(function() {
      $('#menu').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('
            menu.api ') !!}',
            columns: [{
                        data: 'id',
                        name: 'id'
                  },
                  {
                        data: 'name',
                        name: 'name'
                  },
                  {
                        data: 'parent_id',
                        name: 'parent_id'
                  },
                  {
                        data: 'description',
                        name: 'description'
                  },
                  {
                        data: 'content',
                        name: 'content'
                  },
                  {
                        data: 'active',
                        name: 'active'
                  },

            ]
      });
});
</script>

@endsection  --}}