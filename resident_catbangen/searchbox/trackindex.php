<html>
    <head>
        <title>Search</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container" style="max-width: 50%;">

            <div class="text-center mt-5 mb-4">
                <h2>Document status tracker</h2>
            </div>

            <input type="text" class="form-control" id="live_search" autocomplete="off"
            placeholder="Please enter your tracking number here">
        </div>

        <div id="searchresult"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#live_search").keyup(function(){
                    var input = $(this).val();
                    //alert(input);

                    if(input !=""){
                        $.ajax({
                            url:"live_search.php",
                            method:"POST",
                            data:{input:input},

                            success:function(data){
                                $("#searchresult").html(data);
                                $("#searchresult").css("display","block");
                            }
                        });
                    }else{
                        $("#searchresult").css("display","none");
                    }
                });

            });
        </script>

    </body>
</html>
