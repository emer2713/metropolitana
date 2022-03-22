
<div class="col-lg-12 justify-content-center align-items-center Height100" style="max-height: 450px;">

    <div class="row justify-content-center align-items-center">

        @foreach ($productos as $product)


                <div class="col-lg-12 justify-content-center align-items-center Height100" style="padding: 0%; margin-right: 5px;">

                    <p>{{ $product->id }}</p>

                </div>

            

        @endforeach

    </div>
</div>



