<section class="featured-product section-padding">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Featured Products</h2>
                        </div>
                        @foreach($products as $product)
                        <div class="col-lg-4 col-12 {{($loop->index==2)?'':'mb-3'}}">
                            <div class="product-thumb">
                                <a href="product-detail.html">
                                    <img src='{{asset("assets/images/product/".$product["image"])}}' class="img-fluid product-image" alt="">
                                </a>

                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">{{($loop->index==1)?"Low Price":"New Arrival"}}</span>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="product-detail.html" class="product-title-link">{{$product["title"]}}</a>
                                        </h5>

                                        <p class="product-p">{{$product["shortDescription"]}}</p>
                                    </div>

                                    <small class="product-price text-muted ms-auto mt-auto mb-5">${{$product["price"]}}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                      

                        
                        <div class="col-12 text-center">
                            <a href="products.html" class="view-all">View All Products</a>
                        </div>

                    </div>
                </div>
            </section>