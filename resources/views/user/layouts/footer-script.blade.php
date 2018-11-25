<script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>

    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
        } );
    
        table.tables().header().to$().find('th:eq(0)').css('min-width', '200px');
        $(window).trigger('resize');table.buttons().container()
                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );

        @if(Session::has('success'))
            toastr.success('{{Session::get('success')}}')
        @endif
        @if(Session::has('fail'))
            toastr.error('{{Session::get('fail')}}')
        @endif
        
        function handleChange(checkbox) {
            if(checkbox.checked == true){
                document.getElementById("transaction_number").removeAttribute("disabled");
            }else{
                document.getElementById("transaction_number").setAttribute("disabled", "disabled");
            }
        }
        
        function notify(){

        let id = {{Auth::id()}};
        
        axios.get('/api/notification/' + id)
        .then(function (response) {
            // handle success
            console.log(response);
            $('#notifications').empty();
            var html = "";

            $.each(response.data, function(index, notification){
                html += '<li class="notification-box"><div class="row pl-2"><div class="col-lg-8 col-sm-8 col-8 "><strong class="text-info">'
                html += notification.data.title
                html += '</strong> <div>'
                html += notification.data.document_no
                html += '</div> <small class="text-warning">'
                html += new Date(notification.data.received_at.date);
                html += '</small></div></div></li>'
            })
            
            $('#notifications').append(html);

            document.getElementById("count").innerHTML = response.data.length;
            
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        }

        setInterval(() => {
            notify();
        },3000);

        function updateNotif(id){
            axios.get('/api/notification/read/' + id)
            .then(function(response){
                console.log(response.data);
                
            })
            .catch(function (error) {
            // handle error
            console.log(error);
        });
        }

    </script>
