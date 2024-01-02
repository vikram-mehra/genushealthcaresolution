@extends('client/layout/master')
@section('main-content')

		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-1">
			<div class="container">
				<div class="page-title-content">
					<h2>Blog Details</h2>
					<ul>
						<li>
							<a href="index.html">
								Home 
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						 
						<li>Blog Details</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->

		 <section class="blog-details-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-12">
						<div class="blog-details-desc">
							<div class="article-image">
								<img src="{{ asset('admin/images/blog/740x614')}}/{{ $blog->photo }}" alt="image">
							</div>

							<div class="article-content">
								<div class="entry-meta">
									<ul>
										<li><a href="#"><span>{{ $blog->date }}</span></a></li>
										<!-- <li><span>Posted By:</span> <a href="#">vikashmaheshwari</a></li> -->
									</ul>
								</div>
								<?=$blog->full_content?>
								<!-- <h3>Now You Can Blog from Everywhere!</h3>

								<p>We’ve made it quick and convenient for you to manage your blog from anywhere. In this blog post we’ll share the ways you can post to your Wix Blog.  </p>

								 
							 <h3>Blogging from Your Wix Blog Dashboard</h3>
							 <p>On the dashboard, you have everything you need to manage your blog in one place. You can create new posts, set categories and more. To head to your Dashboard, open the Wix Editor and click on Blog > Posts. </p>
							 <h3>Blogging from Your Published Site</h3>
							 <p>Did you know that you can blog right from your published website? After you publish your site, go to your website’s URL and login with your Wix account. There you can write and edit posts, manage comments, pin posts and more! Just click on the 3 dot icon ( ⠇) to see all the things you can do. </p>

							<div class="article-footer">
								<div class="article-tags">
									<span><i class="fa fa-share"></i></span>

									<a href="#">Share</a>
								</div>

								<div class="article-share">
									<ul class="social">
										<li><a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
										<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#" target="_blank"><i class="fa fa-link"></i></a></li>
									</ul>
								</div>
							</div>

							 

							<div class="comments-area">
								 <div class="comment-respond">
									<h3 class="comment-reply-title">Leave a Reply</h3>

									<div class="comment-form">
										<p class="comment-notes">
											<span id="email-notes">Your email address will not be published.</span>
											Required fields are marked 
											<span class="required">*</span>
										</p>
										<p class="comment-form-author">
											<label>Name <span class="required">*</span></label>
											<input type="text" id="author" name="author" required="required">
										</p>
										<p class="comment-form-email">
											<label>Email <span class="required">*</span></label>
											<input type="email" id="email" name="email" required="required">
										</p>
										<p class="comment-form-url">
											<label>Website</label>
											<input type="url" id="url" name="url">
										</p>
										<p class="comment-form-comment">
											<label>Comment</label>
											<textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525" required="required"></textarea>
										</p>
										<p class="form-submit">
											<input type="submit" name="submit" id="submit" class="submit" value="Post A Comment">
										</p>
									</div>
								</div>
							</div> -->
						</div>
					</div>

					
				</div>


<div class="col-lg-3 col-md-12">
						<aside class="widget-area" id="secondary">
							 

							 
							<section class="widget widget_categories">
								<h3 class="widget-title">Recent Blogs</h3>

								<ul>
									@if(! empty($blogs))
	        						@foreach($blogs as $blog)
									<li>
										<a href="{{url('/blog-details/')}}/{{ $blog->heading }}">{{ $blog->heading }}</a>
									</li>
									@endforeach
									@endif
									<!-- <li>
										<a href="#">Consulting </a>
									</li>
									<li>
										<a href="#">Investment </a>
									</li>
									<li>
										<a href="#">Marketing </a>
									</li> -->
									 
								 
								</ul>
							</section>

							 
						</aside>
					</div>

			</div>
		</section>
		 

			
		@endsection
@section('javascript')
@endsection