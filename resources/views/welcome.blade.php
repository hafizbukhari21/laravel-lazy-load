<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <style>
        .cardWrapper{
            
        }
    </style>
    <body>
        <div class="container cardWrapper d-flex flex-row  flex-wrap">
            
             
        </div>

        <div class="auto-load text-center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
        <script>
            $(document).ready(function () {
                var page =1
                

               doAjax()
                $(window).scroll(function () { 
                    if($(window).scrollTop()+$(window).height() >= $(document).height()){
                        page++
                        console.log(page)
                        doAjax()
                        $(".auto-load").show()
                    }
                });
                function doAjax(){
                    $.ajax({
                    type: "GET",
                    url: "/getData?page"+page,
                    data: "data",
                    success: function (response) {
                        // console.log(response.payload.data[1])

                        response.payload.data.map(attr=>{
                            $(".cardWrapper").append(`
                            <div class="card" style="width: 18rem;">
                             <img src="`+attr.image+`" class="card-img-top" alt="...">
                             <div class="card-body">
                               <h5 class="card-title">`+attr.email+`</h5>
                               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                               <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                            </div>
                            `);
                        })

                        $(".auto-load").hide();
                       
                    }
                });
                }
                
            });
        </script>
    </body>

</html>
