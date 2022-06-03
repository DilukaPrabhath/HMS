@extends('backend.website.layout.master')

  @section('content') 
          
        <section class="welcome_bakery_area">
        	<div class="container">
        		<div class="welcome_bakery_inner p_100">
        			<div class="row">
        				<div class="col-lg-6">
        					<div class="main_title">
								<h2>Welcome to our Hotel</h2>
								<p>When you plan a journey to Sri Lanka, remember that accommodation is very important.</p>
							</div>
        					<div class="welcome_left_text">
        						<p>GRAND OPERA HOTEL features 3-star accommodation with private balconies. With a restaurant, the 3-star hotel has air-conditioned rooms with free WiFi, each with a private bathroom. Private parking can be arranged at an extra charge. All rooms in the hotel are fitted with a flat-screen TV. Guests at GRAND OPERA HOTEL can enjoy an Asian breakfast. Negombo is 36 km from the accommodation.</p>
        						<a class="pink_btn" href="#">Know more about us</a>
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="welcome_img">
        						<img class="img-fluid" src="{{asset('site/img/welcome/welcome-right.jpg')}}" alt="" style="border-radius:10px;">
        					</div>
        				</div>
        			</div>
        		</div>
            
        		<div class="cake_feature_inner">
        			<div class="main_title">
						<h2>Our Featured Meals</h2>
						
					</div>
       				<div class="cake_feature_slider owl-carousel">
               @foreach($meal_items as $value)
       					<div class="item">
       						<div class="cake_feature_item">
       							<div class="cake_img">
       								<img src="{{asset('Upload/Meals/'.$value->icon)}}" alt="" width="272px" height="226px">
       							</div>
       							<div class="cake_text">
       								<h4>Rs.{{$value->item_price}}</h4>
       								<h3>{{$value->item_name}}</h3>
                      <h6>{{$value->item_description}}</h6>
       								<a class="pest_btn" href="#">Add to cart</a>
       							</div>
       						</div>
       					</div>
                
       			 @endforeach
       				</div>
        		</div>
        	</div>
         
        </section>
      
        <section class="special_recipe_area">
        	<div class="container">
        		<div class="special_recipe_slider owl-carousel">
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="{{asset('site/img/recipe/recipe-1.png')}}" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Menus</h4>
        						<p>Looking for a special lineup of dishes? Delish has got you covered, whether you're hosting a cocktail party, birthday party, casual summer cookouts, or any other kind of gathering</p>
        					
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="{{asset('site/img/recipe/recipe-2.png')}}" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Looking for a special lineup of dishes? Delish has got you covered, whether you're hosting a cocktail party, birthday party, casual summer cookouts, or any other kind of gathering</p>
        					
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="{{asset('site/img/recipe/recipe-3.png')}}" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Looking for a special lineup of dishes? Delish has got you covered, whether you're hosting a cocktail party, birthday party, casual summer cookouts, or any other kind of gathering</p>
        					
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="{{asset('site/img/recipe/recipe-4.png')}}" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Looking for a special lineup of dishes? Delish has got you covered, whether you're hosting a cocktail party, birthday party, casual summer cookouts, or any other kind of gathering</p>
        					
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
          @stop