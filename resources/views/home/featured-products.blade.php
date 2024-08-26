<div class="carousel-box relative px-0 has-transition hov-animate-outline border">
    <div class="px-3">
        <div class="aiz-card-box group h-auto bg-white py-3 hover:trans">
            <div class="relative h-[140px] md:h-[200px] object-contain overflow-hidden">
                <a href="{{ url('product/' . $product->id)}}" class="block h-100" tabindex="0">
                    @if ($product->image)
                    <img class="mx-auto object-contain has-transition ls-is-cached lazyloaded"
                        src="{{asset('upload/' . basename($product->image))}}"
                        alt="" title="{{$product->title}}">
                        @else
                        <img class="mx-auto object-contain has-transition ls-is-cached lazyloaded"
                        src="{{asset('upload/placeholder.jpg')}}" alt="{{$product->title}}">
                    @endif
                </a>

                <span
                    class="absolute top-0 left-0 bg-[#0adfde] ml-1 mt-1 text-[11px] font-[700] text-white w-[35px] text-center">-7%
                </span>

                <div class="absolute top-0 right-0 aiz-p-hov-icon">
                    <a href="javascript:void(0)" class="hov-svg-white" onclick="addToWishList(158)"
                        data-toggle="tooltip" data-title="Add to wishlist" data-placement="left" tabindex="0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4" viewBox="0 0 16 14.4">
                            <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                                transform="translate(-3.05 -4.178)">
                                <path id="Path_32649" data-name="Path 32649"
                                    d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                    transform="translate(0 0)" fill="#919199"></path>
                                <path id="Path_32650" data-name="Path 32650"
                                    d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                    transform="translate(0 0)" fill="#919199"></path>
                            </g>
                        </svg>
                    </a>

                    <a href="javascript:void(0)" class="hov-svg-white" onclick="addToCompare(158)" data-toggle="tooltip"
                        data-title="Add to compare" data-placement="left" tabindex="0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea"
                                d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                                transform="translate(-2.037 -2.038)" fill="#919199"></path>
                        </svg>
                    </a>
                </div>

                <a class="cart-btn absolute bottom-0 left-0 w-full h-[35px] aiz-p-hov-icon text-white text-[13px] font-[700] flex flex-col justify-center items-center"
                    href="{{ url('product/' . $product->id)}}"  tabindex="0">
                    <span class="cart-btn-text"> Add to cart </span>
                    <span><i class="las la-2x la-shopping-cart"></i></span>
                </a>

            </div>

            <div class="p-2 md:p-3 text-left">
                <h3 class="font-[400] text-[13px] overflow-hidden leading-[1.4] mb-0 h-[35px] text-center">
                    <a href="#" class="block text-reset hov-text-primary" tabindex="0">{{$product->title}}</a>
                </h3>


                <div class="text-sm flex justify-center mt-3">
                    @if ($product->discount_price > 0)
                    <div class="group-hover:mr-[0%] group-hover:opacity-100 -mr-[37%] opacity-0 has-transition">
                        <del class="font-[400] text-[#919199] mr-1">৳{{number_format($product->regular_price)}}</del>
                    </div>
                    <div class="">
                        <span class="font-[700] text-[#0adfde]">৳{{number_format($product->discount_price)}}</span>
                    </div>
                    @else
                    <div class="">
                        <span class="font-[400] text-[#919199] font-mono">৳ {{number_format($product->regular_price)}}</span>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>