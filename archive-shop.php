<?php

get_header();

?>

<div class="container">
	<ol class="breadcrumps" itemtype="http://schema.org/BreadcrumbList" itemscope>
		<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
			<a href="" itemprop="item">Home</a>
		</li>
		<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
			<span itemprop="name">Equipment</span>
		</li>
	</ol>
</div>
<section class="category-hero categoty-hero--equipment">
	<div class="container category-hero__container">
		<div class="category-hero__info">
			<h1 class="category-hero__title">
				100% convection shoproaster for full-bodied espresso and clean filter coffee
			</h1>

			<a href="#" class="btn category-hero__btn offer-btn">Get offer</a>
		</div>
	</div>
</section>

<section class="cat-products">
	<div class="container">
		<div class="cat-products__title">
			Processing Equipment
		</div>
		<div class="cat-title-underline"></div>
		<div class="cat-products__in-category">
			<div class="cat-products--column">
				<a href="/equipment/typhoon-coffee-mixer/">
					<div class="cat-products__single cat-product__single--mini">
						<img src="img/product-photo3.png" alt=""
						     class="cat-products__img">
						<div class="cat-products__desc">
							<div class="cat-product__title">
								Coffee mixer
							</div>
							<ul class="cat-product__info">
								<li class="cat-product__info--item">
									25kg M-25
								</li>
								<li class="cat-product__info--item">
									50kg M-50
								</li>
								<li class="cat-product__info--item">
									100kg M-100
								</li>
							</ul>
						</div>
					</div>
				</a>
			</div>

			<div class="cat-products--column">
				<a href="/equipment/typhoon-coffee-destoner/">
					<div class="cat-products__single cat-product__single--mini">
						<img src="img/product-photo4.png" alt=""
						     class="cat-products__img">
						<div class="cat-products__desc">
							<div class="cat-product__title">
								Coffee destoner
							</div>
							<ul class="cat-product__info">
								<li class="cat-product__info--item">
									5kg V-5
								</li>
								<li class="cat-product__info--item">
									20kg V-20
								</li>
								<li class="cat-product__info--item">
									30kg V-30
								</li>
								<li class="cat-product__info--item">
									60kg V-60
								</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="more-products">
	<div class="container">
		<div class="cat-products__header">
			<div class="more-products__title">
				You may also be interested
			</div>
			<span class="cat-products__all">
            <a href="/equipment-category/shoproasters/">View all roasters</a>
        </span>
		</div>
		<div class="cat-products__in-category">
			<div class="cat-products--column cat-products--column--66p">
				<div class="cat-products__single">
					<div class="cat-products__desc">
						<div class="cat-product__title">
							Typhoon 5 shoproaster
						</div>
						<div class="cat-product__subtitle">
							For &ZeroWidthSpace;demonstrating&ZeroWidthSpace; coffee roasting in coffee shops and roasteries
						</div>
						<ul class="cat-product__specs">
							<li class="specs__item">
								<div class="specs__name">
									Capacity
								</div>
								<div class="specs__value">
									5 kg
								</div>
							</li>

							<li class="specs__item">
								<div class="specs__name">
									Roast time
								</div>
								<div class="specs__value">
									5-8 min
								</div>
							</li>

							<li class="specs__item">
								<div class="specs__name">
									Efficiency
								</div>
								<div class="specs__value">
									30 kg/h
								</div>
							</li>

							<li class="specs__item">
								<div class="specs__name">
									Heat source
								</div>
								<div class="specs__value">
									Electricity
								</div>
							</li>
						</ul>

						<div class="cat-product__actions">
							<a href="/equipment/typhoon-5-shoproaster/" class="btn btn--medium">Learn more</a>
							<a href="#" class="btn btn--medium btn_white">Customize</a>
						</div>
					</div>

					<img src="img/roaster-photo-6.png" alt="" class="cat-products__img">
				</div>
			</div>
			<div class="cat-products--column">
				<a href="equipment/typhoon-coffee-destoner/">
					<div class="cat-products__single cat-product__single--mini">
						<img src="img/product-photo4.png" alt=""
						     class="cat-products__img">
						<div class="cat-products__desc">
							<div class="cat-product__title">
								Coffee destoner
							</div>
							<ul class="cat-product__info">
								<li class="cat-product__info--item">
									5kg V-5
								</li>
								<li class="cat-product__info--item">
									20kg V-20
								</li>
								<li class="cat-product__info--item">
									30kg V-30
								</li>
								<li class="cat-product__info--item">
									60kg V-60
								</li>
							</ul>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<?php

/**
 * Hook: recall_form
 *
 * @see recall_form
 */
do_action( 'recall_form' );

?>

<?php
get_footer();