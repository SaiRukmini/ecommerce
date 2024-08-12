<script type="text/JavaScript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title:"Are you sure to delete this",
                text:"This delete will be permanent",
                icon:"warning",
                buttons:true,
                dangerMode:true,
            })
            .then((willCancel)=>{
                if(willCancel)
            {
                window.location.href=urlToRedirect;
            }
            });
        }
     </script>